<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>

<form name="overview" value="list-virtual.php" id="searchform" method="get">
   <label><h6>Aktuell domän</h6></label>
   <select id="searchselect" name="domain" class="select">
   <?php

   $file = 'list-virtual.php';

   # search highlighting
   function searchhl($text) {
      global $search;
      if ($search == "") {
         return $text;
      } else {
         return str_ireplace($search, "<span class='searchresult' style='background:lightgreen'>" . $search . "</span>", $text);
         # TODO: find out why .searchresult class in css file doesn't work
      }
   }

   if ($limit['aliases'] < 0) $limit['aliases'] = $PALANG['pOverview_disabled'];
   if ($limit['mailboxes'] < 0) $limit['mailboxes'] = $PALANG['pOverview_disabled'];
   if ($limit['maxquota'] < 0) $limit['maxquota'] = $PALANG['pOverview_disabled'];
   if ($limit['aliases'] == 0) $limit['aliases'] = $PALANG['pOverview_unlimited'];
   if ($limit['mailboxes'] == 0) $limit['mailboxes'] = $PALANG['pOverview_unlimited'];
   if ($limit['maxquota'] == 0) $limit['maxquota'] = $PALANG['pOverview_unlimited'];

   for ($i = 0; $i < sizeof ($list_domains); $i++)
   {
      if ($fDomain == $list_domains[$i])
      {
         print "<option value=\"$list_domains[$i]\" selected>$list_domains[$i]</option>\n";
      }
      else
      {
         print "<option value=\"$list_domains[$i]\">$list_domains[$i]</option>\n";
      }
   }
   ?>
   </select>
</form>
<h5><?php print $PALANG['pOverview_alias_alias_count'] . ": " . $limit['alias_count'] . " / " . $limit['aliases']; ?></h5>
<h5><?php print $PALANG['pOverview_alias_mailbox_count'] . ": " . $limit['mailbox_count'] . " / " . $limit['mailboxes']; ?></h5>


<?php
if ($limit['alias_pgindex_count'] ) print "<b>".$PALANG['pOverview_alias_title']."</b>&nbsp&nbsp";
($tDisplay_back_show == 1) ? $highlight_at = $tDisplay_back / $CONF['page_size'] + 1 : $highlight_at = 0;
$current_limit=$highlight_at * $CONF['page_size'];
for ($i = 0; $i < $limit['alias_pgindex_count']; $i++)
{
   if ( $i == $highlight_at )
   {
      print  "<a href=\"$file?domain=$fDomain&limit=" . $i * $CONF['page_size'] . "\"><b>" . $limit['alias_pgindex'][$i] . "</b></a>\n";
   }
   else
   {
      print  "<a href=\"$file?domain=$fDomain&limit=" . $i * $CONF['page_size'] . "\">" . $limit['alias_pgindex'][$i] . "</a>\n";
   }
}
print "</td><td valign=middle align=right>";

if ($tDisplay_back_show == 1)
{
   print "<a href=\"$file?domain=$fDomain&limit=$tDisplay_back\"><img border=\"0\" src=\"images/arrow-l.png\" title=\"" . $PALANG['pOverview_left_arrow'] . "\" alt=\"" . $PALANG['pOverview_left_arrow'] . "\" /></a>\n";
}
if ($tDisplay_up_show == 1)
{
   print "<a href=\"$file?domain=$fDomain&limit=0\"><img border=\"0\" src=\"images/arrow-u.png\" title=\"" . $PALANG['pOverview_up_arrow'] . "\" alt=\"" . $PALANG['pOverview_up_arrow'] . "\" /></a>\n";
}
if ($tDisplay_next_show == 1)
{
   print "<a href=\"$file?domain=$fDomain&limit=$tDisplay_next\"><img border=\"0\" src=\"images/arrow-r.png\" title=\"" . $PALANG['pOverview_right_arrow'] . "\" alt=\"" . $PALANG['pOverview_right_arrow'] . "\" /></a>\n";
}
print "</td></tr></table>\n";


if (boolconf('alias_domain')) {
# XXX: the following block misses one intention level
   print "<div id=\"sorting-advanced_wrapper\" class=\"dataTables_wrapper\" role=\"grid\">\n";
   print "<div class=\"table-header button-height\"> <h3 style='font-weight: thinner;' class='small-margin-bottom'>Domän Alias</h3> </div>\n";
   print "<table class=\"table responsive-table dataTable\" id=\"sorting-advanced\" style='margin-bottom:20px;' aria-describedby=\"sorting-advanced_info\">\n";
   print "   <thead>\n";
   if(sizeof ($tAliasDomains) > 0)
   {  print "    <tr role='row' style='font-size:90%;'>\n";
      print "      <th scope='col'>" . sprintf($PALANG['pOverview_alias_domain_aliases'], $fDomain) . "</th>\n";
      print "      <th scope='col' class='align-center'>" . $PALANG['pOverview_alias_domain_modified'] . "</th>\n";
      print "      <th scope='col' class='align-center'>" . $PALANG['pOverview_alias_domain_active'] . "</th>\n";
      print "      <th colspan='1' style='width:60px;'>Ta bort</th>\n";
      print "   </tr>\n";
      for ($i = 0; $i < sizeof ($tAliasDomains); $i++)
      {
         print "  <tbody>\n";
         print "   <tr class='compact' class='align-center' style='font-size:90%;'>\n";
         print "      <td style=\"padding-top: 12px;\"><a href=\"$file?domain=" . urlencode ($tAliasDomains[$i]['alias_domain']) . "&limit=" . $current_limit . "\">" . $tAliasDomains[$i]['alias_domain'] . "</a></td>\n";
         print "      <td style=\"padding-top: 12px;\" class='align-center'>" . $tAliasDomains[$i]['modified'] . "</td>\n";
         $active = ($tAliasDomains[$i]['active'] == 1) ? $PALANG['YES'] : $PALANG['NO'];
         $activemode = ($tAliasDomains[$i]['active'] == 1) ? 'green-gradient' : '';
         print "      <td class='low-padding align-center'><a class=\"button glossy $activemode\" href=\"edit-active.php?alias_domain=true&domain=" . urlencode ($tAliasDomains[$i]['alias_domain']) . "&return=$file" . urlencode ( "?domain=" . $fDomain . "&limit=" . $current_limit) . "\">" . $active . "</a></td>\n";
         print "      <td style='border-right: 1px solid #cccccc' class='low-padding align-center'><a class=\"button red-gradient icon-trash glossy\" href=\"delete.php?table=alias_domain&delete=" . urlencode ($tAliasDomains[$i]['alias_domain']) . "&domain="
           . urlencode ($tAliasDomains[$i]['alias_domain']) 
           . " \"onclick=\"return confirm ('" . $PALANG['confirm'] . $PALANG['pOverview_get_alias_domains'] . ": ". $tAliasDomains[$i]['alias_domain'] . "')\">" . $PALANG['del'] . "</a></td>\n";
         print "   </tr>\n";
         print "   </tbody>\n";
      }
   }
   if (!is_array($tTargetDomain))
   {
      # TODO: don't print create link if no domains are left for aliasing
   
      # XXX: the above block misses one intention level


      
   }
         if (sizeof ($tAliasDomains) == 0)
         {
            print "<tbody>";
            print "<tr class='compact'>\n";
            print "<td colspan='9'>\n";
            print "Inga domän alias inlagda, var vänlig lägg till nedan.\n";
            print "</td>";
            print "</tr>";
            print "</tbody>";
         } 
   if(is_array($tTargetDomain))
   {
      print "   <tr role='row' class='align-center' style='font-size:90%'\n";
      print "      <th scope='col'>" . sprintf($PALANG['pOverview_alias_domain_target'], $fDomain) . "</th>\n";
      print "      <th scope='col' class='align-center'>" . $PALANG['pOverview_alias_domain_modified'] . "</th>\n";
      print "      <th class='align-center'>" . $PALANG['pOverview_alias_domain_active'] . "</th>\n";
      print "      <th scope='col' colspan='2'></th>\n";
      print "   </tr>\n";
      print "   <tbody>\n";
      print "   <tr class='compact' style='font-size:90%'>\n";
      print "      <td style=\"padding-top: 12px;\"><a href=\"$file?domain=" . urlencode ($tTargetDomain['target_domain']) . "&limit=" . $current_limit . "\">" . $tTargetDomain['target_domain'] . "</a></td>\n";
      print "      <td style=\"padding-top: 12px;\" class='align-center'>" . $tTargetDomain['modified'] . "</td>\n";
      $active = ($tTargetDomain['active'] == 1) ? $PALANG['YES'] : $PALANG['NO'];
      $activetype = ($tTargetDomain['active'] == 1) ? "button green-gradient glossy" : "";
      print "      <td class='align-center'><a class=\"button glossy $activetype\" href=\"edit-active.php?alias_domain=true&domain=" . urlencode ($fDomain) . "&return=$file" . urlencode ( "?domain=" . $fDomain . "&limit=" . $current_limit) . "\">" . $active . "</a></td>\n";
      print "      <td ><a class=\"button red-gradient glossy\" href=\"delete.php?table=alias_domain&delete=" . urlencode ($fDomain) . "&domain=" . urlencode ($fDomain) . "\" onclick=\"return confirm ('" . $PALANG['confirm'] . $PALANG['pOverview_get_alias_domains'] . ": " . htmlentities ($fDomain) . "')\">" . $PALANG['del'] . "</a></td>\n";
      print "   </tr>\n";
      
   }

   print "<tfoot>\n";
   print "<tr>\n";
   if ($tCanAddAlias) {
   print "<td colspan='9'><a class='button blue-gradient glossy' href='create-alias-domain.php?target_domain=$fDomain'>{$PALANG['pMenu_create_alias_domain']}</a></td>\n";
   }
   print "</tr>\n";
   print "</tfoot>\n";
   print "</thead>\n";
   print "</table>\n";
   print "</div>\n";
}

 
   print "<div id=\"sorting-advanced_wrapper\" class=\"dataTables_wrapper\" role=\"grid\">\n";
   print "<div class=\"table-header button-height\"> <h3 style='font-weight: thinner;' class='small-margin-bottom'>Epost Alias</h3> </div>\n";
   print "<table class=\"table responsive-table dataTable\" style=\"margin-bottom:20px\"id=\"sorting-advanced\" aria-describedby=\"sorting-advanced_info\">\n";
   print "   <thead>\n";
   print "   <tr role='row' style='font-size: 90%;'>\n";
   if ($CONF['show_status'] == 'YES') { print "<td></td>\n"; }
   print "      <th scope='col'>" . $PALANG['pOverview_alias_address'] . "</th>\n";
   print "      <th scope='col' class='hide-on-mobile-portrait'>" . $PALANG['pOverview_alias_goto'] . "</th>\n";
   print "      <th scope='col' class='hide-on-mobile align-center'>" . $PALANG['pOverview_alias_modified'] . "</th>\n";
   print "      <th scope='col' class='align-center'>" . $PALANG['pOverview_alias_active'] . "</th>\n";
   print "      <th colspan='2' style='min-width:100px'></th>\n";
   print "      </tr>\n";
   print "   </thead>\n";
   print "    <tbody>\n";
   if (sizeof ($tAlias) == 0)
   {
      print "<tr class='compact'>\n";
      print "<td colspan='9'>\n";
      print "Inga alias inlagda, var vänlig lägg till nedan.\n";
      print "</td>";
      print "</tr>";
   } 
   for ($i = 0; $i < sizeof ($tAlias); $i++)
   {
      if ((is_array ($tAlias) and sizeof ($tAlias) > 0))
      {
         print " <tr class='compact' style='font-size:90%'>\n";
         if ($CONF['show_status'] == 'YES')
         {
             print "  <td style=\"padding-top: 12px;\">" . gen_show_status($tAlias[$i]['address']) . "</td>\n";
         }
         print "      <td style=\"padding-top: 12px;\">" . searchhl($tAlias[$i]['address']) . "</td>\n";
         if ($CONF['alias_goto_limit'] > 0) {
            print "      <td style=\"padding-top: 12px;\">" . searchhl(preg_replace (
               "/,/", 
               "<br>", 
                  preg_replace(
                     '/^(([^,]+,){'.$CONF['alias_goto_limit'].'})[^,]+,.*/',
                     '$1' . sprintf(
                        $PALANG['and_x_more'], 
                        (substr_count ($tAlias[$i]['goto'], ',') - $CONF['alias_goto_limit'] + 1) 
                     ),
                     $tAlias[$i]['goto']
                  )
               )) . "</td>\n";
         } else {
            print "      <td style=\"padding-top: 12px;\">" . searchhl(preg_replace ("/,/", "<br>", $tAlias[$i]['goto'])) . "</td>\n";
         }
         print "      <td style=\"padding-top: 12px;\" class='align-center'>" . $tAlias[$i]['modified'] . "</td>\n";


# TODO: merge superadmin / domain admin code
         if (authentication_has_role('global-admin')) {
# superadmin code
         $active = ($tAlias[$i]['active'] == 1) ? $PALANG['YES'] : $PALANG['NO'];
         $activetype = ($tAlias[$i]['active'] == 1) ? "button green-gradient glossy" : "";
         print "      <td class='low-padding align-center'><a class=\"button grey-gradient glossy $activetype\" href=\"edit-active.php?alias=" . urlencode ($tAlias[$i]['address']) . "&domain=$fDomain&return=$file?domain=$fDomain" . urlencode ("&limit=" . $current_limit) . "\">" . $active . "</a></td>\n";
         print "      <td colspan='3' style='border-right: 1px solid #cccccc' class='low-padding align-center'><span class='button-group'><a class=\"button icon-gear glossy\" href=\"edit-alias.php?address=" . urlencode ($tAlias[$i]['address']) . "\"><div style='float: right; margin-top: 1px;' class='hidden-on-mobile'>" . $PALANG['edit'] . "</div></a>";
         print "      <a class=\"button icon-trash red-gradient glossy\" href=\"delete.php?table=alias" . "&delete=" . urlencode ($tAlias[$i]['address']) . "&domain=$fDomain" . "\"onclick=\"return confirm ('" . $PALANG['confirm'] . $PALANG['pOverview_get_aliases'] . ": ". $tAlias[$i]['address'] . "')\">" . $PALANG['del'] . "</a></span></td>";

         } else {
# domain admin code
         if ($CONF['special_alias_control'] == 'YES')
         {
            $active = ($tAlias[$i]['active'] == 1) ? $PALANG['YES'] : $PALANG['NO'];
            print "      <td><a class=\"button green-gradient glossy $activetype\" href=\"edit-active.php?alias=" . urlencode ($tAlias[$i]['address']) . "&domain=$fDomain" . "\">" . $active . "</a></td>\n";
            print "      <td><a class=\"btn btn-small\" href=\"edit-alias.php?address=" . urlencode ($tAlias[$i]['address']) . "\">" . $PALANG['edit'] . "</a></td>\n";
            print "      <td><a class=\"btn btn-small btn-danger\" href=\"delete.php?table=alias&delete=" . urlencode ($tAlias[$i]['address']) . "&domain=$fDomain" . "\"onclick=\"return confirm ('" . $PALANG['confirm'] . $PALANG['pOverview_get_aliases'] . ": ". $tAlias[$i]['address'] . "')\">" . $PALANG['del'] . "</a></td>\n";
         }
         else
         {
            if ( check_alias_owner ($SESSID_USERNAME, $tAlias[$i]['address']))
            {
               $active = ($tAlias[$i]['active'] == 1) ? $PALANG['YES'] : $PALANG['NO'];
               print "      <td class='align-center'><a class=\"button green-gradient glossy $activetype\" href=\"edit-active.php?alias=" . urlencode ($tAlias[$i]['address']) . "&domain=$fDomain" . "\">" . $active . "</a></td>\n";
               print "      <td><a class=\"btn btn-small\" href=\"edit-alias.php?address=" . urlencode ($tAlias[$i]['address']) . "\">" . $PALANG['edit'] . "</a></td>\n";
               print "      <td><a class=\"btn btn-small btn-danger\" href=\"delete.php?table=alias&delete=" . urlencode ($tAlias[$i]['address']) . "&domain=$fDomain" . "\"onclick=\"return confirm ('" . $PALANG['confirm'] . $PALANG['pOverview_get_aliases'] . ": ". $tAlias[$i]['address'] . "')\">" . $PALANG['del'] . "</a></td>\n";
            }
            else
            {
               //this is a special alias, show status only, don't allow changes
               $active = ($tAlias[$i]['active'] == 1) ? $PALANG['YES'] : $PALANG['NO'];
               print "      <td>" . $active . "</td>\n";

            }
         }
# end diff
         }

         print "   </tr>\n";
      }
   }
   if($tCanAddAlias) {
   print "<tfoot>\n";
   print "<tr>\n";
   print "<td colspan='9'><a class='button blue-gradient glossy' href='create-alias.php?domain=$fDomain'>{$PALANG['pMenu_create_alias']}</a></td>\n";
   print "</tr>\n";
   print "</tfoot>\n";
   }
   print "</table>\n";
   print "  </div>\n";




   $colspan=8;
   if ($CONF['vacation_control_admin'] == 'YES') $colspan=$colspan+1;
   if ($CONF['alias_control_admin'] == 'YES') $colspan=$colspan+1;
   if ($display_mailbox_aliases)              $colspan=$colspan+1;
   print "<div id=\"sorting-advanced_wrapper\" class=\"dataTables_wrapper\" role=\"grid\">\n";
   print "<div class=\"table-header button-height\"> <h3 style='font-weight: thinner;' class='small-margin-bottom'>Brevlådor</h3> </div>\n";
   print "<table class=\"table responsive-table dataTable\" id=\"sorting-advanced\" aria-describedby=\"sorting-advanced_info\">\n";
   print "<thead>\n";
   print "   <tr role='row' style='font-size: 90%;'>\n";
   if ($CONF['show_status'] == 'YES') { print "<th scope='col'></th>\n"; }
   print "      <th scope='col'>" . $PALANG['pOverview_mailbox_username'] . "</th>\n";
   if ($display_mailbox_aliases) print "      <th scope='col' class='hide-on-mobile-portrait'>" . $PALANG['pOverview_alias_goto'] . "</th>\n";
   print "      <th scope='col' class='hide-on-mobile-portrait'>" . $PALANG['pOverview_mailbox_name'] . "</th>\n";
   if ($CONF['quota'] == 'YES') print "      <th scope='col' class='hide-on-mobile-portrait'>" . $PALANG['pOverview_mailbox_quota'] . "</th>\n";
   print "      <th scope='col' class='hide-on-mobile align-center'>" . $PALANG['pOverview_mailbox_modified'] . "</th>\n";
   print "      <th scope='col' class='align-center'>" . $PALANG['pOverview_mailbox_active'] . "</th>\n";
   $colspan = $colspan - 6;
   print " <th colspan='2' style='min-width:100px;'></th>\n";
   print "   </tr>\n";
   print "   </thead>\n";
   print "   <tbody>";
   if (sizeof ($tMailbox) == 0)
   {
      print "<tr class='compact'>\n";
      print "<td colspan='9'>\n";
      print "Inga brevlådor inlagda, var vänlig lägg till nedan.\n";
      print "</td>";
      print "</tr>";
   }

   for ($i = 0; $i < sizeof ($tMailbox); $i++)
   {
      if ((is_array ($tMailbox) and sizeof ($tMailbox) > 0))
      {
         print "   <tr class='compact' class='align-center' style='font-size: 90%;'>\n";

         if ($CONF['show_status'] == 'YES')
         {
             print "  <td style=\"padding-top: 12px;\">" . gen_show_status($tMailbox[$i]['username']) . "</td>\n";
         }

         print "      <td style=\"padding-top: 12px;\">" . searchhl($tMailbox[$i]['username']) . "</td>\n";

         if ($display_mailbox_aliases) {
            # print "      <td>" . searchhl($tMailbox[$i]['goto']) . "</td>\n";
            print "      <td style=\"padding-top: 12px;\">";
            if ($tMailbox[$i]['goto_mailbox'] == 1) {
               print "Mailbox"; # TODO: make translatable
            } else {
               print "Forward only"; # TODO: make translatable
            }
            if (count($tMailbox[$i]['goto_other']) > 0) print "<br>";
            print searchhl(join("<br>", $tMailbox[$i]['goto_other'])); # TODO: honor $CONF['alias_goto_limit']
            print "</td>\n";
         }


         print "      <td style=\"padding-top: 12px;\">" . htmlentities($tMailbox[$i]['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
         if ($CONF['quota'] == 'YES')
         {
            print "      <td>";
            if ($tMailbox[$i]['quota'] == 0)
            {
               print $PALANG['pOverview_unlimited'];
            }
            elseif ($tMailbox[$i]['quota'] < 0)
            {
               print $PALANG['pOverview_disabled'];
            }
            else
            {
               if (boolconf('used_quotas'))
                  print divide_quota ($tMailbox[$i]['current']).'/';
               print divide_quota ($tMailbox[$i]['quota']);
            }
            print "</td>\n";
         }
         print "      <td style=\"padding-top: 12px;\" class='align-center'>" . $tMailbox[$i]['modified'] . "</td>\n";
         $active = ($tMailbox[$i]['active'] == 1) ? $PALANG['YES'] : $PALANG['NO'];
         $activetype = ($tMailbox[$i]['active'] == 1) ? "button green-gradient glossy" : "";
         print "      <td class='low-padding align-center'><a class=\"button grey-gradient glossy $activetype\" href=\"edit-active.php?username=" . urlencode ($tMailbox[$i]['username']) . "&domain=$fDomain" . "\">" . $active . "</a></td>\n";

         if ($CONF['vacation_control_admin'] == 'YES' && $CONF['vacation'] == 'YES')
         {
            $v_active_int = $tMailbox[$i]['v_active'];
            if($v_active_int !== -1) {
               if($v_active_int == 1) {
                  $v_active = $PALANG['pOverview_vacation_edit'];
               }
               else {
                  $v_active = $PALANG['pOverview_vacation_option'];
               }
               print "<td style=\"padding-top: 12px;\"><a class=\"btn btn-small\" href=\"edit-vacation.php?username=" . urlencode ($tMailbox[$i]['username']) . "&domain=$fDomain" . "\">" . $v_active . "</a></td>\n";
            }
            else {
               // can't tell vacation state - broken pgsql query
               echo "<td> &nbsp; </td>\n";
            }
         }

         $edit_aliases=0;
         if ( (! authentication_has_role('global-admin')) && $CONF['alias_control_admin'] == 'YES') $edit_aliases = 1;
         if (    authentication_has_role('global-admin')  && $CONF['alias_control'] == 'YES') $edit_aliases = 1;

         if ($edit_aliases == 1)
         {
            print "      <td><a class=\"btn btn-small\" href=\"edit-alias.php?address=" . urlencode ($tMailbox[$i]['username']) . "\">" . $PALANG['pOverview_alias_edit'] . "</a></td>\n";
         }

         print "      <td colspan='3' style='border-right: 1px solid #cccccc' class='low-padding align-center'><span class='button-group'><a class=\"button icon-gear glossy\" href=\"edit-mailbox.php?username=" . urlencode ($tMailbox[$i]['username']) . "&domain=$fDomain" . "\"><div style='float: right; margin-top: 1px;' class='hidden-on-mobile'>" . $PALANG['edit'] . "</div></a>";
         print "      <a class=\"button icon-trash red-gradient glossy\" href=\"delete.php?table=mailbox" . "&delete=" . urlencode ($tMailbox[$i]['username']) . "&domain=$fDomain" . "\"onclick=\"return confirm ('" . $PALANG['confirm'] . $PALANG['pOverview_get_mailboxes'] . ": ". $tMailbox[$i]['username'] . "')\">" . $PALANG['del'] . "</a></span></td>";
         print "   </tr>\n";
         print "   </tbody>\n";
      }
   }
   if($tCanAddMailbox) {
   print "<tfoot>\n";
   print "<tr>\n";
   print "<td colspan='9'><a class='button blue-gradient glossy' href='create-mailbox.php?domain=$fDomain'>{$PALANG['pMenu_create_mailbox']}</a></td>\n";
   print "</tr>\n";
   print "</tfoot>\n";
   }
   print "</table>\n";
   print "  </div>\n";

   if ($tDisplay_back_show == 1)
   {
      print "<a href=\"$file?domain=$fDomain&limit=$tDisplay_back#LowArrow\"><img border=\"0\" src=\"images/arrow-l.png\" title=\"" . $PALANG['pOverview_left_arrow'] . "\" alt=\"" . $PALANG['pOverview_left_arrow'] . "\" /></a>\n";
   }
   if ($tDisplay_up_show == 1)
   {
      print "<a href=\"$file?domain=$fDomain&limit=0#LowArrow\"><img border=\"0\" src=\"images/arrow-u.png\" title=\"" . $PALANG['pOverview_up_arrow'] . "\" alt=\"" . $PALANG['pOverview_up_arrow'] . "\" /></a>\n";
   }
   if ($tDisplay_next_show == 1)
   {
      print "<a href=\"$file?domain=$fDomain&limit=$tDisplay_next#LowArrow\"><img border=\"0\" src=\"images/arrow-r.png\" title=\"" . $PALANG['pOverview_right_arrow'] . "\" alt=\"" . $PALANG['pOverview_right_arrow'] . "\" /></a>\n";
   }



if ($CONF['show_status'] == 'YES' && $CONF['show_status_key'] == 'YES')
{
  print "<br><br>";
  if  ($CONF['show_undeliverable'] == 'YES')
  {
     print "&nbsp;<span style='background-color:" . $CONF['show_undeliverable_color'] .
                        "'>" . $CONF['show_status_text'] . "</span>=" . $PALANG['pStatus_undeliverable'] . "\n";
  }
  if  ($CONF['show_popimap'] == 'YES')
  {
     print "&nbsp;<span style='background-color:" . $CONF['show_popimap_color'] .
                        "'>" . $CONF['show_status_text'] . "</span>=" . $PALANG['pStatus_popimap'] . "\n";
  }
  if ( count($CONF['show_custom_domains']) > 0 )
  {
    for ($i = 0; $i < sizeof ($CONF['show_custom_domains']); $i++)
    {
        print "&nbsp;<span  style='background-color:" . $CONF['show_custom_colors'][$i] . "'>" .
            $CONF['show_status_text'] . "</span>=" . $PALANG['pStatus_custom'] . 
            $CONF['show_custom_domains'][$i] . "\n";
    }
  }
}

/* vim: set ft=php expandtab softtabstop=3 tabstop=3 shiftwidth=3: */
?>
<script type="text/javascript">
   $('#searchselect').on('change', function()
{
    $('#searchform').submit();
});
</script>