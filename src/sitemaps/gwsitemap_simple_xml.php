<?php
require_once('gwsitemap_defs_globais.php');

/*
==============================================
You should not need to make changes below here
==============================================
*/
$id=0;
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
echo $url_domain.' 1.000 ';
showlist($_SERVER['DOCUMENT_ROOT']."$startin");
if (is_array($divs)){
	$divs="'".join($divs,"','")."'";
}


function showlist($path){
	global $ignore, $ignore_dirs, $id, $divs, $imgpath, $types, $startin, $url_domain;
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
		if ($n>$base)
			$divs[]="$id";
		$imgsrc="minus";
		natcasesort($files);
		$id++;
		foreach($files as $f=>$t){
			$f = retira_extensao($f);
			echo $url_domain.'/'.$f.' 0.5000 ';
		}
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
	$title = $title ? $title : retira_extensao(basename($file));
	return htmlentities(trim(strip_tags($title)));
}
?>
