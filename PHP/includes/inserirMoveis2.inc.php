<?php

if (isset($_POST['submit'])) {
    require_once 'bdconnect.inc.php';
    require_once 'functions.php';

    $moveisNome = $_POST['moveisNome'];
    $moveisCodigo = $_POST['moveisCodigo'];
    $moveisValor = $_POST['moveisValor'];
    $moveisCaract = $_POST['moveisCaract'];
    $moveisDisp = $_POST['moveisDisp'];
    $moveisTipo = $_POST['Tipo'];

    // Processamento do Upload da Imagem
    if (emptyInputMoveis($moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp, $moveisTipo) !== false) {
        header("location: ../TSTE.php?error=emptyinput");
        exit();
    }

    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "../../img/";  // Diretório onde a imagem será armazenada
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem real
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }

        // Verifica se o arquivo já existe
        if (file_exists($target_file)) {
            echo "Desculpe, o arquivo já existe.";
            $uploadOk = 0;
        }

        // Verifica o tamanho do arquivo
        if ($_FILES["file"]["size"] > 6000000) {  // 500KB máximo
            echo "Desculpe, o arquivo é muito grande.";
            $uploadOk = 0;
        }

        // Permite apenas certos formatos de arquivo
        $allowed_types = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowed_types)) {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
            $uploadOk = 0;
        }

        // Verifica se $uploadOk está definido como 0 por algum erro
        if ($uploadOk == 0) {
            echo "Desculpe, seu arquivo não foi carregado.";
        } else {
            // Se tudo estiver ok, tenta fazer o upload do arquivo
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // Chama a função para inserir dados no banco de dados, incluindo o caminho da imagem
                $imageName = basename($_FILES["file"]["name"]);  // Obtém apenas o nome do arquivo
                insertMoveisimg($conn, $moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp, $moveisTipo, $imageName);
            } else {
                echo "Desculpe, houve um erro ao carregar seu arquivo.";
            }
        }
    } else {
        echo "Nenhum arquivo foi enviado ou houve um erro no upload.";
    }
}

function insertMoveisimg($conn, $moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp, $moveisTipo, $moveisimage) {
    $sql = "INSERT INTO moveis (moveisValor, moveisCodigo, moveisNome, moveisCaract, moveisDisp, moveisTipo, moveisimage) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); // prevenir MSQL injection com os prepared statements

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../inserirMoveis.php?error=stmtfailedUSER");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp, $moveisTipo, $moveisimage);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../inserirMoveis.php?error=none");
    exit();
}
?>
