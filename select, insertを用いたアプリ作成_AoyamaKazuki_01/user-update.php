<?php
//1. POSTデータ取得

$u_name = $_POST['u_name'];
$u_id = $_POST['u_id'];
$u_pw = $_POST['u_pw'];
$id = $_POST['id']; //hiddenで送られてくるidを取得する

//2. DB接続します →bool-funcs.phpで関数に置き換え
require_once('book-funcs.php');
$pdo = db_connect();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    "UPDATE gs_user_table 
        SET 
        u_name = :u_name,
        u_id = :u_id,
        u_pw = :u_pw,
        indate = sysdate()
        WHERE
            id = :id
        ;");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);
$stmt->bindValue(':u_pw', $u_pw, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
//データ項目が全部入ってないと、データは送信されずリダイレクトされる処理。
if($u_name && $u_id && $u_pw) {
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