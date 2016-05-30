{% extends "index.volt" %}

{% block head %} 
{{ get_title() }}
<!-- Bootstrap -->
{{ stylesheet_link("css/bootstrap_old/bootstrap.min.css") }}
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
{% endblock %}


{% block content%} 

{{ flashSession.output()}}
<div class="page-header">
  <h3 style="width: 960px; margin:0 auto; text-align:center">List of employees</h3>
   <a href="{{ url('calendar/index/1')}}" class="btn btn-primary btn-lg" style="width: 12%;margin: 0% auto 0% 85%;">
    <span class="glyphicon glyphicon-home"></span>Back To My Calendar </a>
</div>

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    {% for user in users %}
    {% if loop.first %}
    
    <table class="table table-striped custab">
        <thead>
            <a href="{{ url('users/new')}}" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new Employee</a>
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
                {% endif %}
            <tr>
                <td>{{ loop.index }}</td>
                <td>{{ user.name }}</td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="edit/{{ user.employee_id}}">
                        <span class="glyphicon glyphicon-edit"></span> Edit</a>
                    <a href="delete/{{ user.employee_id }}" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
                {% if loop.last  %}
    </table>
            {% endif %}
            {% endfor %}
    </div>
</div>

{% endblock %}

{% block plugins %}  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ javascript_include("js/jquery/jquery.min.js") }}
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ javascript_include("js/bootstrap/bootstrap.min.js") }}
    
{% endblock %} 