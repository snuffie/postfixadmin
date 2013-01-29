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
<!--    <form name="overview" method="post" class="margin-bottom">
      <select class="select" name="domain">
         <?php
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
      <input class="button glossy blue-gradient" type="submit" name="go" value="<?php print $PALANG['pOverview_button']; ?>" />
   </form> -->
   <?php print "<h3 style='margin: 4px;'>".$PALANG['pOverview_title']."</h3>" ?>
</div>

<?php
   print "<table id=\"overview_table\" class=\"table responsive-table dataTable\">\n";
   print "   <thead>\n";
   print "   <tr role='row' style='font-size: 90%;'>\n";
   print "      <th>" . $PALANG['pOverview_get_domain'] . "</th>\n";
   print "      <th>" . $PALANG['pOverview_get_aliases'] . "</th>\n";
   print "      <th>" . $PALANG['pOverview_get_mailboxes'] . "</th>\n";
   if ($CONF['quota'] == 'YES') print "      <th class='hide-on-mobile-portrait'>" . $PALANG['pOverview_get_quota'] . "</th>\n";
   print "   </tr>\n";
   print "   </thead>\n";

   for ($i = 0; $i < sizeof ($list_domains); $i++)
   {
      if ((is_array ($list_domains) and sizeof ($list_domains) > 0))
      {
         $limit = get_domain_properties ($list_domains[$i]);

         if ($limit['aliases'] == 0) $limit['aliases'] = $PALANG['pOverview_unlimited'];
         if ($limit['mailboxes'] == 0) $limit['mailboxes'] = $PALANG['pOverview_unlimited'];
         if ($limit['maxquota'] == 0) $limit['maxquota'] = $PALANG['pOverview_unlimited'];
         if ($limit['aliases'] < 0) $limit['aliases'] = $PALANG['pOverview_disabled'];
         if ($limit['mailboxes'] < 0) $limit['mailboxes'] = $PALANG['pOverview_disabled'];
         if ($limit['maxquota'] < 0) $limit['maxquota'] = $PALANG['pOverview_disabled'];

         print "   <tr class=\"hilightoff\" onMouseOver=\"className='hilighton';\" onMouseOut=\"className='hilightoff';\">\n";
         print "      <td><a class=\"btn\" href=\"list-virtual.php?domain=" . $list_domains[$i] . "\">" . $list_domains[$i] . "</a></td>\n";
         print "      <td style=\"padding-top: 15px;\">" . $limit['alias_count'] . " / " . $limit['aliases'] . "</td>\n";
         print "      <td style=\"padding-top: 15px;\">" . $limit['mailbox_count'] . " / " . $limit['mailboxes'] . "</td>\n";
         if ($CONF['quota'] == 'YES') print "      <td>" . $limit['maxquota'] . "</td>\n";
         print "   </tr>\n";
      }
   }
   print "</table>\n";
?>
