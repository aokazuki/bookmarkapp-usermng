<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ブックマークアプリユーザー一覧</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="user-list.php">ユーザー一覧へ</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="user-insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー新規登録</legend>
                <label>ユーザー名：<input type="text" name="u_name"></label><br>
                <label>ユーザーID：<input type="text" name="u_id"></label><br>
                <label>パスワード：<input type="text" name="u_pw"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>