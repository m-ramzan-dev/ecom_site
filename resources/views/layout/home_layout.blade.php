<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daily Shop | Home</title>

    <!-- Font awesome -->
    <link href="{{ asset('home_assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="{{ asset('home_assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('home_assets/css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet" />
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_assets/css/jquery.simpleLens.css') }}" />
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_assets/css/slick.css') }}" />
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_assets/css/nouislider.css') }}" />
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('home_assets/css/theme-color/default-theme.css') }}" rel="stylesheet" />
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{ asset('home_assets/css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all" />

    <!-- Main style sheet -->
    <link href="{{ asset('home_assets/css/style.css') }}" rel="stylesheet" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    @yield('body')
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('home_assets/js/bootstrap.js') }}"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="{{ asset('home_assets/js/jquery.smartmenus.js') }}"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="{{ asset('home_assets/js/jquery.smartmenus.bootstrap.js') }}"></script>
    <!-- To Slider JS -->
    <script src="{{ asset('home_assets/js/sequence.js') }}"></script>
    <script src="{{ asset('home_assets/js/sequence-theme.modern-slide-in.js') }}"></script>
    <!-- Product view slider -->
    <script type="text/javascript" src="{{ asset('home_assets/js/jquery.simpleGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home_assets/js/jquery.simpleLens.js') }}"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="{{ asset('home_assets/js/slick.js') }}"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="{{ asset('home_assets/js/nouislider.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('home_assets/js/custom.js') }}"></script>
</body>

</html>
