function verificar(){
    var nome = document.forms['formulario']['nome'].value;
    var email = document.forms['formulario']['email'].value;
    var assunto = document.forms['formulario']['assunto'].value;
    var mensagem = document.forms['formulario']['mensagem'].value;

    // verifica se estão em branco
    if(nome == '' || email == '' || assunto == '' || mensagem == ''){
        alert('Todos os campos são obrigatórios!');
        return false;
    }

    // remove espaços em branco
    nome = nome.trim();
    email = email.trim();
    assunto = assunto.trim();
    mensagem = mensagem.trim();
    
    // capitalize
    nome = nome[0].toUpperCase() + nome.slice(1);
    assunto = assunto[0].toUpperCase() + assunto.slice(1);
    mensagem = mensagem[0].toUpperCase() + mensagem.slice(1);
}