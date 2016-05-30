<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   

<?php echo $this->tag->getTitle(); ?>
<?php echo $this->tag->stylesheetLink('public/css/bootstrap/bootstrap.min.css'); ?>
<?php echo $this->tag->stylesheetLink('public/css/custom/book.css'); ?>
<!--datePicker CSS -->
<?php echo $this->tag->stylesheetLink('public/datepicker/css/bootstrap-datetimepicker.min.css'); ?>

<!-- JS -->
<?php echo $this->tag->javascriptInclude('public/js/jquery/jquery.min.js'); ?>
<?php echo $this->tag->javascriptInclude('public/js/custom/manipulateRoomNum.js'); ?>
<script>
$(document).ready(function() {
    getRoomNum();
});

</script>



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
        <div class="col-md-12 col-xs-12">
            <div class="col-md-5 col-xs-9 col-xs-offset-2">
                <h3 class="text-muted">Boardroom Booker
                    <span class="small">Boardroom <span id="room_no">1</span></span>
                </h3>
            </div>
            <div class="col-md-3 col-md-offset-1 col-xs-12">
                <div class="col-md-6 col-md-offset-3 col-xs-7 col-xs-offset-4">
                    <a id="back" href="<?php echo $this->url->get('calendar/index/1'); ?>" class="btn btn-warning btn-md"><span class="glyphicon glyphicon-home"></span>Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="dropdown col-xs-4 col-xs-offset-4 col-sm-3 col-sm-offset-3 col-md-2 col-md-offset-5">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-   expanded="true">Choose Room #
                <span class="caret"></span>
            </button>
                <ul class="dropdown-menu" id="Menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="1">1</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="2">2</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="3">3</a></li>
                </ul>
        </div>
    </div>
    <div class="row col-md-8 col-md-offset-2 well">
        <form role="form" action="" method="post">
            <h5>1. Booked for</h5>
                <div class="col-md-12 columns">
                    <div class="form-group">
                    <label class="col-md-12 control-label">Employee:</label>
                        <div class="col-md-4 selectContainer">
                            <select name="names" class="form-control" single>
                            <?php if ($user['admin_role'] == 0) { ?>
                                    <option value="<?php echo $user['id']; ?>" selected="selected"><?php echo $user['name']; ?></option>
                            <?php } else { ?>
                                <?php foreach ($allEmployees as $Employee) { ?>
                                    <option value="<?php echo $Employee->employee_id; ?>"><?php echo $Employee->name; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>    
                <h5>2. I would like to book this meeting</h5>
                <div class="col-md-3 columns">
                    <div class="form-group">
                        <label for="name">Select Month:</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' name="month" class="form-control" value="<?php if (isset($postVars['month'])) { ?><?php echo $postVars['month']; ?><?php } ?>" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 columns">
                    <div class="form-group">
                        <label for="name">Select Day:</label>
                        <div class='input-group date' id='datetimepicker2'>
                            <input type='text' name="day" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 columns">
                    <div class="form-group">
                    <label for="name"><!--Select--> Year:</label>
                        <div class='input-group date col-md-3' id='datetimepicker3'>
                            <input type='text' name="year" class="form-control"  readonly/>
                           <!-- <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>-->
                        </div>
                    </div>
                </div>
                <h5>3. Specify what the time and end of the meeting (This will be what people see on the calendar)</h5>
                <div class="col-md-3 columns">
                    <div class="form-group">
                        <label for="name">Select Start Time:</label>
                        <div class='input-group date' id='datetimepicker4'>
                            <input type='text' name="startTime" class="form-control" value="<?php if (isset($postVars['startTime'])) { ?><?php echo $postVars['startTime']; ?><?php } ?>"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time">
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 columns">
                    <div class="form-group">
                        <label for="name">Select End Time:</label>
                        <div class='input-group date col-md-4' id='datetimepicker5'>
                            <input type='text' name="endTime" class="form-control" value="<?php if (isset($postVars['endTime'])) { ?><?php echo $postVars['endTime']; ?><?php } ?>"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time">
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                 <h5>4. Enter the specifics for the meeting. (This will be what people see when they click on an event link.)</h5>
                <div class="col-md-12 column-textarea">
                    <div class="form-group">
                        <label for="name">Add comments to this event:</label>
                        <div class='input-group date col-md-6'>
                            <textarea name="description" class="form-control" style="resize:none;" rows="3" ><?php if (isset($postVars['description'])) { ?><?php echo $postVars['description']; ?><?php } ?></textarea>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-pencil">
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                 <h5>5. Is this going to be a recurring event?</h5>
                <div class="col-md-12 columns">
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="option1" id="negative" value="No" <?php if (isset($postVars['option1']) && $postVars['option1'] == 'Yes') { ?> <?php } else { ?> checked = "checked" <?php } ?>>
                                    No
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="option1" id="positive" value="Yes" <?php if (isset($postVars['option1']) && $postVars['option1'] == 'Yes') { ?> checked = "checked"  <?php } else { ?> <?php } ?>>
                                    Yes
                            </label>
                        </div>
                    </div>
                </div>
                <h5 class="recur">6. If it is recurring, specify  weekly, bi-weekly, or monthly.</h5>
                <div class="col-md-12 recur ">
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="option2" id="weekly" value="weekly" <?php if (isset($postVars['option1']) && $postVars['option1'] == 'Yes' && $postVars['option2'] == 'weekly') { ?> checked = "checked"  <?php } else { ?> <?php } ?>>
                                    weekly
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="option2" id="bi-weekly" value="bi-weekly" <?php if (isset($postVars['option1']) && $postVars['option1'] == 'Yes' && $postVars['option2'] == 'bi-weekly') { ?> checked = "checked"  <?php } else { ?> <?php } ?>>
                                    bi-weekly
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="option2" id="monthly" value="monthly" <?php if (isset($postVars['option1']) && $postVars['option1'] == 'Yes' && $postVars['option2'] == 'monthly') { ?> checked = "checked" <?php } else { ?> <?php } ?>>
                                    monthly
                            </label>
                        </div>
                    
                     <p class="small">If weekly or bi-weekly, specify the number of weeks for it to keep recurring. If monthly, specify the number of months. (If you choose  "bi-weekly" and put in an odd number of weeks, the computer will round down).</p>
                    <p class="small col-md-12">Duration(max 4 weeks)</p>    
                        <div class="col-md-2 inputContainer">
                        <?php if (isset($postVars['option1']) && $postVars['option1'] == 'Yes' && $postVars['option2'] == 'monthly') { ?> 
                            <input class="form-control" type="number" name="quantity" maxlength="1"  min="2" max="4" step="1" value="<?php echo trim($postVars['quantity']); ?>" pattern="[2]{1}" readonly />
                        <?php } elseif (isset($postVars['option1']) && $postVars['option1'] == 'Yes' && $postVars['option2'] == 'bi-weekly') { ?>    
                            <input class="form-control" type="number" name="quantity" maxlength="1"  min="2" max="3" step="1" value="<?php echo trim($postVars['quantity']); ?>" pattern="[2-3]{1}" />    
                        <?php } elseif (isset($postVars['option1']) && $postVars['option1'] == 'Yes' && $postVars['option2'] == 'weekly') { ?>    
                            <input class="form-control" type="number" name="quantity" maxlength="1"  min="2" max="4" step="1" value="<?php echo trim($postVars['quantity']); ?>" pattern="[2-4]{1}" />
                        <?php } else { ?>
                            <input class="form-control" type="number" name="quantity" maxlength="1"  min="2" max="4" step="1" value="2" pattern="[2-4]{1}" />
                        
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-4 column-button">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                </div>
            </form>
    </div>
</div>         

    
      

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <?php echo $this->tag->javascriptInclude('public/js/custom/recurringInputsManipulation.js'); ?>
    <?php echo $this->tag->javascriptInclude('public/js/custom/dateTimePickerFunctions.js'); ?>
    
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->tag->javascriptInclude('public/js/bootstrap/bootstrap.min.js'); ?>
    <?php echo $this->tag->javascriptInclude('public/fullcalendar/lib/moment.min.js'); ?>
    <?php echo $this->tag->javascriptInclude('public/fullcalendar/lib/moment-with-locales.min.js'); ?>
    
    
    <!--Datepicker -->
    <?php echo $this->tag->javascriptInclude('public/datepicker/js/bootstrap-datetimepicker.min.js'); ?>
    
    
    <!-- Additional css library -->
    <?php echo $this->tag->stylesheetLink('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'); ?>
 
<?php if ($this->flashSession->has('success')) { ?>

<!--Success Modal Templates-->
    <div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="glyphicon glyphicon-check"></i>
                </div>
                <div class="modal-title">Success</div>
                <div class="modal-body"><?php echo $this->flashSession->output(); ?></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End Success Modal Templates-->
<script>
    $('.modal-success').modal({
        show: true
    });    
</script>
<?php } ?>

<?php if ($this->flashSession->has('warning')) { ?>

 <!--Danger Modal Templates-->
    <div id="modal-danger" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="glyphicon glyphicon-fire"></i>
                </div>
                <div class="modal-title">Warning!</div>

                <div class="modal-body"><?php echo $this->flashSession->output(); ?> </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End Danger Modal Templates-->
    <script>
    $('.modal-danger').modal({
        show: true
    });
    
    </script>
<?php } ?>


  </body>
</html>