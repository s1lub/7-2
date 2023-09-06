<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>shoptop</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css')  }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="{{ asset('shop/white_00040.jpg')}}">
  </head>
    

  <body>

  <header id="header">
    @include('review.header')
</header>
       

    <main>
      <div id="mainvisual">
        <picture>
          <source media="(max-width: 600px)" srcset="{{ asset('review/white_00040.jpg')}}">
          <img src="{{ asset('review/white_00040.jpg')}}" alt="">
        </picture>
      </div>
    </main>

   
    

    <footer id="footer">
    @include('review.footer')
    </footer>

  </body>

</html>
