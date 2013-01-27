<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
</div>
</section>

<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
?>
<?php
function _menulink ($href, $title, $submenu = "", $class= "") {
    if ($submenu != "") $submenu = "<a target='_top' href='$href'>$title</a>$submenu";
    if (curPageName() == $href) {
        return "<li class='current'><a id='menulink' title='$title' class='$class' href='$href'>$title</a></li>";
    }
    if ($image != "")
        return "<li><a id='menulink' href='$href' title='$title' class='$class'></a></li>";
    else
        return "<li><a id='menulink' title='$title' class='$class' href='$href'>$title</a></li>";
}

authentication_has_role('global-admin');

// echo "<div id='menu' class='navbar'>\n";
// echo "<div class='navbar-inner'>\n";
// echo "<a class='brand' href='main.php'><img src='/postfixadmin/images/profit_dots.png' style='' /></a>\n";
echo "<ul id='shortcuts' role='complementary' class='children-tooltip tooltip-right'>\n";


$url = "create-mailbox.php"; if (isset ($_GET['domain'])) $url .= "?domain=" . urlencode($_GET['domain']);
$submenu_virtual = _menulink($url, $PALANG['pMenu_create_mailbox']);

$url = "create-alias.php"; if (isset ($_GET['domain'])) $url .= "?domain=" . urlencode($_GET['domain']);
$submenu_virtual .=  _menulink($url, $PALANG['pMenu_create_alias']);

if (boolconf('alias_domain')) {
    $url = "create-alias-domain.php"; if (isset ($_GET['domain'])) $url .= "?target_domain=" . urlencode($_GET['domain']);
    $submenu_virtual .=  _menulink($url, $PALANG['pMenu_create_alias_domain']);
}

$submenu_admin = _menulink("create-admin.php", $PALANG['pAdminMenu_create_admin']);

$submenu_fetchmail = _menulink("fetchmail.php?new=1", $PALANG['pFetchmail_new_entry']);


if (authentication_has_role('global-admin')) {
    $submenu_domain = _menulink("create-domain.php", $PALANG['pAdminMenu_create_domain']);
    $submenu_sendmail = _menulink("broadcast-message.php", $PALANG['pAdminMenu_broadcast_message']);
} else {
    $submenu_domain = "";
    $submenu_sendmail = "";
}

print _menulink("main.php", $PALANG['pMenu_main'], "", "shortcut-dashboard");

if (authentication_has_role('global-admin'))
    print _menulink("list-admin.php", $PALANG['pAdminMenu_list_admin'], "", "shortcut-dashboard");

print _menulink("list-domain.php", $PALANG['pAdminMenu_list_domain'], "", "shortcut-agenda");

$link = 'list-virtual.php';
if(isset($_SESSION['list_virtual_sticky_domain'])) {
    $link = 'list-virtual.php';
}
print _menulink($link, $PALANG['pAdminMenu_list_virtual'], $submenu_virtual, "shortcut-messages" );

if ($CONF['fetchmail'] == 'YES') {
    print _menulink("fetchmail.php", $PALANG['pMenu_fetchmail'], $submenu_fetchmail, "shortcut-messages" );
}

if ($CONF['sendmail'] == 'YES') {
    print _menulink("sendmail.php", $PALANG['pMenu_sendmail'], $submenu_sendmail, "shortcut-messages" );
} 

# not really useful in the admin menu
#if ($CONF['vacation'] == 'YES') {
#   print _menulink("edit-vacation.php", $PALANG['pUsersMenu_vacation']);
#}

print _menulink("password.php", $PALANG['pMenu_password'], "", "shortcut-stats");

if (authentication_has_role('global-admin') && 'pgsql'!=$CONF['database_type'] && $CONF['backup'] == 'YES') {
    print _menulink("backup.php", $PALANG['pAdminMenu_backup'], "", "shortcut-settings");
}

print _menulink("viewlog.php", $PALANG['pMenu_viewlog'], "", "shortcut-settings");

print _menulink("logout.php", $PALANG['pMenu_logout'], "", "");

echo "</ul>\n";

if (authentication_has_role('global-admin')) {
    $motd_file = "motd-admin.txt";
} else {
    $motd_file = "motd.txt";
}

if (file_exists (realpath ($motd_file)))
{
    print "<div id=\"motd\">\n";
    include ($motd_file);
    print "</div>";
}

# IE can't handle :hover dropdowns correctly. It needs some JS instead.

/* vim: set ft=php expandtab softtabstop=3 tabstop=3 shiftwidth=3: */
?>
</div>



