<?php 

include("conecta.php");
include("banco-produto.php");
include("cabecalho.php");

$id = $_POST['id'];
if (removeProduto($conexao, $id)) { ?>
	<?php header("location: produto-lista.php?removido=true&id={$id}") ?>
<?php } else {
	$msg = mysqli_error($conexao); ?>
	<p class="text-danger">O produto <?=$id;?> não foi removido</p>
	<p class="text-danger"><?=$msg?></p>
<?php 
}
die ();
?>