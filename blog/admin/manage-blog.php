<?php require_once 'header.php'; ?>

<?php

require_once '../vendor/autoload.php';
$blog = new \App\classes\Blog();
$allPost = $blog->allBlog();

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
                            All Blog Post
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
                                            <td>Title</td>
                                            <td>Content</td>
                                            <td>Photo</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sl = 1;
                                    while ($row = mysqli_fetch_assoc($allPost)){

                                        ?>
                                        <tr>
                                            <td><?= $sl; ?></td>
                                            <td><?= $row['category_name'] ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><?= $row['content'] ?></td>
                                            <td><img style="width: 150px;" src="../uploads/<?= $row['photo'] ?>" alt=""></td>
                                            <td>
                                                <?php
                                                if($row['status'] == 1){
                                                    ?>
                                                    <a href="status.php?id=<?= $row['id']; ?>&blog=blog&inactive=inactive" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-down"></i> Active</a>
                                                    <?php

                                                }else {
                                                    ?>
                                                    <a href="status.php?id=<?= $row['id']; ?>&blog=blog&active=active" class="btn btn-warning btn-sm"><i class="fa fa-arrow-circle-o-up"></i> Inactive</a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td style="width: 250px">
                                                <a href="edit-blog.php?id=<?= $row['id'];?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                <a href="delete.php?id=<?= $row['id'];?>&blog=blog" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
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

