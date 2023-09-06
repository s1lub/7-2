<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>reviewtop</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css')  }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <h2 class="heading">
                編集
            </h2>
            @if(isset($itemid) && is_iterable($itemid))
    @foreach($itemid as $itemi)
    <img src="{{ asset($itemi->image) }}">    
        <div>{{ $itemi->item_name }}</div>
        <div>{{ $itemi->comment }}</div>
    </div>
    </div>
    @endforeach
    @else
    <p>No item data available.</p>
@endif
</section>

<section id="contact" class="wrapper">
        
        <form method="POST" action="{{ route('confirm') }}">
        @csrf
          <dl>
            <dt><label for="name">商品名</label></dt>
            <dd><input type="text" id="name" name="your-name"></dd>
            <dt><label for="message">商品詳細</label></dt>
            <dd><textarea id="message" name="your-message">{{ old('body') }}</textarea></dd>
          </dl>
          <div class="button"><input id="btn" type="submit" value="送信"></div>
        </form>
      </section>


</main>



<footer id="footer">
    @include('review.footer')
    </footer>

  </body>