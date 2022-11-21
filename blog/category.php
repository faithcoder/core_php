
<?php
    require_once 'vendor/autoload.php';
    $cat =  new \App\classes\Category();
    $category = $cat->allActiveCategory();
    $catId = $_GET['id'];
    $catPost = $cat->catPost($catId);


?>
<?php require_once 'header.php'?>
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                while ($row2 = mysqli_fetch_assoc($catPost)){
                    ?>
                    <div class="card mb-4">
                        <img class="card-img-top" src="uploads/<?= $row2['photo']?>" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title"><?= $row2['title'] ?></h2>
                            <p class="card-text"><?= $row2['content'] ?></p>
                            <a href="post.php?id=<?= $row2['id']?>" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?= date('d M Y', strtotime($row2['createtime'])) ?> by
                            <a href="#"><?= $row2['name']?></a>
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

<?php require_once 'footer.php'?>