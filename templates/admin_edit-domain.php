<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div class="row-fluid">
   <div class="span12">
      <div class="span6 offset3">
         <div id="edit_form">
            <form name="edit_domain" class="formbox" method="post">
               <legend><?php print $PALANG['pAdminEdit_domain_welcome']; ?></legend>
               <div class="control-group">
                  <div class="controls">
                     <h5><?php print $PALANG['pAdminEdit_domain_domain'] . ":"; ?>
                     <?php print $domain; ?></h5>
                  </div>
               </div>
               <div class="control-group">
                  <label class="control-label"><?php print $PALANG['pAdminEdit_domain_description']; ?>:</label>
                  <input class="flat" placeholder="<?php print $PALANG['pAdminEdit_domain_description']; ?>" type="text" name="fDescription" value="<?php print htmlspecialchars($tDescription, ENT_QUOTES); ?>" />
               </div>
               <div class="control-group">
                  <label class="control-label"><?php print $PALANG['pAdminEdit_domain_aliases_text']; ?></label>
                  <div class="controls">
                     <input placeholder="<?php print $PALANG['pAdminEdit_domain_aliases']; ?>" class="flat" type="text" name="fAliases" value="<?php print $tAliases; ?>" />
                  </div>
               </div>
               <div class="control-group">      
                  <label><?php print $PALANG['pAdminEdit_domain_mailboxes_text']; ?></label>
                  <div class="controls">
                     <input placeholder="<?php print $PALANG['pAdminEdit_domain_mailboxes']; ?>" class="flat" type="text" name="fMailboxes" value="<?php print $tMailboxes; ?>" />
                  </div>
               </div>
               <?php if ($CONF['quota'] == 'YES') { ?>
               <div class="control-group">
                  <div class="controls">
                     <input class="flat" placeholder="<?php print $PALANG['pAdminEdit_domain_maxquota']; ?>" type="text" name="fMaxquota" value="<?php print $tMaxquota; ?>" />
                     <?php print $PALANG['pAdminEdit_domain_maxquota_text']; ?>
                  </div>
               </div>
               <?php } if ($CONF['transport'] == 'YES') { ?>
               <div class="control-group">
                  <?php print $PALANG['pAdminEdit_domain_transport'] . ":"; ?>
                  <select class="flat" name="fTransport">
                  <?php
                  for ($i = 0; $i < sizeof ($CONF['transport_options']); $i++)
                  {
                     if ($CONF['transport_options'][$i] == $tTransport)
                     {
                        print "<option value=\"" . $CONF['transport_options'][$i] . "\" selected>" . $CONF['transport_options'][$i] . "</option>\n";
                     }
                     else
                     {
                        print "<option value=\"" . $CONF['transport_options'][$i] . "\">" . $CONF['transport_options'][$i] . "</option>\n";
                     }
                  }
                  ?>
                  </select>
                  <?php print $PALANG['pAdminEdit_domain_transport_text']; ?>
               </div>
               <?php } ?>
               <div class="control-group">
                  <div class="controls">
                     <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pAdminEdit_domain_backupmx'] . ":"; ?></span>
                     <?php $checked = (!empty ($tBackupmx)) ? 'checked=checked' : ''; ?>
                     <input style="margin-top: -4px;" class="flat" type="checkbox" name="fBackupmx" <?php print $checked; ?> />
                     &nbsp;
                  </div>
               </div>
               <div class="control-group">
                  <div class="controls">
                     <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pAdminEdit_domain_active'] . ":"; ?></span>
                     <?php $checked = (!empty ($tActive)) ? 'checked=checked' : ''; ?>
                     <input style="margin-top: -3px;" class="flat" type="checkbox" name="fActive" <?php print $checked; ?> />
                     &nbsp;
                  </div>
               </div>
               <div class="control-group">
                  <?php
                     echo "<a class='btn' style='margin-top: 20px;' href='list-domain.php" . htmlentities($_SESSION['list_domain_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
                  ?>
                  <td colspan="3" class="hlp_center"><input type="submit" class="btn btn-primary" style="margin-top: 20px;" name="submit" value="<?php print $PALANG['pAdminEdit_domain_button']; ?>" />
               </div>
               <div class="control-group">
                  <td colspan="3" class="standout"><?php print $tMessage; ?>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>