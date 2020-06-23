<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="stylesheet" href="/css/app.css">
  <body>
    <header>
      @include("components.header")
    </header>
      @yield('main_section')
    <footer>
      @include('components.footer')
    </footer>
  </body>
</html>
