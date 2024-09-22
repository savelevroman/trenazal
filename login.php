<?php
include "template/db.php";
include "template/head.php";
include "template/nav.php";
?>
<?php
$message = '';
if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE login = '$login' AND password ='$password'";
    $result=$mysqli->query($sql);
    $user=mysqli_fetch_assoc($result);
    var_dump($sql);  
    if (!empty($user)) {
    session_start();
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['login'] = $user['login'];
    $_SESSION['fio'] = $user['fio'];
    $_SESSION['role'] = $user['role'];
    if ($_SESSION['role'] == 1){
        header ("Location: director.php");
    } 
    elseif ($_SESSION['role'] == 2) {
        header ("Location: registrator.php");
    }
    else{
      header ("Location: trener.php");
    }
}
    else {
        $message = 'Логин или пароль введены неверно, пожалуйста повторите попытку';
    } 
}

?> 

<br>
        <br>
        <br>
        <br>
<div class="container-fluid">
        <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
        <form action="login.php" method="POST">
  <div class="mb-3">
    <label for="login" class="form-label">Логин</label>
    <input type="text" class="form-control" required id="login" name="login">
  <div class="mb-3">
    <label for="password" class="form-label">Пароль</label>
    <input type="password" class="form-control" required id="password" name="password">
    <br>
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
</form>
</div>
        <div class="col-3"></div>
    </div>
        </div>
        <br>
        <br>
        <br>
        <br>
      <?php include 'template/footer.php'; ?>