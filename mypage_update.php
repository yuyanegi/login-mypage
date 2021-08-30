<?php
mb_internal_encoding("utf8");

session_start();
try{
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}
catch(PDOException $e){
        die("<P>申し訳ございません.現在サーバーが混みあっており、一時的にアクセスできません。<br>しばらくしてから再度ログインをしてください。<p>
        <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );

}


$stmt = $pdo->prepare("update login_mypage set name=?, mail=?, password=?, comments=? where id=?");

$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_SESSION['id']);

$stmt->execute();


$stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");

$stmt->bindValue(1,$_POST['mail']);
$stmt->bindValue(2,$_POST['password']);
$stmt->execute();



$pdo = NULL;

while ($row = $stmt->fetch()){
        
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

header("Location:mypage.php");
?>

