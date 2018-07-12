<?php
  //データの受け取り
  $name = $_POST['name'];
  $title = $_POST['title'];
  $body = $_POST['body'];
  $pass = $_POST['pass'];

  //必須項目チェック（名前や本文は空ではないか？）
  if($name == '' || $body == ''){
      header('Location: bbsCopy.php');
      exit();
  }

  //必須チェック（パスワードは4桁の数字か？）
  if(!preg_match("/^[0-9]{4}$/",$pass)){
    header('Location: bbsCopy.php');
    exit();
  }

  //名前をクッキーにセット
  setcookie('name',$name,time() + 60 * 60 * 24 * 30 );

  //データーベースに接続
  $dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
  $user = 'tennisuser';
  $password = 'password';

  try{
      $db = new PDO($dsn,$user,$password);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
      $stmt = $db->prepare("
      INSERT INTO bbs (name, title, body, date, pass)
      VALUES (:name, :title, :body, now(), :pass)"
    );
    // パラメータを割り当て
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':body', $body, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    // クエリの実行
    $stmt->execute();

    // bbs.phpに戻る
    header('Location: bbsCopy.php');
    exit();
  } catch(PDOException $e) {
    die ('エラー:' . $e->getMessage());
  }
?>