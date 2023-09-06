<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>reviewupdete</title>
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
            <h2 class="heading">MESSAGE</h2>
    @foreach($items as $item)
       
        <img src="{{ asset($item->image) }}">
        <div>{{ $item->item_name }}</div>
        <div>{{ $item->comment }}</div>
        <div class="btn_item">
        <li><button><a href="{{ route('review', ['id'=>$item->id]) }}">review</a></button></li>
        <!--<li><button><a href="{{ route('update2', ['id'=>$item->id]) }}">編集</a></button></li>-->
        <form method="POST" action="/review/delete">
        @csrf <!-- CSRFトークンを含める -->
<input type="hidden" name="id" value="{{ $item->id }}">
<li><button type="submit" onclick="return confirm('削除してよろしいですか？')" class="delete-show">削除</button></li>
</form>
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

</html>
