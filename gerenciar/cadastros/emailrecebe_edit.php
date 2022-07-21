<?php 
    include '../config/conecta.php'; 
    $id = base64_decode($_GET['date']);
    
    //Executa consulta
    $sql = "SELECT * FROM cd_emailrecebe WHERE Id = $id";
    $sql_result = mysqli_query( $conexao, $sql )or die( 'Erro:'.mysqli_error( $conexao ) );
    $resultado = mysqli_fetch_array( $sql_result );
?>
<!DOCTYPE html>
<html lang='pt-br'>

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <title>Painel Admin - Eletrimax</title>

    <!-- Custom fonts for this template-->
    <link href='../vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template-->
    <link href='../css/sb-admin.css' rel='stylesheet'>

</head>

<body class='bg-dark'>
    <div class='container'>
        <div class='card card-register mx-auto mt-5'>
            <div class='card-header'>Editando Cadastro de E-mail's Receptores <?php echo '('.$resultado['Email'].')';?>
            </div>
            <div class='card-body'>
                <form action='../processa/proc_edit_emailrecebe.php' method='post'>
                <input name='id' type='hidden' id='id' class='form-control'
                    value="<?php echo $resultado['Id'];?>" />
                    <div class='form-group'>
                        <div class='form-row'>
                            <div class='col-xs-12 col-md-6 col-lg-6'>
                                <div class='form-label-group'>
                                    <input name='email' type='email' id='email' class='form-control'
                                        placeholder='E-mail' required='required'
                                        value="<?php echo $resultado['Email'];?>" maxlength='80' />
                                    <label for='email'>E-mail</label>
                                </div>
                            </div>
							<div class='col-xs-12 col-md-6 col-lg-6'>
                                <div class='form-label-group'>
                                    <select name='tipo' id='tipo' class='form-control' required='required'>
                                        <option value="<?php echo $resultado['Tipo'];?>">
                                            <?php 
                                                switch ($resultado['Tipo']) {
                                                    case "N":
                                                        echo "Newsletter";
                                                    break;                                                    
                                                    case "F":
                                                        echo "Formulário";
                                                    break;

                                                }                                                
                                            ?>
                                        </option>
                                        <option value='N'>Newsletter</option>                                       
                                        <option value='F'>Formulário</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                    </div>                                 

                    <div class='form-group'>
                        <div class='form-row'>
                            <div class='col-xs-2 col-md-2 col-lg-2'>
                                <div class='form-check'>
                                    <input name='ativo' class='form-check-input' type='radio' id='ativo' value='1' <?php if ( $resultado['Ativo'] == 1 ) {
                                        echo 'checked';
                                    }
                                    ?>>
                                    <label class='form-check-label' for='ativo'>
                                        Ativo
                                    </label>
                                </div>
                            </div>
                            <div class='col-xs-2 col-md-2 col-lg-2'>
                                <div class='form-check'>
                                    <input name='ativo' class='form-check-input' type='radio' id='ativo' value='0' <?php if ( $resultado['Ativo'] == 0 ) {
                                        echo 'checked';
                                    }
                                    ?> <label class='form-check-label' for='ativo'>
                                    Inativo
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type='submit' class='btn btn-success btn-block'>Salvar</button>

                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src='../vendor/jquery/jquery.min.js'></script>
    <script src='../vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

    <!-- Core plugin JavaScript-->
    <script src='../vendor/jquery-easing/jquery.easing.min.js'></script>                                

</body>

</html>