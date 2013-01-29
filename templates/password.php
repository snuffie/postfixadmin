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
            <legend class="legend"><?php print $PALANG['pPassword_welcome']; ?></legend>
            <div class="field-block button-height">
               <label class="label"><b><?php print $PALANG['pPassword_admin'] . ":"; ?></b></label>
               <input class="input disabled" type="text" disabled="true" placeholder="Inget användarnamn" value="<?php print $SESSID_USERNAME; ?>" />
               <?php print $pPassword_admin_text; ?>
            </div>
            <div class="field-block button-height">
               <label class="label"><b>Ange lösenord:</b></label>
               <input class="input" placeholder="<?php print $PALANG['pPassword_password_current']; ?>" type="password" name="fPassword_current" />
               <div style="clear: both;"></div>
               <?php print $pPassword_password_current_text; ?>
            </div>
            <div class="field-block button-height">
               <label class="label"><b>Ange nytt lösenord:</b></label>
               <input class="input" placeholder="<?php print $PALANG['pPassword_password']; ?>" type="password" name="fPassword" />
               <div style="clear: both;"></div>
               <?php print $pPassword_password_text; ?>
            </div>
            <div class="field-block button-height">
               <label class="label"><b>Nytt lösenord igen:</b></label>
               <input class="input" type="password" name="fPassword2" />
               <div style="clear: both;"></div>
               <?php print $tMessage; ?>
            </div>
            <div class="field-drop button-height" style="height: 30px;">
               <?php
                  echo "<a class='button big' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
               ?>
               <input class="button blue-gradient glossy big" type="submit" name="submit" value="<?php print $PALANG['pPassword_button']; ?>" /><div style="clear:both;"></div>
               <?php print $tMessage; ?>
            </div>
         </fieldset>
      </div>
   </div> 
</form>