<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div id="edit_form">
<form name="alias" method="post" class="formbox" style="width: 500px;">
   <legend><?php print $PALANG['pAdminEdit_admin_welcome']; ?></legend>
   <div class="control-group">
      <h5><?php print $PALANG['pAdminEdit_admin_username']; ?>:</h5>
      <h5><?php print $username; ?></h5>
   </div>
   <div class="control-group">
      <input class="flat" type="password" placeholder="<?php print $PALANG['pAdminEdit_admin_password']; ?>" autocomplete="off" name="fPassword" value=""/>
      <?php print $pAdminEdit_admin_password_text; ?>
   </div>
   <div class="control-group">
      <input class="flat" placeholder="<?php print $PALANG['pAdminEdit_admin_password2']; ?>" type="password" name="fPassword2" value="" />
   </div>
   <div class="control-group">
      <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pAdminEdit_admin_active']; ?>:</span>
      <input class="flat" style="margin-top: -3px;" type="checkbox" name="fActive" <?php print (!empty ($tActive)) ? 'checked' : ''; ?> />
   </div>
   <div class="control-group">
      <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pAdminEdit_admin_super_admin']; ?>:</span>
      <input class="flat" style="margin-top: -3px;" type="checkbox" name="fSadmin" <?php print (!empty ($tSadmin)) ? 'checked' : ''; ?> />
   </div>
   <div class="control-group">
      <td colspan=3 align=center>
      <select name="fDomains[]" size="10" multiple="multiple">
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
   <div class="control-group">
      <?php
         echo "<a class='btn' href='list-admin.php" . htmlentities($_SESSION['list_admin_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
      ?>
      <td colspan="3" class="hlp_center"><input class="btn btn-primary" type="submit" name="submit" value="<?php print $PALANG['pAdminEdit_admin_button']; ?>" />
   </div>
   <div class="control-group">
      <td colspan="3" class="standout"><?php print $tMessage; ?>
   </div>

</form>
</div>
