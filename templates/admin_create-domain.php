<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<style>
label, b {
   font: 12px/1.7em 'Open Sans';
   font-weight: bold;
}
</style>
<form name="create_domain" method="post">
   <div class="columns">
      <div class="eight-columns">
         <fieldset class="fieldset fields-list">
            <legend class="legend"><?php print $PALANG['pAdminCreate_domain_welcome']; ?></legend>
            <div class="field-block button-height">
               <label class="label"><b><?php print $PALANG['pAdminCreate_domain_domain']; ?>:</b></label>
               <input class="input" type="text" placeholder="Domännamn.se" name="fDomain" value="<?php print htmlentities($tDomain); ?>" /><div style="clear: both;"></div>
               <?php print $pAdminCreate_domain_domain_text; ?>
            </div>
            <div class="field-block button-height">
                  <label class="label"><b><?php print $PALANG['pAdminCreate_domain_description']; ?>:</b></label>
                  <input class="input" type="text" placeholder="<?php print $PALANG['pAdminCreate_domain_description']; ?>" name="fDescription" value="<?php print htmlentities($tDescription); ?>" />
            </div>
            <div class="field-block button-height">
                  <label class="label"><b><?php print $PALANG['pAdminCreate_domain_aliases']; ?>:</b></label>
                  <input class="input" placeholder="<?php print $PALANG['pAdminCreate_domain_aliases']; ?>" type="text" name="fAliases" value="<?php print $tAliases; ?>" />
                  <div style="clear: both;"></div>
                  <?php print $PALANG['pAdminCreate_domain_aliases_text']; ?>
            </div>
            <div class="field-block button-height">
                  <label class="label"><b><?php print $PALANG['pAdminCreate_domain_mailboxes']; ?>:</b></label>
                  <input class="input" placeholder="<?php print $PALANG['pAdminCreate_domain_mailboxes']; ?>" type="text" name="fMailboxes" value="<?php print $tMailboxes; ?>" />
                  <div style="clear: both;"></div>
                  <?php print $PALANG['pAdminCreate_domain_mailboxes_text']; ?>
            </div>
            <div class="field-block button-height">
                  <label for="validation-email" class="label"><b><?php print $PALANG['pAdminCreate_domain_maxquota']; ?>:</b></label>
                  <input class="input" type="text" name="fMaxquota" value="<?php print $tMaxquota; ?>" />
                  <?php print $PALANG['pAdminCreate_domain_maxquota_text']; ?>
            </div>
            <?php if ($CONF['transport'] == 'YES') { ?>
               <div class="field-block button-height">
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
            <div class="field-block button-height">
                  <?php $checked = ($tDefaultaliases == 'on') ? 'checked="checked"' : ''; ?>
                  <input id="checkbox-2" class="checkbox mid-margin-left" type="checkbox" value="on" name="fDefaultaliases" <?php print $checked; ?> />
                  <b style='font-size: 90%;'><?php print $PALANG['pAdminCreate_domain_defaultaliases_text']; ?></b>
                  <label class="label" for="checkbox-2"><b><?php print $PALANG['pAdminCreate_domain_defaultaliases']; ?>:</b></label>
                  <div style="clear: both;"></div>
                  <?php $checked = ($tBackupmx == 'on') ? 'checked="checked"' : ''; ?>
                  <input id="checkbox-2" class="checkbox mid-margin-left" type="checkbox" value="on" name="fBackupmx" <?php print $checked; ?> />
                  <b style='font-size: 90%;'><?php print $PALANG['pAdminCreate_domain_backupmx']; ?></b>
                  <label class="label" for="checkbox-2"><b><?php print $PALANG['pAdminCreate_domain_backupmx_text']; ?>:</b></label>
            </div>
            <div class="field-drop button-height" style="height: 30px;">
                     <?php
                        echo "<a class='button big' href='list-domain.php" . htmlentities($_SESSION['list_domain_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
                     ?>
                  <input class="button blue-gradient glossy big" type="submit" name="submit" value="<?php print $PALANG['pAdminCreate_domain_button']; ?>" /><div style="clear:both;"></div>
                  <?php print $tMessage; ?>
            </div>
         </fieldset>
      </div>
   </div> 
</form>