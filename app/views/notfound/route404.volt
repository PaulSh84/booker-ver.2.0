{% extends "index.volt" %}

{% block head %} 
<title>Page Not Found!</title>
{{ stylesheet_link("public/css/bootstrap/bootstrap.min.css") }}

<style>
body
{ 
    margin: 0;
    padding: 0;
}
.container {
    margin: 10em auto;
}
.error-template {
    padding: 2em 1em;
    text-align: center;
}
.btn-lg{
    margin-top: 8px;
    margin-bottom: 8px;
}
</style>

{% endblock %}

{% block content %}

<div class="container">
    <div class="row">
        <div class="error-template">
            <h1>Oops!</h1>
            <h2>404 Not Found</h2>
            <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
            </div>
        </div>
        <div class="btn-toolbar text-center">
            <a href="{{ url('calendar/index/1') }}" role="button" class="btn btn-primary btn-lg">
                <span class="glyphicon glyphicon-home"></span> Back To My Calendar
            </a>
            <a href="mailto:pshirmovski@geeksforless.net" role="button" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-envelope"></span> Contact Admin
            </a>
        </div>    
    </div>    
</div>
{% endblock %}
{% block plugins %}  
{% endblock %}