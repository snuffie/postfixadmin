<?php if( !defined('POSTFIXADMIN') ) die( "This file cannot be used standalone." ); ?>
<html class="no-js linen" lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

   <title>Profit Mail Administration</title>
   <meta name="description" content="">
   <meta name="author" content="">

   <!-- http://davidbcalhoun.com/2010/viewport-metatag -->
   <meta name="HandheldFriendly" content="True">
   <meta name="MobileOptimized" content="320">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

   <!-- For all browsers -->
   <link rel="stylesheet" href="css/reset.css?v=1">
   <link rel="stylesheet" href="css/style.css?v=1">
   <link rel="stylesheet" href="css/colors.css?v=1">
   <link rel="stylesheet" media="print" href="css/print.css?v=1">
   <!-- For progressively larger displays -->
   <link rel="stylesheet" media="only all and (min-width: 480px)" href="css/480.css?v=1">
   <link rel="stylesheet" media="only all and (min-width: 768px)" href="css/768.css?v=1">
   <link rel="stylesheet" media="only all and (min-width: 992px)" href="css/992.css?v=1">
   <link rel="stylesheet" media="only all and (min-width: 1200px)" href="css/1200.css?v=1">
   <!-- For Retina displays -->
   <link rel="stylesheet" media="only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)" href="css/2x.css?v=1">

   <!-- Additional styles -->
   <link rel="stylesheet" href="css/styles/form.css?v=1">
   <link rel="stylesheet" href="css/styles/switches.css?v=1">

   <!-- Login pages styles -->
   <link rel="stylesheet" media="screen" href="css/login.css?v=1">

   <!-- JavaScript at bottom except for Modernizr -->
   <script src="js/libs/modernizr.custom.js"></script>

   <!-- For Modern Browsers -->
   <link rel="shortcut icon" href="img/favicons/favicon.png">
   <!-- For everything else -->
   <link rel="shortcut icon" href="img/favicons/favicon.ico">
   <!-- For retina screens -->
   <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicons/apple-touch-icon-retina.png">
   <!-- For iPad 1-->
   <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicons/apple-touch-icon-ipad.png">
   <!-- For iPhone 3G, iPod Touch and Android -->
   <link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon.png">

   <!-- iOS web-app metas -->
   <meta name="apple-mobile-web-app-capable" content="yes">
   <meta name="apple-mobile-web-app-status-bar-style" content="black">

   <!-- Startup image for web apps -->
   <link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
   <link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
   <link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

   <!-- Microsoft clear type rendering -->
   <meta http-equiv="cleartype" content="on">

   <!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx -->
   <meta name="application-name" content="Developr Admin Skin">
   <meta name="msapplication-tooltip" content="Cross-platform admin template.">
   <meta name="msapplication-starturl" content="http://www.display-inline.fr/demo/developr">
   <!-- These custom tasks are examples, you need to edit them to show actual pages -->
   <meta name="msapplication-task" content="name=Agenda;action-uri=http://www.display-inline.fr/demo/developr/agenda.html;icon-uri=http://www.display-inline.fr/demo/developr/img/favicons/favicon.ico">
   <meta name="msapplication-task" content="name=My profile;action-uri=http://www.display-inline.fr/demo/developr/profile.html;icon-uri=http://www.display-inline.fr/demo/developr/img/favicons/favicon.ico">
</head>
<body>

   <script src="js/libs/jquery-1.8.2.min.js"></script>
   <script src="js/setup.js"></script>

   <!-- Template functions -->
   <script src="js/jquery.placeholder.min.js"></script>
   <script src="js/developr.input.js"></script>
   <script src="js/developr.message.js"></script>
   <script src="js/developr.notify.js"></script>
   <script src="js/developr.tooltip.js"></script>
   <script type="text/javascript">
/* <![CDATA[ */
$(function() {
    var input = document.createElement("input");
    if(('placeholder' in input)==false) { 
        $('[placeholder]').focus(function() {
            var i = $(this);
            if(i.val() == i.attr('placeholder')) {
                i.val('').removeClass('placeholder');
                if(i.hasClass('password')) {
                    i.removeClass('password');
                    this.type='password';
                }           
            }
        }).blur(function() {
            var i = $(this);    
            if(i.val() == '' || i.val() == i.attr('placeholder')) {
                if(this.type=='password') {
                    i.addClass('password');
                    this.type='text';
                }
                i.addClass('placeholder').val(i.attr('placeholder'));
            }
        }).blur().parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                var i = $(this);
                if(i.val() == i.attr('placeholder'))
                    i.val('');
            })
        });
    }
});
/* ]]> */
</script>

<?php 
if (file_exists (realpath ("../".$CONF['developr_notify_js']))) {
    print "<script type=\"text/javascript\" href=\"../".htmlentities($CONF['developr_notify_js'])."\"></script>\n";
} else {
    print "<script type=\"text/javascript\" href=\"".htmlentities($CONF['developr_notify_js'])."\"></script>\n";
}

?>
<div id="container">
   <form name="login" method="post" id="form-login">
      <ul class="inputs black-input large">
         <li><span class="icon-user mid-margin-right"></span><input autocomplete="on" class="input-unstyled" id="login" placeholder="<?php print $PALANG['pLogin_username']; ?>" type="text" name="fUsername" value="" /></li>
         <li><span class="icon-lock mid-margin-right"></span><input autocomplete="on" class="input-unstyled" id="pass" placeholder="<?php print $PALANG['pLogin_password']; ?>" type="password" name="fPassword" value="" /></li>
         <li><?php echo language_selector(); ?></li>
      </ul>
            <button class="button blue-gradient full-width huge" type="submit" name="submit"><?php print $PALANG['pLogin_button']; ?></button>
               <?php print $tMessage; ?>

   </form>
      <hgroup id="login-title" class="margin-top" style="margin-bottom: 10px;">
         <h1 class="login-title-image"></h1>
      </hgroup>
   
   <script type="text/javascript">
   	document.login.fUsername.focus();
   </script>
   <!-- <div style="margin-top: 20px;">
      <a href="users/"><h6><?php print $PALANG['pLogin_login_users']; ?><h4></a>
   </div> -->
</div>
<?php /* vim: set ft=php expandtab softtabstop=3 tabstop=3 shiftwidth=3: */ ?>


   <script>
      /*
       * How do I hook my login script to this?
       * --------------------------------------
       *
       * This script is meant to be non-obtrusive: if the user has disabled javascript or if an error occurs, the login form
       * works fine without ajax.
       *
       * The only part you need to edit is the login script between the EDIT SECTION tags, which does inputs validation
       * and send data to server. For instance, you may keep the validation and add an AJAX call to the server with the
       * credentials, then redirect to the dashboard or display an error depending on server return.
       *
       * Or if you don't trust AJAX calls, just remove the event.preventDefault() part and let the form be submitted.
       */

      $(document).ready(function()
      {
         /*
          * JS login effect
          * This script will enable effects for the login page
          */
            // Elements
         var doc = $('html').addClass('js-login'),
            container = $('#container'),
            formLogin = $('#form-login'),

            // If layout is centered
            centered;

         /******* EDIT THIS SECTION *******/

         /*
          * AJAX login
          * This function will handle the login process through AJAX
          */
         formLogin.submit(function(event)
         {
            // Values
            var login = $.trim($('#login').val()),
               pass = $.trim($('#pass').val()),
               lang = $.trim($('#lang').val());

            // Check inputs
            if (login.length === 0)
            {
               // Display message
               displayError('Please fill in your login');
               return false;
            }
            else if (pass.length === 0)
            {
               // Remove empty login message if displayed
               formLogin.clearMessages('Please fill in your login');

               // Display message
               displayError('Please fill in your password');
               return false;
            }
            else
            {
               // Remove previous messages
               formLogin.clearMessages();

               // Show progress
               displayLoading('Checking credentials...');
               event.preventDefault();

               // Stop normal behavior
               event.preventDefault();

               url = "ajaxlogin.php"

                 $.ajax(url, {
                     type: "POST",
                     data: {
                          login: login,
                          pass: pass,
                          lang: lang,
                       },

                       success: function(data)
                       {
                          if (data.length > 0)
                          {
                             document.location.href = 'main.php';
                          }
                          else
                          {
                             formLogin.clearMessages();
                             displayError('Invalid user/password, please try again');
                          }
                       },
                       error: function()
                       {
                          formLogin.clearMessages();
                          displayError('Error while contacting server, please try again');
                       }
                 });
                
               // $.post($this.url, { data: pass, login });

               // Simulate server-side check
               setTimeout(function() {
                  document.location.href = './'
               }, 1000);
            }
         });

         /******* END OF EDIT SECTION *******/

         // Handle resizing (mostly for debugging)
         function handleLoginResize()
         {
            // Detect mode
            centered = (container.css('position') === 'absolute');

            // Set min-height for mobile layout
            if (!centered)
            {
               container.css('margin-top', '');
            }
            else
            {
               if (parseInt(container.css('margin-top'), 10) === 0)
               {
                  centerForm(false);
               }
            }
         };

         // Register and first call
         $(window).bind('normalized-resize', handleLoginResize);
         handleLoginResize();

         /*
          * Center function
          * @param boolean animate whether or not to animate the position change
          * @param string|element|array any jQuery selector, DOM element or set of DOM elements which should be ignored
          * @return void
          */
         function centerForm(animate, ignore)
         {
            // If layout is centered
            if (centered)
            {
               var siblings = formLogin.siblings(),
                  finalSize = formLogin.outerHeight();

               // Ignored elements
               if (ignore)
               {
                  siblings = siblings.not(ignore);
               }

               // Get other elements height
               siblings.each(function(i)
               {
                  finalSize += $(this).outerHeight(true);
               });

               // Setup
               container[animate ? 'animate' : 'css']({ marginTop: -Math.round(finalSize/2)+'px' });
            }
         };

         // Initial vertical adjust
         centerForm(false);

         /**
          * Function to display error messages
          * @param string message the error to display
          */
         function displayError(message)
         {
            // Show message
            var message = formLogin.message(message, {
               append: false,
               arrow: 'bottom',
               classes: ['red-gradient'],
               animate: false             // We'll do animation later, we need to know the message height first
            });

            // Vertical centering (where we need the message height)
            centerForm(true, 'fast');

            // Watch for closing and show with effect
            message.bind('endfade', function(event)
            {
               // This will be called once the message has faded away and is removed
               centerForm(true, message.get(0));

            }).hide().slideDown('fast');
         }

         /**
          * Function to display loading messages
          * @param string message the message to display
          */
         function displayLoading(message)
         {
            // Show message
            var message = formLogin.message('<strong>'+message+'</strong>', {
               append: false,
               arrow: 'bottom',
               classes: ['blue-gradient', 'align-center'],
               stripes: true,
               darkStripes: false,
               closable: false,
               animate: false             // We'll do animation later, we need to know the message height first
            });

            // Vertical centering (where we need the message height)
            centerForm(true, 'fast');

            // Watch for closing and show with effect
            message.bind('endfade', function(event)
            {
               // This will be called once the message has faded away and is removed
               centerForm(true, message.get(0));

            }).hide().slideDown('fast');
         }
      });

      // What about a notification?
      // notify('Profit Mail Administration', 'Här kan ni administera mail konton. Editera befintliga konton eller skapa nya. ', {
      //    autoClose: false,
      //    delay: 2500,
      //    icon: 'img/demo/icon.png'
      // });

</script>
<script>
if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0) {
   $(window).load(function(){
      $('input:-webkit-autofill').each(function(){
         var text = $(this).val();
         var name = $(this).attr('name');
         $(this).after(this.outerHTML).remove();
         $('input[name=' + name + ']').val(text);
      });
   });
}
</script>
</body>
</html>