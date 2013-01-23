<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<!-- 'breadcrumb' -->
<div id="edit_form">
<form name="alias" class="formbox" style="width: 500px;" method="post">
   <div class="control-group">
      <td colspan="3"><h3><?php print $PALANG['pCreate_alias_welcome']; ?></h3>
   </div>
   <div class="control-group">
      <span style="font-size: 15px;"><?php print $PALANG['pCreate_alias_address']; ?></span>
      <input class="flat" type="text" name="fAddress" value="<?php print $tAddress; ?>" />
      <span style="font-size: 17px;">@</span>
      <select class="flat" name="fDomain">
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
      <?php print $pCreate_alias_address_text; ?>
      
   </div>
   <div class="control-group">
      <label><?php print $PALANG['pCreate_alias_goto'] . ":"; ?></label>
      <td colspan="2"><textarea class="flat" rows="10" cols="60" name="fGoto"><?php print $tGoto; ?></textarea>
   </div>
   <div class="control-group">
      <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pCreate_alias_active'] . ":"; ?></span>
      <input style="margin-top: -3px;" class="flat" type="checkbox" name="fActive" checked />
   </div>
   <div class="control-group">
      <?php
          echo "<a class='btn' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
      ?>
      <td colspan="3" class="hlp_center"><input class="btn btn-primary" type="submit" name="submit" value="<?php print $PALANG['pCreate_alias_button']; ?>" />
   </div>
   <div class="control-group">
      <h6><td colspan="3" class="standout"><?php print $tMessage; ?></h6>
   </div>
   <div class="control-group">
      <h6><td colspan="3" class="help_text"><?php print $PALANG['pCreate_alias_catchall_text']; ?></h6>
   </div>
</form>
</div>
