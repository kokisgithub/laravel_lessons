<!-- viewの共通部分をテンプレート部品として切り出す。@yeild('') -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/laravel_lessons/myblog/public/styles.css">
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
</body>
</html>