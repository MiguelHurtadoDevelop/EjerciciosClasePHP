<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tienda de zapatos</title>
</head>
<body>
<header>
    <h1>La tiendita</h1>
    <?php if (isset($_SESSION['login']) AND $_SESSION['login']!='failed'):?>
        <h2><?=$_SESSION['login']->nombre?> <?=$_SESSION['login']->apellidos?></h2>
    <?php endif;?>
    <nav>
        <?php if (!isset($_SESSION['login']) OR $_SESSION['login']=='failed'):?>
            <a href="<?=BASE_URL?>usuario/login/">Identificarse</a>
            <a href="<?=BASE_URL?>usuario/registro/">Registrarse</a>

        <?php else:?>
            <?php if($_SESSION["rol"]= "admin"):?>
                <a  href="<?=BASE_URL?>categoria/gestionarCategoria/">Gestionar Categorias</a>
                <a  href="<?=BASE_URL?>producto/gestionarProducto/">Gestionar Productos</a>
            <?php endif;?>
            <a href="<?=BASE_URL?>usuario/logout/">Cerrar Sesión</a>
        <?php endif;?>
    </nav>
</header>

<?php $categorias = \Controllers\CategoriaController::obtenerCategorias()?>

<nav id="menu_cat">
    <ul>
        <?php foreach ($categorias as $categoria):?>

        <li >
            <a href="#"><?php echo($categoria['nombre']);?></a>
        </li>

        <?php endforeach;?>
    </ul>
</nav>
