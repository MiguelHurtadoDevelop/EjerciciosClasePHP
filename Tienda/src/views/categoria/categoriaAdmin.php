<?php

use Utils\Utils; ?>
<?php if(isset($_SESSION['CategoriaAñadida']) && $_SESSION['CategoriaAñadida'] == 'complete'): ?>
    <strong>Categoria añadida correctamente</strong>
<?php elseif(isset($_SESSION['CategoriaAñadida']) && $_SESSION['CategoriaAñadida'] == 'failed'):?>
    <strong>No se ha podido añadir</strong>
<?php endif;?>
<?php Utils::deleteSession('CategoriaAñadida');?>

<?php $categorias = \src\controllers\CategoriaController::obtenerCategorias() ?>
<a  href="<?=BASE_URL?>categoria/addCategory/">Añadir categoria</a>
<table>
    <tr>
        <?php foreach ($categorias as $categoria):?>

            <td>
                <?php echo($categoria['id']);?>
            </td>
            <td >
                <?php echo($categoria['nombre']);?>
            </td>

        <?php endforeach;?>
    </tr>
</table>
