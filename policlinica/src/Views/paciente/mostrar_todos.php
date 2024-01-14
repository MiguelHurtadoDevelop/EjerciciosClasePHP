<h2>MIS PACIENTES</h2>
<?php
foreach ($pacientes as $fila):
    foreach ($fila as $campo => $valor):?>
      <p><?=$campo?>: <?=$valor?> </p>

    <?php endforeach;?>
    <hr>
  <?php endforeach;?>
