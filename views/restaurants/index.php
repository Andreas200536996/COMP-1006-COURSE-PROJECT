<div class="container">
    <h1>Available Restaurants</h1>

    <?php if (isset($restaurants) && count($restaurants) > 0): ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Restaurant Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($restaurants as $restaurant): ?>
                <tr>
                    <td><?= $restaurant->restaurant_name ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= ROOT_PATH ?>/restaurants/edit/<?= $restaurant->id ?>">edit</a>
                        <a class="btn btn-danger" href="<?= ROOT_PATH ?>/restaurants/delete/<?= $restaurant->id ?>" onclick="return confirm('Are you sure you want to delete this status?')">delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php endif ?>
</div>