<html>
<head>
    
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<!-- PROSES PERHITUNGAN ADA DI SINI-->
<?php 
    $j1= 0.0;
    $j2= 0.0;
    $j3= 0.0;
    $j4= 0.0;
    $j5= 0.0;
    $namaAtlet = "";
    $namaKata = "";
    $kontingen = "";
    $totalPoint = 0;
    $sabuk = "ao";
    if(isset($_POST['proses'])){
        $j1= $_POST['j1'];
        $j2= $_POST['j2'];
        $j3= $_POST['j3'];
        $j4= $_POST['j4'];
        $j5= $_POST['j5'];
        $namaAtlet = $_POST['namaAtlet'];
        $namaKata = $_POST['namaKata'];
        $kontingen = $_POST['kontingen'];
        $sabuk = $_POST['sabuk'];
        $deret = [$j1,$j2,$j3,$j4,$j5];
        sort($deret);
        $deretHitung = array_slice($deret,1,3);
        $deretSisa = [$deret[0],$deret[4]];
        $totalPoint = array_sum($deretHitung);
    }
?>
<body onload="zoom()">
    <div class="content">
        <div class="header">
            <h3>SOLIDSPORT ORGANIZER</h3>
        </div>
        <form action="" method="post">
        <div class="score">
            <div <?php if($sabuk == 'ao'){ echo "style = 'background-color:#3f9dfd ;'";} ?> class="left">
                <h1><?php if($totalPoint == 0 ){echo ' ';}else{ echo number_format($totalPoint,2);}?></h1>
            </div>
            <div class="right">
                <h1><input name="namaAtlet" style="font-size:40px;" type="text" placeholder="NAMA ATLET" value=<?= $namaAtlet ?>></h1>
            </div>
            <div class="right">
                <h1><input name="namaKata"  style="font-size:40px;" type="text" placeholder="NAMA KATA" value=<?= $namaKata ?>></h1>
            </div>
            <div class="right">
                <h1><input name="kontingen"  style="font-size:40px;" type="text" placeholder="KONTINGEN" value=<?= $kontingen ?>></h1>
            </div>

        </div>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th style="background-color: white;color: black;">SOLIDSPORT</th>
                        <th <?php if($sabuk == 'ao'){ echo "style = 'background-color:#3f9dfd ;'";} ?>>J-1 <span class="dot"></span></th>
                        <th <?php if($sabuk == 'ao'){ echo "style = 'background-color:#3f9dfd ;'";} ?>>J-2 <span class="dot"></span></th>
                        <th <?php if($sabuk == 'ao'){ echo "style = 'background-color:#3f9dfd ;'";} ?>>J-3 <span class="dot"></span></th>
                        <th <?php if($sabuk == 'ao'){ echo "style = 'background-color:#3f9dfd ;'";} ?>>J-4 <span class="dot"></span></th>
                        <th <?php if($sabuk == 'ao'){ echo "style = 'background-color:#3f9dfd ;'";} ?>>J-5 <span class="dot"></span></th>
                        <th <?php if($sabuk == 'ao'){ echo "style = 'background-color:#3f9dfd ;'";} ?>>SABUK</th>
                        <th <?php if($sabuk == 'ao'){ echo "style = 'background-color:#3f9dfd ;'";} ?>>PROSES</th>
                        <th <?php if($sabuk == 'ao'){ echo "style = 'background-color:#3f9dfd ;'";} ?>>RESET</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-column="First Name">NILAI JURI</td>
                        <?php
                         $deret = [$j1,$j2,$j3,$j4,$j5];
                         $deretAsli = [$j1,$j2,$j3,$j4,$j5];
                         sort($deret);
                         $deretHitung = array_slice($deret,1,3);
                         $deretSisa1 = $deret[0];
                         $deretSisa2 = $deret[4];
                         $i=0;$x=1;$y=1;
                         foreach($deretAsli as $key => $val){
                            echo "<td style='font-size:30px;' data-column = J-'$i'>";if($val == $deretSisa1 and $x<=1){echo "<del style='color:red;'>".$val."</del></td>";$x++;}else if($val == $deretSisa2 and $y<=1){echo "<del style='color:red;'>".$val."</del></td>";$y++;}else{echo "".$val."</td>";}
                            
                            $i++;
                         } 
                        ?>
                        <td data-column="FAC">-</td>
                        <td data-column="JUMLAH">0</td>
                        <td data-column="HASIL">0</td>
                    </tr>
                    
                    <tr>
                        <td data-column="First Name">TEKNIK</td>
                        <td data-column="J-1"><input placeholder="0.0" step="0.1" min="0" max="10" style="font-size:30px;width:100px;" type="number" name="j1"></td>
                        <td data-column="J-2"><input placeholder="0.0" step="0.1" min="0" max="10" style="font-size:30px;width:100px;" type="number" name="j2"></td>
                        <td data-column="J-3"><input placeholder="0.0" step="0.1" min="0" max="10" style="font-size:30px;width:100px;" type="number" name="j3"></td>
                        <td data-column="J-4"><input placeholder="0.0" step="0.1" min="0" max="10" style="font-size:30px;width:100px;" type="number" name="j4"></td>
                        <td data-column="J-5"><input placeholder="0.0" step="0.1" min="0" max="10" style="font-size:30px;width:100px;" type="number" name="j5"></td>
                        <td data-column=""><div class="custom-select">
                            <select style="font-size:20px;width:150px;"   name="sabuk" id=""><option value="ao">AO</option><option value="aka">AKA</option></select>
                        </div></td>
                        <td data-column=""><input name="proses" class="button" style="font-size:20px;width:150px;" type="submit" value="PROSES"></td>
                        <td data-column=""><form action=""><input name="reset" class="button" style="background-color: #f44336;font-size:20px;width:150px;" type="submit" value="RESET"></form></td>
                    </tr>
                    </form>
                </tbody>
            </table>
        </div>
</body>
<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "90%" 
        }
</script>
</html>