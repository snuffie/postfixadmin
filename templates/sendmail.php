<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<style>
label {
   font: 14px/1.7em 'Open Sans';
   font-weight: bold;
}
</style>
<form name="mailbox" method="post">
   <div class="columns">
         <div class="eight-columns">
            <fieldset class="fieldset fields-list">
               <legend class="legend"><?php print $PALANG['pSendmail_welcome']; ?></legend>
               <div class="field-block button-height">
                  <label class="label"><b><?php print $PALANG['pSendmail_admin'] . ":"; ?></b></label>
                  <input type="text" class="input disabled" disabled="true" value="<?php print $SESSID_USERNAME; ?>">
               </div>
               <div class="field-block button-height">
                  <label for="validation-email" class="label"><b><?php print $PALANG['pSendmail_to']; ?>:</b></label>
                  <input type="text" name="fTo" id="validation-email" class="input validate[required,custom[email]]" placeholder="Epost address">
               </div>
                <div class="field-block button-height">
                  <label for="file" class="label"><b>Ämne:</b></label>
                  <input type="text" class="input" value="" placeholder="<?php print $PALANG['pSendmail_subject']; ?>" type="text" name="fSubject" value="<?php print $PALANG['pSendmail_subject_text']; ?>:">
               </div>
               <div class="field-block button-height">
                  <label for="file" class="label"><b>Meddelande:</b></label>
                  <textarea name="fBody" id="autoexpanding" class="input full-width autoexpanding" placeholder="<?php print $PALANG['pSendmail_body']; ?>" style="overflow: hidden; resize: none; height: 140px;"><?php print $CONF['welcome_text']; ?></textarea>
               </div>
               <div class="field-drop button-height" style="height: 30px;">
                  <input class="button blue-gradient glossy huge full-width" style="margin-top: -15px;" type="submit" name="submit" value="<?php print $PALANG['pSendmail_button']; ?>" /><div style="clear:both;"></div>
                  <?php print $tMessage; ?>
               </div>
            </fieldset>
         </div>
   </div> 
</form>