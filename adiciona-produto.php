<?php 
	include("cabecalho.php");
	include("conecta.php");
	include("banco-produto.php"); 
	$nome = $_POST["nome"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];
	$categoria_id = $_POST["categoria_id"];

	if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id)) {
		?>
		<p class="alert-success">Produto <?=$nome;?>, por R$ <?=$preco;?> adicionado com sucesso!</p>
		<?php
	} else {
		$msg = mysqli_error($conexao);
?>
<p class="alert-danger">O produto <? = $nome; ?> não foi adicionado<br><?= $msg ?></p>
<?php
	}
?>

<?php include("rodape.php"); ?>