<!DOCTYPE html>
<html lang="ja">
<head>
<meta charest="UTF-8">
<meta name="voewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/boootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<title>ECサイト</title>
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- ヘッダー -->
<header class="py-4">
  <div class="container text-center">
    <img src="{{ asset('/logo.image/hosoccer-2018model.jpg') }}" alt="" class="img-fluid">
  </div>
</header>

<!-- ナビゲーションバー-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
  <div class="container">
    <!-- サブコンポーネント -->
    <!-- ブランド -->
    <a class="navbar-brand" href="">HO SOOCER JAPAN</a>
    <!-- 切替ボタン -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <!-- ナビゲーション -->
    <div class="collapse navbar-collapse" id="navbar-content">
      <!-- ナビゲーションメニュー -->
      <!-- 左側メニュー：トップページの各コンテンツへのリンク -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('sale.index') }}">Top <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sale.show.contact') }}">Contact</a>
        </li>
      </ul>
      <!-- 右側メニュー：Contactページへのリンク -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('sale.show.cart') }}" class="nav-link btn btn-info">Cart</a>
        </li>
      </ul>
      <!-- /ナビゲーションメニュー -->
    </div>
    <!-- /サブコンポーネント -->
  </div>
</nav>

@yield('content')

<!-- フッター -->
<footer class="py-4 bg-dark text-light">
  <div class="container text-center">
    <!-- ナビゲーション -->
    <ul class="nav justify-content-center mb-3">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sale.index') }}">Top</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sale.show.contact') }}">Contact</a>
      </li>
    </ul>
    <!-- /ナビゲーション -->
    <p>
      <small>Copyright &copy;2018 Mr. M COFFEE, All Rights Reserved.</small>
    </p>
  </div>
</footer>
</body>
</html>

