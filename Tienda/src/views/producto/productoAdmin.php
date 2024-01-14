<?php

use Utils\Utils; ?>
<?php if(isset($_SESSION['ProductoAñadido']) && $_SESSION['ProductoAñadido'] == 'complete'): ?>
    <strong>Producto añadido correctamente</strong>
<?php elseif(isset($_SESSION['ProductoAñadido']) && $_SESSION['ProductoAñadido'] == 'failed'):?>
    <strong>No se ha podido añadir</strong>
<?php endif;?>
<?php Utils::deleteSession('ProductoAñadido');?>

<?php $productos = \src\controllers\ProductoController::obtenerProductos() ?>
<a  href="<?=BASE_URL?>producto/addProduct/">Añadir Producto</a>
<table>

        <?php foreach ($productos as $producto):?>
    <tr>
            <td>
                <?php echo($producto['id']);?>
            </td>
            <td >
                <?php echo($producto['nombre']);?>
            </td>
            <td>
                <button><a href="<?php echo BASE_URL?>producto/borrarProducto/?&id=<?php echo($producto['id']);?> ">Borrar</a></button>
            </td>
    </tr>
        <?php endforeach;?>

</table>
