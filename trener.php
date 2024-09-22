<?php
include 'template/db.php';
session_start();
$id_user = $_SESSION['id_user'];
$sql = "select id_zapis, fio_client, vremya_zapis, name_uslugi from zapis, clients, uslugi where zapis.id_client=clients.id_client and zapis.id_uslugi=uslugi.id_uslugi and zapis.id_user=$id_user";
$result=$mysqli->query($sql);
include 'template/head.php';
include 'template/nav_trener.php';
?>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <h3 style="text-align: center">Список проведенных треннеровок</h3> 
          <table class="table">
            <thead>
                <tr class="table-primary">
                    <th scope="col">№</th>
                    <th scope="col">ФИО Клиента</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Вид тренеровки</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                    <?php 
                    if(!empty($result)){
                        foreach ($result as $row){
                        echo "
                            <tr>
                            <td>".$row['id_zapis']."</td>
                            <td>".$row['fio_client']."</td>
                            <td>".$row['vremya_zapis']."</td>
                            <td>".$row['name_uslugi']."</td>
                            </tr>
                        ";
                        }
                    }
                    ?>    
            </tbody>
          </table> 
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
<?php include 'template/footer.php';?>
