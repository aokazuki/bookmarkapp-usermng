<?php
session_start();
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
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
                <div class="navbar-header"><p class="navbar-brand"><?= $_SESSION['name']  ?>でログイン中</p></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="book-insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>お気に入りの書籍をブックマーク！</legend>
                <label>本の名前：<input type="text" name="bookname"></label><br>
                <label>購入元のリンク：<input type="text" name="bookurl"></label><br>
                <label>書籍のコメント：<textArea name="bookcomment" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
