{% extends "index.volt" %}

{% block head %}
{{ get_title() }}
<!-- CSS -->
{{ stylesheet_link("public/fullcalendar/fullcalendar.css") }}
{{ stylesheet_link("public/css/bootstrap/bootstrap.min.css") }}
{{ stylesheet_link("public/css/bootstrap/justified-nav.css") }}
{{ stylesheet_link("public/css/custom/index.css") }}
<!-- JS code -->
{{ javascript_include("public/fullcalendar/lib/jquery.min.js") }}
{{ javascript_include("public/js/bootstrap/bootstrap.min.js") }}
{{ javascript_include("public/fullcalendar/lib/moment.min.js") }}
{{ javascript_include("public/fullcalendar/fullcalendar.js") }}
{{ javascript_include("public/js/custom/manipulateRoomNum.js") }}

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
          events: {{ data }},
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
{% endblock %}

{% block content %}

<div class="wrapper">
<div class="container">
    <div class="masthead">
        <h3 class="text-muted">Boardroom Booker</h3>
            <div class="button_dropdown">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ user['name'] }} <span class="caret"></span></button>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a id="book" href="{{url('calendar/book')}}">Book It!</a></li>
                        <li><a href="{{url('users/index')}}">Employee List</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('session/end')}}">Log Out</a></li>
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
{{ flashSession.output()}}


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


{% endblock %}

{% block plugins %}
 <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    {{ javascript_include("public/js/custom/fetchEvents.js") }}



{% endblock %}
