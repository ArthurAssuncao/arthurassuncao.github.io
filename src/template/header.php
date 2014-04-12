<head>
    <meta charset="utf-8" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <![endif]-->
<?php echo $this->robots_noindex_follow ? '<meta name="robots" content="noindex,follow">' : '' ?>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/min/?f=/css/reset.css,/css/gh_fork_ribbon/gh-fork-ribbon.css,/css/bootstrap3/bootstrap_cerulean.min.css,/css/principal.css,/css/site.css" />
<?php 
    echo $this->createTagsCSS($this->links_css);
    echo $this->embedded_css ? "<style type='text/css'>{$this->embedded_css}</style>" : '';
 ?>
    <!--<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" />-->
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

    <meta name="application-name" content="Arthur Assuncao Site"/>
    <meta name="msapplication-TileColor" content="#1ba1e2"/>
    <meta name="msapplication-notification" content="frequency=30;polling-uri=http://notifications.buildmypinnedsite.com/?feed=http://blog.arthurassuncao.com/atom.xml&amp;id=1;polling-uri2=http://notifications.buildmypinnedsite.com/?feed=http://blog.arthurassuncao.com/atom.xml&amp;id=2;polling-uri3=http://notifications.buildmypinnedsite.com/?feed=http://blog.arthurassuncao.com/atom.xml&amp;id=3;polling-uri4=http://notifications.buildmypinnedsite.com/?feed=http://blog.arthurassuncao.com/atom.xml&amp;id=4;polling-uri5=http://notifications.buildmypinnedsite.com/?feed=http://blog.arthurassuncao.com/atom.xml&amp;id=5; cycle=1"/>

<?php echo $this->tags_head_extra ?>
<?php echo $this->embedded_js_header ? "<script type='text/javascript'>{$this->embedded_js_header}</script>" : ''; ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script type="text/javascript" src="/js/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <![endif]-->
  </head>