<?php
session_start();

//1. POSTデータ取得
$id   = $_GET["id"];

//2. DB接続します
require_once('book-funcs.php');
$pdo = db_connect();

//３．id削除するSQL文を作成する
$stmt = $pdo->prepare(
    "DELETE FROM 
        gs_bm_table 
    WHERE 
        id = :id
    "
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('book-index.php');
}

?>