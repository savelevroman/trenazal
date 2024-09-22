<?php 
include 'template/head.php';
include 'template/nav.php';
include 'template/db.php';
$message = '';
if(!empty($_POST)){
   $fio = $_POST['fio'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $login = $_POST['login'];
   $password = $_POST['password'];
   $password_repeat = $_POST['password_repeat'];
   if($password == $password_repeat){
    $sql = "insert into users (fio, email, phone, login, password) values ('$fio', '$email', '$phone', '$login', '$password')";
    $mysqli->query($sql);
    header("Location: login.php");
   }
   else{
    $message = "Пароли не совпадают";
   }   
}
?>
<section class="signup">
    <div class="container">
        <div class="row">
        <h1 class="text-center">Регистрация</h1>
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <form action="signup.php" method="POST">
                <label for = "fio" class="form-label" name ="fio" id = "fio">Имя пользователя</label>
                <input type = "text" class="form-control" reqired name = "fio" id = "fio"><br>
                <label for="email" class="form-label" name="email" id="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required><br>
                <label for="phone" class="form-label" name="phone" id="phone">Телефон</label>
                <input type="text" class="form-control" name="phone" id="phone" required><br>
                <label for = "login" class="form-label" name="login" id = "login">Логин</label>
                <input type = "text" class="form-control" name="login" id = "login" required><br>
                <label for="password" class="form-label" name="password" id="password">Пароль</label>
                <input type="password" class="form-control"  name="password" id="password" required><br>
                <label for="password_repeat" class="form-label" name="password_repeat" id="password_repeat">Повторите пароль</label>
                <input type="password" class="form-control"  name="password_repeat" id="password_repeat" required><br>
                <input type="submit" class="btn btn-primary" value="Зарегистрироваться"><br><br>
                <input type="reset" class="btn btn-primary" value="Очистить"><br><br>
                <p>
                    <?php
                    echo $message;
                ?>
                </p>
            </form>
        </div> 
        <div class=col-lg-1></div>
    </div> 
</div>
</section>
<?php include 'template/footer.php'?>