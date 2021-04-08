<?php
//1.GETメソッドで送られる削除リクエストデータを取得する
require_once('book-funcs.php');
$pdo = db_connect();
$id = $_GET['id'];

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id=' . $id . ';');
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
    <title>ユーザーアカウント詳細</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="user-list.php">ユーザーアカウント一覧へ</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="user-update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー新規登録</legend>
                <label>ユーザー名：<input type="text" name="u_name" value="<?= $result['u_name'] ?>"></label><br>
                <label>ユーザーID：<input type="text" name="u_id" value="<?= $result['u_id'] ?>"></label><br>
                <label>パスワード：<input type="text" name="u_pw" value="<?= $result['u_pw'] ?>"></label><br>
                <!-- ↓追加 -->
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>