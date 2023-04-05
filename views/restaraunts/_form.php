<?php
    // Convert resource object into form_fields associative array ONLY if form_fields are not set
    $form_fields = $form_fields ?? [];
    if (count($form_fields) === 0 && isset($restaraunt)) $form_fields = (array) $restaraunt;
?>

<form action="<?= ROOT_PATH ?>/restaraunts/<?= $action ?>" method="post">
    
</form>