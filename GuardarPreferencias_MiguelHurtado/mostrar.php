<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_unset();
    $msg = "Información de la sesión eliminada";
}

$idioma = $_SESSION['idioma'] ?? 'No establecido';
$perfil = $_SESSION['perfil'] ?? 'No establecido';
$zona = $_SESSION['zona'] ?? 'No establecido';
?>

<p>Idioma: <?= $idioma ?></p>
<p>Perfil público: <?= $perfil ?></p>
<p>Zona horaria: <?= $zona ?></p>

<form method="post">
    <button type="submit">Borrar preferencias</button>
</form>

<?php if (!empty($msg)): ?>
    <p><?= $msg ?></p>
<?php endif; ?>

<a href="index.php">Establecer preferencias</a>
