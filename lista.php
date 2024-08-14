<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
    <link rel="stylesheet" href="stylelista.css">
</head>

<body>
    <header class="header">
        <img src="../Lista de contatos/barratopo.png" alt="Barra Topo">
    </header>

    <div class="container">
    <?php
        include 'db.php';
        $stmt = $conn->prepare("SELECT * FROM contato");
        $stmt->execute();
        $contatos = $stmt->fetchAll();

        foreach ($contatos as $contato) {
            echo '<div class="contact-card">';
            echo '    <div class="profile-picture">';
            echo '        <img id="profileImage" src="../Lista de contatos/icone_mais-removebg-preview.png" alt="Foto do Perfil">';
            echo '    </div>';
            echo '    <div class="contact-info">';
            echo '        <input type="text" value="' . htmlspecialchars($contato['id']) . '" readonly>';
            echo '        <input type="text" value="' . htmlspecialchars($contato['nome']) . '" readonly>';
            echo '        <input type="text" value="' . htmlspecialchars($contato['numero']) . '" readonly>';
            echo '    </div>';
            echo '</div>';
        }
    ?>
    </div>
    <form action="removereditar.php" method="get">
        <button type="submit" id="editremove">Remover/Editar</button>
        </form>
</body>

</html>


