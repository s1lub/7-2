<!DOCTYPE html>
<html lang="ja"
  <head>
    <meta charset="utf-8">
    <title>reviewtop</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css')  }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="img/favicon.ico">
  </head>
    

  <body>

  <header id="header">
    @include('review.header_admin')
</header>
<main>
    <section class="wrapper">
        <div class="container">
        <div class="content">
        <h2 class="heading">REVIEW</h2>
        @if(isset($reviews) && is_iterable($reviews))
    @foreach($reviews as $review)
        
        <div>{{ $review->text_title }}</div>
        <div>{{ $review->text }}</div>
        <div>{{ $review->created_at }}</div>
        </div>
        </div>
        <div class="btn_item">
       <!--  <form method="POST" action="/review/delete2">
        @csrf 
        <input type="hidden" name="id" value="{{ $review->id }}">
        <li><button type="submit" onclick="return confirm('削除してよろしいですか？')" class="delete-show">削除</button></li>
        </form>
        -->
    @endforeach
    @else
    <p>No item data available.</p>
    @endif
    
    </section>
</main>
<!--
<section id="contact" class="wrapper">
        <h2 class="sec-title">Review</h2>
        <form action="{{ route('confirm_admin',['id' => 1]) }}" method="POST">
        @csrf
          <dl>
            <dt><label for="name">TITLE</label></dt>
            <dd><input type="text" id="name" name="text_title"></dd>
            <dt><label for="message">MESSAGE</label></dt>
            <dd><textarea id="message" name="text">{{ old('body') }}</textarea></dd>
          </dl>
          <div class="button"><input id="btn" type="submit" value="送信"></div>
        </form>
      </section>

-->

<footer id="footer">
    @include('review.footer')
    </footer>

  </body>

</html>

