<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div id="edit_form">
<form name="broadcast-message" style="width: 500px;" class="formbox" method="post">
   <div class="control-group">
      <td colspan="3"><h3><?php print $PALANG['pBroadcast_title']; ?></h3>
   </div>
   <div class="control-group">
      <h6><?php print $PALANG['pBroadcast_from'] . ":"; ?></h6>
      <h6><?php print $CONF['admin_email']; ?></h6>
   </div>
   <div class="control-group">
      <input class="flat" placeholder="<?php print $PALANG['pBroadcast_name']; ?>" size="43" type="text" name="name"/>
   </div>
   <div class="control-group">
      <input class="flat" placeholder="<?php print $PALANG['pBroadcast_subject']; ?>" size="43" type="text" name="subject"/>
   </div>
   <div class="control-group">
      <textarea class="flat" placeholder="<?php print $PALANG['pBroadcast_message']; ?>" cols="40" rows="6" name="message"></textarea>
   </div>
   <div class="control-group">
         <?php
         if($error == 1){
            echo '<br/><span class="error_msg">'.$PALANG['pBroadcast_error_empty'].'</span><br/><br/>' ;
         }
         ?>
         <?php
          echo "<a class='btn' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
         ?>
         <input class="btn btn-primary" type="submit" name="submit" value="<?php print $PALANG['pBroadcast_send']; ?>" />
   </div>
</form>
</div>
