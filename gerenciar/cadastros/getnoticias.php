<?php
// Include database config file
include '../config/conecta.php';
        
// Get search term
$searchTerm = $_GET['term'];

// Get matched data from the database
$query = "SELECT Id, Titulo  
	        from noticias
		WHERE Titulo LIKE '$searchTerm%'";
		   
$result = $conexao->query($query);

// Generate users data array
$userData = array();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $name = $row['Titulo'];
        $data['idnoticia']  = $row['Id'];		
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