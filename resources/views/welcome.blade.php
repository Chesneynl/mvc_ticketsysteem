<!doctype html>
<html>
    <head
        <title></title>
    </head>
    <body>
      @foreach ($tickets as $ticket)
        <li>{{$ticket->name }}</li>
      @endforeach
    </body>
</html>
