<?php
//1. POSTデータ取得

$bookname = $_POST['bookname'];
$bookurl = $_POST['bookurl'];
$bookcomment = $_POST['bookcomment'];
$id = $_POST['id']; //hiddenで送られてくるidを取得する

//2. DB接続します →bool-funcs.phpで関数に置き換え
require_once('book-funcs.php');
$pdo = db_connect();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    "UPDATE gs_bm_table 
        SET 
        bookname = :bookname,
        bookurl = :bookurl,
        bookcomment = :bookcomment,
        addtime = sysdate()
        WHERE
            id = :id
        ;");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);
$stmt->bindValue(':bookcomment', $bookcomment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
//データ項目が全部入ってないと、データは送信されずリダイレクトされる処理。
if($bookname && $bookurl && $bookcomment) {
    $status = $stmt->execute(); //実行
}else {
    redirect("book-select.php");
} 

//４．データ登録処理後
if ($status == false) {
    // //*** function化する！******\
    sql_error($stmt); //funcs.phpの引数と連動している。
    // $error = $stmt->errorInfo();
    // exit("SQLError:" . print_r($error, true));
} else {
    //*** function化する！*****************
    redirect('book-select.php'); //redirect関数がfuncs.phpから呼び出された時に、引数に()内のファイル名を渡してあげている。
    // header("Location: index.php");
    // exit();
}

?>