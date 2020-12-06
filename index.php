<?php
//connect database
$con = mysqli_connect("localhost","root","","cedova");

//buat array sebagai wadah
$wadah = array();

//query select
$result = mysqli_query($con, "SELECT * FROM randomtb ORDER BY id ASC");

//loop selama ada data yg bisa dipanggil maka wadahi ke array
while($fetch = mysqli_fetch_assoc($result)){
    $wadah[] = $fetch;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="script/script.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <a class="navbar-brand" href="#home">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Daftar
                    </a>
                    <div class="dropdown-menu">
                        <!--------loop semua data pada array sebelumnya-------->
                        <?php foreach($wadah as $a):?>

                            <a class="dropdown-item" onmouseover="show(<?=$a['id'];?>)" onmouseout="sembunyi(<?=$a['id'];?>)" href="#"> <?=$a['nama'];?> </a>

                        <!-- <a class="dropdown-item" onmouseover="show('rita')" onmouseout="sembunyi('rita')" href="#">Rita Rossweisse</a>
                        <a class="dropdown-item" onmouseover="show('shiraishi')" onmouseout="sembunyi('shiraishi')" href="#">Shiraishi</a> -->
                        <?php endforeach;?>
                        <!----------------------------------------------------->
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="jarak"></div>
    <div class="container">
        <div class="sembunyi">
            <!--------loop juga yang ini-------->
            <?php foreach($wadah as $b):?>
                <table id="<?=$b['id'];?>">
                    <tr>
                        <th>Absen</th>
                        <th>Nama</th>
                    </tr>
                    <tr>
                        <td><?=$b['id'];?></td>
                        <td><?=$b['nama'];?></td>
                    </tr>
                </table>
            <!-- <img id="cruzh" src="pict/cruzh/29.jpg" alt="">
            <img id="rita" src="pict/rita/4.jpg" alt="">
            <img id="shiraishi" src="pict/shiraishi/6.png" alt=""> -->
            <?php endforeach;?>
            <!------------------------------>
        </div>
    </div>
</body>

</html>