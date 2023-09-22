<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('frontpage')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontpage')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontpage')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontpage')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontpage')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontpage')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontpage')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontpage')}}/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Humberger Begin -->
    @include('layouts.partials.front.humber')
    
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('layouts.partials.front.header')
    <!-- Header Section End -->

    @yield('front_content')    

    <!-- Footer Section Begin -->
    @include('layouts.partials.front.footer')
    
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('frontpage')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('frontpage')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontpage')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('frontpage')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('frontpage')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('frontpage')}}/js/mixitup.min.js"></script>
    <script src="{{asset('frontpage')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontpage')}}/js/main.js"></script>



</body>

</html>