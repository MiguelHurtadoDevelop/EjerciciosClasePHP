<?php
 use Utils\Utils;?>
<?php if(isset($_SESSION['CategoriaAñadida']) && $_SESSION['CategoriaAñadida'] == 'complete'): ?>
    <strong>Categoria añadida correctamente</strong>
<?php elseif(isset($_SESSION['CategoriaAñadida']) && $_SESSION['CategoriaAñadida'] == 'failed'):?>
    <strong>No se ha podido añadir</strong>
<?php endif;?>
<?php Utils::deleteSession('CategoriaAñadida');?>

<?php $usuarios = \Controllers\UserController::obtenerUsuarios() ?>

<table>
    
        <?php foreach ($usuarios as $usuario):?>
            
            <tr>
                <td>
                    <?php echo($usuario['id']);?>
                </td>
                <td >
                    <?php echo($usuario['nombre']);?>
                </td>
                <td >
                    <?php echo($usuario['rol']);?>
                </td>
                <td>
                    <a href="<?=BASE_URL?>user/hacerAdmin/?id=<?=$usuario['id']?>">Hacer Administrador</a>
                </td>
            </tr>
        <?php endforeach;?>
    
</table>
