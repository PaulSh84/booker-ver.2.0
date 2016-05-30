<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  {% block head %}
     <!-- Bootstrap -->
    <link href="/booker/public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
     <!--Custom -->
    
  {% endblock %}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  {% block content %} {% endblock %}
    
    {% block plugins %}  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/booker/public/js/jquery/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/booker/public/js/bootstrap/bootstrap.min.js"></script>
    
    <script>
     $(document).ready(function () {
        $('.forgot-pass').click(function(event) {
        $(".pr-wrap").toggleClass("show-pass-reset");
    }); 
    
     $('.pass-reset-submit').click(function(event) {
        $(".pr-wrap").removeClass("show-pass-reset");
    }); 
});
    </script>{% endblock %}
  </body>
</html>