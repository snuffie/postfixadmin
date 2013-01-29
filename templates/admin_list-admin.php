<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div id="sorting-advanced_wrapper" class="dataTables_wrapper" role="grid">
   <div class="table-header button-height">
      <h3 style='font-weight: thinner;' class='small-margin-bottom'>Admins</h3> </div>
   </div>
<?php 
if (sizeof ($list_admins) > 0)
{
   print "<table id=\"admin_table\" class=\"table responsive-table dataTable\">\n";
   print "   <thead>\n";
   print "   <tr role='row' style='font-size: 90%'>\n";
   print "      <th>" . $PALANG['pAdminList_admin_username'] . "</th>\n";
   print "      <th class='hide-on-mobile-portrait'>" . $PALANG['pAdminList_admin_count'] . "</th>\n";
   print "      <th class='align-center hide-on-mobile-portrait'>" . $PALANG['pAdminList_admin_modified'] . "</th>\n";
   print "      <th class='align-center'>" . $PALANG['pAdminList_admin_active'] . "</th>\n";
   print "      <th colspan=\"2\"style='min-width: 85px'>&nbsp;</th>\n";
   print "   </tr>\n";
   print "   </thead>\n";


   for ($i = 0; $i < sizeof ($list_admins); $i++)
   {
      if ((is_array ($list_admins) and sizeof ($list_admins) > 0))
      {
         print "   <tr class='compact' style='font-size: 90%;'>\n";
      	print "      <td><a href=\"list-domain.php?username=" . $list_admins[$i] . "\">" . $list_admins[$i] . "</a></td>";
         if ($admin_properties[$i]['domain_count'] == 'ALL') $admin_properties[$i]['domain_count'] = $PALANG['pAdminEdit_admin_super_admin'];
      	print "      <td>" . $admin_properties[$i]['domain_count'] . "</td>";
   		print "      <td class='align-center'>" . $admin_properties[$i]['modified'] . "</td>";
         $active = ($admin_properties[$i]['active'] == 1) ? "green-gradient" : "";
         $activetype = ($admin_properties[$i]['active'] == 1) ? $PALANG['YES'] : $PALANG['NO'];
   		print "      <td class='low-padding align-center'><a class=\"button grey-gradient glossy $active\" href=\"edit-active-admin.php?username=" . $list_admins[$i] . "\">" . $activetype . "</a></td>";
   		print "      <td style='border-right: 1px solid #cccccc'><span class='button-group'><a class=\"button icon-gear glossy\" href=\"edit-admin.php?username=" . $list_admins[$i] . "\"><div style='float: right; margin-top: 1px;' class='hidden-on-mobile'>" . $PALANG['edit'] . "</div></a>";
   		print "      <a class=\"button icon-trash red-gradient glossy\" href=\"delete.php?table=admin&delete=" . $list_admins[$i] . "\" onclick=\"return confirm ('" . $PALANG['confirm'] . $PALANG['pAdminList_admin_username'] . ": " . $list_admins[$i] . "')\">" . $PALANG['del'] . "</a></span></td>";
   		print "   </tr>\n";
		}
   }
   print "<tfoot>\n";
   print "<tr>\n";
   print "<td colspan='6'><a class=\"button blue-gradient glossy big\" href=\"create-admin.php\">" . $PALANG['pAdminMenu_create_admin'] . "</a>\n";
   print "</tr>\n";
   print "</tfoot>\n";
   print "</table>\n";
   print "</div>\n";
   print "</div>\n";
   
}

/* vim: set ft=php expandtab softtabstop=3 tabstop=3 shiftwidth=3: */
?>