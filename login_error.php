<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPE HTML>

<html lang="ja">
<head>
<meta charset="UTF-8">
<title>マイページ登録</title>
<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
<header>
    <img src="4eachblog_logo.jpg"> 
    <div class="login"><a href="login.php">ログイン</a></div>
</header>

<main>

    <form action="mypage.php" method="post">
        <div class="form_contents">
            <div class="error_message">メールアドレスまたはパスワードが間違ってます。</div>
            <div class="mail">
                <label>メールアドレス</label><br>
                <input type="text" class="form_box" size="40" value="" name="mail">

            <div class="password">
                <label>パスワード</label><br>
                <input type="text" class="form_box" size="40" value="" name="password">
            </div>
            </div>

            <div class="login_button">
                <input type="submit" class="submit_button" size="35" value="ログイン">
            </div>
        </div>
    </form>
</main>
<footer>
    @2018InterNous.inc.All rights reserved
</footer>
</body>
</html>