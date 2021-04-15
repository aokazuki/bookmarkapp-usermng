<?php
session_start();

require_once('book-funcs.php');

//1.  DB接続します
require_once('book-funcs.php');
$pdo = db_connect();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';

        $view .= '<a href= "user-detail.php?id= ' . $result['id'] . '">'; 
        $view .= $result["indate"] . "：" . $result["name"]; //この辺は、result変数に入ってきた擬似配列のデータから、指定のnameのデータを抜いて表示している
        $view .= '</a>';

        $view .= ' ';
        $view .= '<a href= "user-delete.php?id= ' . $result['id'] . '">'; 
        $view .= '[削除する]';
        $view .= '</a>';

        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登録したユーザーアカウント一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="user-index.php">ユーザー登録画面へ</a>
        <a class="navbar-brand" href="book-select.php">ブックマークした書籍一覧へ戻る</a>
        <p class="navbar-brand"><?= $_SESSION['name']  ?>でログイン中</p>
        </div>
    </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>