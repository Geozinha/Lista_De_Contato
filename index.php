<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header class="header">
        <img src="../Lista de contatos/barratopo.png" alt="Barra Topo">
    </header>
    <div class="container">
        <div class="profile-picture">
            <img id="profileImage" src="../Lista de contatos/icone_mais-removebg-preview.png" alt="Foto do Perfil">
        </div>
        <button id="add-button">+</button>
        <div class="profile-name">Adicionar perfil</div>
        <form action="index.php" method="post">
            <input type="text" placeholder="Nome do contato" name="nome" id="nome" required>
            <input type="text" placeholder="Número do contato" name="numero" id="numero" required>
            <button type="submit" id="salvar">Salvar</button>
        </form>
        <form action="lista.php" method="get">
        <button type="submit" id="visualizar">Visualizar</button>
        </form>
        <?php 
        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
            include 'db.php';
            $nome = $_POST['nome'];
            $numero = $_POST['numero'];

            $stmt = $conn -> prepare('INSERT INTO contato (nome, numero) VALUES (:nome, :numero)');
            $stmt -> bindParam(':nome', $nome);
            $stmt -> bindParam(':numero', $numero);

            if($stmt -> execute()){
                echo "<script>alert('Contato salvo!')</script>";
            }else{      
                echo "<p> Erro em salvar o contato</p>";
            };
        }
        ?>
    </div>
</body>

</html>