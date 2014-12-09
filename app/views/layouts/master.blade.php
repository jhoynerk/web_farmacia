<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Farmacias ByS | @yield('tituloWeb')</title>
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{URL::to('/css/farmacias/style.css')}}">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </head>
    <body>
        @yield('contenido')
        <!-- Optional: Incorporar los plug-ins de JavaScript de Bootstrap -->
        <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap.js"></script>
    </body>
</html>
