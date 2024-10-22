<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple E-commerce</title>
    <link href="{{asset('assets/logo.jpg')}}" rel="icon">
    <!-- Bootstrap - Online Linking -->
    <link href="{{asset('/assets/web/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- CSS Linking -->
    <link href="{{asset('/assets/web/style.css')}}" rel="stylesheet" />
</head>

<body>

    <x-web.layouts.partials.header />
    <main>

        {{$slot}}


    </main>

    <footer class="mt-5 text-center">
        <p><small>Ismail Hossaain 01725204663 & 01929074663</small></p>
    </footer>

    <!-- Bootstrap - Online Linking -->
    <script src="{{asset('/assets/web/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>