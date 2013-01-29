<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<style>
label, b {
   font: 12px/1.7em 'Open Sans';
   font-weight: bold;
}
</style> 
<form name="mailbox" class="formbox" method="post">
   <div class="columns">
      <div class="eight-columns">
         <fieldset class="fieldset fields-list">
            <legend class="legend"><?php print $PALANG['pCreate_mailbox_welcome']; ?></legend>
            <div class="field-block button-height">
               <label class="label"><b>Ange epost adress:</b></label>
               <input class="input" type="text" name="fUsername" value="<?php print $tUsername; ?>" autocomplete="off" placeholder="<?php print $PALANG['pCreate_mailbox_username'] ; ?>"/>
               @
               <select name="fDomain" class="select">
               <?php
               for ($i = 0; $i < sizeof ($list_domains); $i++)
               {
                  if ($tDomain == $list_domains[$i])
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
               <?php print $pCreate_mailbox_username_text; ?>
            </div>
            <div class="field-block button-height">
               <label class="label"><b>Fyll i <?php print $pCreate_mailbox_name_text; ?>:</b></label>
               <input class="input" type="text" name="fName" placeholder="Namn" value="<?php print $tName; ?>" />
            </div>
            <div class="field-block button-height">
               <label class="label"><b>Fyll i lösenord:</b></label>
               <input class="input" autocomplete="off" type="password" name="fPassword" placeholder="<?php print $PALANG['pCreate_mailbox_password']; ?>" />
            </div>
            <div class="field-block button-height">
               <label class="label"><b>Lösenord igen:</b></label>
               <input class="input" autocomplete="off" type="password" name="fPassword2" placeholder="<?php print $PALANG['pCreate_mailbox_password2']; ?>" />
            </div>
            <?php if ($CONF['quota'] == 'YES') { ?>
               <div class="field-block button-height">
                  <label class="label"><b><?php print $PALANG['pCreate_mailbox_quota'] . ":"; ?></b></label>
                  <input class="input" type="text" name="fQuota" value="<?php print $tQuota; ?>" />
                  <?php print $pCreate_mailbox_quota_text; ?>
               </div>
            <?php } ?>
            <div class="field-block button-height">
               <input class="checkbox mid-margin-left" type="checkbox" name="fActive" checked />
               <b style='font-size: 90%;'><?php print $PALANG['pCreate_mailbox_active']; ?></b>
               <label class="label" for="checkbox-2"><b>Aktivera kontot:</b></label>
               <div style="clear: both;"></div>
               <input class="checkbox mid-margin-left" type="checkbox" name="fMail" checked />
               <b style='font-size: 90%;'><?php print $PALANG['pCreate_mailbox_mail']; ?></b>
               <label class="label" for="checkbox-2"><b>Välkomstbrev:</b></label>
            </div>
            <div class="field-drop button-height" style="height: 30px;">
               <?php
                  echo "<a class='button big' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
               ?>
               <input class="button blue-gradient glossy big" type="submit" name="submit" value="<?php print $PALANG['pCreate_mailbox_button']; ?>" /><div style="clear:both;"></div>
               <?php print $tMessage; ?>
            </div>
         </fieldset>
      </div>
   </div> 
</form>