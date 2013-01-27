<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div class="row-fluid">
   <div class="span12">
      <div class="span6 offset3">
         <div id="edit_form">
            <form name="broadcast-message" class="formbox" method="post">
               <div class="control-group">
                  <legend><?php print $PALANG['pBroadcast_title']; ?></legend>
               </div>
               <div class="control-group">
                  <label><?php print $PALANG['pBroadcast_from'] . ":"; ?>
                  <?php print $CONF['admin_email']; ?></label>
               </div>
               <div class="control-group">
                  <div class="controls">
                     <input class="flat" placeholder="<?php print $PALANG['pBroadcast_name']; ?>" size="43" type="text" name="name"/>
                  </div>
               </div>
               <div class="control-group">
                  <div class="controls">
                     <input class="flat" placeholder="<?php print $PALANG['pBroadcast_subject']; ?>" size="43" type="text" name="subject"/>
                  </div>
               </div>
               <div class="control-group">
                  <div class="controls">
                     <textarea class="flat" placeholder="<?php print $PALANG['pBroadcast_message']; ?>" cols="40" rows="6" name="message"></textarea>
                  </div>
               </div>
               <div class="control-group">
                     <?php
                     if($error == 1){
                        echo '<br/><span class="alert alert-error">'.$PALANG['pBroadcast_error_empty'].'</span><br/><br/>' ;
                     }
                     ?>
                     <?php
                      echo "<a class='btn' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
                     ?>
                     <input class="btn btn-info" type="submit" name="submit" value="<?php print $PALANG['pBroadcast_send']; ?>" />
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

