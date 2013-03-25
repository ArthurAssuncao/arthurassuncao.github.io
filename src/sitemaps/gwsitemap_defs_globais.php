<?php
/*
http://www.apptools.com/phptools/dynamicsitemap.php
File Name: sitemap.php
Author: Gary White
Last modified: April 25, 2006

Copyright (C) 2004-2005  Gary White

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License in the included gpl.txt file for
details.

See the readme.txt file for installation and usage.

May 12, 2005 - Modified getTitle function to a slighly cleaner
regular expression for extracting the title from files.

April 25, 2006 - Fixed small bug to correct display when starting
in a directory other than the site's root.
*/

// A root relative path to the top level directory you want indexed.
$startin="/";
$url_domain = 'http://arthurassuncao.com';

// A root relative path to the location where you place the images.
// Do NOT include a trailing slash. Correct usage would be similar to:
// $imgpath="/images/sitemap";
//
// If you leave it set to an empty string, the program will assume the
// images are located in the same directory as the script.
$imgpath="/images";

// The $types array contains the file extensions of files you want to
// show in the site map.
$types=array(
	".php",
	".html",
	".htm",
	".shtm",
	".sthml"
);

// The $htmltypes is an array containing the file types of HTML files,
// that is files that will contain the HTML <title> tag. The script will
// try to extract the <title> from these files. Any file types indexed
// that are NOT in this array will simply use the file name and not 
// attempt to get the title.
$htmltypes=array(
	".php",
	".html",
	".htm",
	".shtm",
	".sthml",
);

// Files and/or directories to ignore. Anything in this array will not
// be included in the site map.
$ignore=array(
	".htaccess",
	"cgi-bin",
	"images",
	"index.htm",
	"index.html",
	"index.php",
	"robots.txt",
	"default.php",
	"sitemaps",
	"erro",
	"template",
	"css",
	"js",
	"teste",
	"util",
);
$ignore_dirs=array(
	"/sitemaps",
	"/erro",
	"/template",
	"/css",
	"/js",
	"/images",
	"/teste",
);

function in_dirs($path, $ign_dirs){
	// /home/u163717736/public_html/diretorio/
	$caminho = str_replace('/home/u163717736/public_html', '', $path);
	if(strcmp($caminho, '') != 0){
		foreach($ign_dirs as $ignore_dir){
			if($caminho[strlen($caminho)-1] == '/'){
				$caminho[strlen($caminho)-1] = '';
			}
			if(strcmp($caminho, $ignore_dir) == 0){
				return true;
			}
		}
	}
	return false;
}

function retira_extensao($file){
	global $htmltypes;
	return str_replace($htmltypes, '', $file);
}

function muda_extensao($file, $extensao){
	global $htmltypes;
	return str_replace($htmltypes, '', $file).".$extensao";
}
?>