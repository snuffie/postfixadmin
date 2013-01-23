<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div id="edit_form">
<form name="mailbox" class="formbox" style="width: 500px;" method="post">
   <div class="control-group">
      <td colspan="3"><h3><?php print $PALANG['pPassword_welcome']; ?></h3>
   </div>
   <div class="control-group">
      <h6><?php print $PALANG['pPassword_admin'] . ":"; ?></h6>
      <h6><?php print $SESSID_USERNAME; ?></h6>
      <h6><?php print $pPassword_admin_text; ?></h6>
   </div>
   <div class="control-group">
      <input class="flat" placeholder="<?php print $PALANG['pPassword_password_current']; ?>" type="password" name="fPassword_current" />
      <?php print $pPassword_password_current_text; ?>
   </div>
   <div class="control-group">
      <input class="flat" placeholder="<?php print $PALANG['pPassword_password']; ?>" type="password" name="fPassword" />
      <?php print $pPassword_password_text; ?>
   </div>
   <div class="control-group">
      <input class="flat" placeholder="<?php print $PALANG['pPassword_password2']; ?>" type="password" name="fPassword2" />
   </div>
   <div class="control-group">
	  <?php
          echo "<a class='btn' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
      ?>
      <td colspan="3" class="hlp_center"><input class="btn btn-primary" type="submit" name="submit" value="<?php print $PALANG['pPassword_button']; ?>" />
   </div>
   <div class="control-group">
      <td colspan="3" class="standout"><?php print $tMessage; ?>
   </div>
</form>
</div>
