var erro = false; 
function validaEmail (){
    var vEmail = document.getElementById("iEmail").value;
    var vE = /^[\w+.]+@\w+\.\w{2,}(?:\.\w{2})?$/;
    if (!vE.test(vEmail)){
    window.alert("E-mail: "+vEmail+" inválido");
    erro = true;   
    }
}

function validaTelefone (){
    var vFone = document.getElementById("iFone").value;
    var vF = /(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})/ ;
    if (!vF.test(vFone)){
        window.alert("Telefone "+vFone+" inválido!");
        erro = true;
    }
}

function validaTudo (){
    
    var nome = document.forms["fInteressados"]["iNome"].value;
    if (nome == "" || nome == null){
        window.alert("Nome deve ser informado.")
        erro = true;
    }
    
    var email = document.forms["fInteressados"]["iEmail"].value;
    if (email == "" || email == null){
        window.alert("Email deve ser informado.")
        erro = true;
    }else{
        validaEmail ();
    }
    var fone = document.forms["fInteressados"]["iFone"].value;
    if (fone == "" || fone == null){
        window.alert("Telefone deve ser informado.")
        erro = true;
    }else{
       validaTelefone (); 
    }
    if(erro == false){
        return true;
    }
    else{
        return false;
    }
}
$(document).ready(function(){
    $('#fInteressados').submit(function(){
        return validaTudo();
    })
    $('#sEstado').change(function(){
        sigla = $("#sEstado").val();
        acao = "consulta_cidades.php?estado="+sigla;
        $("#sCidade").empty();
        $.get(acao, function(opcoes, status){
            $("#sCidade").append(opcoes);
        });  
    })
});
function excluiInteressado(emailInformado){
    $.post("deletaInteressado.php", {email : emailInformado}, function(data){
        $.get("funcaoListaInteressados.php", function(texto){
            $("#tabela").html(texto);
        })
    })
}
