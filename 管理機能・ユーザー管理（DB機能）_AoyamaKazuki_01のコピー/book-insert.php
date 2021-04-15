<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$bookname = $_POST['bookname'];
$bookurl = $_POST['bookurl'];
$bookcomment = $_POST['bookcomment'];

//2. DB接続します →bool-funcs.phpで関数に置き換え
// try {
//   //ID:'root', Password: 'root'
//   $pdo = new PDO('mysql:dbname=gs_bookmark_db;charset=utf8;host=localhost:3306','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }
require_once('book-funcs.php'); //funcs.phpの中身を読み込んでいる。これで、別のページで定義した関数を読み出せるようになる！
$pdo = db_connect();

//３．データ登録SQL作成// 1. SQL文を用意
//INDEXから送られてきたデータをDBの各カラムに格納する
//$stmt = $pdo->prepare("INSERT INTO テーブル名 (中身)");
//フォームで送られてきたデータを、セキュリティの都合上まず;nameとか、仮の変数に代入する
$stmt = $pdo->prepare("INSERT INTO 
        gs_bm_table(id, bookname, bookurl, bookcomment, addtime)
          VALUES(
            NULL, :bookname, :bookurl, :bookcomment, sysdate())"
);


//  2. バインド変数を用意 本当は、名前とかメールという所にはフォームから送られてきたデータを入れられるようにする
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookcomment', $bookcomment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  //以下は関数に置き換え
  // $error = $stmt->errorInfo();
  // exit("ErrorMessage:". print_r($error, true));
  sql_error($stmt);
}else{
//５．index.phpへリダイレクト 成功した場合の処理
  //以下は関数に置き換え
  // header('Location: book-index.php');
  redirect('book-index.php');
}
?>
