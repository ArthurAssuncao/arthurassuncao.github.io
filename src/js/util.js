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