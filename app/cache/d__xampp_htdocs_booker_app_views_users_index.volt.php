<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
<?php echo $this->tag->getTitle(); ?>
<!-- Bootstrap -->
<?php echo $this->tag->stylesheetLink('css/bootstrap_old/bootstrap.min.css'); ?>
<!--Custom -->
    <style>
    
        .container {
    
            width: 960px;
            margin: 10% auto;
    
        }
    
        .custab {
            border: 1px solid #ccc;
            padding: 5px;
            margin: 5% 0;
            box-shadow: 3px 3px 2px #ccc;
            transition: 0.5s;
        }
        .custab:hover{
            box-shadow: 3px 3px 0px transparent;
            transition: 0.5s;
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
   

<?php echo $this->flashSession->output(); ?>
<div class="page-header">
  <h3 style="width: 960px; margin:0 auto; text-align:center">List of employees</h3>
   <a href="<?php echo $this->url->get('calendar/index/1'); ?>" class="btn btn-primary btn-lg" style="width: 12%;margin: 0% auto 0% 85%;">
    <span class="glyphicon glyphicon-home"></span>Back To My Calendar </a>
</div>

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <?php $v11951778411iterator = $users; $v11951778411incr = 0; $v11951778411loop = new stdClass(); $v11951778411loop->length = count($v11951778411iterator); $v11951778411loop->index = 1; $v11951778411loop->index0 = 1; $v11951778411loop->revindex = $v11951778411loop->length; $v11951778411loop->revindex0 = $v11951778411loop->length - 1; ?><?php foreach ($v11951778411iterator as $user) { ?><?php $v11951778411loop->first = ($v11951778411incr == 0); $v11951778411loop->index = $v11951778411incr + 1; $v11951778411loop->index0 = $v11951778411incr; $v11951778411loop->revindex = $v11951778411loop->length - $v11951778411incr; $v11951778411loop->revindex0 = $v11951778411loop->length - ($v11951778411incr + 1); $v11951778411loop->last = ($v11951778411incr == ($v11951778411loop->length - 1)); ?>
    <?php if ($v11951778411loop->first) { ?>
    
    <table class="table table-striped custab">
        <thead>
            <a href="<?php echo $this->url->get('users/new'); ?>" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new Employee</a>
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
                <?php } ?>
            <tr>
                <td><?php echo $v11951778411loop->index; ?></td>
                <td><?php echo $user->name; ?></td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="edit/<?php echo $user->employee_id; ?>">
                        <span class="glyphicon glyphicon-edit"></span> Edit</a>
                    <a href="delete/<?php echo $user->employee_id; ?>" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
                <?php if ($v11951778411loop->last) { ?>
    </table>
            <?php } ?>
            <?php $v11951778411incr++; } ?>
    </div>
</div>


    
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo $this->tag->javascriptInclude('js/jquery/jquery.min.js'); ?>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->tag->javascriptInclude('js/bootstrap/bootstrap.min.js'); ?>
    

  </body>
</html>