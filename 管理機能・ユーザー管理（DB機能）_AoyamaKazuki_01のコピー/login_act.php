<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値を受け取る
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//1.  DB接続します
require_once('book-funcs.php');
$pdo = db_connect();

//2. データ登録SQL作成
// gs_user_tableに、IDとPWがあるか確認する。
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid = :lid AND lpw = :lpw");//送られてきたデータは直接SQLに入れると危ないので、必ず1度バインド変数に入れる
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if ($status == false) {
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch(); //1レコードだけ取得する方法 全件チェックして1件1件エラーを返したりしない。
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5. 該当レコードがあればSESSIONに値を代入
//if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使う
if ($val['id'] != '') {
    //Login成功時
    $_SESSION['chk_ssid']  = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    $_SESSION['name']      = $val['name'];
    header('Location: book-select.php');
} else {
    //Login失敗時(Logout経由)
    header('Location: login.php');
}
// exit();
?>