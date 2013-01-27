<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<?php 
if (sizeof ($list_admins) > 0)
{
   print "<div id=\"admin_table\" class=\"dataTables_wrapper\">\n";
   print "   <div class=\"dataTables_header\">\n";
   print "      <td>" . $PALANG['pAdminList_admin_username'] . "</td>\n";
   print "      <td>" . $PALANG['pAdminList_admin_count'] . "</td>\n";
   print "      <td>" . $PALANG['pAdminList_admin_modified'] . "</td>\n";
   print "      <td>" . $PALANG['pAdminList_admin_active'] . "</td>\n";
   print "      <td colspan=\"2\">&nbsp;</td>\n";
   print "   </div>\n";


   for ($i = 0; $i < sizeof ($list_admins); $i++)
   {
      if ((is_array ($list_admins) and sizeof ($list_admins) > 0))
      {
         print "   <tr>\n";
      	print "      <td style=\"padding-top: 7px;\"><a href=\"list-domain.php?username=" . $list_admins[$i] . "\">" . $list_admins[$i] . "</a></td>";
         if ($admin_properties[$i]['domain_count'] == 'ALL') $admin_properties[$i]['domain_count'] = $PALANG['pAdminEdit_admin_super_admin'];
      	print "      <td style=\"padding-top: 7px;\">" . $admin_properties[$i]['domain_count'] . "</td>";
   		print "      <td style=\"padding-top: 7px;\">" . $admin_properties[$i]['modified'] . "</td>";
         $active = ($admin_properties[$i]['active'] == 1) ? "btn-success" : "";
         $activetype = ($admin_properties[$i]['active'] == 1) ? $PALANG['YES'] : $PALANG['NO'];
   		print "      <td><a class=\"btn $active btn-small\" href=\"edit-active-admin.php?username=" . $list_admins[$i] . "\">" . $activetype . "</a></td>";
   		print "      <td><a class=\"btn btn-small\" href=\"edit-admin.php?username=" . $list_admins[$i] . "\">" . $PALANG['edit'] . "</a></td>";
   		print "      <td><a class=\"btn btn-small btn-danger\" href=\"delete.php?table=admin&delete=" . $list_admins[$i] . "\" onclick=\"return confirm ('" . $PALANG['confirm'] . $PALANG['pAdminList_admin_username'] . ": " . $list_admins[$i] . "')\">" . $PALANG['del'] . "</a></td>";
   		print "   </tr>\n";
		}
   }

   print "</div>\n";
   print "<p><a class=\"btn btn-primary\" href=\"create-admin.php\" style=\"margin-top: 20px;\">" . $PALANG['pAdminMenu_create_admin'] . "</a>\n";
}

/* vim: set ft=php expandtab softtabstop=3 tabstop=3 shiftwidth=3: */
?>
