  <?php

    session_start();

    echo "<br>";
   echo "<h2>Veja o(s) item(s) do seu Carrinho de Compras</h2>";
   echo "<br>";
   
    if(isset($_SESSION['Carrinho']))
    {
		$Indice = $_SESSION['Indice'];
		$Carrinho = $_SESSION['Carrinho'];
		
		echo "<div class=\"panel panel-default\">
		<div class=\"panel-heading\">Produtos</div>
		<div class=\"panel-body\">";
		
		echo "<table class=\"table table-hover\" width='96%' align='center'>";
		echo "<thead><tr>
			  <td>Foto do Produto</td>
			  <td>Nome do Produto</td>
			  <td>Valor do Produto</td>
			  <td>Qtd</td>
			  <td>Excluir</td>
		</tr></thead>";

		/* bando de dados */
		for($i=0; $i < $Indice; $i++)
		{
		   $ID = $Carrinho[$i];
		   
		   $sql = "select * from produtos 
				   where  id ='$ID'";
				   
			$resultado = $conexao->query($sql);
			$linha = $resultado->fetch_object();
			echo "<tr>
			  <td><img src='./images/$linha->foto_produto' class='foto_carrinho' width='190' height='170'></td>
			  <td>$linha->nome</td>
			  <td>$linha->preco</td>
			  <td>01 unid.</td>
			  <td><a href='removeCarrinho.php?id=$linha->id'><img src='./images/delete.png'></a></td>
		    </tr>";
		} /* fecha o for */
		echo "</table>";
		echo "</div>
			</div>";
	}
	else
	{
	   echo "Não há itens no carrinho";
	}
  
  
?>
