<!DOCTYPE HTML>
<!--
 Iridium by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

<head>
    <title>Iridium by TEMPLATED</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link href="//fonts.googleapis.com/css?family=Arimo:400,700" rel="stylesheet" type="text/css">
    <!--[if lte IE 8]>
    <script src="js/html5shiv.js"></script><![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    </noscript><!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie/v8.css"/><![endif]--><!--[if lte IE 9]>
    <link rel="stylesheet" href="css/ie/v9.css"/><![endif]-->
</head>

<body class="homepage">

    @include('layouts.includes.header')

    <!-- Main -->
    <div id="main">
        <div class="container">
            <div class="row">

                <!-- Content -->
                <div id="content" class="8u skel-cell-important">
                    @yield('content')
                </div>

                @include('layouts.includes.sidebar')
            </div>
        </div>
    </div>

    @include('layouts.includes.featured')
    @include('layouts.includes.footer')

    <!-- Copyright -->
    <div id="copyright">
        <div class="container">
            Site made with: <a href="https://templated.co/">Templated.co</a>
        </div>
    </div>
</body>

</html>
