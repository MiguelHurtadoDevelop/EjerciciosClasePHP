<?php
// let's paginate data from an array...


// how many records should be displayed on a page?
$records_per_page = 2;

// include the pagination class


// instantiate the pagination object
$pagination = new Zebra_Pagination();

// the number of total records is the number of records in the array
$pagination->records(count($contactos));

// records per page
$pagination->records_per_page($records_per_page);

// here's the magic: we need to display *only* the records for the current page
$contactos = array_slice(
    $contactos,
(($pagination->get_page() - 1) * $records_per_page),
$records_per_page
);
?>
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
<?php
$pagination->render();
?>