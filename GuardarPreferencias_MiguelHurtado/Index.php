<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['idioma'] = $_POST['idioma'];
    $_SESSION['perfil'] = $_POST['perfil'];
    $_SESSION['zona'] = $_POST['zona'];
    $msg = "Información guardada en la sesión";
}

$idioma = $_SESSION['idioma'] ?? '';
$perfil = $_SESSION['perfil'] ?? '';
$zona = $_SESSION['zona'] ?? '';
?>

<form method="post">
    Idioma:
    <select name="idioma">
        <option value="inglés" <?= $idioma === 'inglés' ? 'selected' : '' ?>>Inglés</option>
        <option value="español" <?= $idioma === 'español' ? 'selected' : '' ?>>Español</option>
    </select><br>

    Perfil público:
    <select name="perfil">
        <option value="sí" <?= $perfil === 'sí' ? 'selected' : '' ?>>Sí</option>
        <option value="no" <?= $perfil === 'no' ? 'selected' : '' ?>>No</option>
    </select><br>

    Zona horaria:
    <select name="zona">
        <option value="GMT-2" <?= $zona === 'GMT-2' ? 'selected' : '' ?>>GMT-2</option>
        <option value="GMT-1" <?= $zona === 'GMT-1' ? 'selected' : '' ?>>GMT-1</option>
        <option value="GMT" <?= $zona === 'GMT' ? 'selected' : '' ?>>GMT</option>
        <option value="GMT+1" <?= $zona === 'GMT+1' ? 'selected' : '' ?>>GMT+1</option>
        <option value="GMT+2" <?= $zona === 'GMT+2' ? 'selected' : '' ?>>GMT+2</option>
    </select><br>

    <button type="submit">Establecer preferencias</button>
</form>

<?php if (!empty($msg)): ?>
    <p><?= $msg ?></p>
<?php endif; ?>

<a href="mostrar.php">Mostrar preferencias</a>