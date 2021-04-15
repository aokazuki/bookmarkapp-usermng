<?php
//1. POSTデータ取得

$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$id = $_POST['id']; //hiddenで送られてくるidを取得する

//2. DB接続します →bool-funcs.phpで関数に置き換え
require_once('book-funcs.php');
$pdo = db_connect();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    "UPDATE gs_user_table 
        SET 
        name = :name,
        lid = :lid,
        lpw = :lpw,
        indate = sysdate()
        WHERE
            id = :id
        ;");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
//データ項目が全部入ってないと、データは送信されずリダイレクトされる処理。
if($name && $lid && $lpw) {
    $status = $stmt->execute(); //実行
}else {
    redirect("user-select.php");
} 

//４．データ登録処理後
if ($status == false) {
    // //*** function化する！******\
    sql_error($stmt); //funcs.phpの引数と連動している。
    // $error = $stmt->errorInfo();
    // exit("SQLError:" . print_r($error, true));
} else {
    //*** function化する！*****************
    redirect('user-select.php'); //redirect関数がfuncs.phpから呼び出された時に、引数に()内のファイル名を渡してあげている。
    // header("Location: index.php");
    // exit();
}

?>