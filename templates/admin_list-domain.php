<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div id="sorting-advanced_wrapper" class="dataTables_wrapper" role="grid">
<div class="table-header button-height">
   <form name="search" method="post" action="search.php">
      <div class="float-right">
         <span class="input" style="padding-left: 0;">
            <input type="text" class="input" style="max-width: 120px;" placeholder="<?= $PALANG['pSearch'] ?>" name="search" id="table-search" value="">
            <button type="submit" style="line-height: 24px" class="button compact"><span class="icon-search"></span></button>
         </span>
      </div>
   </form>
   <form name="overview" id="userform" method="post">
      <select id="userlist" name="fUsername" class="select">
         <?php
         if (!empty ($list_admins))
         {
            for ($i = 0; $i < sizeof ($list_admins); $i++)
            {
               if ($fUsername == $list_admins[$i])
               {
                  print "<option value=\"" . $list_admins[$i] . "\" selected>" . $list_admins[$i] . "</option>\n";
               }
               else
               {
                  print "<option value=\"" . $list_admins[$i] . "\">" . $list_admins[$i] . "</option>\n";
               }
            }
         }
         ?>
      </select>
   </form>
</div>

<?php 
if (sizeof ($domain_properties) > 0)
{
   print "<table class=\"table responsive-table dataTable\" id=\"sorting-advanced\" aria-describedby=\"sorting-advanced_info\">\n";
   print "   <thead>\n";
   print "   <tr role='row' style='font-size: 90%;'>\n";
   print "      <th scope='col' >" . $PALANG['pAdminList_domain_domain'] . "</th>\n";
   // print "      <th scope='col' class='hide-on-mobile'>" . $PALANG['pAdminList_domain_description'] . "</th>\n";
   print "      <th scope='col' class='align-center hide-on-mobile-portrait' style='min-width: 50px;'>" . $PALANG['pAdminList_domain_aliases'] . "</th>\n";
   print "      <th scope='col' class='align-center hide-on-mobile-portrait' style='min-width: 50px;'>" . $PALANG['pAdminList_domain_mailboxes'] . "</th>\n";
   if ($CONF['quota'] == 'YES') print "      <th scope='col' class='align-center hide-on-mobile'>" . $PALANG['pAdminList_domain_maxquota'] . "</th>\n";
   if ($CONF['transport'] == 'YES') print "      <th scope='col' class='align-center hide-on-mobile'>" . $PALANG['pAdminList_domain_transport'] . "</th>\n";
   print "      <th scope='col' class='align-center hide-on-mobile'>" . $PALANG['pAdminList_domain_backupmx'] . "</th>\n";
   print "      <th scope='col' class='align-center hide-on-mobile hide-on-tablet-potrait '>" . $PALANG['pAdminList_domain_modified'] . "</th>\n";
   print "      <th scope='col' class='align-center'>" . $PALANG['pAdminList_domain_active'] . "</th>\n";
   print "      <th colspan=\"1\" style='min-width: 85px;'></th>\n";
   print "   </tr>\n";
   print "   </thead>\n";

#   for ($i = 0; $i < sizeof ($domain_properties); $i++)
   foreach(array_keys($domain_properties) as $i)
   {
      if ((is_array ($domain_properties) and sizeof ($domain_properties) > 0))
      {
         print "<tr class='compact' style='font-size: 90%;'>\n";
         print "<td style=\"padding-top: 7px;\"><a href=\"list-virtual.php?domain=" . $domain_properties[$i]['domain'] . "\">" . $domain_properties[$i]['domain'] . "</a></td>";
         //print "<td style=\"padding-top: 7px;\">" . htmlentities($domain_properties[$i]['description'], ENT_QUOTES, 'UTF-8') . "</td>";
         print "<td style=\"padding-top: 7px;\" class='align-center'>" . $domain_properties[$i]['alias_count'] . " / " . $domain_properties[$i]['aliases'] . "</td>";
         print "<td style=\"padding-top: 7px;\" class='align-center'>" . $domain_properties[$i]['mailbox_count'] . " / " . $domain_properties[$i]['mailboxes'] . "</td>";
         if ($CONF['quota'] == 'YES')
         {
            print "      <td class='align-center'>";
            if ($domain_properties[$i]['maxquota'] == 0)
            {
               print $PALANG['pOverview_unlimited'];
            }
            elseif ($domain_properties[$i]['maxquota'] < 0)
            {
               print $PALANG['pOverview_disabled'];
            }
            else
            {
               print $domain_properties[$i]['maxquota'];
            }
            print "</td>\n";
         }
         if ($CONF['transport'] == 'YES') print "<td class='align-center'>" . $domain_properties[$i]['transport'] . "</td>";
         $backupmx = ($domain_properties[$i]['backupmx'] == db_get_boolean(true)) ? $PALANG['YES'] : $PALANG['NO'];
         print "<td class='align-center' style=\"padding-top: 7px;\">$backupmx</td>";
         print "<td class='align-center' style=\"padding-top: 7px;\">" . $domain_properties[$i]['modified'] . "</td>";
         $active = ($domain_properties[$i]['active'] == db_get_boolean(true)) ? "button green-gradient glossy" : "";
         $activetype = ($domain_properties[$i]['active'] == db_get_boolean(true)) ? $PALANG['YES'] : $PALANG['NO'];
         print "<td class='low-padding align-center'><a class=\"button grey-gradient glossy $active \" href=\"edit-active-domain.php?domain=" . $domain_properties[$i]['domain'] . "\">" . $activetype . "</a></td>";
         print "<td colspan='3' style='border-right: 1px solid #cccccc' class='low-padding align-center'><span class='button-group'><a class=\"button icon-gear glossy\" href=\"edit-domain.php?domain=" . $domain_properties[$i]['domain'] . "\"><div style='float: right; margin-top: 1px;' class='hidden-on-mobile'>" . $PALANG['edit'] . "</div></a>";
         print "<a class=\"button icon-trash red-gradient glossy\" href=\"delete.php?table=domain&delete=" . $domain_properties[$i]['domain'] . "\" onclick=\"return confirm ('" . $PALANG['confirm_domain'] . $PALANG['pAdminList_admin_domain'] . ": " . $domain_properties[$i]['domain'] . "')\">" . $PALANG['del'] . "</a></span></td>";
         print "</tr>\n";
		}
   }
   print "<tfoot>\n";
   print "<tr>\n";
   print "<td colspan='9'><a class='button blue-gradient glossy big' href='create-domain.php'>{$PALANG['pAdminMenu_create_domain']}</a></td>\n";
   print "</tr>\n";
   print "</tfoot>\n";
   print "</table>\n";
   print "</div>\n";
}
?>
<script type="text/javascript">
   $('#userlist').on('change', function()
{
    $('#userform').submit();
});
</script>