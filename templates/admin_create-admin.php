<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<style>
label, b {
   font: 12px/1.7em 'Open Sans';
   font-weight: bold;
}
</style> 
<form name="create_admin" method="post">
   <div class="columns">
      <div class="eight-columns">
         <fieldset class="fieldset fields-list">
            <legend class="legend"><?php print $PALANG['pAdminCreate_admin_welcome']; ?></legend>
            <div class="field-block button-height">
               <label class="label"><b><?php print $pAdminCreate_admin_username_text; ?>:</b></label>
               <input class="input" type="text" placeholder="Namn" name="fUsername" value="<?php print $tUsername; ?>" />
            </div>
            <div class="field-block button-height">
               <label class="label"><b><?php print $PALANG['pAdminCreate_admin_password']; ?>:</b></label>
               <input class="input" placeholder="<?php print $PALANG['pAdminCreate_admin_password']; ?>" type="password" name="fPassword" />
               <?php print $pAdminCreate_admin_password_text; ?>
            </div>
            <div class="field-block button-height">
               <label class="label"><b><?php print $PALANG['pAdminCreate_admin_password']; ?> igen:</b></label>
               <input class="input" type="password" name="fPassword2" />
               <?php print $pAdminCreate_admin_password_text; ?>
               <div style="clear: both;"></div>
            </div>

            <div class="field-block button-height">
               <label class="label"><b>Välj <?php print $PALANG['pAdminCreate_admin_address']; ?>:</b><div style="clear: both;"></div>
                  <small style="color: #333;">(Håll <b>Ctrl</b> eller <b>Cmd</b> <div style="clear: both;"></div>för att markera flera)</small></label>
                     <select class="select multiple silver-gradient" style="width: 192px;" name="fDomains[]" size="8" multiple>
                     <?php
                     for ($i = 0; $i < sizeof ($list_domains); $i++)
                     {  
                        if (in_array ($list_domains[$i], $tDomains))
                        {
                           print "<option value=\"" . $list_domains[$i] . "\" selected=\"selected\">" . $list_domains[$i] . "</option>\n";
                        }
                        else
                        {
                           print "<option value=\"" . $list_domains[$i] . "\">" . $list_domains[$i] . "</option>\n";
                        }
                     }
                     ?>
                     <select>
            </div>
            <div class="field-drop button-height" style="height: 30px;">
                     <?php
                     echo "<a class='button big' href='list-admin.php" . htmlentities($_SESSION['list_admin_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
                  ?>
                  <input class="button blue-gradient glossy big" type="submit" name="submit" value="<?php print $PALANG['pAdminCreate_admin_button']; ?>" /><div style="clear:both;"></div>
                  <?php print $tMessage; ?>
            </div>
         </fieldset>
      </div>
   </div> 
</form>