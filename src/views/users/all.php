<?php getPage("shared/header") ?>
<div class="container">
    <div class="">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user["id"]?></td>
                        <td><?= "{$user["first_name"]} {$user["last_name"]}"?></td>
                        <td><?= $user["email"]?></td>
                        <td><?= $user["gender"]?></td>
                        <td>
                            <a class="btn btn-info" href="<?= linkTo("users/{$user["id"]}")?>">View</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="<?= linkTo("users/{$user["id"]}/edit")?>">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="<?= linkTo("users/{$user["id"]}/delete")?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>
<?php getPage("shared/footer") ?>

