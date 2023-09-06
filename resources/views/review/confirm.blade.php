<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>review確認画面</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css')  }}">
  <script src="{{ asset('js/jquery.js')  }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inview/1.0.0/jquery.inview.min.js"></script>
  <script src="https://kit.fontawesome.com/333ce526e3.js" crossorigin="anonymous"></script>
</head>

<body>

<header id="header">
    @include('review.header')
</header>
   
  
    <div class="contact-box">
    
      <h2>お問合せ</h2>
     <form action="review/complete" method="POST" action="{{ route('complete') }}">
      @csrf
        <p>下記の項目をご記入の上送信ボタンを押してください<br>
        内容を訂正する場合は戻るを押して下さい。</p>
            <!-- <div class="form-content"> -->
            <dl class="confirm">
                <dt>TITLE</dt>
                <dd>
                {{ $inputs['title'] }}
                <input name="name" value="{{ $inputs['title'] }}" type="hidden">
                </dd>
                <dt>REVIEW</dt>
                <dd>
                {!! nl2br(e( $inputs['text'] )) !!}
                <input name="body" value="{{ $inputs['text'] }}" type="hidden">
                </dd>

                <dd class="confirm-button">
                
                  <button class="button-firm" type="submit" name="action" value="send">送 &nbsp; 信</button>
                  <a  href="{{ route('contact')}}"type="submit" name="action" value="back" >戻 &nbsp; る</a>
                  
                </dd>
              </dl> 
            </div>
      </form>
    </div>

  <footer>
    @include('shop.footer')
  </footer>
</body>
</html>