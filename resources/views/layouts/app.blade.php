<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('assets/frontend')}}/images/favicon/1.png" type="image/x-icon">
    <title>Log In</title>

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/vendors/bootstrap.css">


    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/vendors/font-awesome.css">
    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/style.css">


    {{-- axios and config custom file --}}
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>





</head>

<body>
    
    @yield('content')
 <script src="{{asset('assets/frontend')}}/js/lazysizes.min.js"></script>
</body>

</html>
