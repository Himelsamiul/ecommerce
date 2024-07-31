
<!DOCTYPE html>

<html lang="en">
<head>
    @notifyCss
  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  @php
        $title = App\Models\Title::latest()->first();
        @endphp
    	<title>{{optional($title)->title}}</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="aviato" />
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset ('frontend/images/favicon.png') }}" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{asset ('frontend/plugins/themefisher-font/style.css') }}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset ('frontend/plugins/bootstrap/css/bootstrap.min.css') }}">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="{{asset ('frontend/plugins/animate/animate.css') }}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{asset ('frontend/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{asset ('frontend/plugins/slick/slick-theme.css') }}">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset ('frontend/css/style.css') }}">

</head>

<body id="body">



    @include('frontend.components.navLayer')




    @yield('content')
    @include('notify::components.notify')





    @include('frontend.components.footer')


    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="{{asset ('frontend/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{asset ('frontend/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{asset ('frontend/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{asset ('frontend/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{asset ('frontend/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{asset ('frontend/plugins/jquery/dist/jquery.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{asset ('frontend/plugins/slick/slick.min.js') }}"></script>
    <script src="{{asset ('frontend/plugins/slick/slick.min.js') }}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{asset ('frontend/plugins/google-map/gmap.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{asset ('frontend/plugins/slick/slick.min.js') }}"></script>
    

    @notifyJs
  </body>
  </html>

