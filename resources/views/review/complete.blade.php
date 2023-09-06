<body>
<header id="header">
    @include('review.header')
</header>

  <section>
    <!--<form method="POST" action="{{ route('confirm')}}">-->
    <form method="POST" action="confirm.php">
    <section class="wrapper">
    <div class="container">
    <div class="content">
            <h2 class="heading">REVIEW</h2>

        
            <div>完了しました。</div>
            <p></p>
            <p></p>
            <div><a href="{{ route('index') }}">Top</a></div>
        </div>
        </div>
    </form>
  </section>
  <footer>
  @include('review.footer')
  </footer>
</body>
</head>