<?php require_once 'header.php'; ?>
<?php

require_once '../vendor/autoload.php';

$category = new \App\classes\Category();
$allActiveCategory = $category->allActiveCategory();

$blog = new \App\classes\Blog();
if(isset($_POST['add-blog'])){
    $insertMsg = $blog->addBlog($_POST);
}
?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Add Post
            </header>
            <div class="card-body">
                <?php

                if(isset($insertMsg)){
                    ?>
                    <h6 class="alert alert-warning"><?= $insertMsg ?></h6>
                    <?php
                }

                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 col-form-label">Add Blog Post</label>
                        <div class="col-sm-9">
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option value="">Select Category</option>
                                <?php

                                while($row = mysqli_fetch_assoc($allActiveCategory)){
                                    ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
                                    <?php
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Blog Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="" placeholder="Blog Title" name="title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Blog Post</label>
                        <div class="col-sm-9">
                            <textarea name="content" id="" cols="30" rows="10" class="summernote"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                            <div class="col-sm-9">
                                <div class="form-check"><input class="form-check-input" type="radio" name="status" id="active" value="1" >
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                                    <label class="form-check-label" for="inactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="add-blog">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>



</div>


<?php require_once 'footer.php'; ?>

