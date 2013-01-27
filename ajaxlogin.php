<?php

require_once('common.php');

	
	$username = $_REQUEST['login'];
	$password = $_REQUEST['pass'];
	if (isset ($_REQUEST['login'])) $fUsername = escape_string ($_REQUEST['login']);
	if (isset ($_REQUEST['pass'])) $fPassword = escape_string ($_REQUEST['pass']);
	if (isset ($_REQUEST['lang'])) $lang = escape_string ($_REQUEST['lang']);
		
	//$lang = safepost('lang');

    if ( $lang != check_language(0) ) { # only set cookie if language selection was changed
        setcookie('lang', $lang, time() + 60*60*24*30); # language cookie, lifetime 30 days
        # (language preference cookie is processed even if username and/or password are invalid)
    }

    $result = db_query ("SELECT password FROM $table_admin WHERE username='$fUsername' AND active='1'");
    if ($result['rows'] == 1)
    {
        $row = db_array ($result['result']);
        $password = pacrypt ($fPassword, $row['password']);
        $result = db_query ("SELECT * FROM $table_admin WHERE username='$fUsername' AND password='$password' AND active='1'");
        if ($result['rows'] != 1)
        {
            $error = 1;
            $tMessage = '<span class="error_msg">' . $PALANG['pLogin_failed'] . '</span>';
        }
    }
    else
    {
        $error = 1;
        $tMessage = '<span class="error_msg">' . $PALANG['pLogin_failed'] . '</span>';
    }

    if ($error != 1)
    {
        session_regenerate_id();
        $_SESSION['sessid'] = array();
        $_SESSION['sessid']['username'] = $fUsername;
        $_SESSION['sessid']['roles'] = array();
        $_SESSION['sessid']['roles'][] = 'admin';

        // they've logged in, so see if they are a domain admin, as well.
        $result = db_query ("SELECT * FROM $table_domain_admins WHERE username='$fUsername' AND domain='ALL' AND active='1'");
        if ($result['rows'] == 1)
        {
            $_SESSION['sessid']['roles'][] = 'global-admin';
#            header("Location: admin/list-admin.php");
#            exit(0);
        }
        header("Location: main.php");
        exit(0);
    }
?>