{% extends "index.volt" %}

{% block head %} 

{{ get_title() }}
{{ stylesheet_link("public/css/bootstrap/bootstrap.min.css") }}
{{ stylesheet_link("public/css/custom/done.css") }}

{% endblock %}



{% block content %}

<div class="container">
    <div class="page-header">
        <h2 class="text-center">Boardroom Booker<span class="small">Boardroom 1</span></h2>
    </div>
 	<div class="row">
		<div class="well clearfix">
		  <h3>B.B. Details</h3>
          <b>{{ flashSession.output()}}</b>
          <div class="form-group last">    
            <div class="col-xs-6 col-xs-offset-4 col-sm-6 col-sm-offset-4">
        	   <button type="button" name="close" class="btn btn-success" onclick="self.close()">Close this window</button>
      		</div>
          </div>
		</div>
	</div>
</div>    
{% endblock %}


{% block plugins %}  

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ javascript_include("public/js/jquery/jquery.min.js") }}
    {{ javascript_include("public/js/custom/addLoading.js") }}
{% endblock %}
