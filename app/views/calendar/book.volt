{# app/views/calendar/book.volt #}
{% extends "index.volt" %}

{% block head %} 

{{ get_title() }}
{{ stylesheet_link("public/css/bootstrap/bootstrap.min.css") }}
{{ stylesheet_link("public/css/custom/book.css") }}
<!--datePicker CSS -->
{{ stylesheet_link("public/datepicker/css/bootstrap-datetimepicker.min.css") }}

<!-- JS -->
{{ javascript_include("public/js/jquery/jquery.min.js") }}
{{ javascript_include("public/js/custom/manipulateRoomNum.js") }}
<script>
$(document).ready(function() {
    getRoomNum();
});

</script>


{% endblock %}

{% block content %}

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
                    <a id="back" href="{{ url('calendar/index/1') }}" class="btn btn-warning btn-md"><span class="glyphicon glyphicon-home"></span>Back</a>
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
                            {% if user['admin_role'] == 0 %}
                                    <option value="{{ user['id'] }}" selected="selected">{{ user['name'] }}</option>
                            {% else %}
                                {% for Employee in allEmployees %}
                                    <option value="{{ Employee.employee_id }}">{{ Employee.name }}</option>
                                {% endfor%}
                                {% endif %}
                            </select>
                        </div>
                    </div>
                </div>    
                <h5>2. I would like to book this meeting</h5>
                <div class="col-md-3 columns">
                    <div class="form-group">
                        <label for="name">Select Month:</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' name="month" class="form-control" value="{% if postVars['month'] is defined %}{{ postVars['month']}}{% endif%}" />
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
                            <input type='text' name="startTime" class="form-control" value="{% if postVars['startTime'] is defined %}{{ postVars['startTime']}}{% endif%}"/>
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
                            <input type='text' name="endTime" class="form-control" value="{% if postVars['endTime'] is defined %}{{ postVars['endTime']}}{% endif%}"/>
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
                            <textarea name="description" class="form-control" style="resize:none;" rows="3" >{% if postVars['description'] is defined %}{{ postVars['description']}}{% endif%}</textarea>
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
                                <input type="radio" name="option1" id="negative" value="No" {% if postVars['option1'] is defined and postVars['option1'] == "Yes" %} {% else %} checked = "checked" {%endif%}>
                                    No
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="option1" id="positive" value="Yes" {% if postVars['option1'] is defined and postVars['option1'] == "Yes" %} checked = "checked"  {% else %} {% endif %}>
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
                                <input type="radio" name="option2" id="weekly" value="weekly" {% if postVars['option1'] is defined and postVars['option1'] == "Yes" and postVars['option2'] == "weekly" %} checked = "checked"  {% else %} {% endif %}>
                                    weekly
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="option2" id="bi-weekly" value="bi-weekly" {% if postVars['option1'] is defined and postVars['option1'] == "Yes" and postVars['option2'] == "bi-weekly" %} checked = "checked"  {% else %} {% endif %}>
                                    bi-weekly
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="option2" id="monthly" value="monthly" {% if postVars['option1'] is defined and postVars['option1'] == "Yes" and postVars['option2'] == "monthly" %} checked = "checked" {% else %} {% endif %}>
                                    monthly
                            </label>
                        </div>
                    
                     <p class="small">If weekly or bi-weekly, specify the number of weeks for it to keep recurring. If monthly, specify the number of months. (If you choose  "bi-weekly" and put in an odd number of weeks, the computer will round down).</p>
                    <p class="small col-md-12">Duration(max 4 weeks)</p>    
                        <div class="col-md-2 inputContainer">
                        {% if postVars['option1'] is defined and postVars['option1'] == "Yes" and postVars['option2'] == "monthly" %} 
                            <input class="form-control" type="number" name="quantity" maxlength="1"  min="2" max="4" step="1" value="{{ postVars['quantity']|trim }}" pattern="[2]{1}" readonly />
                        {%elseif  postVars['option1'] is defined and postVars['option1'] == "Yes" and postVars['option2'] == "bi-weekly" %}    
                            <input class="form-control" type="number" name="quantity" maxlength="1"  min="2" max="3" step="1" value="{{ postVars['quantity']|trim }}" pattern="[2-3]{1}" />    
                        {%elseif  postVars['option1'] is defined and postVars['option1'] == "Yes" and postVars['option2'] == "weekly" %}    
                            <input class="form-control" type="number" name="quantity" maxlength="1"  min="2" max="4" step="1" value="{{ postVars['quantity']|trim }}" pattern="[2-4]{1}" />
                        {% else %}
                            <input class="form-control" type="number" name="quantity" maxlength="1"  min="2" max="4" step="1" value="2" pattern="[2-4]{1}" />
                        
                        {% endif %}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-4 column-button">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                </div>
            </form>
    </div>
</div>         
{% endblock %}

{% block plugins %}  

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    {{ javascript_include("public/js/custom/recurringInputsManipulation.js") }}
    {{ javascript_include("public/js/custom/dateTimePickerFunctions.js") }}
    
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ javascript_include("public/js/bootstrap/bootstrap.min.js") }}
    {{ javascript_include("public/fullcalendar/lib/moment.min.js") }}
    {{ javascript_include("public/fullcalendar/lib/moment-with-locales.min.js") }}
    
    
    <!--Datepicker -->
    {{ javascript_include("public/datepicker/js/bootstrap-datetimepicker.min.js") }}
    
    
    <!-- Additional css library -->
    {{ stylesheet_link("//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css") }}
 
{% if flashSession.has("success") %}

<!--Success Modal Templates-->
    <div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="glyphicon glyphicon-check"></i>
                </div>
                <div class="modal-title">Success</div>
                <div class="modal-body">{{ flashSession.output() }}</div>
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
{% endif %}

{% if flashSession.has("warning") %}

 <!--Danger Modal Templates-->
    <div id="modal-danger" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="glyphicon glyphicon-fire"></i>
                </div>
                <div class="modal-title">Warning!</div>

                <div class="modal-body">{{ flashSession.output() }} </div>
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
{% endif %}

{% endblock %}
