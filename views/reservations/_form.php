<?php
    // Convert resource object into form_fields associative array ONLY if form_fields are not set
    $form_fields = $form_fields ?? [];
    if (count($form_fields) === 0 && isset($reservation)) $form_fields = (array) $reservation;
?>
<?php if ($restaurants && count($restaurants) > 0): ?>
<form action="<?= ROOT_PATH ?>/reservations/<?= $action ?>" method="post">
<?php if ($action === "update"): ?>
        <input type="hidden" name="id" value="<?= $form_fields["id"] ?>">
    <?php endif ?>

    <div class="form-group my-3">
        <label for="status_id">Restaurant Number</label>
        <select class="form-select" name="parent_id" >
            <option value="" selected>Enter the corresponding number of the restaurant you wish to reserve at.</option>
            <?php foreach ($restaurants as $restaurant): ?>
                <?php 
                    $selected = (isset($form_fields["parent_id"]) && $form_fields
                    ["parent_id"] == $restaurant->id) ? "selected" : "";
                ?>




                <option value="<?= $restaurant->id ?>" <?= $selected ?>>
                    <?= $restaurant->restaurant_name ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group my-3">
        <label for="customer_name">Name on Reservation</label>
        <input class="form-control" type="text" name="customer_name" value="<?= $form_fields["customer_name"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="reservation_time">Date of Reservation</label>
        <input class="form-control" type="datetime-local" name="reservation_time" value="<?= $form_fields["reservation_time"] ?? "" ?>">
    </div>


    <div>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>

<?php else: ?>
    <p class="alert aler-warning">
        A restaurant needs to be added first.<br>
        <a href="<?= ROOT_PATH ?>/restaurants/new">New Restaurant</a>
    </p>
<?php endif ?>
