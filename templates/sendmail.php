<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div id="edit_form">
<form name="mailbox" class="formbox" style="width: 500px;" method="post">
   <div class="control-group">
      <td colspan="3"><h3><?php print $PALANG['pSendmail_welcome']; ?></h3>
   </div>
   <div class="control-group">
      <h5><?php print $PALANG['pSendmail_admin'] . ":"; ?></h5>
      <h5><?php print $SESSID_USERNAME; ?></h5>
   </div>
   <div class="control-group">
      <input class="flat" placeholder="<?php print $PALANG['pSendmail_to']; ?>" type="text" name="fTo" />
   </div>
   <div class="control-group">
      <input class="flat" placeholder="<?php print $PALANG['pSendmail_subject']; ?>" type="text" name="fSubject" value="<?php print $PALANG['pSendmail_subject_text']; ?>" />
   </div>
   <div class="control-group">
      <textarea class="flat" placeholder="<?php print $PALANG['pSendmail_body']; ?>" rows="10" cols="60" name="fBody"><?php print $CONF['welcome_text']; ?></textarea>
   </div>
   <div class="control-group">
      <td colspan="3" class="hlp_center"><input class="btn btn-primary" type="submit" name="submit" value="<?php print $PALANG['pSendmail_button']; ?>" />
   </div>
   <div class="control-group">
      <td colspan="3" class="standout"><?php print $tMessage; ?>
   </div>
</form>
</div>
