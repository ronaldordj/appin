<?php
// Include database config file
$db = new mysqli('localhost', 'root', 'root' , 'eletrimax_db');
        
// Get search term
$searchTerm = $_GET['term'];

// Get matched data from the database
$query = "SELECT pc.Id, pc.Descricao  
	        from portfolio_categoria pc
		WHERE pc.Descricao LIKE '$searchTerm%'";
		   
$result = $db->query($query);

// Generate users data array
$userData = array();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $name = $row['Descricao'];
        $data['idcategoria']  = $row['Id'];		
        $data['value']   = $name;		
        /*$data['label']  = '        
		<a href="javascript:void(0);">  			
			<img src="ver_imagem.php?id='.$row['id'].'" width="60" height="60"/>
            <span>'.$name.'</span>
        </a>';*/
        array_push($userData, $data);		
    }
}

// Return results as json encoded array
echo json_encode($userData);
//print_r($userData);
?>