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
    
  @auth
  <body>

  <header id="header">
    @include('review.header')
</header>
    

    <main>
    <section class="wrapper">
    <div class="container">
        <div class="content">
            <h2 class="heading">ITEM</h2>

    @foreach($items as $item)
        
        <img src="{{ asset($item->image) }}">
        <div>{{ $item->item_name }}</div>
        <div>{{ $item->comment }}</div>
        <div class="btn_item">
        <li><button><a href="{{ route('review', ['id'=>$item->id]) }}">review</a></button></li>
    </tr>
    </div>
    </div>
    @endforeach
  </table>
</section>
    </main>

   
    

    <footer id="footer">
    @include('review.footer')
    </footer>

  </body>
  @endauth
</html>
