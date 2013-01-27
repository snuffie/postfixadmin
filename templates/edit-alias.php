<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>

<div id="edit_form">
<form name="alias" class="formbox" method="post">
   <div class="control-group">
      <td colspan="3"><h3><?php print $PALANG['pEdit_alias_welcome']; ?></h3>
   </div>
   <div class="control-group">
      <h6><?php print $PALANG['pEdit_alias_address'] . ":"; ?></h6>
      <h6><?php print $fAddress; ?></h6>
   </div><br />
   <div class="control-group">
      <label><?php print $PALANG['pEdit_alias_goto'] . ":"; ?></label>
      
<textarea class="flat" rows="5" cols="60" name="fGoto">
<?php print $tGoto; ?>
</textarea>
   </div>
   <div class="control-group">
      <?php
          echo "<a class='btn' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
      ?>
      <td colspan="3" class="hlp_center"><input class="btn btn-primary" type="submit" name="submit" value="<?php print $PALANG['pEdit_alias_button']; ?>" />
   </div>
   <div class="control-group">
      <td colspan="3" class="standout"><?php print $tMessage; ?>
   </div>
</form>
</div>
