<?php
//データの受け取り
$id = intval($_POST['id']);
$pass = $_POST['pass'];

//必須チェック
if( $id == '' || $pass == '' ){
    header('Location:bbsCopy.php');
    exit();
}

//データベースに接続
$dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
$user = 'tennisuser';
$password = 'password'; //tennisuserに設定したパスワード

try{
    $db = new PDO($dsn,$user,$password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    
    //プリペアドステートメントを作成
    $stmt = $db->prepare(
        "DELETE FROM bbs WHERE id=:id AND pass =:pass"
    );

    //パラメータを割り当て
    $stmt->bindParam(':id',$id,PDO::PARAM_INT);
    $stmt->bindParam(':pass',$pass,PDO::PARAM_STR);

    //クエリの実行
    $stmt->execute();
}catch(PDOException $e){
    echo "エラー：".$e->getMessage();
}
header("Location: bbsCopy.php");
excit();
?>