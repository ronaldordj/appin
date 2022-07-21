<?php
include '../../config/conecta.php';

// Get search term
$searchTerm = $_GET['term'];

// Get matched data from the database
$query = "SELECT Idproduto, Descricao, Valor, Imagem
            FROM cd_produto
            WHERE Descricao LIKE '%$searchTerm%'";
$result = $conexao->query($query);

// Generate users data array
$userData = array();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $name = utf8_encode($row['Descricao']);        
		$img = $row['Imagem'];
        $data['idproduto']  = $row['Idproduto'];		
        $data['valor']  = $row['Valor'];		
        $data['value']   = $name;		
        $data['label']  = '<table class="table table-striped">
				<tr>					
					<td><span><img src="../../gerenciar/imagens/produtos/'.$img.'" height="50px"></span></td>
					<td><span>'.utf8_decode($name).'</span></td>
				</td>
			</table>';		
        array_push($userData, $data);		
    }
}

// Return results as json encoded array
echo json_encode($userData);
//print_r($userData);
?>