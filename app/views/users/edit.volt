{% extends "index.volt" %}

{% block head %} 
    <title>Users</title>
    <!-- Bootstrap -->
    {{ stylesheet_link("css/bootstrap/bootstrap.min.css") }}
    <!--Custom -->
    
    {% endblock %}


{% block content%} 
<div class="container">



    <div class="row col-md-6 col-md-offset-2 custyle">
    
    <a href="../index" class="btn btn-primary btn-md pull-right" style="margin: 3% 0% 0%;">Back to Employees List</a>
    
    <div class="row">
        <h1>Edit Profile:</h1>
        
        {{ flashSession.output()}}
         
     <form class="form-horizontal" action="" role="form" method="post">
          <div class="form-group">
            <label class="col-md-3 control-label">Name:</label>
            <div class="col-md-8">
              <input class="form-control" name ="name" type="text" value="{{ edit.getName() }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Email:</label>
            <div class="col-md-8">
              <input class="form-control" name="email" type="text" value="{{ edit.getEmail()}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Admin Role:</label>
            <div class="col-md-2">
              <input class="form-control" type="number" name="admin" value="{{ edit.getAdminRole() }}" min="0" max="1">
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

{% endblock %}

{% block plugins %}  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ javascript_include("js/jquery/jquery.min.js") }}
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ javascript_include("js/bootstrap/bootstrap.min.js") }}
    
{% endblock %}    