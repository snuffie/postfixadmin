<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<?php
@header ("Expires: Sun, 16 Mar 2003 05:00:00 GMT");
@header ("Last-Modified: " . gmdate ("D, d M Y H:i:s") . " GMT");
@header ("Cache-Control: no-store, no-cache, must-revalidate");
@header ("Cache-Control: post-check=0, pre-check=0", false);
@header ("Pragma: no-cache");
@header ("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if (gt IE 8)|(gt IEMobile 7)]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Profit Mail Administration</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- http://davidbcalhoun.com/2010/viewport-metatag -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link rel="shortcut icon" href="/postfixadmin/images/favicon.ico">
<!-- For Modern Browsers -->
    <link rel="shortcut icon" href="img/favicons/favicon.png">
    <!-- For everything else -->
    <link rel="shortcut icon" href="img/favicons/favicon.ico">
    <!-- For retina screens -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicons/apple-touch-icon-retina.png">
    <!-- For iPad 1-->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicons/apple-touch-icon-ipad.png">
    <!-- For iPhone 3G, iPod Touch and Android -->
    <link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon.png">

    <!-- iOS web-app metas -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

    <!-- Microsoft clear type rendering -->
    <meta http-equiv="cleartype" content="on">

    <!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx -->
    <meta name="application-name" content="Developr Admin Skin">
    <meta name="msapplication-tooltip" content="Cross-platform admin template.">
    <meta name="msapplication-starturl" content="http://www.display-inline.fr/demo/developr">

<?php
if (file_exists (realpath ("../".$CONF['reset_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['reset_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['reset_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['style_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['style_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['style_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['colors_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['colors_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['colors_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['print_css']))) {
    print "<link rel=\"stylesheet\" media=\"print\" href=\"../".htmlentities($CONF['print_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" media=\"print\" href=\"".htmlentities($CONF['print_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['480_css']))) {
    print "<link rel=\"stylesheet\" media=\"only all and (min-width: 480px)\" href=\"../".htmlentities($CONF['480_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" media=\"only all and (min-width: 480px)\" href=\"".htmlentities($CONF['480_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['768_css']))) {
    print "<link rel=\"stylesheet\" media=\"only all and (min-width: 768px)\" href=\"../".htmlentities($CONF['768_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" media=\"only all and (min-width: 768px)\" href=\"".htmlentities($CONF['768_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['992_css']))) {
    print "<link rel=\"stylesheet\" media=\"only all and (min-width: 992px)\" href=\"../".htmlentities($CONF['992_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" media=\"only all and (min-width: 992px)\" href=\"".htmlentities($CONF['992_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['1200_css']))) {
    print "<link rel=\"stylesheet\" media=\"only all and (min-width: 1200px)\" href=\"../".htmlentities($CONF['1200_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" media=\"only all and (min-width: 1200px)\" href=\"".htmlentities($CONF['1200_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['2x_css']))) {
    print "<link rel=\"stylesheet\" media=\"only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)\" href=\"../".htmlentities($CONF['2x_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" media=\"only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)\" href=\"".htmlentities($CONF['2x_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['agenda_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['agenda_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['agenda_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['dashboard_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['dashboard_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['dashboard_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['form_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['form_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['form_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['modal_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['modal_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['modal_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['progress_slider_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['progress_slider_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['progress_slider_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['switches_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['switches_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['switches_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['table_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['table_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['table_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['jquery_dataTables_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['jquery_dataTables_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['jquery_dataTables_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['developr_validationEngine_css']))) {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"../".htmlentities($CONF['developr_validationEngine_css'])."\" />\n";
} else {
    print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".htmlentities($CONF['developr_validationEngine_css'])."\" />\n";
}
if (file_exists (realpath ("../".$CONF['modernizr_custom_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['modernizr_custom_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['modernizr_custom_js'])."\" /></script>\n";
}
if (file_exists (realpath ("../".$CONF['placeholder_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['placeholder_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['placeholder_js'])."\" /></script>\n";
}

if (file_exists (realpath ("../".$CONF['developr_message_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_message_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_message_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['developr_progress_slider_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_progress_slider_js'])."\" ></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_progress_slider_js'])."\" ></script>\n";
}
if (file_exists (realpath ("../".$CONF['developr_tooltip_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_tooltip_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_tooltip_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['developr_confirm_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_confirm_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_confirm_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['tinycon_min_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['tinycon_min_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['tinycon_min_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['jquery_tablesorter_min_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['jquery_tablesorter_min_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['jquery_tablesorter_min_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['jquery_dataTables_min_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['jquery_dataTables_min_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['jquery_dataTables_min_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['jquery_validationEngine_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['jquery_validationEngine_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['jquery_validationEngine_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['jquery_validationEngine-sv_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['jquery_validationEngine-sv_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['jquery_validationEngine-sv_js'])."\"></script>\n";
}
?>
<script type="text/javascript">
/* <![CDATA[ */
$(function() {
    var input = document.createElement("input");
    if(('placeholder' in input)==false) { 
        $('[placeholder]').focus(function() {
            var i = $(this);
            if(i.val() == i.attr('placeholder')) {
                i.val('').removeClass('placeholder');
                if(i.hasClass('password')) {
                    i.removeClass('password');
                    this.type='password';
                }           
            }
        }).blur(function() {
            var i = $(this);    
            if(i.val() == '' || i.val() == i.attr('placeholder')) {
                if(this.type=='password') {
                    i.addClass('password');
                    this.type='text';
                }
                i.addClass('placeholder').val(i.attr('placeholder'));
            }
        }).blur().parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                var i = $(this);
                if(i.val() == i.attr('placeholder'))
                    i.val('');
            })
        });
    }
});
/* ]]> */
</script>
<script>
$(function(){
    $('input[placeholder], textarea[placeholder]').placeholder();
});
</script>
<title>Prof-IT Mail Admin</title>
</head>
<body class="clearfix with-shortcuts">
    <!-- Title bar -->
    <header role="banner" id="title-bar">
    <h2>Mail Administration</h2>
    </header>

<?php
if(isset($_SESSION['flash'])) {
    if(isset($_SESSION['flash']['info'])) {
        echo '<ul class="flash-info">';
        foreach($_SESSION['flash']['info'] as $msg) {
            echo "<li>$msg</li>";
        }
        echo '</ul>';
    }
    if(isset($_SESSION['flash']['error'])) {
        echo '<ul class="flash-error">';
        foreach($_SESSION['flash']['error'] as $msg) {
            echo "<li>$msg</li>";
        }
        echo '</ul>';
    }
    /* nuke it from orbit. It's the only way to be sure. */
    $_SESSION['flash'] = array(); 
}

/* vim: set expandtab softtabstop=4 tabstop=4 shiftwidth=4: */
?>
<?php 
function writeMenuLink($menu="")
{
    if ($menu == '/postfixadmin/main.php')
        return "Huvudmeny";
    if ($menu == '/postfixadmin/list-admin.php')
        return "Admin Lista";
    if ($menu == '/postfixadmin/list-domain.php')
        return "Domäner";
    if ($menu == '/postfixadmin/list-virtual.php')
        return "Översikt";
    if ($menu == '/postfixadmin/fetchmail.php')
        return "Hämtning av epost";
    if ($menu == '/postfixadmin/sendmail.php')
        return "Skicka epost";
    if ($menu == '/postfixadmin/password.php')
        return "Lösenord";
    if ($menu == '/postfixadmin/viewlog.php')
        return "Logg";
    if ($menu == '/postfixadmin/create-domain.php')
        return "Skapa domän";
    if ($menu == '/postfixadmin/create-admin.php')
        return "Skapa ny administratör";
    if ($menu == '/postfixadmin/edit-admin.php')
        return "Ändra administratör";
    if ($menu == '/postfixadmin/edit-domain.php')
        return "Ändra domän";
    if ($menu == '/postfixadmin/create-mailbox.php')
        return "Skapa brevlåda";
    if ($menu == '/postfixadmin/search.php')
        return "Sök";



    return $menu;
}

?>
<a href="#" id="open-shortcuts"><span class="icon-thumbs"></span></a>
<button type="button" class="button black-gradient hide-on-desktop" id="back-button" onclick="history.go(-1)">
    <span class="icon-left" style="margin-left: -4px;"></span>
</button>
<div class="profit_brand">
    <img class="profit_brand_image" src="images/watermark.png" />
</div>
<section role="main" id="main">
<noscript class="message black-gradient simpler">Your browser does not support JavaScript! Some features won't work as expected...</noscript>
<hgroup id="main-title" class="thin">
            <h1><?= writeMenuLink($_SERVER['PHP_SELF']) ?></h1>
        </hgroup>
<div class="with-padding">
