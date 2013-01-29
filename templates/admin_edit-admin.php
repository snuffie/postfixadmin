<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<style>
label, b {
   font: 12px/1.7em 'Open Sans';
   font-weight: bold;
}
</style> 
<form name="alias" method="post">
   <div class="columns">
      <div class="eight-columns">
         <fieldset class="fieldset fields-list">
            <legend class="legend"><?php print $PALANG['pAdminEdit_admin_welcome']; ?></legend>
            <div class="field-block button-height">
               <label class="label"><b><?php print $PALANG['pAdminEdit_admin_username']; ?>:</b></label>
               <input class="input disabled" type="text" disabled="true" placeholder="Inget användarnamn" value="<?php print $username; ?>" />
            </div>
            <div class="field-block button-height">
               <label class="label"><b>Lösenord:</b></label>
               <input class="input" type="password" placeholder="<?php print $PALANG['pAdminEdit_admin_password']; ?>" autocomplete="off" name="fPassword" value=""/>
            </div>
            <div class="field-block button-height">
               <label class="label"><b><?php print $PALANG['pAdminEdit_admin_password2']; ?>:</b></label>
               <input class="input" type="password" name="fPassword2" value="" />
            </div>
            <div class="field-block button-height">
               <input class="checkbox mid-margin-left" type="checkbox" name="fActive" <?php print (!empty ($tActive)) ? 'checked' : ''; ?> />
               <b style='font-size: 90%;'><?php print $PALANG['pAdminEdit_admin_active']; ?></b>
               <label class="label" for="checkbox-2"><b>Stäng av konto:</b></label>
               <div style="clear: both;"></div>
               <input class="checkbox mid-margin-left" type="checkbox" name="fSadmin" <?php print (!empty ($tSadmin)) ? 'checked' : ''; ?> />
               <b style='font-size: 90%;'><?php print $PALANG['pAdminEdit_admin_super_admin']; ?></b>
               <label class="label" for="checkbox-2"><b>Hantera fulla rättigheter:</b></label>
            </div>
            <div class="field-block button-height">
               <label class="label"><b>Hantera aktiva domäner:</b><div style="clear: both;"></div>
               <small style="color: #333;">(Håll <b>Ctrl</b> eller <b>Cmd</b> <div style="clear: both;"></div>för att markera flera)</small></label>
               <select name="fDomains[]" class="select multiple silver-gradient" style="width: 192px;" size="8" multiple>
               <?php
               foreach($tAllDomains as $domain) {
                  // should escape $domain here to stop xss etc.
                  $selected = '';
                  if (in_array ($domain, $tDomains))  {
                     $selected = "selected='selected'";
                  }
                  print "<option value='$domain' $selected>$domain</option>\n";
               }
               ?>
               </select>
            </div>
            <div class="field-drop button-height" style="height: 30px;">
               <?php
                  echo "<a class='button big' href='list-admin.php" . htmlentities($_SESSION['list_admin_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
               ?>
               <input class="button blue-gradient glossy big" type="submit" name="submit" value="<?php print $PALANG['pAdminEdit_admin_button']; ?>" /><div style="clear:both;"></div>
               <?php print $tMessage; ?>
            </div>
         </fieldset>
      </div>
   </div> 
</form>