<?php

//1. POSTデータ取得
$u_name = $_POST['u_name'];
$u_id = $_POST['u_id'];
$u_pw = $_POST['u_pw'];

//2. DB接続します
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=gs_bookmark_db;charset=utf8;host=localhost:3306','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成// 1. SQL文を用意
//INDEXから送られてきたデータをDBの各カラムに格納する
//$stmt = $pdo->prepare("INSERT INTO テーブル名 (中身)");
//フォームで送られてきたデータを、セキュリティの都合上まず;nameとか、仮の変数に代入する
$stmt = $pdo->prepare("INSERT INTO 
        gs_user_table(id, u_name, u_id, u_pw, life_flg ,addtime)
          VALUES(
            NULL, :u_name, :u_id, :u_pw, 0,sysdate())"
);


//  2. バインド変数を用意 本当は、名前とかメールという所にはフォームから送られてきたデータを入れられるようにする
$stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookcomment', $bookcomment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:". print_r($error, true));
}else{
  //５．index.phpへリダイレクト 成功した場合の処理
  header('Location: book-index.php');
}
?>
