<?php
include 'template/head.php';
include 'template/db.php';
session_start();
if (!empty($_SESSION)){
    if($_SESSION['role'] == 1){
        include 'template/nav_director.php';
    }
    elseif($_SESSION['role'] == 2){
        include 'template/nav_registrator.php';
    }
    else{
        include 'template/nav_trener.php';
    }
}
else{
    include 'template/nav.php';
}
?>
<div class="container">
<div class="row">
    <div class="col-1"></div>
    <div class="col-10 text-center">
        <h3>Тренажерный зал "Спортбург"</h3>
        <h3>Добро пожаловать!</h3>
        <br>
        <img class="img-fluid" src="img/index.jpg" alt="">
    </div>
    <div class="col-1"></div>
</div>
</div>
<?php
include 'template/footer.php';
?>