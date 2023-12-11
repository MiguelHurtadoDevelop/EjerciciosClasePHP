<?php use Utils\Utils;?>
<?php if(isset($_SESSION['CategoriaActualizada']) && $_SESSION['CategoriaActualizada'] == 'complete'): ?>
    <strong>Categoria editada correctamente</strong>
<?php elseif(isset($_SESSION['CategoriaActualizada']) && $_SESSION['CategoriaActualizada'] == 'failed'):?>
    <strong>No se ha podido editar la Categoria</strong>
<?php endif;?>

<?php Utils::deleteSession('CategoriaActualizada');?>

<?php $categoria = null;

    if(isset($Categoria)):?>
    <?php $categoria = $Categoria;?>
    
<?php endif;?>

<form action="<?= BASE_URL ?>categoria/actualizarCategoria/" method="POST">
    <input type="hidden" name="categoria[id]" value="<?=$categoria['id']?>">

    <label for="nombre">Categoria</label>
    <input type="text" value="<?=$categoria['nombre']?>" name="categoria[nombre]" id="nombre" required>
    <?php if(isset($_SESSION['ErrorCategoria'])):?>
    <strong><?=$_SESSION['ErrorCategoria']?></strong>
    <?php endif;?>
    <?php Utils::deleteSession('ErrorCategoria');?>

    <input type="submit" value="Editar Categoria">
</form>
