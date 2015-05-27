<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - FREE Bootstrap Admin Template</title>

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
    @yield('header')
</head>
<body>
  <div id="loader"><div id="loader-inner"><div class="flower-loader"></div></div></div>
	  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      @include('includes.header')

       <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->

      @include('includes.sidebar')
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	@yield('content')
              
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Tool created by <a href="mailto:krzysztof.jackowski@aiesec.net?Subject=Marketing tracking tool">Krzysztof Jackowski</a>, Template by: 2014 - Alvarez.is
              
          </div>
      </footer>
      <!--footer end-->
  </section>

	

	<!-- Scripts -->
	    <!-- js placed at the end of the document so the pages load faster 
    <script src="{{ asset('assets/js/jquery.js') }}"></script>-->
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    
    <!--common script for all pages-->
    <script src="{{ asset('assets/js/common-scripts.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('assets/js/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/gritter-conf.js') }}"></script>

    @yield('scripts')
          <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

</body>
</html>
