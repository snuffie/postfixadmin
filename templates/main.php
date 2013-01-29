<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<table class="table table-striped">
   <tr>
      <td nowrap><a class="button huge green-gradient full-width" target="_top" href="list-virtual.php"><?php print $PALANG['pMenu_overview']; ?></a></td>
      <td style="padding-top: 12px;"><?php print $PALANG['pMain_overview']; ?></td>
   </tr>
   <tr>
      <td nowrap><a class="button huge anthracite-gradient full-width" target="_top" href="create-mailbox.php"><?php print $PALANG['pMenu_create_mailbox']; ?></a></td>
      <td style="padding-top: 12px;"><?php print $PALANG['pMain_create_mailbox']; ?></td>
   </tr>
   <tr>
      <td nowrap><a class="button huge anthracite-gradient full-width" target="_top" href="create-alias.php"><?php print $PALANG['pMenu_create_alias']; ?></a></td>
      <td style="padding-top: 12px;"><?php print $PALANG['pMain_create_alias']; ?></td>
   </tr>
   <tr>
      <td nowrap><a class="button huge anthracite-gradient full-width" target="_top" href="list-domain.php"><?php print $PALANG['pMenu_list_domain']; ?></a></td>
      <td style="padding-top: 12px;"><?php print $PALANG['pMain_list_domain']; ?></td>
   </tr>
   <tr>
      <td nowrap><a class="button big full-width" target="_top" href="fetchmail.php"><?php print $PALANG['pMenu_fetchmail']; ?></a></td>
      <td style="padding-top: 12px;"><?php print $PALANG['pMain_fetchmail']; ?></td>
   </tr>
<?php if ($CONF['sendmail'] == "YES") { ?>
   <tr>
      <td nowrap><a class="button big full-width" target="_top" href="sendmail.php"><?php print $PALANG['pMenu_sendmail']; ?></a></td>
      <td style="padding-top: 12px;"><?php print $PALANG['pMain_sendmail']; ?></td>
   </tr>
<?php } ?>
   <tr>
      <td nowrap><a class="button full-width" target="_top" href="password.php"><?php print $PALANG['pMenu_password']; ?></a></td>
      <td style="padding-top: 12px;"><?php print $PALANG['pMain_password']; ?></td>
   </tr>
   <tr>
      <td nowrap><a class="button full-width" target="_top" href="viewlog.php"><?php print $PALANG['pMenu_viewlog']; ?></a></td>
      <td style="padding-top: 12px;"><?php print $PALANG['pMain_viewlog']; ?></td>
   </tr>
   <tr>
      <td nowrap><a class="button full-width" target="_top" href="logout.php"><?php print $PALANG['pMenu_logout']; ?></a></td>
      <td style="padding-top: 12px;"><?php print $PALANG['pMain_logout']; ?></td>
   </tr>
</table>
</div>



