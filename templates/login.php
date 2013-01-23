<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<div id="login">
<div class="loginbox">
   <form name="login" method="post" class="form-horizontal" style="margin-bottom: 0;">
         <legend style="border-bottom: 1px solid rgba(100, 100, 100, 0.245); color: #cecece; font-weight: lighter;"><?php print $PALANG['pLogin_welcome']; ?></legend>
         <div class="control-group" style="margin-top: 30px;">
            <div class="input-prepend">
               <span class="add-on"><i class="icon-user"></i></span><input class="flat" placeholder="<?php print $PALANG['pLogin_username']; ?>" type="text" name="fUsername" value="" />
            </div>
         </div>
         <div class="control-group">
            <div class="input-prepend">
               <span class="add-on"><i class="glyphicon-keys"></i></span><input class="flat" placeholder="<?php print $PALANG['pLogin_password']; ?>" type="password" name="fPassword" />
            </div>
         </div>
         <div class="control-group">
            <?php echo language_selector(); ?>
         </div>
         <div class="control-group">               
            <input class="btn btn-block btn-info" style="max-width: 220px;" type="submit" name="submit" value="<?php print $PALANG['pLogin_button']; ?>" />
         </div>
               <?php print $tMessage; ?>
      </fieldset>
   </form>
   </div>
   <script type="text/javascript">
   	document.login.fUsername.focus();
   </script>
   <!-- <div style="margin-top: 20px;">
      <a href="users/"><h6><?php print $PALANG['pLogin_login_users']; ?><h4></a>
   </div> -->
</div>
<?php /* vim: set ft=php expandtab softtabstop=3 tabstop=3 shiftwidth=3: */ ?>
