<?php
require_once('gwsitemap_defs_globais.php');

function cria_estrutura_link($file, $changefreq='monthly', $priority=0.5){
	global $url_domain;
	/*
	<url>
		<loc>http://torradeira.net/</loc>
		<lastmod>2012-11-18T14:20:47+00:00</lastmod>
		<changefreq>daily</changefreq>
		<priority>1.0</priority>
	</url>
	*/
	//2012-11-18T14:20:47+00:00
	$url_in_host = $_SERVER['DOCUMENT_ROOT']."$startin/$file";
	$lastModification = date("Y-m-d\TH:i:sP", filemtime($url_in_host));
	$file = retira_extensao($file);
	$url = "$url_domain/$file";
	$changefreq = 'weekly';
	echo "\t<url>\n";
		echo "\t\t<loc>$url</loc>\n";
		echo "\t\t<lastmod>$lastModification</lastmod>\n";
		echo "\t\t<changefreq>$changefreq</changefreq>\n";
		echo "\t\t<priority>$priority</priority>\n";
	echo "\t</url>\n";
}

function cria_estrutura_arquivo(){
	global $url_domain;
	echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	echo '<?xml-stylesheet type="text/xsl" href="/sitemaps/sitemap_styles.xsl"?>';
	
	echo '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
	$url = $_SERVER['DOCUMENT_ROOT']."$startin/index.php";
	$lastModification = date("Y-m-d\TH:i:sP", filemtime($url));
	$changefreq = 'daily';
	$priority = 1.0;
	echo "\t<url>\n";
		echo "\t\t<loc>$url_domain</loc>\n";
		echo "\t\t<lastmod>$lastModification</lastmod>\n";
		echo "\t\t<changefreq>$changefreq</changefreq>\n";
		echo "\t\t<priority>$priority</priority>\n";
	echo "\t</url>\n";
}

function fecha_estrutura_arquivo(){
	echo '</urlset>';
}

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
cria_estrutura_arquivo();
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
			cria_estrutura_link($f);
		}
	}
	fecha_estrutura_arquivo();
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
