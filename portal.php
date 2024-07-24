<?php
session_start();
require_once('funcs.php');

loginCheck();

// ここでユーザー情報を取得する例
$user_name = $_SESSION['user_name'] ?? 'ゲスト';

?>
<!DOCTYPE html>
<html lang="ja">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/portal.css" />
    <title>ポータルサイト</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .service-links {
            list-style-type: none;
            padding: 0;
        }
        .service-links li {
            margin-bottom: 10px;
        }
        .service-links a {
            text-decoration: none;
            color: #007bff;
        }
        .service-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>こんにちは、<?php echo htmlspecialchars($user_name); ?>さん</h1>
    <h2>利用可能なサービス</h2>
    <ul class="service-links">
        <li>
            <a href="quoteCollect/index.php">
            <img src="img/quoteCollectlogo.png" alt="鋼材価格見積集積" class="logo">
            </a>
        </li>
        <li>
            <a href="test/index.php">
            <img src="img/vendQuotelogo.png" alt="曲物見積" class="logo">
            </a>
        </li>
        <li>
            <a href="sdQuote/index.php">
            <img src="img/sdQuotelogo.png" alt="SD見積" class="logo">
            </a>
        </li>
    </ul>
    <li><a href="logout.php">ログアウト</a></li>

</body>
</html>