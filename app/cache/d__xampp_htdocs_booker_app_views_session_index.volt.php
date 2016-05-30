<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
    <title>Login</title>
    <!-- Bootstrap -->
    <?php echo $this->tag->stylesheetLink('public/css/bootstrap_old/bootstrap.min.css'); ?>
    <!--Custom -->
     <?php echo $this->tag->stylesheetLink('public/css/custom/login.css'); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pr-wrap">
                <div class="pass-reset">
                    <label>
                        Enter the email you signed up with</label>
                    <input type="email" placeholder="Email" />
                    <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                </div>
            </div>
            <div class="wrap">
                <p class="form-title">
                    Sign In</p>
                <form class="login" action="session/start" method="post">
                
                <?php echo $this->flashSession->output(); ?>
                
                <input type="text" name="email" placeholder="Employee email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" value="Sign In" class="btn btn-success btn-sm" />
                <!--<div class="remember-forgot">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" />
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot-pass-content">
                            <a href="javascription:void(0)" class="forgot-pass">Forgot Password</a>
                        </div>
                        </div>
                    </div>-->
                </form>
            </div>
        </div>
    </div>
    <div class="posted-by">Created by: Pavel Shirmovski</a></div>
</div>

    
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo $this->tag->javascriptInclude('public/js/jquery/jquery.min.js'); ?>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->tag->javascriptInclude('public/js/bootstrap/bootstrap.min.js'); ?>
    <script>/*
     $(document).ready(function () {
        $('.forgot-pass').click(function(event) {
        $(".pr-wrap").toggleClass("show-pass-reset");
    }); 
    
     $('.pass-reset-submit').click(function(event) {
        $(".pr-wrap").removeClass("show-pass-reset");
    }); 
});*/
    </script>
  </body>
</html>