<html>
    <head>
        <title>Halaman Login Blog</title>
    </head>
     <body>
     	<h1>Selamat Datang Di Blog PHP</h1>
    <?php

        if ($_POST["nama"] == "Syofyan") {
            echo "Selamat Datang ".$_POST["nama"]."<br>";
            if ($_POST["password"] == 123) {
                echo "Selamat, login anda berhasil";
            } else { 
                echo "Maaf, password anda salah<br>";
            }
        } else {
            echo "Maaf, ID tidak valid.<br>";
        }

        $jam = date("H-i-s");
        //$jam = ;
        $nama = $_POST["nama"];
        $gender= $_POST["gender"];
        echo "Sekarang jam ".$jam;
        //echo "<br>";
        if ($jam < 10) echo "<br> Selamat Pagi ! <br>";
        if ($gender == $_POST["gender"] = "Laki-laki") {
        
            echo "Pak ".$_POST["nama"];
            echo "<br>" ;
            if ($jam < 10) echo "Apakah mau kopi ?";
        }
        
        else {
                echo "Bu ".$_POST["nama"];
                echo "<br>";
            if ($jam < 10) echo "Apakah mau juice ?";
        }
        


        ?>


		
	</body>
</html>