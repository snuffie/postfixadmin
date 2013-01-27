<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
      <div class="columns">
         <div class="six-columns">
               <h3 class="thin underline">Skicka mail</h3>
               <fieldset class="fieldset fields-list">
                  <legend class="legend"><?php print $PALANG['pSendmail_welcome']; ?></legend>
                  <div class="field-block button-height">
                     <label for="validation-email" class="label"><b><?php print $PALANG['pSendmail_admin'] . ":"; ?>
                  <?php print $SESSID_USERNAME; ?></b></label>
                     <input type="text" name="validation-email" id="validation-email" class="input validate[required,custom[email]]" placeholder="<?php print $PALANG['pSendmail_to']; ?>">
                  </div>
                   <div class="field-block button-height">
                     <label for="file" class="label"><b>Titel</b></label>
                     <input type="text" class="input" value="" placeholder="<?php print $PALANG['pSendmail_subject']; ?>" type="text" name="fSubject" value="<?php print $PALANG['pSendmail_subject_text']; ?>">
                  </div>
                  <div class="field-block button-height">
                     <label for="file" class="label"><b>Meddelande</b></label>
                     <textarea name="autoexpanding" id="autoexpanding" class="input full-width autoexpanding" style="overflow: hidden; resize: none; height: 140px;"><?php print $CONF['welcome_text']; ?></textarea>
                  </div>
                  <div class="field-drop button-height">
                     <input class="button blue-gradient glossy" type="submit" name="submit" value="<?php print $PALANG['pSendmail_button']; ?>" />
                  </div>
               </fieldset>
         </div>
      </div> 
         <div id="edit_form">
            <form name="mailbox" class="formbox" method="post">
               <div class="control-group">
                  <legend></legend>
               </div>
               <div class="control-group">
                  <label></label>
               </div>
               <div class="control-group">
                  <div class="controls">
                     <input class="flat" placeholder="<?php print $PALANG['pSendmail_to']; ?>" type="text" name="fTo" />
                  </div>
               </div>
               <div class="control-group">
                  <div class="contronls">
                     <input class="flat" placeholder="<?php print $PALANG['pSendmail_subject']; ?>" type="text" name="fSubject" value="<?php print $PALANG['pSendmail_subject_text']; ?>" />
                  </div>
               </div>
               <div class="control-group">
                  <div class="controls">
                     <textarea class="flat" placeholder="<?php print $PALANG['pSendmail_body']; ?>" rows="10" cols="60" name="fBody"><?php print $CONF['welcome_text']; ?></textarea>
                  </div>
               </div>
               <div class="control-group">
                  <div class="controls">
                     <input class="btn btn-info" type="submit" name="submit" value="<?php print $PALANG['pSendmail_button']; ?>" />
                  </div>
               </div>
               <div class="control-group">
                  <?php print $tMessage; ?>
               </div>
            </form>
         </div>
