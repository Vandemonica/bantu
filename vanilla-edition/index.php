<?php
//connect database
$connect = mysqli_connect("localhost","root","","cedova");
//select tabel(param1 = link untuk connect, param2 = query sql'nya)
$select = mysqli_query($connect, "SELECT * FROM randomtb");

//array kosong sebagai wadah
$data = array();

//perulangan while
//selama ada data yg bisa di fetch, maka...
while($result = mysqli_fetch_assoc($select)){
    //masukkan hasil fetch kedalam array kosong yg tadi
    $data[] = $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Testo Manifesto</title>
</head>
<body>
<!-------------------------Drop Box--------------------------------------->
    <div class="DropParent">
        <button class="DropBtn" onclick="DropDown();">Show</button>
        <div id="DropChild" class="DropChild">
            <?php foreach($data as $a):?>

                <span class="DropData" onmouseover="ShowTable(<?=$a['id'];?>);" onmouseout="HideTable(<?=$a['id'];?>);"><?=$a['item'];?></span>

            <?php endforeach;?>
        </div>
    </div>
<!-------------------------Tabel Data-------------------------------->
    <div>
        <?php foreach($data as $b):?>
        <table id="TabData<?=$b['id'];?>" class="TabData">
            <tr>
                <th class="TabId">Id</th>
                <th class="TabItem">Item</th>
                <th class="TabInfo">Info</th>
            </tr>
            <tr>        
                <td id="TabId" class="TabId"><?=$b['id'];?></td>
                <td id="TabItem" class="TabItem"><?=$b['item'];?></td>
                <td id="TabInfo" class="TabInfo"><?=$b['info'];?></td>
            </tr>
        </table>
        <?php endforeach;?>
    </div>
<!--------------------------Javascript goes here------------------------------------>
    <script>
        function DropDown(){
            //buat var lokal yg berisi elementId dari 'DropChild'
            var _DropC = document.getElementById('DropChild');
            //jika style 'DropChild' == block, maka rubah jadi none(agar terhide)
            if(_DropC.style.display == "block"){
                _DropC.style.display = "none";
            }
            //selain dari itu maka jadikan block(agar kelihatan)
            else{_DropC.style.display = "block";}
        }

        function ShowTable(id){
            //buat var lokal yg berisi ElementId dari TabData + id yg dikirim dari parameter
            var _elem = document.getElementById('TabData'+id);
            //rubah stylenya menjadi block(agar terlihat)
            _elem.style.display = "block";
        }

        function HideTable(id){
            //rubah style dari TabData+id menjadi none(agar terhide)
            document.getElementById('TabData'+id).style.display = "none";
        }
    </script>
<!-------------------------------------------------------------------------------->
</body>
</html>