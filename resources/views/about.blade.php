<!doctype html>
<html>
    <head
        <title></title>
    </head>
    <body>
      <h1> about us </h1>
      <?php
      $results = DB::select('select *  FROM users', array(1));
      ?>
    </body>
</html>
