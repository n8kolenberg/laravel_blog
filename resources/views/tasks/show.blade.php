<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>N8's Task</title>
</head>
<body>
<h1>N8's Task View</h1>
<h3>{{$task->title}}</h3>
<p>- {{$task->body}}</p>
<h4><a href="/"><< Go back to tasks overview</a></h4>
</body>
</html>