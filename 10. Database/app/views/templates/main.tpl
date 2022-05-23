<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:"Opis domyślny"}">

    <title>{$page_title|default:"Tytuł domyślny"}</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/marketing.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
{if $hide_intro }
    <link rel="stylesheet" href="{$conf->app_url}/css/style_hide_intro.css">
{/if}
	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="{$conf->app_url}/js/jquery.min.js"></script>
	<script src="{$conf->app_url}/js/softscroll.js"></script>
</head>
<body>

<div id="app_top" class="header">
    <div id="menu" class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        
			<a class="pure-menu-heading" href=""><b>Strona główna</a><ul>
			<li class="pure-menu-selected"><a href="{$conf->action_url}logout">Wyloguj</a></li>
            <li class="pure-menu-selected"><a href="#app_top">Góra strony</a></li>
            <li><a href="#app_content">Idź do formularza</a></li>
        </ul>
    </div>
</div>

<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">{$page_title|default:"Tytuł domyślny"}</h1>
        <p class="splash-subhead">
             {$page_description|default:"Opis domyślny"}
        </p>
        <p>
            <a href="#app_content" class="idz">Idź do formularza</a>
        </p>
    </div>
</div>

<div class="content-wrapper">

    <div id="app_content" class="content">

{block name=content}{/block}

{block name=top}{/block}

{block name=bottom}{/block}

    </div>

    <div class="footer l-box is-center">
		<p>
{$page_footer|default:"Domyślna treść stopki"}
		</p>

    </div>

</div>


</body>
</html>