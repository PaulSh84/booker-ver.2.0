<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   

<?php echo $this->tag->getTitle(); ?>
<?php echo $this->tag->stylesheetLink('public/css/bootstrap/bootstrap.min.css'); ?>
<?php echo $this->tag->stylesheetLink('public/css/custom/done.css'); ?>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  

<div class="container">
    <div class="page-header">
        <h2 class="text-center">Boardroom Booker<span class="small">Boardroom 1</span></h2>
    </div>
 	<div class="row">
		<div class="well clearfix">
		  <h3>B.B. Details</h3>
          <b><?php echo $this->flashSession->output(); ?></b>
          <div class="form-group last">    
            <div class="col-xs-6 col-xs-offset-4 col-sm-6 col-sm-offset-4">
        	   <button type="button" name="close" class="btn btn-success" onclick="self.close()">Close this window</button>
      		</div>
          </div>
		</div>
	</div>
</div>    

    
      

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo $this->tag->javascriptInclude('public/js/jquery/jquery.min.js'); ?>
    <?php echo $this->tag->javascriptInclude('public/js/custom/addLoading.js'); ?>

  </body>
</html>