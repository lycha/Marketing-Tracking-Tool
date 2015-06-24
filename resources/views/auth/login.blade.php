<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Krzysztof Jackowski">
    <link rel="shortcut icon" href="{{ asset('assets/img/aiesec_launcher.png') }}" />

    <title>AIESEC in Poland | Marketing tracking tool</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/gritter/css/jquery.gritter.css') }}" />
    <link rel="stylesheet" href="http://css-spinners.com/css/spinner/flower.css" type="text/css">   
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lineicons/style.css') }}">   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" role="form" method="POST" action="{{ url('/auth/login') }}">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="User name" autofocus>
		            <br>
		            <input type="password" class="form-control" name="password">
		            <br>
		            <input type="checkbox" name="remember"> Remember Me
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="{{ url('/password/email') }}"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		            
		                @if (count($errors) > 0)
						<div class="alert alert-danger registration">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
		
		        </div>
		
		        
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{URL::to('/')}}/assets/js/jquery.js"></script>
    <script src="{{URL::to('/')}}/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{URL::to('/')}}/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("{{URL::to('/')}}/assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>



