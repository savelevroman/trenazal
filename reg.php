
<div class="row">
<div class="col-lg-4"></div>
<div class="col-lg-4">
<form class="align-items-center" method="POST">
      <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Имя пользователя</label>
    <input type="text" class="form-control" name="fio" >
  </div>
      <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Логин</label>
    <input type="text" class="form-control" name="login" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Придумайте пароль</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
    <input type="password" class="form-control" name="passwordtwo">
  </div>
      <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">E-Mail</label>
    <input type="text" class="form-control" name="email" >
  </div>
  <div class="d-grid gap-2 col-6 mx-auto">
  <button type="submit" class="btn btn-primary center">Зарегистрироваться</button>
  </div>
  <div class="d-grid gap-2 col-6 mx-auto">
    <a>Есть аккаунт?<a href="login.php">Войти</a></a>    
  </div>
</form>
</div>
<div class="col-lg-4"></div>
</div>
<?php
    if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['fio']) and !empty($_POST['email'])) {
        $password = $_POST['password'];
        $login = $_POST['login'];
        $passwordtwo = $_POST['passwordtwo'];
        $email = $_POST['email'];
        $fio = $_POST['fio'];
        if ($password == $passwordtwo) {
        $sql = "insert into users(login, password, email, fio) values ('$login','$password','$email','$fio')";
        var_dump($sql);
        $result = $link->query($sql);
        var_dump($result);
        header("Location: index.php");
        }
        else{
            echo'
            <div class="d-grid gap-2 col-6 mx-auto">
              <a>Пароли не совпадают!</a>    
            </div>';
        }
    }
?>
<?php
include "template/footer.php";
?>