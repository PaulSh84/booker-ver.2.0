<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   

<?php echo $this->tag->getTitle(); ?>
<?php echo $this->tag->stylesheetLink('public/css/bootstrap/bootstrap.min.css'); ?>
<?php echo $this->tag->stylesheetLink('public/css/custom/update.css'); ?>
<!--datePicker CSS -->
<?php echo $this->tag->stylesheetLink('public/datepicker/css/bootstrap-datetimepicker.min.css'); ?>


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
        <h2 class="text-center">Boardroom Booker<span class="small">Boardroom <?php echo $room_number; ?></span></h2>
    </div>
    <div class="row">
		<div class="well">
		      <h3><b>B.B. Details</b></h3>
			  <form class="form-horizontal" role="form" action="" method="post">
              
              <?php echo $this->flashSession->output(); ?>
              
			  	<div class="form-group">
				      <label class="control-label col-xs-2 col-sm-2" for="email">When:</label>
			        	<div class="col-xs-3 col-sm-3">
				      		<div class='input-group date' id='datetimepicker1'>
				        		<input type="text" name="startTime" class="form-control" value="<?php echo $startTime; ?>">
							<span class="input-group-addon">
                      						<span class="glyphicon glyphicon-time">
                       						</span>
                       				 	</span>    
        					</div>
      					</div>
                        <div class="col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-1">
				      		<div class='input-group date' id='datetimepicker2'>
				        		<input type="text" name="endTime" class="form-control" value="<?php echo $endTime; ?>">
							<span class="input-group-addon">
                      						<span class="glyphicon glyphicon-time">
                       						</span>
                       				 	</span>    
        					</div>
      					</div>
    				</div>
    				<div class="form-group">
				      <label class="control-label col-xs-2 col-sm-2" for="text">Notes:</label>
      					<div class="col-xs-9 col-sm-9">          
        					<textarea class="form-control" name="notes" rows="3"><?php echo $eventDescription; ?></textarea>
      					</div>
    				</div>
    				<div class="form-group">
    				      <label class="control-label col-xs-2 col-sm-2" for="text">Who:</label>
        				<div class="col-xs-6 col-sm-6">
        					<select class="form-control">
							<option value="<?php echo $employeeName; ?>"><?php echo $employeeName; ?></option>
						</select>
        				</div>
    				</div>
                    <div class="form-group">
				      <label class="control-label col-xs-2 col-sm-2" for="text">Submitted:</label>
      					<div class="col-xs-5 col-sm-5">          
        					<input type="text" readonly="readonly" class="form-control" value="<?php echo $submitted; ?>">
      					</div>
    				</div>
                    <?php if ($user['name'] == $employeeName || $user['admin_role'] == 1) { ?> 
    				<div class="form-group" style="<?php echo $display; ?>">        
      					<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="checkbox">
          						<label><input type="checkbox" name="option" value="yes"><b> Apply to all occurrences?</b></label>
        					</div>
      					</div>
    				</div>
                    <div class="form-group last">        
      		            <div class="col-xs-5 col-xs-offset-2 col-sm-5 col-sm-offset-2">
        					<button type="submit" name="update" class="btn btn-warning">UPDATE</button>
      					</div>
      					<div class="col-xs-2 col-sm-2">		
						<button type="submit" name="delete" class="btn btn-danger">DELETE</button>
      					</div>
                    </div>    
                    <?php } else { ?>
                    <div class="form-group last">    
                        <div class="col-xs-6 col-xs-offset-4 col-sm-6 col-sm-offset-4">
        					<button type="button" name="close" class="btn btn-success" onclick="self.close()">Close this window</button>
      					</div>
    				</div>
                    <?php } ?>
  			  </form>
			</div>
		</div>
    </div>    

    
      

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo $this->tag->javascriptInclude('public/js/jquery/jquery.min.js'); ?>
<script>
$(document).ready(function () {
$('#datetimepicker1').datetimepicker({
    format: 'H:mm',
    stepping: 15,
});
$('#datetimepicker2').datetimepicker({
    format: 'H:mm',
    stepping: 15,
    });
});
</script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->tag->javascriptInclude('public/js/bootstrap/bootstrap.min.js'); ?>
    <?php echo $this->tag->javascriptInclude('public/fullcalendar/lib/moment.min.js'); ?>
    
    
    <!--Datepicker -->
    <?php echo $this->tag->javascriptInclude('public/datepicker/js/bootstrap-datetimepicker.min.js'); ?>
    


  </body>
</html>