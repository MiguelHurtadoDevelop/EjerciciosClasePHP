

<a href=<?=BASE_URL?>"?controller=Contacto&action=nuevocontacto">Nuevo Contacto</a>

<table>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php


        foreach ($contactos as $contacto):
            ?>

            <tr>
                <th scope="row"><?= $contacto->getId()?></th>
                <td><?= $contacto->getNombre()?></td>
                <td><?= $contacto->getApellidos()?></td>
                <td><?= $contacto->getTelefono()?></td>
                <td><?= $contacto->getCorreo()?></td>

                <td>
                    <a href=<?=BASE_URL?>"?id="<?= $contacto->getId()?>>Editar</a>
                    <a href=<?=BASE_URL?>"?id="<?= $contacto->getId()?>>Eliminar</a>
                </td>
            </tr>
         <?php endforeach; ?>
    </tbody>
</table>