<?php
//共通に使う関数を記述

function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }

  function db_conn(){

//     //ローカル環境
//   try {
//     $db_name = 'kadai05_db';    //データベース名
//     $db_id   = 'root';      //アカウント名
//     $db_pw   = '';      //パスワード：MAMPは'root'
//     $db_host = 'localhost'; //DBホスト
//     $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
//     return $pdo;
//   } catch (PDOException $e) {
//     exit('DB Connection Error:' . $e->getMessage());
//   }


//本番環境
$prod_db = "pontaro_kadai_05";
$prod_host = "mysql640.db.sakura.ne.jp";
$prod_id = "pontaro";
$prod_pass = "pontaro-";


// DB接続します
try {
    //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname='. $prod_db . ';charset=utf8;host='. $prod_host ,$prod_id,$prod_pass);
  return $pdo;
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}
  
  }


//XSS対応（ echoする場所で使用！それ以外はNG ）

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
  $error = $stmt->errorInfo();
  exit('SQLError:' . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
  //*** function化する！*****************
  header('Location:' . $file_name);
  exit();
}


// ログインチェク処理 loginCheck()
function loginCheck(){
  if( !isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !== session_id()){
      exit('LOGIN ERROR');
      };
      
      session_regenerate_id(true);
      $_SESSION['chk_ssid'] = session_id();
}

// バリデーション関数
function validate_input($data) {
  $errors = [];

  // 日付のバリデーション
  if (empty($data['date']) || !preg_match("/^\d{4}-\d{2}-\d{2}$/", $data['date'])) {
      $errors[] = '無効な日付形式です。';
  }

  // 材質のバリデーション
  if (!in_array($data['material'], ['st', 'sus', 'al'])) {
      $errors[] = '無効な材質が選択されています。';
  }

  // 形状のバリデーション
  if (!in_array($data['form'], ['sheetMetal', 'flatBar', 'squarePipe', 'roundPipe', 'others'])) {
      $errors[] = '無効な形状が選択されています。';
  }

  // 板厚のバリデーション
  if (!is_numeric($data['thickness']) || $data['thickness'] <= 0) {
      $errors[] = '板厚は0より大きい数値を入力してください。';
  }

  // サイズのバリデーション
  if (!preg_match("/^\d+x\d+$/", $data['size'])) {
      $errors[] = '無効なサイズ形式です。例：100x200';
  }

  // 価格のバリデーション
  if (!is_numeric($data['price']) || $data['price'] < 0) {
      $errors[] = '価格は0以上の数値を入力してください。';
  }

  return $errors;
}
