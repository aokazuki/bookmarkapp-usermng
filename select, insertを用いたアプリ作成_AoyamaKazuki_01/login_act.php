<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//1.DBに接続
try {
    $pdo = new PDO('mysql:dbname=gs_bookmark_db;charset=utf8;host=localhost:3306','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//2.データ登録SQL
$sql = "SELECT * FROM gs_user_table WHERE u_id=:lid AND u_pw=:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMessage:". print_r($error, true));
  }
//   else{
//     //５．index.phpへリダイレクト 成功した場合の処理
//     header('Location: book-index.php');
//   }

//3 抽出データ数を取得
$val =$stmt->fetch();//DBのデータを1行ずつ全部見ずに、1レコードだけ取得する方法

//4.該当レコードがあればSESSIONに値を代入する
if($val["id"] != ""){ //!=は空っぽ、という意味
    $_SESSION["chk_ssid"] = session_id(); //セッションスタートした場合に、ユニークなキーを発行して_SESSIONというサーバーを跨いでデータ送信ができる変数に代入している。
    $_SESSION["kanri_flg"] = $val['u_name']; //セッションのユーザーネームをDBに格納する。ログイン後にユーザーネームを別のページでも表示するようにする。
    //login処理がOKだったら以下のページへ遷移
    header("Location: book-index.php");
}else{
    //login処理がNGの場合、login.phpに遷移して戻ってくる
    header("Location: login.php");
}
//処理終了
exit();

?>