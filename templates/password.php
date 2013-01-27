<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div class="row-fluid">
   <div class="span12">
      <div class="span6 offset3">
         <div id="edit_form">
            <form name="mailbox" class="formbox" method="post">
               <div class="control-group">
                  <legend><?php print $PALANG['pPassword_welcome']; ?></legend>
               </div>
               <div class="control-group">
                  <label><?php print $PALANG['pPassword_admin'] . ":"; ?>
                  <?php print $SESSID_USERNAME; ?>
                  <?php print $pPassword_admin_text; ?></label>
               </div>
               <div class="control-group">
                  <div class="controls">
                     <input class="flat" placeholder="<?php print $PALANG['pPassword_password_current']; ?>" type="password" name="fPassword_current" />
                     <?php print $pPassword_password_current_text; ?>
                  </div>
               </div>   
               <div class="control-group">
                  <div class="controls">
                     <input class="flat" placeholder="<?php print $PALANG['pPassword_password']; ?>" type="password" name="fPassword" />
                     <?php print $pPassword_password_text; ?>
                  </div>
               </div>
               <div class="control-group">
                  <div class="controls">
                  <input class="flat" placeholder="<?php print $PALANG['pPassword_password2']; ?>" type="password" name="fPassword2" />
               </div>
               <div class="control-group">
                  <?php print $tMessage; ?>
               </div>
               <div class="control-group">
                  <div class="controls">
               	  <?php
                         echo "<a class='btn' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
                     ?>
                     <input class="btn btn-info" type="submit" name="submit" value="<?php print $PALANG['pPassword_button']; ?>" />
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

