{% extends "index.volt" %}

{% block head %} 

{{ get_title() }}
{{ stylesheet_link("public/css/bootstrap/bootstrap.min.css") }}
{{ stylesheet_link("public/css/custom/update.css") }}
<!--datePicker CSS -->
{{ stylesheet_link("public/datepicker/css/bootstrap-datetimepicker.min.css") }}

{% endblock %}
{% block content %}

<div class="container">
    <div class="page-header">
        <h2 class="text-center">Boardroom Booker<span class="small">Boardroom {{room_number}}</span></h2>
    </div>
    <div class="row">
		<div class="well">
		      <h3><b>B.B. Details</b></h3>
			  <form class="form-horizontal" role="form" action="" method="post">
              
              {{ flashSession.output()}}
              
			  	<div class="form-group">
				      <label class="control-label col-xs-2 col-sm-2" for="email">When:</label>
			        	<div class="col-xs-3 col-sm-3">
				      		<div class='input-group date' id='datetimepicker1'>
				        		<input type="text" name="startTime" class="form-control" value="{{ startTime }}">
							<span class="input-group-addon">
                      						<span class="glyphicon glyphicon-time">
                       						</span>
                       				 	</span>    
        					</div>
      					</div>
                        <div class="col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-1">
				      		<div class='input-group date' id='datetimepicker2'>
				        		<input type="text" name="endTime" class="form-control" value="{{ endTime }}">
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
        					<textarea class="form-control" name="notes" rows="3">{{ eventDescription }}</textarea>
      					</div>
    				</div>
    				<div class="form-group">
    				      <label class="control-label col-xs-2 col-sm-2" for="text">Who:</label>
        				<div class="col-xs-6 col-sm-6">
        					<select class="form-control">
							<option value="{{ employeeName }}">{{ employeeName }}</option>
						</select>
        				</div>
    				</div>
                    <div class="form-group">
				      <label class="control-label col-xs-2 col-sm-2" for="text">Submitted:</label>
      					<div class="col-xs-5 col-sm-5">          
        					<input type="text" readonly="readonly" class="form-control" value="{{ submitted }}">
      					</div>
    				</div>
                    {% if user['name'] == employeeName or user['admin_role'] == 1 %} 
    				<div class="form-group" style="{{ display }}">        
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
                    {% else %}
                    <div class="form-group last">    
                        <div class="col-xs-6 col-xs-offset-4 col-sm-6 col-sm-offset-4">
        					<button type="button" name="close" class="btn btn-success" onclick="self.close()">Close this window</button>
      					</div>
    				</div>
                    {% endif%}
  			  </form>
			</div>
		</div>
    </div>    
{% endblock %}


{% block plugins %}  

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ javascript_include("public/js/jquery/jquery.min.js") }}
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
    {{ javascript_include("public/js/bootstrap/bootstrap.min.js") }}
    {{ javascript_include("public/fullcalendar/lib/moment.min.js") }}
    
    
    <!--Datepicker -->
    {{ javascript_include("public/datepicker/js/bootstrap-datetimepicker.min.js") }}
    

{% endblock %}
