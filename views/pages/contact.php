<div id="home">
    <h1><?= $title ?? "Home" ?></h1>
</div>


<?php
    $form_fields = $form_fields ?? [];
    if (count($form_fields) === 0 && isset($contact)) $form_fields = (array) $contact;
?>

<form action="<?= ROOT_PATH ?>/contact/<?= $action ?>" method="post">


    <div class="form-group my-3">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="<?= $form_fields["name"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for= "email">Email for Contact</label>
        <input class="form-control" type="email" name="email" value="<?= $form_fields["email"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="question">Question for us:</label>
        <input class="form-control" type="text" name="question" value="<?= $form_fields["question"] ?? "" ?>">
    </div>


    <div>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>