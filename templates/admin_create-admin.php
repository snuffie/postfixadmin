<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div id="edit_form"> 
   <form name="create_admin" method="post" class="formbox" style="width: 500px;">
      <legend><?php print $PALANG['pAdminCreate_admin_welcome']; ?></legend>
      <div class="control-group">
         <input class="flat" type="text" placeholder="<?php print $pAdminCreate_admin_username_text; ?>" name="fUsername" value="<?php print $tUsername; ?>" />
      </div>
      <div class="control-group">
         <input class="flat" placeholder="<?php print $PALANG['pAdminCreate_admin_password']; ?>" type="password" name="fPassword" />
         <?php print $pAdminCreate_admin_password_text; ?>
      </div>
      <div class="control-group">
         <input class="flat" type="password" placeholder="<?php print $PALANG['pAdminCreate_admin_password2'];?>" name="fPassword2" />
      </div>
      <div class="control-group">
         <label style="margin-left: -160px;">
         <?php print $PALANG['pAdminCreate_admin_address'] . ":"; ?>
         </label>
         
         <select name="fDomains[]" size="10" multiple="multiple">
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
         </select>
         
      </div>
      <div class="control-group">
         <?php
            echo "<a class='btn' href='list-admin.php" . htmlentities($_SESSION['list_admin_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
         ?>
         <td colspan="3" class="hlp_center"><input class="btn btn-primary" type="submit" name="submit" value="<?php print $PALANG['pAdminCreate_admin_button']; ?>" />
      </div>
      <div class="control-group">
         <td colspan="3" class="standout"><?php print $tMessage; ?>
      </div>
   </form>
</div>
