function validaForm() {
	var nome = document.forms["formulario"]["nome"].value;
	var email = document.forms["formulario"]["email"].value;
	var mensagem = document.forms["formulario"]["msg"].value;

	if (nome == "" && email == "" && mensagem == "" ) {
		alert("Erro! Preencha os campos obrigatórios e tente novamente.");
		return false;
	}
	if (nome == ""){
		alert("Preencha o nome e tenta novamente.");
		return false;
	}
	if (email == ""){
		alert("Preencha o email e tenta novamente.");
		return false;
	}
	if (mensagem == ""){
		alert("Preencha a mensagem e tenta novamente.");
		return false;
	}
}