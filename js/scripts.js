sorteados = new Array();
arrSort = new Array();
total = 0;
tam = 90;

var floreio = {};
floreio[1] = "Começou o jogo";
floreio[11] = "Um atrás do outro";
floreio[18] = "Minha idade";
floreio[22] = "Dois patinhos na lagoa";
floreio[33] = "Idade de Cristo";
floreio[45] = "Fim do primeiro tempo";
floreio[51] = "Uma boa ideia";

function fala(texto){
    if(isNaN(texto) || floreio[texto] == undefined) {
        msg = new SpeechSynthesisUtterance(texto);
    }else{
        msg = new SpeechSynthesisUtterance(texto + ' ' + floreio[texto]);
    }
    window.speechSynthesis.speak(msg);
}
function ultimosSorteios(num){
    sorteados[sorteados.length] = num;
    var sort = '';
    var sai = sorteados.length > 8 ? 8 : sorteados.length;
    var x = 8;
    var y = 0;
    while(x > 0 && y < sorteados.length){
        sort+= sorteados[(sorteados.length-1) - y]+'<br/>';
        x--;
        y++;
    }
    $('.ultimosNumeros').html(sort);
}
function sorteia(){
    achou = false;
    if(total < tam) {
        while(!achou) {
            num = Math.random() * tam+1;
            num = parseInt(num);
            i = arrSort.indexOf(num);
            if (arrSort.indexOf(num) == -1 && num > 0) {
                $('#tds' + num).css({'background-color': 'lightslategrey'});
                $('.numeroSorteado').text(num < 10 ? '0'+num : num);
                arrSort[arrSort.length] = num;
                ultimosSorteios(num);

                achou = true;
                total++;

                //Voz
                for(i=0; i<2; i++){
                    fala(num);
                }
                // - Fim da voz
            }
        }
    }else{
        if(confirm('Jogo encerrado. Deseja reinicia-lo?')){
            location.reload();
        }
    }
}
function embaralha(){
    texto = 'Números embaralhados com sucesso';
    fala(texto);
}
function redimensiona(){
    altura = window.innerHeight;
    altTit = $('#navTit').height();
    tamPrinc = $('#contPrinc').height();

    tamPrinc = tamPrinc;
    tamMarg = ((altura-altTit-tamPrinc) / 2)-15;

    $('#contPrinc').css({
        'padding-top' : tamMarg,
        'padding-bottom' : tamMarg
    });
}
function bingo(){
    fala('Alguém ganhou o bingo');
}
function cantando(){
    fala('Calma que já estou cantando o bingo');
}
$(document).keypress(function(e){
    cod = e.keyCode || e.charCode;
    switch(cod){
        case 13:
            sorteia();
            break;
        case 113:
            location.reload();
            break;
        case 101:
            embaralha();
            break;
        case 98:
            bingo();
            break;
        case 99:
            cantando();
            break;
    }
    return false;
});
$(document).ready(function(){
    redimensiona();
    $('.btSortear').click(function(){
        sorteia();
    });
    $('.btNovoJogo').click(function(){
        location.reload();
    });
    $('.btEmbaralhar').click(function(){
        embaralha();
    });
    $('#btGerarPaginas').click(function(){
        val = $('#paginas').val();
        if(val != '' && val < 50){
            window.open('../paginas.php?pg='+val);
        }
    });
    $('.numeroSorteado').click(function(){
       sorteia();
    });
});