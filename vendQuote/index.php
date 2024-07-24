<?php
session_start();
require_once('../funcs.php');
loginCheck();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/common.css" />
    <title>曲物見積アプリ</title>
</head>
<body>

<?php
    if (isset($_SESSION['success_message'])) {
        echo '<div class="success">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        echo '<div class="error">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
        unset($_SESSION['error_message']);
    }

    ?>

        <!-- Main[Start] -->    <form method="post" action="insert.php" id="priceData">
        <div class="jumbotron">
            <fieldset>
                <legend>曲物見積</legend>
                <label for="date">見積日 <input type="date" name="date" id="date" required></label><br>

                <fieldset class="form-group">
                    <legend>鋼種：</legend>
                    <div class="radio-group">
                        <label>
                        <input type="radio" name="material" value="st" >
                        <span>鉄</span>
                        </label>
                        <label>
                        <input type="radio" name="material" value="sus">
                        <span>ステンレス</span>
                        </label>
                        <label>
                        <input type="radio" name="material" value="al">
                        <span>アルミ</span>
                        </label>
                    </div>
                </fieldset>
                
                <div class="form-group" id="thickness-container">
                    <label for="thickness-select">板厚：</label>
                    <select id="thickness-select" name="thickness" required>
                        <option value="">選択してください</option>
                    </select>
                    <div id="other-thickness" style="display: none;">
                        <input type="number" id="thickness-input" name="custom-thickness" step="0.1" min="0">
                        <span class="unit">t</span>
                    </div>
                </div>

                <fieldset class="form-group">
                    <legend>形状：</legend>
                    <div class="radio-group">
                        <label>
                        <input type="radio" name="form" value="uShape" required>
                        <span>コの字</span>
                        </label>
                        <label>
                        <input type="radio" name="form" value="cChannel">
                        <span>Cチャンネル</span>
                        </label>
                        <label>
                        <input type="radio" name="form" value="lShape">
                        <span>L型</span>
                        </label>
                    </div>
                </fieldset>

                <div id="dimension-inputs">
                    <!-- 動的に生成される寸法入力フィールドがここに挿入されます -->
                </div>

                <input type="submit" value="見積">
                <input type="submit" value="図面出力">
            </fieldset>
        </div>
    </form>

    <!-- Main[End] -->
    <!-- Foot[Start] -->
    <footer>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">見積結果一覧
                </a></div>
            </div>
        </nav>
    </footer>
    <!-- foot[End] -->


    <script src="js/index.js"></script>
</body>
</html>


