<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<!-- <link href=" {{ URL::asset('css/user_management.css') }}" rel="stylesheet"> -->
<style>
            html, body {
                /* background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0; */
                background-image: url("{{ asset('images/404.jpg') }}");
                background-repeat: no-repeat;
                background-size: cover;
                text-align:center; font-size:25px;
            }
</style>
</head>
<body>
<div class="error_401_page">
<h1>
    OOPS ! You landed at 404.</br>
    No Result Found.
</h1>
</div>
</body>
</html>
