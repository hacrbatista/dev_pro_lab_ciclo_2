function excluir(id) {
	$('#modal').find(".modal-body").html('Tem certeza que deseja excluir o id: '+id+'?<br><button onclick="excluirUsuario('+id+')">Sim</button><button onclick="fechar()">Não</button>');
	$('#modal').modal("show");
}

function fechar() {
	$('#modal').modal("hide");
}

function excluirUsuario(id) {
	
	$.ajax({
		url:'excluir.php',
		type:'POST',
		data:{id:id},
		success:function() {
			alert("Usuário excluído com sucesso!");
			window.location.href = window.location.href;
		}
	});

}