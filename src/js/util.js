function getURLParameters() {
    var searchString = window.location.search.substring(1);
    var params = searchString.split("&");
    var hash = {};

    for (var i = 0; i < params.length; i++) {
        var val = params[i].split("=");
        hash[unescape(val[0])] = unescape(val[1]);
    }
    return hash;
}

function getURLParameter(name) {
    return decodeURIComponent(
        (location.search.match(RegExp("[?|&]"+name+'=(.+?)(&|$)'))||[,null])[1]
    );  
}

function get_texto_selecionado() {
    var html = "";
    if (typeof window.getSelection != "undefined") {
        var sel = window.getSelection();
        if (sel.rangeCount) {
            var container = document.createElement("div");
            for (var i = 0, len = sel.rangeCount; i < len; ++i) {
                container.appendChild(sel.getRangeAt(i).cloneContents());
            }
            html = container.innerHTML;
        }
    }
    else if (typeof document.selection != "undefined") {
        if (document.selection.type == "Text") {
            html = document.selection.createRange().htmlText;
        }
    }
    return html;
}

function has_texto_selecionado(){
    var tem_texto_selecionado = false;
    if (typeof window.getSelection != "undefined") {
        var sel = window.getSelection();
        if (sel.rangeCount > 1) {
            tem_texto_selecionado = true;
        }
    }
    else if (typeof document.selection != "undefined") {
        if (document.selection.type == "Text") {
            tem_texto_selecionado = true;
        }
    }
    return tem_texto_selecionado;
}