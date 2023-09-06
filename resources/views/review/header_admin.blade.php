<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>shopfoot</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css')  }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="{{ asset('shop/white_00040.jpg')}}">
  </head>

  

  <header id="header">
      <nav>
        <ul>
          
          <li><a href="{{ route('update') }}">item</a></li>
          <li><a href="{{ route('form') }}">form</a></li>
          <li><a href="{{ route('admin') }}">top</a></li>
        


          @if (Route::has('login'))
           @auth
                    <li><a href="{{ url('/home') }}" >Home</a></li>
                    @else
                    <li><a href="{{ route('login') }}" >Log in</a></li>

                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                </div>
            @endif
            </ul>
      </nav>
    </header>