<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div id="edit_form">
<form name="mailbox" class="formbox" style="width: 500px;" method="post">
   <div class="control-group">
      <td colspan="3"><h3><?php print $PALANG['pCreate_mailbox_welcome']; ?></h3>
   </div>
   <div class="control-group">
      <span style="font-size: 15px;"><?php print $PALANG['pCreate_mailbox_username'] . ":"; ?></span>
      <input class="flat" style="width: 150px;" type="text" name="fUsername" value="<?php print $tUsername; ?>" autocomplete="off"/>
      <span style="font-size: 17px;">@</span>
      <select name="fDomain" style="width: 180px;">
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
   <div class="control-group">
      <label><?php print $PALANG['pCreate_mailbox_password'] . ":"; ?></label>
      <input class="flat" type="password" name="fPassword" placeholder="<?php print $PALANG['pCreate_mailbox_password']; ?>" />
      
   </div>
   <div class="control-group">
      <label><?php print $PALANG['pCreate_mailbox_password2'] . ":"; ?></label>
      <input class="flat" type="password" name="fPassword2" placeholder="<?php print $PALANG['pCreate_mailbox_password2']; ?>" />
   </div>
   <div class="control-group">
      <input class="flat" type="text" name="fName" placeholder="<?php print $pCreate_mailbox_name_text; ?>" value="<?php print $tName; ?>" />
   </div>
   <?php if ($CONF['quota'] == 'YES') { ?>
   <div class="control-group">
      <?php print $PALANG['pCreate_mailbox_quota'] . ":"; ?>
      <input class="flat" type="text" name="fQuota" value="<?php print $tQuota; ?>" />
      <?php print $pCreate_mailbox_quota_text; ?>
   </div>
   <?php } ?>
   <div class="control-group">
      <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pCreate_mailbox_active'] . ":"; ?></span>
      <input style="margin-top: -3px;" class="flat" type="checkbox" name="fActive" checked />
   </div>
   <div class="control-group">
      <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pCreate_mailbox_mail'] . ":"; ?></span>
      <input style="margin-top: -3px;" class="flat" type="checkbox" name="fMail" checked />
   </div>
   <div class="control-group">
      <?php
          echo "<a class='btn' style='margin-top: 20px;' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
      ?>
      <input class="btn btn-primary" style="margin-top: 20px;" type="submit" name="submit" value="<?php print $PALANG['pCreate_mailbox_button']; ?>" />
   </div>
   <div class="control-group">
      <?php print $tMessage; ?>
   </div>
</form>
</div>
