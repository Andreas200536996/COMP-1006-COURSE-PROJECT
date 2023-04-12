<?php
    $form_fields = $form_fields ?? [];
    if (count($form_fields) === 0 && isset($restaurant)) $form_fields = (array) $restaurant;
?>

<form action="<?= ROOT_PATH ?>/restaurants/<?= $action ?>" method="post">
<?php if ($action === "update"): ?>
        <input type="hidden" name="id" value="<?= $form_fields["id"] ?>">
    <?php endif ?>

    <div class="form-group my-3">
        <label for="restaurant_name">Restaurant Name</label>
        <input class="form-control" type="text" name="restaurant_name" value="<?= $form_fields["restaurant_name"] ?? "" ?>">
    </div>


    <div>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>