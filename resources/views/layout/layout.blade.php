<!DOCTYPE html>
<html>
<head>
    <title>Task</title>
      <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- Include Google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,600"> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>
<body>
    
<div class="container">
    @yield('content')
</div>
    
</body>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
@stack('custom-scripts')
</html>