<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<style>
label, b {
   font: 12px/1.7em 'Open Sans';
   font-weight: bold;
}
</style> 
<form name="edit_domain" method="post">
   <div class="columns">
      <div class="eight-columns">
         <fieldset class="fieldset fields-list">
            <legend class="legend"><?php print $PALANG['pAdminEdit_domain_welcome']; ?></legend>
            <div class="field-block button-height">
               <label class="label"><b><?php print $PALANG['pAdminEdit_domain_domain']; ?>:</b></label>
               <input class="input disabled" type="text" disabled="true" placeholder="Ingen beskrivning" value="<?php print $domain; ?>" />
            </div>
            <div class="field-block button-height">
               <label class="label"><b><?php print $PALANG['pAdminEdit_domain_description']; ?>:</b></label>
               <input class="input" placeholder="<?php print $PALANG['pAdminEdit_domain_description']; ?>" type="text" name="fDescription" value="<?php print htmlspecialchars($tDescription, ENT_QUOTES); ?>" />
            </div>
            <div class="field-block button-height">
               <label class="label"><b>Antal alias:</b></label>
               <input placeholder="<?php print $PALANG['pAdminEdit_domain_aliases']; ?>" class="input" type="text" name="fAliases" value="<?php print $tAliases; ?>" /><div style="clear: both;"></div>
               <?php print $PALANG['pAdminEdit_domain_aliases_text']; ?>
            </div>
            <div class="field-block button-height">
               <label class="label"><b>Antal brevlådor:</b></label>
               <input placeholder="<?php print $PALANG['pAdminEdit_domain_mailboxes']; ?>" class="input" type="text" name="fMailboxes" value="<?php print $tMailboxes; ?>" /><div style="clear: both;"></div>
               <?php print $PALANG['pAdminEdit_domain_mailboxes_text']; ?>
            </div>
            
            <?php if ($CONF['quota'] == 'YES') { ?>
               <div class="field-block button-height">
                  <label class="label"><b>Max storlek (alla brevlådor):</b></label>
                  <input class="flat" placeholder="<?php print $PALANG['pAdminEdit_domain_maxquota']; ?>" type="text" name="fMaxquota" value="<?php print $tMaxquota; ?>" />
            <?php print $PALANG['pAdminEdit_domain_maxquota_text']; ?>
            </div>
            <?php } if ($CONF['transport'] == 'YES') { ?>
            <div class="field-block button-height">
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


            <div class="field-block button-height">
               <?php $checked = (!empty ($tBackupmx)) ? 'checked=checked' : ''; ?>
               <input class="checkbox mid-margin-left" type="checkbox" name="fBackupmx" <?php print $checked; ?> />
               <b style='font-size: 90%;'><?php print $PALANG['pAdminEdit_domain_backupmx']; ?></b>
               <label class="label" for="checkbox-2"><b>Sätt server till backup MX:</b></label>
               <div style="clear: both;"></div>
               <?php $checked = (!empty ($tActive)) ? 'checked=checked' : ''; ?>
               <input class="checkbox mid-margin-left" type="checkbox" name="fBackupmx" <?php print $checked; ?> />
               <b style='font-size: 90%;'><?php print $PALANG['pAdminEdit_domain_active']; ?></b>
               <label class="label" for="checkbox-2"><b>Stäng av domän</b></label>
            </div>
            <div class="field-drop button-height" style="height: 30px;">
               <?php
                  echo "<a class='button big' href='list-domain.php" . htmlentities($_SESSION['list_domain_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
               ?>
               <input class="button blue-gradient glossy big" type="submit" name="submit" value="<?php print $PALANG['pAdminEdit_domain_button']; ?>" /><div style="clear:both;"></div>
               <?php print $tMessage; ?>
            </div>

         </fieldset>
      </div>
   </div> 
</form>