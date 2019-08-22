<html>
    <head>
        <title>Script</title>
    </head>
     <body>
        <?php
        $jam = date("H-i-s");
        //$jam = ;
        $nama = "Widy";
        $gender= "L";
        echo "Sekarang jam ".$jam;
        echo "<br>";
        if ($jam < 10) echo "<br> Selamat Pagi ! <br>";
        if ($gender == "L") {
        
        	echo "Bu ".$nama;
    		echo "<br>" ;
    		if ($jam < 10) echo "Apakah mau juice ?";
		}
    	
		else {
				echo "Pak ".$nama;
				echo "<br>";
			if ($jam < 10) echo "Apakah mau kopi ?";
		}
		

				
        ?>
     </body>
			
</html>
