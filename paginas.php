<?php
    $pg = isset($_GET['pg']) && $_GET['pg'] < 50 ? $_GET['pg'] : 0;
    $stsjogo = array();
    $jogos = array();

    while(count($jogos) < $pg*6) {
        $jogo = array();
        while (count($jogo) < 16) {
            $num = rand(1, 90);
            if (!in_array($num, $jogo)) {
                $jogo[] = $num;
            }
        }
        sort($jogo);
        $stjogo = json_encode($jogo);
        if(!in_array($stjogo, $stsjogo)){
            $stsjogo[] = $stjogo;
            $jogos[] = $jogo;
        }
    }

    $q = 0;
    $x = 1;
    foreach($jogos as $jogo){
        $y = 0;
        echo "<table style='float:left; margin:50px; border:1px solid black;' cellpadding='0' cellspacing='0'>";
        for ($i = 0; $i < 4; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 4; $j++) {
                echo "<td style='font-size:20px; border:1px solid black; padding:15px; text-align:center'>" . $jogo[$y] . "</td>";
                $y++;
            }
            echo "</tr>";
        }
        echo "</table>";
        $q++;
        if($q == 6) {
            echo "<div style='page-break-after: always;'></div>";
            $q = 0;
            $x = 1;
        }
        $x++;
    }