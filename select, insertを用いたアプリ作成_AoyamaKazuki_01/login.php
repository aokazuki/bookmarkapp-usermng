<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=devicewidth">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size: 16px; }</style>
<title>ログイン</title>
</head>
<body>

<header>
    <nav class="navber navber_-default">
        <div class="container-fluid">
            <div class="navber-header">
                <a class="navber-brand" href="book-index.php">ログイン</a>
            </div>
        </div>
    </nav>
</header>

<form method="post" action="login_act.php"></form>
<div class="jumbotron">
    <fieldset>
        <legend>ログイン情報を入力してください</legend>
        <label>ID：<input type="text" name="lid"></label><br>
        <label>PW：<input type="text" name="lpw"></label><br>
        <input type="submit" value="ログイン">
    </fieldset>
</div>
</form>
</body>
</html>