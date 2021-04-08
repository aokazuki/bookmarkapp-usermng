<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログインアカウント作成</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="login.php">アカウントをお持ちの方はこちらからログイン</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="account-insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>アカウント作成</legend>
                <label>ユーザー名：<input type="text" name="u_name"></label><br>
                <label>ID：<input type="text" name="u_id"></label><br>
                <label>パスワード（英数字で入力）：<input type="text" name="u_pw"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
