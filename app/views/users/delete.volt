{% extends "index.volt" %}

{% block head %} 
    <title>Delete User</title>
    <!-- Bootstrap -->
    {{ stylesheet_link("css/bootstrap_old/bootstrap.min.css") }}
    <!--Custom -->
   <style>
	
   </style>	 
    
    
    {% endblock %}


{% block content%}
<div class="container" style="width: 960px; margin: 10% auto; width: 30%;">
<a href="../index" class="btn btn-primary btn-lg" style="width: 45%; margin:-40% auto 0% 80%;"><span class="glyphicon glyphicon-home"></span>
                        Back To Employees </a>

    <div class="row" style="text-align:center">
        {{ flashSession.output()}}
        
    </div>
</div>    


{% endblock %}

{% block plugins %}  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ javascript_include("js/jquery/jquery.min.js") }}
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ javascript_include("js/bootstrap/bootstrap.min.js") }}
    
{% endblock %}    
