<div class="container">
    <h1>Reservations</h1>

    <?php if (isset($reservations) && count($reservations) > 0): ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Reservation Date</th>
                <th>Restaurant</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= $reservation->customer_name ?></td>
                    <td><?= $reservation->reservation_date ?></td>
                    <td><?= $reservation->restaurant ?> </td>
                    <td>
                        <a class="btn btn-warning" href="<?= ROOT_PATH ?>/reservations/edit/<?= $reservation->id ?>">edit</a>
                        <a class="btn btn-danger" href="<?= ROOT_PATH ?>/reservations/delete/<?= $reservation->id ?>" onclick="return confirm('Are you sure you want to delete this status?')">delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php endif ?>
</div>