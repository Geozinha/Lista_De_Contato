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
        <div class="profile-name">Perfil</div>

        <?php
        include 'db.php';
        $id = 1; 
        $stmt = $conn->prepare("SELECT * FROM contato WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $contato = $stmt->fetch();

        if ($contato) {
            echo '<form method="post" action="remover_editar.php">';
            echo '    <input type="text" name="nome" value="' . htmlspecialchars($contato['nome']) . '" readonly>';
            echo '    <input type="text" name="numero" value="' . htmlspecialchars($contato['numero']) . '" readonly>';
            echo '    <input type="hidden" name="id" value="' . $contato['id'] . '">';
            echo '    <button type="submit" name="remove" id="remove">Remover</button>';
            echo '</form>';
        } else {
            echo "<p>Contato não encontrado.</p>";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove'])) {
            $idToRemove = $_POST['id'];
            $stmt = $conn->prepare("DELETE FROM contato WHERE id = :id");
            $stmt->bindParam(':id', $idToRemove);

            if ($stmt->execute()) {
                echo "<script>alert('Contato removido com sucesso!'); window.location.href = 'remover_editar.php';</script>";
            } else {
                echo "<p>Erro ao remover contato.</p>";
            }
        }
        ?>
    </div>
</body>
</html>


