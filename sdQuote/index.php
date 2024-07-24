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
    <title>SD見積アプリ</title>
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

    <!-- Main[Start] -->
    <form method="post" action="insert.php" id="priceData" onsubmit="return validateForm()">
        <div class="jumbotron">
            <fieldset>
                <legend>SD見積</legend>
                <label for="date">見積日 <input type="date" name="date" id="date" required></label><br>


                <fieldset class="form-group">
                    <legend>種類：</legend>
                    <div class="radio-group">
                        <label>
                        <input type="radio" name="form" value="sl" required>
                        <span>片開き</span>
                        </label>
                        <label>
                        <input type="radio" name="form" value="dbl">
                        <span>両開き</span>
                        </label>
                        <label>
                        <input type="radio" name="form" value="ms">
                        <span>親子開き</span>
                        </label>
                    </div>
                    </fieldset>
                   
                   
                    <fieldset class="form-group">
                    <legend>枠形状：</legend>
                    <div class="radio-group">
                        <label>
                        <input type="radio" name="fForm" value="normal" required>
                        <span>L型</span>
                        </label>
                        <label>
                        <input type="radio" name="fForm" value="convex">
                        <span>山型</span>
                        </label>
                        <label>
                        <input type="radio" name="fForm" value="cover">
                        <span>カバー工法</span>
                        </label>
                    </div>
                    </fieldset>

                    <fieldset class="form-group">
                    <legend>扉形状：</legend>
                    <div class="radio-group">
                        <label>
                        <input type="radio" name="dForm" value="flush" required>
                        <span>フラッシュ</span>
                        </label>
                        <label>
                        <input type="radio" name="dForm" value="stile">
                        <span>框</span>
                        </label>

                    </div>
                    </fieldset>


                    <fieldset class="form-group">
                    <legend>オプション：</legend>
                    <div class="radio-group">
                        <label>
                        <input type="checkbox" name="options" value="dc" >
                        <span>ドアチェック</span>
                        </label>
                        <label>
                        <input type="checkbox" name="options" value="hd" >
                        <span>ハンドル（錠前）</span>
                        </label>
                        <label>
                        <input type="checkbox" name="options" value="lock" >
                        <span>補助錠</span>
                        </label>
                        <label>
                        <input type="checkbox" name="options" value="scope" >
                        <span>ドアスコープ</span>
                        </label>
                        <label>
                        <input type="checkbox" name="options" value="others" >
                        <span>その他</span>
                        </label>
                        

                    </div>
                    </fieldset>

                    <div class="form-group" id="thickness-container">
                        <label for="thickness">扉厚：</label>
                        <div class="input-group">
                            <select id="thickness-select-st" name="thickness" style="display:none;">
                                <option value="">選択してください</option>
                                <option value="40">40 t</option>
                                <option value="45">45 t</option>
                                <option value="50">50 t</option>
                                <option value="other">その他</option>
                            </select>
                            <input type="number" id="thickness-input" name="thickness" step="1"  min="0"required>
                            <span class="unit">t</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="size">サイズ：</label>
                        <input type="text" id="size" name="size" required placeholder="例：100x200">
                        <span class="help-text">幅x高さ(mm)で入力してください</span>
                        </div>

                <input type="submit" value="送信">
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


    <footer>
            <p>presented by 金子軽窓工業</p>
        </footer>


    <script src="js/index.js"></script>


</body>

</html>
