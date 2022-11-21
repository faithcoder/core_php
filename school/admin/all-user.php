
<h1 class="text-primary"><i class="fa fa-user-plus"></i><small class="text-black-50"> All Users</small></h1>
<br>
<div class="row"></div>
<hr>
<h3>All Users</h3>
<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered">
        <thead>
        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Photo</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $db_info = mysqli_query($link, "SELECT * FROM `users`");
        while ($row = mysqli_fetch_assoc($db_info)){
            ?>
            <tr>

                <td><?= $row['name'];?></td>
                <td><?= $row['email'];?></td>
                <td><?= $row['username'];?></td>
                <td><img class="w-50" src="images/<?php echo $row['photo']; ?>" alt=""></td>
                <td>
                    <a href="index.php?page=user-profile&id=<?php echo base64_encode($row['id']); ?>  " class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>

                </td>
            </tr>
            <?php
        }
        ?>



        </tbody>

    </table>
</div>