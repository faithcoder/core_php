<?php
    require_once 'vendor/autoload.php';

    $cat = new \App\classes\Category();

    $category = $cat->allActiveCategory();

    $post = $cat->allActivePost();

?>
<?php require_once 'header.php'; ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4"></h1>

            <?php
            while ($row1 = mysqli_fetch_assoc($post)){
                ?>
                <div class="card mb-4">
                    <img class="card-img-top" src="uploads/<?= $row1['photo']?>" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title"><?= $row1['title'] ?></h2>
                        <p class="card-text"><?= $row1['content'] ?></p>
                        <a href="post.php?id=<?= $row1['id']?>" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?= date('d M Y', strtotime($row1['createtime'])) ?> by
                        <a href="#"><?= $row1['name']?></a>
                    </div>
                </div>
                <?php
            }
            ?>
            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

            </div>

        <!-- Sidebar Widgets Column -->
        <?php require_once 'widget.php'; ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php require_once 'footer.php'; ?>