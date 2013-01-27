<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<?php 
if (file_exists (realpath ("../".$CONF['setup_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['setup_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['setup_js'])."\" /></script>\n";
}
if (file_exists (realpath ("../".$CONF['developr_input_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_input_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_input_js'])."\" /></script>\n";
}
if (file_exists (realpath ("../".$CONF['developr_modal_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_modal_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_modal_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['developr_navigable_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_navigable_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_navigable_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['developr_scroll_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_scroll_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_scroll_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['developr_agenda_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_agenda_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_agenda_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['developr_table_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_table_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_table_js'])."\"></script>\n";
}
if (file_exists (realpath ("../".$CONF['developr_tabs_js']))) {
    print "<script type=\"text/javascript\" src=\"../".htmlentities($CONF['developr_tabs_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" src=\"".htmlentities($CONF['developr_tabs_js'])."\"></script>\n";
}
?>
<script>
$.template.init();
</script>
<!-- <div id="footer"><img class="profit_logo" src="/postfixadmin/images/logo-default.png"></div> -->
</body>
</html>
