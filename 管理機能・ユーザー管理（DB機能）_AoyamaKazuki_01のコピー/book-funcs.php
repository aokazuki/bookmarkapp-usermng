<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_connect() 
function db_connect(){
    try {
        $db_name = "gs_bookmark_db";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "localhost:3306"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo; //この変数外でもこのpdo変数を使えるようにしているのがreturn処理。
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){ //関数化に加えて、$stmtが処理の中でいきなり現れた扱いになってエラーにならないように、引数としてデータ登録SQLの変数を渡している。
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){ //redirect関数が読み込まれる時に、引数に入れた変数に格納されているファイルを、Locationでの遷移先にしたい場合の処理。
    header("Location: " . $file_name);
    exit();
}

// ログインチェック処理 loginCheck()
function loginCheck(){
    if ($_SESSION['chk_ssid'] != session_id()) {
        exit("LOGIN ERROR");
    } else {
        //セッションは、すぐに変わってしまうものでDBに入れといても面倒な物に使うのがいい。
        //ログインのたびにブラウザごとに変わるので、ログインID/PWがあっていれば、ユーザーIDに対してそのタイミングでのセッションIDを再作成している
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}