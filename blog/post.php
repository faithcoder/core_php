<?php require_once 'header.php'?>
<?php
require_once 'vendor/autoload.php';

$cat = new \App\classes\Category();

$category = $cat->allActiveCategory();

$getId = $_GET['id'];

$singlePost = $cat->singlePost($getId);

$post = mysqli_fetch_assoc($singlePost);


?>
    <div class="container">

        <div class="row">
            <h1></h1>
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <img class="card-img-top" src="uploads/<?= $post['photo']?>" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title"><?= $post['title']?></h2>
                        <p class="card-text"><?= $post['content'] ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?= date('d M Y', strtotime($post['createtime'])); ?> by
                        <a href="#"><?= $post['name']?></a>
                    </div>
                </div>


            </div>

            <!-- Sidebar Widgets Column -->
            <?php require_once 'widget.php'; ?>

        </div>
        <!-- /.row -->

    </div>

<?php require_once 'footer.php'?>