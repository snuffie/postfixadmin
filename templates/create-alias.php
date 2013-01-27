<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<!-- 'breadcrumb' -->
<div class="row-fluid">
   <div class="span12">
      <div class="span6 offset3">
         <div id="edit_form">
            <form name="alias" class="formbox" method="post">
               <div class="control-group">
                  <legend><?php print $PALANG['pCreate_alias_welcome']; ?></legend>
               </div>
               <div class="control-group">
                  <div class="controls">
                     <input class="flat" type="text" name="fAddress" value="<?php print $tAddress; ?>" placeholder="<?php print $PALANG['pCreate_alias_address']; ?>" />
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
                  </div>
               </div>
               <?php print $pCreate_alias_address_text; ?>
               <div class="control-group">
                  <label><?php print $PALANG['pCreate_alias_goto'] . ":"; ?></label>
                  <textarea class="flat" rows="10" cols="60" name="fGoto"><?php print $tGoto; ?></textarea>
               </div>
               <div class="control-group">
                  <span style="font: 13px/1.7em 'Open Sans';"><?php print $PALANG['pCreate_alias_active'] . ":"; ?></span>
                  <input style="margin-top: -3px;" class="flat" type="checkbox" name="fActive" checked />
               </div>
               <div class="control-group">
                  <?php
                      echo "<a class='button' href='list-virtual.php?domain=" . htmlentities($_SESSION['list_virtual_sticky_domain'], ENT_QUOTES) . "'>" . "Avbryt" . "</a>";
                  ?>
                  <input class="button blue-gradient" type="submit" name="submit" value="<?php print $PALANG['pCreate_alias_button']; ?>" />
               </div>

               <div class="control-group">
                  <label class="help_text"><?php print $PALANG['pCreate_alias_catchall_text']; ?></label>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
