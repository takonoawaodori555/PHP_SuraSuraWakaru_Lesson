<?php
  // お名前
  $name = $_POST['name'];
  // 性別
  $gender = $_POST['gender'];
  if ($gender == "man"){
    $gender = "男性";
  } else if ($gender == "woman"){
    $gender = "女性";
  }
  // 評価
  $tmp_star = $_POST['star'];
  $star = ''; // 出力用
  for ($i = 0; $i < $tmp_star; $i++){
    $star .= '★'; //送信された数字の数だけ★を追加
  }
  for (; $i < 5; $i++){
    $star .= '☆'; // ☆は、「5-送信された数字」分だけ追加
  }
  // ご意見
  $other = $_POST['other'];
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>アンケート結果</title>
</head>
<body>
  <h1>アンケート結果</h1>
  <p>お名前:<?php echo $name; ?></p>
  <p>性別:<?php echo $gender; ?></p>
  <p>評価:<?php echo $star; ?></p>
  <p>ご意見:<?php echo nl2br($other, false); ?></p>
</body>
</html>
