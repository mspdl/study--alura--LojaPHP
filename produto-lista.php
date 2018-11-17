<?php 

	include("conecta.php");
	include("banco-produto.php");
	include("cabecalho.php");

	$produtos = listaProdutos($conexao);
	if (array_key_exists("id", $_GET)){
		$id = $_GET['id'];
	}
	
	if(array_key_exists("removido", $_GET) && $_GET['removido']=="true") { ?>
		<p class="alert-success">Produto (Id: <?=$id;?>) foi apagado com sucesso.</p>
	<?php } ?>	

<table class="table table-striped table-bordered">
	<tr>
		<th>Produto</th>
		<th>Preço</th>
		<th>Descrição</th>
		<th>Categoria</th>
		<th>Remover?</th>
	</tr>
		<?php
			foreach ($produtos as $produto) :  
		?>
		<td><?=$produto['nome']?></td>
		<td>R$ <?=$produto['preco']?></td>
		<td><?=substr($produto['descricao'],0,40)?></td>
		<td><?=$produto['categoria_nome']?></td>
		<td>
			<form action="remove-produto.php" method="POST">
				<input type="hidden" name="id" value="<?=$produto['id']?>"></button>
				<button class="btn btn-danger">remover</button>
			</form>
		</td>
	</tr>
	<?php
			endforeach
	?>
</table>

<?php include("rodape.php"); ?>