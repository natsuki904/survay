<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <?php 
  try{
    //ステップ1.DB接続
    $dsn = 'mysql:dbname=phpkiso;host;host=localhost';
    //接続するためのユーザー情報
    $user = 'root';
    $password = '';
    //DB接続オブジェクトを作成
    $dbh = new PDO($dsn,$user,$password);
    //接続したオブジェクトで文字コードをutf8を使うように指定
    $dbh->query('SET NAMES utf8'); 

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $goiken = $_POST['goiken'];

    $nickname = htmlspecialchars($nickname);
    $email = htmlspecialchars($email);
    $goiken = htmlspecialchars($goiken);

    echo $nickname.'様<br>';
    echo 'ご意見ありがとうございました<br>';
    echo '頂いたご意見『';
    echo $goiken;
    echo '』<br>';
    echo $email;
    echo 'にメールを送りましたのでご確認ください。';

    // $mail_sub='アンケート受け付けました。';
    // $mail_body=$nickname/"様へ/nアンケートご協力ありがとうございました。";
    // $mail_body=html_entity_decode($mail_body,ENT_QUOTES,"UTF-8");
    // $mail_head='From: natsuki@hoge.com';
    // mb_language('Japanese');
    // mb_internal_encoding("UTF-8");
    // mb_send_mail($email,$mail_sub,$mail_body,$mail_head);

    //ステップ2.データベースエンジンにSQL文で司令を出す
    $sql = 'INSERT INTO anketo(nickname,email,goiken)
        VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
    var_dump($sql);
    $stmt = $dbh->prepare($sql);
    // insert文を実行
    $stmt->execute();
    //データベースから切断
    $dbh = null; 
  }catch(Exception $e){
    echo 'ただいま障害により大変ご迷惑おかけしております';
  }
   ?> 
</body>
</html>
