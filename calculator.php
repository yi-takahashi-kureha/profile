<!-- PHP課題⑩：自己紹介サイトに電卓機能を追加しよう -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>calculator.</title>
</head>
<body>
    <h1>シンプルな電卓</h1>

    <form action="" method="POST">
        <label for="num1">数値1:</label>
        <input type="number" id="num1" name="num1" step="any" required>
        <br>
        <label for="operator">演算子:</label>
        <select id="operator" name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br>
        <label for="num2">数値2:</label>
        <input type="number" id="num2" name="num2" step="any" required>
        <br>
        <button type="submit">計算する</button>
    </form>

    <hr>

        <h3>計算結果:</h3>
        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $num1_input = $_POST['num1'] ?? null;
            $num2_input = $_POST['num2'] ?? null;
            $operator = $_POST['operator'] ?? null;

            if ($num1_input !== null && $num2_input !== null && $operator !== null && is_numeric($num1_input) && is_numeric($num2_input)) {

                $num1 = (float)$num1_input;
                $num2 = (float)$num2_input;
                $result = null;
                $error = false;

                switch ($operator) {
                    case '+':
                        $result = $num1 + $num2;
                        break;
                    case '-':
                        $result = $num1 - $num2;
                        break;
                    case '*':
                        $result = $num1 * $num2;
                        break;
                    case '/':
                        if ($num2 === 0.0) {
                            echo "<span style='color:red;'>0で割ることはできません。</span>";
                            $error = true;
                        } else {
                            $result = $num1 / $num2;
                        }
                        break;
                    default:
                        echo "<span style='color:red;'>無効な演算子です。</span>";
                        $error = true;
                        break;
                }

                if (!$error && $result !== null) {
                    echo htmlspecialchars($num1_input, ENT_QUOTES, 'UTF-8') . " "
                       . htmlspecialchars($operator, ENT_QUOTES, 'UTF-8') . " "
                       . htmlspecialchars($num2_input, ENT_QUOTES, 'UTF-8') . " = "
                       . htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
                }
            } else {
                echo "<span style='color:red;'>有効な数値を入力してください。</span>";
            }
        } else {
            echo "数値を入力して計算してください。";
        }
        ?>

    <hr>

    <a href="index.html">自己紹介ページに戻る</a>

    <footer>
        <p>© 2025 Kureha Takahashi</p>
    </footer>
</body>
</html>
