<?php

?>

<form action="<?=BASE_URL?>producto/AnadirProducto/" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="producto[nombre]" id="nombre" required>

    <label for="descripcion">descripcion</label>
    <textarea  name="producto[descripcion]" id="descripcion" ></textarea>

    <label for="precio">Precio</label>
    <input type="number" name="producto[precio]" id="precio" required>

    <label for="Categoria">Categoria</label>
    <select id="Categoria" name="producto[categoria]">
        <?php foreach ($categorias as $categoria):?>

            <option value="<?php echo($categoria['id']);?>"><?php echo($categoria['nombre']);?></option>

        <?php endforeach;?>

    </select>

    <label for="stock">Stock</label>
    <input type="number" name="producto[stock]" id="stock" required>

    <label for="imagen">Imagen</label>
    <input type="text" name="producto[imagen]" id="imagen" >

    <input type="submit" value="Crear Producto" required>
</form>
