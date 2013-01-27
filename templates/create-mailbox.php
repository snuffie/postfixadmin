<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div class="row-fluid">
   <div class="span12">
      <div class="span6 offset3">
         <div id="edit_form">
            <form name="mailbox" class="formbox" method="post">
               <div class="control-group">
                  <form class="form-inline">
                  <legend><?php print $PALANG['pCreate_mailbox_welcome']; ?></legend>
               </div>
               <div class="control-group">
                     <input class="flat" type="text" name="fUsername" value="<?php print $tUsername; ?>" autocomplete="off" placeholder="<?php print $PALANG['pCreate_mailbox_username'] ; ?>"/>
                     <span style="font-size: 17px;">@</span>
                     <select name="fDomain">
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
                  <img src="images/mail_test.png"/>
                  <input class="flat" type="text" name="fName" placeholder="<?php print $pCreate_mailbox_name_text; ?>" value="<?php print $tName; ?>" />
               </div>
               <div class="control-group">
                  <input class="flat" type="password" name="fPassword" placeholder="<?php print $PALANG['pCreate_mailbox_password']; ?>" />
               </div>
               <div class="control-group">
                  <input class="flat" type="password" name="fPassword2" placeholder="<?php print $PALANG['pCreate_mailbox_password2']; ?>" />
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
                      echo "<a class='btn' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
                  ?>
                  <input class="btn btn-info"  type="submit" name="submit" value="<?php print $PALANG['pCreate_mailbox_button']; ?>" />
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
