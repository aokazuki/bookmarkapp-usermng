<?php
session_start();

//1.GETメソッドで送られる削除リクエストデータを取得する
require_once('book-funcs.php');
$pdo = db_connect();
$id = $_GET['id'];

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id=' . $id . ';');
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>書籍ブックマーク</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="book-select.php">ブックマークした書籍一覧へ</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="book-update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>お気に入りの書籍をブックマーク！</legend>
                <label>本の名前：<input type="text" name="bookname" value="<?= $result['bookname'] ?>"></label><br>
                <label>購入元のリンク：<input type="text" name="bookurl" value="<?= $result['bookurl'] ?>"></label><br>
                <label>書籍のコメント：<textArea name="bookcomment" rows="4" cols="40" value="<?= $result['bookcomment'] ?>"></textArea></label><br>
                <!-- ↓追加 -->
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>