<?php

// function h($str){
//     return htmlspecialchars($str, ENT_QUOTES);
// }

require_once('book-funcs.php');

//1.  DB接続します
// try {
//     //Password:MAMP='root',XAMPP=''
//     $pdo = new PDO('mysql:dbname=gs_bookmark_db;charset=utf8;host=localhost:3306','root','root');
// } catch (PDOException $e) {
//     exit('DBConnectError'.$e->getMessage());
// }
require_once('book-funcs.php');
$pdo = db_connect();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
// $view = "";
// if ($status == false) {
//     //execute（SQL実行時にエラーがある場合）
//     $error = $stmt->errorInfo();
//     exit('ErrorQuery:' . print_r($error, true));
// }else{
//     //Selectデータの数だけ自動でループしてくれる データを1つ1つ取得して、終わるまでresult変数に追加してくれている
//     //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
//     while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
//         //$view .= $result; //この時点では、index.phpで送られたデータが配列で格納されているので、取得してあげる。
//         $view .= '<p>' . h($result['addtime']) . ' ' . h($result['bookname']) . ' ' . h($result['bookurl']) . '</p>'; //配列のデータを指定して、.で足し算している .=で書くと、上書きされずに追加で代入される。
//     }

// }

$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';

        $view .= '<a href= "book-detail.php?id= ' . $result['id'] . '">'; //book-detail.phpにID付きでデータを送っている。URLで送りたいので、GETメソッドで送信している。
        $view .= $result["addtime"] . "：" . $result["bookname"]; //この辺は、result変数に入ってきた擬似配列のデータから、指定のnameのデータを抜いて表示している
        $view .= '</a>';

        $view .= ' ';
        $view .= '<a href= "book-delete.php?id= ' . $result['id'] . '">'; 
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
<title>ブックマークした書籍一覧</title>
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
        <a class="navbar-brand" href="book-index.php">書籍ブックマーク画面へ</a>
        <a class="navbar-brand" href="user-list.php">アプリユーザー一覧へ</a>
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
