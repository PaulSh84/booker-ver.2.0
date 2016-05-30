<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
    <title>Users</title>
    <!-- Bootstrap -->
    <?php echo $this->tag->stylesheetLink('css/bootstrap/bootstrap.min.css'); ?>
    <!--Custom -->
    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
<div class="container">



    <div class="row col-md-6 col-md-offset-2 custyle">
    
    <a href="../index" class="btn btn-primary btn-md pull-right" style="margin: 3% 0% 0%;">Back to Employees List</a>
    
    <div class="row">
        <h1>Edit Profile:</h1>
        
        <?php echo $this->flashSession->output(); ?>
         
     <form class="form-horizontal" action="" role="form" method="post">
          <div class="form-group">
            <label class="col-md-3 control-label">Name:</label>
            <div class="col-md-8">
              <input class="form-control" name ="name" type="text" value="<?php echo $edit->getName(); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Email:</label>
            <div class="col-md-8">
              <input class="form-control" name="email" type="text" value="<?php echo $edit->getEmail(); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Admin Role:</label>
            <div class="col-md-2">
              <input class="form-control" type="number" name="admin" value="<?php echo $edit->getAdminRole(); ?>" min="0" max="1">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="submit" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Clear">
            </div>
          </div>
        </form>
    </div>        
            
    </div>
</div>


    
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo $this->tag->javascriptInclude('js/jquery/jquery.min.js'); ?>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->tag->javascriptInclude('js/bootstrap/bootstrap.min.js'); ?>
    

  </body>
</html>