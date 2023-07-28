<?php
    $qtdNumeros = 90;
    $qtdPorPagina = 20;
    $limite = 100;
    $qtdCartela = 16;

    $pg = isset($_GET['pg']) && $_GET['pg'] < $limite ? $_GET['pg'] : 0;
    $stsjogo = array();
    $jogos = array();

    while(count($jogos) < $pg*$qtdPorPagina) {
        $jogo = array();
        while (count($jogo) < $qtdCartela) {
            $num = rand(1, $qtdNumeros);
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
        $q++;

        echo "<table style='float:left; margin:13px; cellpadding='0' cellspacing='0'>";
        echo "<tr><td>".$x."</td></tr>";
        
        for ($i = 0; $i < 4; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 4; $j++) {
                echo "<td style='font-size:16px; border:1px solid black; padding:10px; text-align:center'>" . $jogo[$y] . "</td>";
                $y++;
            }
            echo "</tr>";
        }
        
        echo "</table>";
        
        if($q == $qtdPorPagina) {
            echo "<div style='width: 100%; page-break-after: always;'>.</div>";
            $q = 0;
            $x = 0;
        }
        
        $x++;
    }