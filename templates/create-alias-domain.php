<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div class="row-fluid">
   <div class="span12">
      <div class="span6 offset3">
         <div id="edit_form">
            <form name="alias_domain" class="formbox" method="post">
               <div class="control-group">
                  <legend><?php print $PALANG['pCreate_alias_domain_welcome']; ?></legend>
               </div>

            <?php
            if (count($alias_domains) > 0) {
            ?>

               <div class="control-group">
                  <label><?php print $PALANG['pCreate_alias_domain_alias'] . ":"; ?></label>
                  <label><?php print $PALANG['pCreate_alias_domain_alias_text']; ?></label>
                  <select class="flat" name="alias_domain">
                  <?php
                  foreach ($alias_domains as $dom)
                  {
                     print "<option value=\"$dom\"".(($fAliasDomain == $dom) ? ' selected' : '').">$dom</option>\n";
                  }
                  ?>
                  </select>
                  
               </div>
               <div class="control-group">
                  <label><?php print $PALANG['pCreate_alias_domain_target'] . ":"; ?></label>
                  <label><?php print $PALANG['pCreate_alias_domain_target_text']; ?></label>
                  <select class="flat" name="target_domain">
                  <?php
                  foreach ($target_domains as $dom)
                  {
                     print "<option value=\"$dom\"".(($fTargetDomain == $dom) ? ' selected' : '').">$dom</option>\n";
                  }
                  ?>
                  </select>
                  
               </div>
               <div class="control-group">
                  <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pCreate_alias_domain_active'] . ":"; ?></span>
                  <input style="margin-top: -3px;" class="flat" type="checkbox" name="active" value="1"<?php if ($fActive) { print ' checked'; } ?> />
               </div>
            <?php
            }
            ?>
                  <Label class="standout"><?php if ($error) { print '<span class="error_msg">'; } print $tMessage; if ($error) { print '</span>'; } ?>
            <?php
            if (count($alias_domains) > 0) {
            ?>
               <div class="control-group">
                  <?php
                      echo "<a class='btn' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
                  ?>
                  <input class="btn btn-info" type="submit" name="submit" value="<?php print $PALANG['pCreate_alias_domain_button']; ?>" />
               </div>
            <?php
            }
            ?>
            </form>
         </div>
      </div>
   </div>
</div>
<?php /* vim: set ft=php expandtab softtabstop=3 tabstop=3 shiftwidth=3: */ ?>
