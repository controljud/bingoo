<?php
    if(isset($_GET['narracao']) && isset($_GET['piada'])){
        $narracao = $_GET['narracao'];
        $piada = $_GET['piada'];
    }else{
        $narracao = 1;
        $piada = 1;
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/estilos.css" type="text/css">
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-default" id="navTit">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Bingoo!</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" class="btNovoJogo">Novo jogo</a></li>
                        <li><a href="#" class="btEmbaralhar">Embaralhar</a></li>
                        <li><a href="#" class="btSortear">Sortear</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-1 text-center" id="contPrinc">
            <div class="row">
                <div class="col-md-1" style="text-align:right">
                    <input style="width:15px; margin:12px" type="checkbox" id="play_voice" name="play_voice" <?php if($narracao == 1){ ?>checked<?php } ?>/>
                </div>
                <div class="col-md-1">Narração</div>
                <div class="col-md-1" style="text-align:right">
                    <input style="width:15px; margin:12px" type="checkbox" id="jokes" name="jokes" <?php if($narracao == 0) {?>disabled="disabled"<?php }else{ if($piada == 1){?> checked<?php }}?>/>
                </div>
                <div class="col-md-1">Piadas</div>
                <div class="col-md-8"></div>
            </div>

            <div class="row">
                <div class="col-md-3">Últimos números</div>
                <div class="col-md-3">Sorteio</div>
                <div class="col-md-6">Sorteados</div>
            </div>

            <div class="row">
                <div class="col-md-3 txt-center">
                    <div class="ultimosNumeros"></div>
                </div>
                <div class="col-md-3 txt-center">
                    <div class="numeroSorteado">00</div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table">
                            <?php
                            $x=0;
                            for($i=0; $i<9; $i++){
                                echo "<tr>";
                                for($j=0; $j<10; $j++){
                                    $x++;
                                    echo "<td id='tds".$x."'>" . ($x < 10 ? '0'.$x : $x) . "</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <dif class="row">
                <div class="col-md-1" style="text-align: right">
                    <input style="width:15px; margin:12px" type="checkbox" name="st-automatico" id="st-automatico" />
                </div>
                <div class="col-md-1">Automático</div>
                <div class="col-md-2">
                    <div class="ct-at-buttons">
                        <a href="javascript:void(none)" name="st-play" id="st-play"><span class="glyphicon glyphicon-play white" aria-hidden="true"></span></a>&nbsp;&nbsp;
                        <a href="javascript:void(none)" name="st-pause" id="st-pause" style="display:none"><span class="glyphicon glyphicon-pause white" aria-hidden="true"></span></a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="img-loading">
                        <img src="images/gear_02.gif" class="img-load"/>
                    </div>
                </div>
            </dif>
        </div>
        
        <div class="container-fluid bg-2 text-center">
            <h3>Como jogar?</h3>
            <p>Bingoo é um jogo normal de bingo com 90 casas decimais, que serão sorteadas aleatoriamente para preenchimento ou marcação em papel.</p>
            <p>Para sortear o próximo número, é necessário clicar em "Sortear".</p>
            <p>O botão "Embaralhar" serve apenas para o pessoal que fica dizendo que o bingo está sendo fraldado, não possui nenhuma ação no sorteio dos números.</p>
            <p>Para finalizar o jogo atual e iniciar um novo jogo, clique em "Novo jogo".</p>
            <p>Na coluna da esquerda é mostrado os oito (8) últimos números sorteados, no meio o último e no canto esquerdo todos os números sorteados.</p>
            <p>É importante notar que a página está escutando os comandos do teclado, ou seja, a tecla [ENTER] sorteará um novo número, a tecla "E" embaralhará o jogo e a tecla "Q" iniciará um novo jogo.</p>
            <p>Se a página for atualizada, perderá o jogo atual.</p>
        </div>

        <div class="container-fluid bg-3 text-center">
            <h3>Como consigo os papéis para marcação do jogo?</h3>
            <p>Preencha o campo abaixo informando a quantidade de folhas de jogo que necessita. Cada folha possui 6 combinações, cada combinação com 15 números, com sequências que não se repetem independente da quantidade de folhas que selecione, desde que dentro do intervalo permitido.</p>
            <hr/>
            <div class="row">
                <div class="col-md-2">
                    <input type="number" placeholder="Páginas" class="form-control" id="paginas"/>
                </div>
                <div class="col-md-2">
                    <a href="#" class="btn btn-success" id="btGerarPaginas">Gerar páginas</a>
                </div>
                <div class="col-md-4">
                    <p>A quantidade não pode ultrapassar 50 páginas</p>
                </div>
            </div>
        </div>
    </body>
</html>