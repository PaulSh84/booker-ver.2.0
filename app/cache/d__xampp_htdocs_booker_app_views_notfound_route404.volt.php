<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
<title>Page Not Found!</title>
<?php echo $this->tag->stylesheetLink('public/css/bootstrap/bootstrap.min.css'); ?>

<style>
body
{ 
    margin: 0;
    padding: 0;
}
.container {
    margin: 10em auto;
}
.error-template {
    padding: 2em 1em;
    text-align: center;
}
.btn-lg{
    margin-top: 8px;
    margin-bottom: 8px;
}
</style>


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
        <div class="error-template">
            <h1>Oops!</h1>
            <h2>404 Not Found</h2>
            <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
            </div>
        </div>
        <div class="btn-toolbar text-center">
            <a href="<?php echo $this->url->get('calendar/index/1'); ?>" role="button" class="btn btn-primary btn-lg">
                <span class="glyphicon glyphicon-home"></span> Back To My Calendar
            </a>
            <a href="mailto:pshirmovski@geeksforless.net" role="button" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-envelope"></span> Contact Admin
            </a>
        </div>    
    </div>    
</div>

    
      

  </body>
</html>