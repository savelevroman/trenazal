<?php
include 'template/head.php';
include "template/db.php";
$sql_inj = "";
$date_from = "";
$date_to = "";
if(isset($_POST['uslugi_date_from']) && isset($_POST['uslugi_date_to'])){
    $date_from = $_POST['uslugi_date_from'];
    $date_to = $_POST['uslugi_date_to'];
    $sql_inj = " WHERE zapis.vremya_zapis >= '$date_from 00:00:00' AND zapis.vremya_zapis <=  '$date_to 00:00:00' ";
}
$sql = "SELECT uslugi.*, 
COUNT(DISTINCT clients.id_client) AS clients_count, 
COUNT(DISTINCT zapis.id_zapis) AS zapis_count FROM uslugi 
JOIN zapis ON zapis.id_uslugi = uslugi.id_uslugi 
JOIN clients ON zapis.id_client = clients.id_client 
$sql_inj 
GROUP BY uslugi.id_uslugi";
$result = $mysqli->query($sql);
$uslugi = $result->fetch_all(MYSQLI_ASSOC);

$sql = "SELECT users.*, 
COUNT(DISTINCT zapis.id_zapis) AS zapis_count FROM users 
JOIN zapis ON zapis.id_user = users.id_user 
$sql_inj 
GROUP BY users.id_user";
$result = $mysqli->query($sql);
$users = $result->fetch_all(MYSQLI_ASSOC);
?>
    <!-- <script src="js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <?php
    include 'template/nav_director.php';
    ?>
    <main class="container">

    
        <section class = "report">
            <div class="report__title">
                <h2 class="mb-4">Отчет по работе тренажерного зала за период</h2>
                <form action="director.php" method="post">
                    <input type="date" name="uslugi_date_from" placeholder="С" value="<?= $date_from ?>">
                    <input type="date" name="uslugi_date_to" placeholder="По"  value="<?= $date_to ?>">
                    <input type="submit" value="Показать">
                </form>
                <table class="table table-hover mt-4">
                    <thead>
                        <tr>
                            <th>
                                <h3>№</h3>
                            </th>
                            <th>
                                <h3>Наименование услуги</h3>
                            </th>
                            <th>
                                 <h3>Количество клиентов</h3>
                            </th>
                            <th>
                                <h3>Количество
                                    отработанных часов
                                </h3>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($uslugi as $usluga) { ?>
                        <tr>
                            <td><?= $usluga['id_uslugi']?></td>
                            <td><?= $usluga['name_uslugi']?></td>
                            <td><?= $usluga['clients_count']?></td>
                            <td><?= $usluga['zapis_count']?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <h2 class="mt-4 mb-4">Расчет заработной платы тренеров за период</h2>
                <form action="director.php" method="post">
                    <input type="date" name="uslugi_date_from" placeholder="С" value="<?= $date_from ?>">
                    <input type="date" name="uslugi_date_to" placeholder="По"  value="<?= $date_to ?>">
                    <input type="submit" value="Показать">
                </form>
                <table class="table table-hover mt-4">
                    <thead>
                        <tr>
                            <th>
                                <h3>№</h3>
                            </th>
                            <th>
                                <h3>ФИО тренера</h3>
                            </th>
                            <th>
                                 <h3>Количество отработанных часов</h3>
                            </th>
                            <th>
                                <h3>Зарплата
                                </h3>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user) { ?>
                        <tr>
                            <td><?= $user['id_user']?></td>
                            <td><?= $user['fio']?></td>
                            <td><?= $user['zapis_count']?></td>
                            <td><?= $user['zapis_count']*500 ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </section>
    
    </main>
    <?php include 'template/footer.php';?>