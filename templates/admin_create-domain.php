<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div class="row-fluid">
   <div class="span12">
      <div id="edit_form">
         <div class="span6 offset3">
            <form name="create_domain" method="post" class="formbox">
               <div class="control-group">
                  <legend><?php print $PALANG['pAdminCreate_domain_welcome']; ?></legend>
                  <div class="controls">
                     <input class="flat" type="text" placeholder="<?php print $PALANG['pAdminCreate_domain_domain']; ?>" name="fDomain" value="<?php print htmlentities($tDomain); ?>" />
                  </div>
                  <?php print $pAdminCreate_domain_domain_text; ?>
               </div>
               <div class="control-group">
                  <input class="flat" type="text" placeholder="<?php print $PALANG['pAdminCreate_domain_description']; ?>" name="fDescription" value="<?php print htmlentities($tDescription); ?>" />
               </div>
               <div class="control-group">
                  <label class="control-label"><?php print $PALANG['pAdminCreate_domain_aliases_text']; ?></label>
                  <div class="controls">
                     <input class="flat" placeholder="<?php print $PALANG['pAdminCreate_domain_aliases']; ?>" type="text" name="fAliases" value="<?php print $tAliases; ?>" />
                  </div>
               </div>
               <div class="control-group">
                  <label class="control-label"><?php print $PALANG['pAdminCreate_domain_mailboxes_text']; ?></label>
                  <div class="controls">
                     <input class="flat" placeholder="<?php print $PALANG['pAdminCreate_domain_mailboxes']; ?>" type="text" name="fMailboxes" value="<?php print $tMailboxes; ?>" />
                  </div>
               </div>
               <?php if ($CONF['quota'] == 'YES') { ?>
               <div class="control-group">
                  <div class="controls">
                     <?php print $PALANG['pAdminCreate_domain_maxquota']; ?>
                     <input class="flat" type="text" name="fMaxquota" value="<?php print $tMaxquota; ?>" />
                     <?php print $PALANG['pAdminCreate_domain_maxquota_text']; ?>
                  </div>
               </div>
               <?php } if ($CONF['transport'] == 'YES') { ?>
               <div class="control-group">
                  <?php print $PALANG['pAdminCreate_domain_transport'] . ":"; ?>
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
                  
                  <?php print $PALANG['pAdminCreate_domain_transport_text']; ?>
               </div>
               <?php } ?>
               <div class="control-group">
                  <div class="controls">
                     <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pAdminCreate_domain_defaultaliases'] . ":"; ?></span>
                     <?php $checked = ($tDefaultaliases == 'on') ? 'checked=checked' : ''; ?>
                     <input style="margin-top: -3px;" class="flat" type="checkbox" value='on' name="fDefaultaliases" <?php print $checked; ?> />
                     <?php print $PALANG['pAdminCreate_domain_defaultaliases_text']; ?>
                  </div>
               </div>
                  <div class="controls">
                     <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pAdminCreate_domain_backupmx'] . ":"; ?></span>
                     <?php $checked = ($tBackupmx == 'on') ? 'checked="checked"' : ''; ?>
                     <input style="margin-top: -4px;" class="flat" type="checkbox" value='on' name="fBackupmx" <?php print $checked; ?> />
                  </div>
                  &nbsp;
                  <div class="controls">
                     <?php
                        echo "<a class='btn' href='list-domain.php" . htmlentities($_SESSION['list_domain_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
                     ?>
                     <td colspan="3" class="hlp_center"><input class="btn btn-info" type="submit" name="submit" value="<?php print $PALANG['pAdminCreate_domain_button']; ?>" />
                  </div>
               <div class="controls">
                  <td colspan="3" class="standout"><?php print $tMessage; ?>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
