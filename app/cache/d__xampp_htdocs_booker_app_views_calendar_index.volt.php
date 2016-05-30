<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  
<?php echo $this->tag->getTitle(); ?>
<!-- CSS -->
<?php echo $this->tag->stylesheetLink('public/fullcalendar/fullcalendar.css'); ?>
<?php echo $this->tag->stylesheetLink('public/css/bootstrap/bootstrap.min.css'); ?>
<?php echo $this->tag->stylesheetLink('public/css/bootstrap/justified-nav.css'); ?>
<?php echo $this->tag->stylesheetLink('public/css/custom/index.css'); ?>
<!-- JS code -->
<?php echo $this->tag->javascriptInclude('public/fullcalendar/lib/jquery.min.js'); ?>
<?php echo $this->tag->javascriptInclude('public/js/bootstrap/bootstrap.min.js'); ?>
<?php echo $this->tag->javascriptInclude('public/fullcalendar/lib/moment.min.js'); ?>
<?php echo $this->tag->javascriptInclude('public/fullcalendar/fullcalendar.js'); ?>
<?php echo $this->tag->javascriptInclude('public/js/custom/manipulateRoomNum.js'); ?>

<script>
$(document).ready(function() {


addRoomNum();

// page is now ready, initialize the calendar...
    
    $('#calendar').fullCalendar({
        //height: 600,
        aspectRatio:1.75,

        // put your options and callbacks here
          header:{
             left:   '',
             center: 'prev, title next',
             right:  ''
          },
          weekMode: {
            fixedWeekCount: false,

          },
          events: <?php echo $data; ?>,
          eventTextColor: '2C9892',
          eventClick: function(event) {
            if(event.url) {
          
            window.open(event.url, "", "toolbar=no, scrollbars=no, resizable=no, top=150, left=250, width=700, height=550");
            
            return false;
            }
          },
    })
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
  

<div class="wrapper">
<div class="container">
    <div class="masthead">
        <h3 class="text-muted">Boardroom Booker</h3>
            <div class="button_dropdown">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user['name']; ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a id="book" href="<?php echo $this->url->get('calendar/book'); ?>">Book It!</a></li>
                        <li><a href="<?php echo $this->url->get('users/index'); ?>">Employee List</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $this->url->get('session/end'); ?>">Log Out</a></li>
                    </ul>
                </div>
            </div>
        <nav class="">
            <ul class="nav nav-justified">
                <li>
                    <a href="1">Boardroom 1</a>
                </li>
                <li>
                    <a href="2">Boardroom 2</a>
                </li>
                <li>
                    <a href="3">Boardroom 3</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="container">
<?php echo $this->flashSession->output(); ?>


        <p class="lead text-center">Current Boardroom selected:
            <span id="room_no" class="label label-success"> </span>
        </p>

        <div class="row">
            <div class="col-md-12">
                <div id='calendar'>
                </div>
            </div>

        </div>
</div>


<div class="modal"><!-- Modal when reloading the page --></div>



    
    
 <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <?php echo $this->tag->javascriptInclude('public/js/custom/fetchEvents.js'); ?>




  </body>
</html>