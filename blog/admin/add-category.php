<?php require_once 'header.php'; ?>
<?php

require_once '../vendor/autoload.php';

$category = new \App\classes\Category();
if(isset($_POST['add-category'])){
    $insertMsg = $category->addCategory($_POST);
}
?>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <section class="card">
            <header class="card-header">
                Add Categories
            </header>
            <div class="card-body">
                <?php

                if(isset($insertMsg)){
                    ?>
                    <h6 class="alert alert-warning"><?= $insertMsg ?></h6>
                <?php
                }

                ?>
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" placeholder="Add Category" name="category_name" data-validation="required">
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                            <div class="col-sm-7">
                                <div class="form-check"><input class="form-check-input" type="radio" name="status" id="active" value="1" data-validation="required">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactive" value="0" data-validation="required">
                                    <label class="form-check-label" for="inactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="add-category">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>



</div>


<?php require_once 'footer.php'; ?>

