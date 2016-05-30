{% extends "index.volt" %}

{% block head %} 
    <title>Login</title>
    <!-- Bootstrap -->
    {{ stylesheet_link("public/css/bootstrap_old/bootstrap.min.css") }}
    <!--Custom -->
     {{ stylesheet_link("public/css/custom/login.css") }}
{% endblock %}
{% block content%} 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pr-wrap">
                <div class="pass-reset">
                    <label>
                        Enter the email you signed up with</label>
                    <input type="email" placeholder="Email" />
                    <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                </div>
            </div>
            <div class="wrap">
                <p class="form-title">
                    Sign In</p>
                <form class="login" action="session/start" method="post">
                
                {{ flashSession.output()}}
                
                <input type="text" name="email" placeholder="Employee email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" value="Sign In" class="btn btn-success btn-sm" />
                <!--<div class="remember-forgot">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" />
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot-pass-content">
                            <a href="javascription:void(0)" class="forgot-pass">Forgot Password</a>
                        </div>
                        </div>
                    </div>-->
                </form>
            </div>
        </div>
    </div>
    <div class="posted-by">Created by: Pavel Shirmovski</a></div>
</div>
{% endblock %}

{% block plugins %}  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ javascript_include("public/js/jquery/jquery.min.js") }}
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ javascript_include("public/js/bootstrap/bootstrap.min.js") }}
    <script>/*
     $(document).ready(function () {
        $('.forgot-pass').click(function(event) {
        $(".pr-wrap").toggleClass("show-pass-reset");
    }); 
    
     $('.pass-reset-submit').click(function(event) {
        $(".pr-wrap").removeClass("show-pass-reset");
    }); 
});*/
    </script>{% endblock %}