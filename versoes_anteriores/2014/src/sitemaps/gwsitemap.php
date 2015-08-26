<?php
require_once('gwsitemap_defs_globais.php');

/*
==============================================
You should not need to make changes below here
==============================================
*/
$id=0;
echo "<div id=\"sitemap\"><ul id=\"list$id\">\n";
$id++;
$divs="";
if(substr($startin,strlen($startin)-1,1)=="/")
	$startin=trim($startin,"/");
foreach($types as $type){
	if (file_exists($_SERVER['DOCUMENT_ROOT']."$startin/index$type")){
		$index=$_SERVER['DOCUMENT_ROOT']."$startin"."/index$type";
		break;
	}
}
$types=join($types,"|");
$types="($types)";
if(!is_array($htmltypes))
	$htmltypes=array();
if(count($htmltypes)==0)
	$htmltypes=$types;
if(!$imgpath)
	$imgpath=".";
/*echo "<li><img src=\"$imgpath/server.gif\" align=\"middle\" alt=\"\" /><strong><a href=\"$startin/\">".getTitle($index)."</a></strong>\n";*/
echo "<li><strong><a href=\"$startin/\">".getTitle($index)."</a></strong>\n";
showlist($_SERVER['DOCUMENT_ROOT']."$startin");
echo "</li></ul></div>\n";
if (is_array($divs)){
	$divs="'".join($divs,"','")."'";
	/*echo "<script type=\"text/javascript\">\n";
	echo "//<![CDATA[\n";
	echo "d=Array($divs);\n";
	echo "for (i=0;i<d.length;i++){\n";
	echo "\ttoggle('list'+d[i],'img'+d[i]);\n";
	echo "}\n";
	echo "//]]>\n";
	echo "</script>\n";*/
}


function showlist($path){
	global $ignore, $ignore_dirs, $id, $divs, $imgpath, $types, $startin;
	$dirs=array();
	$files=array();
	if(is_dir($path)){
		if ($dir = @opendir($path)) {
			//if(!in_dirs($path, $ignore_dirs)){
				while (($file = readdir($dir)) !== false) {
					if ($file!="." && $file!=".." && !in_array($file,$ignore)){
						if (is_dir("$path/$file")){
							if (file_exists("$path/$file/index.php"))
								$dirs[$file]=getTitle("$path/$file/index.php");
							elseif (file_exists("$path/$file/index.html"))
								$dirs[$file]=getTitle("$path/$file/index.html");
							elseif (file_exists("$path/$file/index.htm"))
								$dirs[$file]=getTitle("$path/$file/index.htm");
							else
								$dirs[$file]=$file;
						} else {
							if (ereg("$types$", $file)){
								$files[$file]=getTitle("$path/$file");
								if (strlen($files[$file])==0)
									$files[$file]=$file;
							}
						}
					}
			  }
		  //}
		  closedir($dir);
		}
		natcasesort($dirs);
		$url=str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);
		$n=substr_count("$url/$","/");
		$base=substr_count($startin,"/")+1;
		$indent=str_pad("",$n-1,"\t");
		echo "$indent<ul id=\"list$id\">\n";
		if ($n>$base)
			$divs[]="$id";
		$imgsrc="minus";
		foreach($dirs as $d=>$t){
			$id++;
			/*echo "$indent\t<li><a href=\"javascript:toggle('list$id','img$id')\"><img src=\"$imgpath/$imgsrc.gif\" id=\"img$id\" align=\"middle\" border=\"0\" alt=\"\" /></a>";
			echo "<img src=\"$imgpath/folder.gif\" alt=\"\" align=\"middle\" />";
			echo " <strong><a href=\"$url/$d/\">$t</a></strong>\n";
			showlist("$path/$d");
			echo "$indent\t</li>\n";*/
			echo "$indent\t<li><a href=\"javascript:toggle('list$id','img$id')\"><img src=\"$imgpath/$imgsrc.gif\" id=\"img$id\" align=\"middle\" border=\"0\" alt=\"\" /></a>";
			echo "";
			echo " <strong>$t</strong>\n";
			showlist("$path/$d");
			echo "$indent\t</li>\n";
		}
		natcasesort($files);
		$id++;
		foreach($files as $f=>$t){
			$f = retira_extensao($f);
			/*echo "$indent\t<li><img style=\"padding-left:20px;\" src=\"$imgpath/html.gif\" alt=\"\" border=\"0\" /> <a href=\"$url/$f\">$t</a></li>\n";*/
			echo "$indent\t<li><a href=\"$url/$f\">$t</a></li>\n";
		}
		echo "$indent</ul>\n";
	}
}

function getTitle($file){
	global $htmltypes;
	$title="";
	$p=pathinfo($file);
	if(!in_array(strtolower($p['extension']),$htmltypes)){
		$f=file_get_contents($file);
		if(preg_match("'<title>(.+)</title>'i", $f, $matches)){
			$title=$matches[1];
		}
	}
	$title = $title ? $title : muda_extensao(basename($file), 'html');
	return htmlentities(trim(strip_tags($title)));
}
?>
