<head>
	<meta charset="utf-8" />
<?php echo $this->robots_noindex_follow ? '<meta name="robots" content="noindex,follow">' : '' ?>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/min/?f=/css/reset.css,/css/gh_fork_ribbon/gh-fork-ribbon.css,/css/bootstrap/bootstrap_united.min.css,/css/principal.css,/css/site.css" />
<?php 
	echo $this->createTagsCSS($this->links_css);
 	echo $this->embedded_css ? "<style type='text/css'>{$this->embedded_css}</style>" : '';
 ?>
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" />
<?php echo $this->createTagsJS($this->links_js_header) ?>
	<link rel="shortcut icon" href="/favicon.ico" /> 
	<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="Arthur Assunção" />
	<meta name="dcterms.rightsHolder" content="Arthur Assunção" />
	<meta name="dcterms.dateCopyrighted" content="2012" />
	<title><?php echo $this->title ?></title>
    <meta name="description" content="<?php echo $this->description ?>" />
    <meta name="keywords" content="<?php echo $this->keywords ?>" />
	<link rel="canonical" href="<?php echo $this->canonical ?>" />
    <!-- OpenGraph -->
    <meta content="<?php echo $this->title ?>" property="og:title"/>
    <meta content="website" property="og:type"/>
    <meta content="<?php echo $this->canonical ?>" property="og:url"/>
    <!--<meta property="og:image" content="image.jpg" />-->
    <meta content="Arthur Assuncao" property="og:site_name"/>
    <meta content="<?php echo $this->description ?>" property="og:description"/>
<?php echo $this->tags_head_extra ?>
<?php echo $this->embedded_js_header ? "<script type='text/javascript'>{$this->embedded_js_header}</script>" : ''; ?>
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  </head>