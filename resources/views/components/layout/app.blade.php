<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name')}}</title>

        @vite(['resources/css/app.css'])

       

    </head>
    <body class="h-full">
        
        {{$slot}}
      
    </body>
</html>