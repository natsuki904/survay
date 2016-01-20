<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP基礎</title>
</head>
<body>
<?php 
    $id = $_POST['id'];
    $dsn = 'mysql:dbname=phpkiso;host;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->query('SET NAMES utf8'); 

    $sql = 'SELECT * FROM anketo WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $id;
    $stmt->execute($data);

    while(1){
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($rec == false){
        break;
      }
      echo $rec['id'];
      echo $rec['nickname'];
      echo $rec['email'];
      echo $rec['goiken'];
    } 

    $dbh = null;
 ?>
 <br>
 <a href="kensaku.html">検索画面に戻る</a>   
</body>
</html>
