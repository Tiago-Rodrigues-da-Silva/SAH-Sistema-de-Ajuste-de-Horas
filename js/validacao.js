
//----------------------Validações email e senha página Home-------------------------//
function valida_home(){

    if (!valida_email()){
        alert('Por favor, preencha o campo email corretamente');
        document.getElementById("email").focus();
    }

    if (!valida_senha()){
        alert('Por favor, preencha o campo senha');
        document.getElementById("senha").focus();
    }
}

function valida_email(){
    email = document.getElementById("email");
    var re =/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
    return re.test(email.value);
}

function valida_senha(){
    senha = document.getElementById("senha");
    if(senha.value == ""){
    return false;
    } else return true;
}

//--------------Máscaras de campos data e hora-----------------//

function mascaraHora(campo, valor){ 
    var myhora = ''; 
    myhora = myhora + valor; 
    if (myhora.length == 2){ 
        myhora = myhora + ':'; 
        campo.value = myhora; 
    } 
}

function mascaraData(campo, valor){ 
    var mydata = ''; 
    mydata = mydata + valor; 
    if (mydata.length == 2){ 
        mydata = mydata + '/'; 
        campo.value = mydata; 
    } 
    if (mydata.length == 5){ 
        mydata = mydata + '/'; 
        campo.value = mydata; 
    } 
}

//----------------------Validações página Insere-------------------------//

function valida_camposInsere(){
    data = document.getElementById("data");
    horaEntrada = document.getElementById("horaEntrada");
    horaSaida = document.getElementById("horaSaida");

    if(!validarData(data)){
        alert("A Data " + data.value + " é inválida!");
        document.getElementById("data").focus();
        return false;
    } else if(!validarHora(horaEntrada)){
        alert("O horário " + horaEntrada.value + " é inválido!");
        document.getElementById("horaEntrada").focus();
        return false;
    } else if(!validarHora(horaSaida)){
        alert("O horário " + horaSaida.value + " é inválido!");
        document.getElementById("horaSaida").focus();
        return false;
    } else if(!calculaHoras(horaEntrada, horaSaida)){
        alert("Hora de saída não pode ser anterior a hora de entrada");
        horaSaida.focus();
        return false;
    }else {
        return true;
    };
}

//------------------Validações páginas Edita e Visualiza----------------------//


function valida_camposConsulta(){
    dataInicio = document.getElementById("dataInicio");
    dataFinal = document.getElementById("dataFinal");

    if(!validarData(dataInicio)){
        alert("A Data " + dataInicio.value + " é inválida!");
        document.getElementById("dataInicio").focus();
        return false;
    } else if(!validarData(dataFinal)){
        alert("A Data " + dataFinal.value + " é inválida!");
        document.getElementById("dataFinal").focus();
        return false;
    } else if (!calculaDias(dataInicio, dataFinal)){
        alert("Data final não pode ser anterior a data inicial");
        document.getElementById("dataFinal").focus();
        return false;
    }else {
        return true;
    };
}

//---------------------------Utilitários----------------------------//

function validarData(campo){ 
    dia = (campo.value.substring(0,2)); 
    mes = (campo.value.substring(3,5)); 
    ano = (campo.value.substring(6,10)); 

    situacao = true; 
    // verifica o dia valido para cada mes 
    if ((dia < 01)||(dia < 01 || dia > 30) && (  mes == 04 || mes == 06 || mes == 09 || mes == 11 ) || dia > 31) { 
        situacao = false; 
    } 

    // verifica se o mes e valido 
    if (mes < 01 || mes > 12 ) { 
        situacao = false; 
    } 

    // verifica se e ano bissexto 
    if (mes == 2 && ( dia < 01 || dia > 29 || ( dia > 28 && (parseInt(ano / 4) != ano / 4)))) { 
        situacao = false; 
    } 

    //verifica se ano 2021
    if (ano != 2021){
        situacao = false;
    }

    //verifica se campo está em branco
    if (campo.value == "") { 
        situacao = false; 
    } 

    return situacao;    
} 

function validarHora (campo) { 
 
    hora = (campo.value.substring(0,2)); 
    minuto = (campo.value.substring(3,5)); 
    situacao = true; 

    // verifica se a hora é valida 
    if (hora < 0 || hora > 24) { 
        situacao = false; 
    } 

    // verifica se o minuto é valido 
    if (minuto < 0 || minuto > 59 ) { 
        situacao = false; 
    } 

    //verifica se campo está em branco
    if (campo.value == "") { 
        situacao = false; 
    } 

    return situacao;
} 

function calculaHoras (horaEntrada, horaSaida){
    total = 0;
    total = transfHHparaMM(horaSaida) - transfHHparaMM(horaEntrada);
    if (total < 0){
        return false;
    } else {
        return true;
    }
}

function transfHHparaMM (horaString){
    hora = (horaString.value.substring(0,2)); 
    minuto = (horaString.value.substring(3,5)); 
    return (hora * 60) + minuto;
}

function calculaDias(dataInicial, dataFinal){

    dia = (dataInicial.value.substring(0,2)); 
    mes = (dataInicial.value.substring(3,5)); 
    ano = (dataInicial.value.substring(6,10)); 
    var date1 = new Date(ano, mes, dia);

    dia = (dataFinal.value.substring(0,2)); 
    mes = (dataFinal.value.substring(3,5)); 
    ano = (dataFinal.value.substring(6,10)); 
    var date2 = new Date(ano, mes, dia);

    var timeDiff = (date2.getTime() - date1.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
    if (diffDays < 0){
        return false;
    } else {
        return true;
    }

}