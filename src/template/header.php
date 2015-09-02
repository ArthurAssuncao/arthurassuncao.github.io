<head>
    <meta charset="utf-8" />

    <title><?php echo $this->title ?></title>

    <?php echo $this->robots_noindex_follow ? '<meta name="robots" content="noindex,follow">' : '' ?>

    <link rel="canonical" href="<?php echo $this->canonical ?>" />
    <link rel="alternate" href="http://arthurassuncao.com/" hreflang="pt">
    <!--<link rel="alternate" href="http://arthurassuncao.com/en/" hreflang="en">-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#2196F3">
    <meta name="author" content="Arthur Assunção" />
    <meta name="dcterms.rightsHolder" content="Arthur Assunção" />
    <meta name="dcterms.dateCopyrighted" content='<?php echo date("Y"); ?>' />
    <meta name="description" content="<?php echo $this->description ?>" />
    <meta name="keywords" content="<?php echo $this->keywords ?>" />

    <!-- OpenGraph -->
    <meta property="og:locale" content="pt_BR" />
    <!--<meta property="og:locale:alternate" content="en_US" />-->
    <meta property="og:title" content="<?php echo $this->title ?>"/>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $this->canonical ?>"/>
    <meta property="og:image" content="http://arthurassuncao.com/img/me256x256.png">
    <meta content="Arthur Assunção" property="og:site_name"/>
    <!--<meta content="<?php echo $this->description ?>" property="og:description"/>-->
    <meta property="og:description" content="Arthur Assunção - Desenvolvedor de sistemas">

    <!--Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="http://arthurassuncao.com/">
    <meta name="twitter:title" content="Arthur Assunção - Desenvolvedor">
    <meta name="twitter:description" content="Arthur Assunção - Desenvolvedor de sistemas">
    <meta name="twitter:image" content="http://http://arthurassuncao.com/img/me256x256.png">

    <!-- Windows -->
    <meta name="application-name" content="Arthur Assunção Site"/>
    <meta name="msapplication-TileColor" content="#2196F3"/>

    <link rel="shortcut icon" href="/favicon.ico" /> 
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    <link rel="icon" type="image/png" href="/apple-touch-icon.png" sizes="16x16">

    <link rel="stylesheet" type="text/css" href="/min/?f=/css/gmail-scrollbars.css,/css/plugin-min.css,/css/custom-min.css,/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="/css/mystyle.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,100italic,300italic,400" rel="stylesheet" type="text/css">

    <?php 
    echo $this->createTagsCSS($this->links_css);
    echo $this->embedded_css ? "<style type='text/css'>{$this->embedded_css}</style>" : '';
 ?>
    <?php echo $this->createTagsJS($this->links_js_header) ?>

    <?php echo $this->tags_head_extra ?>
    <?php echo $this->embedded_js_header ? "<script type='text/javascript'>{$this->embedded_js_header}</script>" : ''; ?>
  </head>