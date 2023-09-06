
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>お問い合せ</title>
  <link rel="stylesheet" type="text/css" href=" {{asset('css/index.css')}}">
  <link rel="icon" type="image/png" href="{{ asset('cafe/img/logo.png')}}">
    <script src="{{ asset('js/jquery.js')  }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inview/1.0.0/jquery.inview.min.js"></script>
  <script src="https://kit.fontawesome.com/333ce526e3.js" crossorigin="anonymous"></script>
  <?php if (isset($err) && array_filter($err)) : ?>
  <script>
  alert('<?php echo implode("\\n", array_filter($err)); ?>');
  </script>
<?php endif; ?>
</head>
<body>
<header id="header">
    @include('review.header_admin')
</header>

  </body>


<section id="contact" class="wrapper">
        <h2 class="sec-title">Review</h2>
        <form method="POST" action="{{ route('item00') }}">
        @csrf
          <dl>
            <dt><label for="name">NAME</label></dt>
            <dd><input type="text" id="name" name="item_name"></dd>
            <dt><label for="name">IMAGE</label></dt>
            <dd><input type="text" id="name" name="image"></dd>
            <dt><label for="message">MESSAGE</label></dt>
            <dd><textarea id="message" name="comment">{{ old('body') }}</textarea></dd>
          </dl>
          <div class="button"><input id="btn" type="submit" value="送信"></div>
        </form>
      </section>

      <footer id="footer">
    @include('review.footer')
    </footer>
</html>