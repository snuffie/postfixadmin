<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<style>
label, b {
   font: 12px/1.7em 'Open Sans';
   font-weight: bold;
}
</style>
            <form name="alias_domain" class="formbox" method="post">
               <div class="columns">
                  <div class="eight-columns">
                     <fieldset class="fieldset fields-list">
                        <legend class="legend"><?php print $PALANG['pCreate_alias_domain_welcome']; ?></legend>
                        <?php
                        if (count($alias_domains) > 0) {
                        ?>

                           <div class="field-block button-height">
                              <label for="fDomain" class="label"><b><?php print $PALANG['pCreate_alias_domain_alias'];?>:</b></label>
                              <input class="input" id="fDomain" type="text" placeholder="Domän namn" name="fDomain" value="<?php print htmlentities($tDomain); ?>" />
                              <?php print $PALANG['pCreate_alias_domain_alias_text']; ?>
                              <?php print $pAdminCreate_domain_domain_text; ?>
                           </div>
                           <div class="field-block button-height">
                              <select class="select" name="alias_domain">
                              <?php
                              foreach ($alias_domains as $dom)
                              {
                                 print "<option value=\"$dom\"".(($fAliasDomain == $dom) ? ' selected' : '').">$dom</option>\n";
                              }
                              ?>
                              </select>
                              
                           </div>
                           <div class="field-block button-height">
                              <label class="label"><b><?php print $PALANG['pCreate_alias_domain_target']; ?>:</b></label>
                              <select class="select" name="target_domain">
                              <?php
                              foreach ($target_domains as $dom)
                              {
                                 print "<option value=\"$dom\"".(($fTargetDomain == $dom) ? ' selected' : '').">$dom</option>\n";
                              }
                              ?>
                              </select>
                              <?php print $PALANG['pCreate_alias_domain_target_text']; ?>
                           </div>
                           <div class="field-block button-height">
                              <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pCreate_alias_domain_active'] . ":"; ?></span>
                              <input style="margin-top: -3px;" class="flat" type="checkbox" name="active" value="1"<?php if ($fActive) { print ' checked'; } ?> />
                           
                        <?php
                        }
                        ?>
                              <Label class="standout"><?php if ($error) { print '<span class="error_msg">'; } print $tMessage; if ($error) { print '</span>'; } ?>
                           </div>
                        <?php
                        if (count($alias_domains) > 0) {
                        ?>
                           <div class="field-drop button-height" style="height: 30px;">
                              <?php
                                  echo "<a class='button big' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
                              ?>
                              <input class="button big glossy blue-gradient" type="submit" name="submit" value="<?php print $PALANG['pCreate_alias_domain_button']; ?>" />
                           </div>
                        <?php
                        }
                        ?>
           </fieldset>
                  </div>
               </div> 
            </form>

<?php /* vim: set ft=php expandtab softtabstop=3 tabstop=3 shiftwidth=3: */ ?>
