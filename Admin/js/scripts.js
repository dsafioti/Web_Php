$(function() {	
	
	$("a.collapse-item").click(function() {	
		
		pagina = "views/"+$(this).attr('href');

		$("#conteudo-principal").load(pagina);
		return false;
		
	});
	
});