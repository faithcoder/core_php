<?php require_once 'header.php'; ?>
<?php
require_once '../vendor/autoload.php';
$cat = new \App\classes\Category();
$category = $cat->allCategory();



?>
    <!--header end-->

    <!--main content start-->
    <section>
        <section>
            <!-- page start-->
            <div class="row">
                <div class="col-sm-12">
                    <section class="card">
                        <header class="card-header">
                            Dynamic Table
                            <span class="tools pull-right">
                                <!--<a href="javascript:;" class="fa fa-chevron-down"></a>
                                     <a href="javascript:;" class="fa fa-times"></a>-->
                            </span>
                        </header>
                        <div class="card-body">
                            <div class="adv-table">
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <td>Sl No</td>
                                            <td>Category Name</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sl = 1;
                                    while ($row = mysqli_fetch_assoc($category)){

                                        ?>
                                        <tr>
                                            <td><?= $sl; ?></td>
                                            <td><?= $row['category_name'] ?></td>
                                            <td><?= $row['status'] == 1 ? 'Active':'Inactive' ?></td>
                                            <td style="width: 250px">
                                                <?php
                                                if($row['status'] == 1){
                                                    ?>
                                                    <a href="status.php?id=<?= $row['id']; ?>&cat=category&inactive=inactive" class="btn btn-dark btn-sm"><i class="fa fa-arrow-circle-down"></i> Inactive</a>
                                                    <?php

                                                }else {
                                                    ?>
                                                    <a href="status.php?id=<?= $row['id']; ?>&cat=category&active=active" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-o-up"></i> Active</a>
                                                    <?php
                                                }

                                                ?>


                                                <a href="edit-category.php?id=<?= $row['id'];?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                <a href="delete.php?id=<?= $row['id'];?>&cat=category" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $sl++;
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- page end-->
        </section>
    </section>
    <!--main content end-->


<?php require_once 'footer.php'; ?>

