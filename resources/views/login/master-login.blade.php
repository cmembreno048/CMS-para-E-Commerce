
  <!DOCTYPE html>
  <html>
    <head>

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      @yield('title')
      <link rel="stylesheet" href="{{url('/static/css/master.css?d='.time())}}">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->

      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <!-- Include the above in your HEAD tag -->

      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      
    </head>

    <body>

      @section('body')
          
      @show


      <script src="{{url('/static/js/master.js')}}" ></script>

    </body>
  </html>

 