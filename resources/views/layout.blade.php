<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{!! csrf_token() !!}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME', 'Laravel') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        
        <style>
           
        </style>
    </head>
   <body>
       
        <div class="container">
                <div class="col-sm-12">
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                        {{ session()->get('success') }}  
                        </div>
                    @endif

                    @if(session()->get('error'))
                        <div class="alert alert-danger">
                        {{ session()->get('error') }}  
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="display-flex">
                        @yield('content')
                    </div>
                </div>
        </div>

        <script type="text/javascript"  src="{{ mix('/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/book.js') }}"></script>
        
    </body>
</html>
