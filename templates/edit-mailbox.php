<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div id="edit_form">
<form name="mailbox" class="formbox" style="width: 500px;" method="post">
   <div class="control-group">
      <td colspan="3"><h3><?php print $PALANG['pEdit_mailbox_welcome']; ?></h3>
   </div>
   <div class="control-group">
      <h6><?php print $PALANG['pEdit_mailbox_username']; ?>:</h6>
      <h6><?php print $fUsername; ?></h6>
      <h6><?php print $pEdit_mailbox_username_text; ?></h6>
   </div>
   <div class="control-group">
      <input class="flat" placeholder="<?php print $PALANG['pEdit_mailbox_password']; ?>" type="password" name="fPassword" />
      <?php print $pEdit_mailbox_password_text; ?>
   </div>
   <div class="control-group">
      <input class="flat" placeholder="<?php print $PALANG['pEdit_mailbox_password2']; ?>" type="password" name="fPassword2" />
   </div>
   <div class="control-group">
      <label><?php print $pEdit_mailbox_name_text; ?></label>
      <input class="flat" placeholder="<?php print $PALANG['pEdit_mailbox_name']; ?>" type="text" name="fName" value="<?php print htmlspecialchars ($tName,ENT_QUOTES); ?>" />
   </div>
   <?php if ($CONF['quota'] == 'YES') { ?>
   <div class="control-group">
      <?php print $PALANG['pEdit_mailbox_quota'] . " (max: " . $tMaxquota . "):"; ?>
      <input class="flat" type="text" name="fQuota" value="<?php print $tQuota; ?>" />
      <?php print $pEdit_mailbox_quota_text; ?>
   </div>
   <?php } ?>
   <div class="control-group">
      <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pCreate_mailbox_active'] . ":"; ?></span>
      <input class="flat" style="margin-top: -3px;" type="checkbox" name="fActive" <?php print (!empty ($tActive)) ? 'checked' : '' ?> />
   </div>
   <div class="control-group">
      <td colspan="3" class="hlp_center">
        <input class="btn" type="submit" name="cancel" value="<?php print $PALANG['exit']; ?>" action="main.php" />
        <input class="btn btn-primary" type="submit" name="submit" value="<?php print $PALANG['pEdit_mailbox_button']; ?>" />
   </div>
   <div class="control-group">
      <td colspan="3" class="standout"><?php print $tMessage; ?>
   </div>
</form>
</div>
