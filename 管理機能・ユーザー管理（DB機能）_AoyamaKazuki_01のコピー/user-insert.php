<?php

//1. POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//2. DB接続します
require_once('book-funcs.php'); //funcs.phpの中身を読み込んでいる。これで、別のページで定義した関数を読み出せるようになる！
$pdo = db_connect();

//３．データ登録SQL作成// 1. SQL文を用意
//INDEXから送られてきたデータをDBの各カラムに格納する
//$stmt = $pdo->prepare("INSERT INTO テーブル名 (中身)");
//フォームで送られてきたデータを、セキュリティの都合上まず;nameとか、仮の変数に代入する
$stmt = $pdo->prepare("INSERT INTO 
        gs_user_table(id, name, lid, lpw, kanri_flg, life_flg, indate)
          VALUES(
            NULL, :name, :lid, :lpw, 0, 0, sysdate())"
);


//  2. バインド変数を用意 本当は、名前とかメールという所にはフォームから送られてきたデータを入れられるようにする
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    sql_error($stmt);
  }else{
  //５．index.phpへリダイレクト 成功した場合の処理
    redirect('user-index.php');
  }
?>
