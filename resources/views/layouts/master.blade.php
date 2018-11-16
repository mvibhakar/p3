<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link rel="stylesheet" href="/css/p3.css">
</head>
<body>

<header>
    <a href='/'><h1 class='display-4'>High School GPA Calculator</h1></a>
</header>

<section id='main'>
    @yield('content')
</section>

</body>
</html>