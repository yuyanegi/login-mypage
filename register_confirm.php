<?php
mb_internal_encoding("utf8");

$temp_pic_name = $_FILES['picture']['tmp_name'];

$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>マイページを作る
</title>
<link rel="stylesheet" type="text/css" href="register_confirm.css">
</head>

 <body>
        
    <h1>会員登録内容確認</h1>
        <div class="confirm">
            <p>こちらの内容で登録してもよろしいでしょうか。
                 
            <p>名前
            <br>
            <?php echo $_POST['name'];?>
            </p>

            <p>メールアドレス
            <br>
            <?php echo $_POST['mail'];?>
            </p>

            <p>パスワード
            <br>
            <?php echo $_POST['password'];?>
            </p>

            <p>プロフィール写真
            <br>
            <?php echo $original_pic_name;?>
            </p>

            <p>コメント
            <br>
            <?php echo $_POST['comments'];?>
            </p>

            <form action ="register.php"> 
                <input type="submit" class="button1" value="戻って修正する"/>
            </form>

            <form action ="register_insert.php" method="post">
            
                <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
                <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                <input type="hidden" value="<?php echo $path_filename; ?>" name="path_filename">
                <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
                <input type="submit" class="button2" value="登録する">
            </form>

        </div>
</body>
</html>