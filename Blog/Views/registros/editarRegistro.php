<?php use Utils\Utils;?>
<?php if(isset($_SESSION['RegistroActualizado']) && $_SESSION['RegistroActualizado'] == 'complete'): ?>
    <strong>Registro editado correctamente</strong>
<?php elseif(isset($_SESSION['RegistroActualizado']) && $_SESSION['RegistroActualizado'] == 'failed'):?>
    <strong>No se ha podido editar el Registro</strong>
<?php endif;?>
<?php Utils::deleteSession('RegistroActualizado');?>


<form action="<?= BASE_URL ?>registro/actualizarRegistro/" method="POST">
    <input type="hidden" name="registro[id]" value="<?=$registro['id']?>">
    <label for="titulo">Titulo</label>
    <input type="text" value="<?=$registro['titulo']?>" name="registro[titulo]" id="titulo" required>

    <?php if(isset($_SESSION['errorTitulo'])):?>
    <strong><?=$_SESSION['errorTitulo']?></strong>
    <?php endif;?>
    <?php Utils::deleteSession('errorTitulo');?>

    <label for="descripcion">Descripción</label>
    <textarea  name="registro[descripcion]" id="descripcion"><?=$registro['descripcion']?></textarea>

    <?php if(isset($_SESSION['errorDescripcion'])):?>
    <strong><?=$_SESSION['errorDescripcion']?></strong>
    <?php endif;?>
    <?php Utils::deleteSession('errorDescripcion');?>

    <label for="categoria">Categoría</label>
    <select id="categoria" name="registro[categoria_id]">
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?php echo $categoria['id']; ?>" 
            <?php if ($categoria['id'] == $registro['categoria_id']) echo 'selected'; ?>>
            <?php echo $categoria['nombre']; ?>
        </option>
        <?php endforeach; ?>
    </select>

    <?php if(isset($_SESSION['errorCategoria'])):?>
    <strong><?=$_SESSION['errorCategoria']?></strong>
    <?php endif;?>
    <?php Utils::deleteSession('errorCategoria');?>


    <input type="submit" value="Editar Registro">
</form>

