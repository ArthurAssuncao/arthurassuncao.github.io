//
// Pure JS GitHub participation graph
// http://bouchon.github.com/Gitgraph
//

var Gitview = (function (args) {
	// constructor
    var module = function (args) {
    	// Initiatialization
		if(!args || !args.user){
			throw new Error('Gitview: missing user and/or domNode arg');
		}else{
			// Parameters
			this.user 		= args.user;
			this.domNode 	= args.domNode ? args.domNode : document.body;
			this.compact 	= args.compact==true ? true : false;
			this.frame	 	= true;
			this.showForks  = args.showForks==false ? false : true;
			this.cache		= args.cache==false ? false : true;
			this.count		= args.count ? args.count : 3;
			this.w			= args.width ? args.width : '440px';
			this.w			= this.w.substring(0,this.w.length-2)<300 ? '350px' : this.w;
			this.theme 		= args.theme || "light";
			this.frameColor	= this.theme=="light" ? "white" : '#333';
			this.repos 		= [];
			this.entries 	= [];
			this.bottoms 	= [];
			this.tops 		= [];
			// Make sure bind( ) is a function
			if (!Function.prototype.bind) Function.prototype.bind = this.bind;
			// Dynamically load scripts and continue building
			this.loadScript('http://bitpshr.info/cdn/Gitgraph.min.js', this.postCreate.bind(this));	
		}
    };

    // dress up the module's prototype
    module.prototype = {
        constructor: module,

		postCreate : function(){
			// Get user info if we built a frame (avatar, etc.)
			if(this.frame) this.loadUser();
			// Otherwise go straight to loading repos
			else this.loadRepos();
		},

		loadUser : function(){
			if(window.sessionStorage && window.sessionStorage["user_data"+this.user]){
				var data = JSON.parse(window.sessionStorage["user_data"+this.user]);
				// build the frame, header & repos
	            this.createFrame();
				this.createFrameHeader(data);
				this.loadRepos();
			}else{
				var xhr = new XMLHttpRequest();
				var proxy 	= "http://bitpshr.info/cdn/ba-simple-proxy.php";
				var params 	= '?url=https://api.github.com/users/'+this.user;
				xhr.open("GET", proxy+params, true);
				xhr.onreadystatechange = function () {
				    if(xhr.readyState==4 && xhr.status==200 ) {
				    	// grab the data
				    	var data = JSON.parse( xhr.responseText ).contents;
				    	if(window.sessionStorage){
				    		window.sessionStorage["user_data"+this.user] = JSON.stringify(data);	
				    	}
				    	// build the frame, header & repos
			            this.createFrame();
						this.createFrameHeader(data);
						this.loadRepos();
			  	    }
				}.bind(this);
				xhr.send(null);
			}
		},

		// Loads repos using JSONP
		loadRepos : function(){
			if(window.sessionStorage && window.sessionStorage["repo_data"+this.user]){
				var data = JSON.parse(window.sessionStorage["repo_data"+this.user]);
				// build the frame, header & repos
	           	this.repos = data;
				this.sortRepos(this.repos);
				this._index = 0;
				this._pageMax = this.count;
				// For each repo, built an entry
				for(var i=0; i<this.repos.length; i++)
					this.createRepoEntry(this.repos[i]);
				this._repoCount = this.entries.length;
			}else{
				// Get repo info
				var xhr = new XMLHttpRequest();
				var proxy 	= "http://bitpshr.info/cdn/ba-simple-proxy.php";
				var params 	= "?url=https://api.github.com/users/"+this.user+"/repos";
				xhr.open("GET", proxy+params, true);
				xhr.onreadystatechange = function () {
				    if(xhr.readyState==4 && xhr.status==200 ) {
				    	// grab the data
				    	var data = JSON.parse( xhr.responseText ).contents;
				    	console.log('data = ',data);
				    	if(window.sessionStorage){
				    		window.sessionStorage["repo_data"+this.user] = JSON.stringify(data);	
				    	}
				    	// build the frame, header & repos
			           	this.repos = data;
						this.sortRepos(this.repos);
						this._index = 0;
						this._pageMax = this.count;
						// For each repo, built an entry
						for(var i=0; i<this.repos.length; i++)
							this.createRepoEntry(this.repos[i]);
						this._repoCount = this.entries.length;
			  	    }
				}.bind(this);
				xhr.send(null);	
			}
		},

		// Builds optional outer frame
		createFrame : function(){
			//outer
			var outer = document.createElement("div");
			outer.style.cssText = 'margin-top:20px;box-shadow: 0 0 10px 3px #AAA;position:relative;text-align:left;line-height:15px;padding:5px 5px 30px 5px;'+
				'background:'+this.frameColor+';border-radius:3px;width:'+this.w+';'
			this.domNode.appendChild(outer);
			//inner
			var inner = document.createElement("div");
			/*inner.style.cssText = 'height:100%;width:'+this.w+';';*/ /*modifiquei*/
			inner.style.cssText = 'width:'+this.w+';';
			outer.appendChild(inner);
			//create page buttons
			var right = document.createElement("a");
			right.innerHTML = ">";
			right.style.cssText = 'cursor:pointer;cursor:hand;background-color: #eeeeee; background-image: -webkit-gradient(linear, left top, left bottom, '+
				'color-stop(0%, #eeeeee), color-stop(100%, #cccccc)); background-image: -webkit-linear-gradient(top, #eeeeee, #cccccc);'+
				' background-image: -moz-linear-gradient(top, #eeeeee, #cccccc); background-image: -ms-linear-gradient(top, #eeeeee, #cccccc); '+
				'background-image: -o-linear-gradient(top, #eeeeee, #cccccc); background-image: linear-gradient(top, #eeeeee, #cccccc);'+
				' border: 1px solid #ccc; border-bottom: 1px solid #bbb; border-radius: 2px; position:absolute; right:6px;bottom:4px;'+
				' color: #333; font: bold 11px/1 "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif; '+
				'text-align: center; text-shadow: 0 1px 0 #eee; display:inline-block; line-height:20px;width:20px;height:20px;';
			outer.appendChild(right);
			var left = document.createElement("a");
			left.innerHTML = "<";
			left.style.cssText = 'cursor:pointer;cursor:hand;background-color: #eeeeee; background-image: -webkit-gradient(linear, left top, left bottom, '+
				'color-stop(0%, #eeeeee), color-stop(100%, #cccccc)); background-image: -webkit-linear-gradient(top, #eeeeee, #cccccc);'+
				' background-image: -moz-linear-gradient(top, #eeeeee, #cccccc); background-image: -ms-linear-gradient(top, #eeeeee, #cccccc); '+
				'background-image: -o-linear-gradient(top, #eeeeee, #cccccc); background-image: linear-gradient(top, #eeeeee, #cccccc);'+
				' border: 1px solid #ccc; border-bottom: 1px solid #bbb; border-radius: 2px; position:absolute; right:33px;bottom:4px;'+
				' color: #333; font: bold 11px/1 "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif; '+
				'text-align: center; text-shadow: 0 1px 0 #eee; display:inline-block; line-height:20px;width:20px;height:20px;';
			outer.appendChild(left);
			//connect page buttons
			right.onclick = this.nextPage.bind(this);
			left.onclick = this.prevPage.bind(this);
			this.domNode = inner;
		},

		// Builds frame header (if frame arg is set to true)
		createFrameHeader : function(data){
			//table
			var table = document.createElement("table");
			table.style.cssText = 'height:45px;width:100%;border-spacing:0;'
			    +'border-collapse:collapse;margin:0px;padding:0px;';
			this.domNode.parentNode.insertBefore(table, this.domNode);
			var row = document.createElement("tr");
			table.appendChild(row);
			//avater cell
			var avatarCell = document.createElement("td");
			avatarCell.style.cssText = 'width:41px;vertical-align:top;padding:0px;';
			row.appendChild(avatarCell);
			var otherCell = document.createElement("td");
			otherCell.style.cssText = "padding-bottom: 4px;vertical-align: bottom;";
			row.appendChild(otherCell);
			//avatar
			var im = document.createElement("img");
			im.src = data.avatar_url;
			im.style.cssText = 'width:40px;height:auto;border-radius:2px;position:relative;';
			avatarCell.appendChild(im);
			//user name
			var span = document.createElement("span");
			span.innerHTML = data.login+'<br>';
			var titleColor = this.theme=="light" ? "#333" : "#EEE";
			span.style.cssText = 'font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:13px;'
				+'color:'+titleColor+';font-weight:bold;margin-left:6px';
			otherCell.appendChild(span);
			//followers
			var t = document.createElement("span");
			t.innerHTML = data.followers+' seguidor';
			t.style.cssText = 'font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:12px;color:#AAA;margin-left:6px';
			if(data.followers > 1 || data.followers == 0) t.innerHTML += 'es';
			otherCell.appendChild(t);
			//repos
			var v = document.createElement("span");
			v.innerHTML = ' - '+data.public_repos+' repositório';
			v.style.cssText = 'font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:12px;color:#AAA;';
			if(data.public_repos > 1 || data.public_repos == 0) v.innerHTML += 's';
			else v.innerHTML += 'y'
			otherCell.appendChild(v);
			//toggle full / compact buttons
			var x = document.createElement("span");
			x.innerHTML = "resumido";
			x.style.cssText = 'font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:10px;color:#AAA;'
				+'cursor:hand;cursor:pointer;margin-left:5px;position:absolute;top:33px;right:55px';
			this.domNode.parentNode.insertBefore(x, this.domNode);
			var w = document.createElement("span");
			w.innerHTML = "completo";
			w.style.cssText = 'font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;'+
				    'font-size:10px;color:#AAA;cursor:hand;cursor:pointer;'
				+'position:absolute;top:33px;right:7px';
			this.domNode.parentNode.insertBefore(w, this.domNode);
			//8. connect things
			w.onclick = this.toggleFull.bind(this);
			x.onclick = this.toggleCompact.bind(this);
		},

		// Builds each repo node
		createRepoEntry : function(obj, showAsCompact){
			if(!obj.fork || (obj.fork && this.showForks)){
				this.domNode.style.borderBottom = "1px solid #DDD";
				this.domNode.style.background = "white";
				this.domNode.style.borderRadius = "2px";
				//repo container
				var container = document.createElement("div");
				container.className = "entry";
				container.style.cssText = "border-radius:2px;padding-top: 5px;text-align:left;border-top:1px solid #DDD;background:white;";
				this.domNode.appendChild(container);
				this.entries.push(container);

				if(!this.frame) container.style.width = this.w;
				if(this.compact) container.style.marginBottom = '5px';
				if(this._index >= this.count)
					container.style.display = "none";
				//build top section
				var top = this.createTop(obj, container);
				this.tops.push(top);
				//build bottom section
				var bottom = this.createBottom(obj, container);	
				this.bottoms.push(bottom);
				this._index++;
			}
		},

		createTop : function(obj, container){
			//top (title, forks, watchers, etc.)
			var top = document.createElement("div");
			top.className = "top";
			top.style.cssText = "height:32px;line-height:32px;position:relative;";
			container.appendChild(top);
			if(this.compact) top.style.borderBottom = '0px';
			//smiley icon
			var s = (obj.fork) ? 'http://bitpshr.info/cdn/fork.png' : 
			    'http://bitpshr.info/cdn/gh-public.png'
			var im = document.createElement("img");
			im.src = s;
			im.style.cssText = "position:absolute;left:4px;top:2px";
			top.appendChild(im);
			//title
			var repoName = document.createElement("a");
			repoName.innerHTML = obj.name;
			repoName.href = 'https://github.com/'+this.user+'/'+obj.name;
			repoName.style.cssText = 'font-size:20px;font-weight:bold;Helvetica, arial, freesans, clean, sans-serif;letter-spacing:-1px;position:absolute;'
				+'left:35px;text-decoration:none';
			top.appendChild(repoName);
			//container for watchers & forks
			var stats = document.createElement("div");
			stats.style.cssText = 'position:relative;display:inline-block;float:right;color:#666;font-size:11px;'+
				'font-family:arial;font-weight:bold;height:32px;';
			top.appendChild(stats);
			//language if there is one
			if(obj.language){
				var s = document.createElement("span");
				s.style.cssText = 'position:absolute;left:-180px;height:32px;line-height:32px;';
				s.innerHTML = obj.language;
				stats.appendChild(s);
			}
			//watchers
			var watchers = document.createElement("a");
			watchers.innerHTML = '<img style="position:relative;top:50%;left:-15px;margin-top:-35px;" src="http://bitpshr.info/cdn/star.png"/>'+
				'<font color="#666;">'+obj.watchers+'</font>';
			watchers.href = 'https://github.com/'+this.user+'/'+obj.name+'/watchers';
			watchers.style.cssText = 'color:gray;position:absolute;left:-85px;height:32px;line-height:32px;text-decoration:none;';
			stats.appendChild(watchers);
			//forks
			var forks = document.createElement('a');
			forks.innerHTML = '<img style="position:relative;top:50%;left:-14px;margin-top:-35px;" src="http://bitpshr.info/cdn/forks.png"/>'+
				'<font color="#666;">'+obj.forks+'</font>';
			forks.href = 'https://github.com/'+this.user+'/'+obj.name+'/network';
			forks.style.cssText = 'color:gray;position:absolute;left:-35px;height:32px;line-height:32px;text-decoration:none;';
			stats.appendChild(forks);
			return top;
		},

			// Builds entry bottom (graph, last updated, etc.)
		createBottom : function(obj, container){
			//Bottom (graph, last updated, etc.)
			var bottom = document.createElement("div");
			bottom.className = "bottom";
			bottom.style.cssText = 'position:relative;border-bottom-right-radius:3px;border-bottom-left-radius:3px;padding-bottom:5px;padding-top:5px;height:74px;';
			container.appendChild(bottom);
			//Graph
			if(!this._tmpW) this._tmpW = (container.offsetWidth-47);
			var graph = new Gitgraph({ 
				user    : this.user,
				repo    : obj.name,
				showName: false,
				domNode : bottom,
				width   : this._tmpW,
				allColor: "#EEEEEE",
				userColor: "#BBBBBB",
				height  : 80
			});
			var tmpNode = bottom.firstChild;
			tmpNode.style.cssText = "margin-left:35px;position:absolute;top:0px;"
			tmpNode.style.marginLeft = "35px";
			//Participation graph & last updated
			// var updated = document.createElement("div");
			// updated.innerHTML = 'Last updated '+this.fixUpdateDate(obj.pushed_at);
			// updated.style.cssText = 'position:absolute;font-family:Helvetica, arial, freesans, clean, sans-serif;font-size:11px;color:#888;margin-top:20px;margin-left:35px;';
			// bottom.appendChild(updated);
			//Slice & build repo description
			var d = obj.description;
			if(d.length > 100) d = d.slice(0,97)+'...';
			var description = document.createElement("div");
			description.innerHTML = d;
			description.style.cssText = 'position:absolute;top:10px;font-family:Helvetica, arial, freesans, clean, sans-serif;'+
				'font-size:14px;margin-left:35px;height:30px;color:#333;';
			bottom.appendChild(description);
			// handle compact
			if(this.compact) bottom.style.display = "none";
			return bottom;
		},

		fixUpdateDate : function(date){
			// TODO: currently I just return the date as-is, I need to implement this
			return date;
		},

		// Go to next page of repos
		nextPage : function(){
			var lower = this._pageMax;
			this._pageMax = ((this._pageMax+this.count)<=this._repoCount) ? (this._pageMax+this.count) : this._repoCount;
			var upper = this._pageMax;
			if(lower != upper){
				for(var i=0; i<this.entries.length; i++){
					if(i<lower) this.entries[i].style.display = "none";
					else if(i<upper) this.entries[i].style.display = "block";
				}
			}
		},
		
		// Go to prev page of repos
		prevPage : function(){
			var diff = 0;
			for(var o=0; o<this.entries.length; o++){
				if(this.entries[o].style.display != "none") diff++;
			}
			this._pageMax = ((this._pageMax-diff)>=this.count) ? (this._pageMax-diff) : this.count;
			var upper = this._pageMax;
			var lower = ((this._pageMax-this.count)>=0) ? (this._pageMax-this.count) : 0;
			if(!((upper==lower)&&(upper==0))){
				for(var i=0; i<this.entries.length; i++){
					if(i>=upper) this.entries[i].style.display = "none";
					else if(i>=lower) this.entries[i].style.display = "block";
				}
			}
		},

		// Toggles full mode
		toggleFull : function(){
			for(var i=0; i<this.bottoms.length; i++){
				this.bottoms[i].style.display = "block";
			}
			for(var j=0; j<this.bottoms.length; j++){
				this.bottoms[j].style.borderBottom = '1px solid #DDD1px solid #DDD';
			}
		},
		
		// Toggles compact mode
		toggleCompact : function(){
			for(var i=0; i<this.bottoms.length; i++){
				this.bottoms[i].style.display = "none";
			}
			for(var j=0; j<this.bottoms.length; j++){
				this.bottoms[j].style.borderBottom = '0px';
			}
		},

		// Sorts repos based on update date
		sortRepos : function(arr){
			arr.sort(function(a, b){
			    var keyA = new Date(a.pushed_at),
			    keyB = new Date(b.pushed_at);
			    // Compare the 2 dates
			    if(keyA < keyB) return -1;
			    if(keyA > keyB) return 1;
			    return 0;
			});
			arr.reverse();
		},

		// Dynamically load JS script with callback
		loadScript : function(sScriptSrc,callbackfunction) {
			var oHead = document.getElementsByTagName('head')[0];
			if(oHead){	
				var oScript = document.createElement('script');
				oScript.setAttribute('src',sScriptSrc);
				oScript.setAttribute('type','text/javascript');
				var loadFunction = function(){
					if (this.readyState == 'complete' || this.readyState == 'loaded')
						callbackfunction(); 
				};
				oScript.onreadystatechange = loadFunction;
				oScript.onload = callbackfunction;	
				oHead.appendChild(oScript);
			}
		},

		// Bind, for browsers not supporting it by default
		bind : function (oThis){
			if (typeof this !== "function")
			  throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
			var aArgs = Array.prototype.slice.call(arguments, 1), 
			    fToBind = this, fNOP = function () {},
			    fBound = function () {
			      return fToBind.apply(this instanceof fNOP
		                ? this
		                : oThis || window,
		              aArgs.concat(Array.prototype.slice.call(arguments)));
			    };
			fNOP.prototype = this.prototype;
			fBound.prototype = new fNOP();
			return fBound;
		}
    };

    return module;
}());
