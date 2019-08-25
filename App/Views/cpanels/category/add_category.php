<?php require APPROOT . '/views/cpanels/admin/header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 shadow py-2">
        <?php flash('category_add_success'); ?>
            <h3 class="text-primary card-title text-uppercase mb-4 px-4">Add Category</h3>
            <form method="POST" class="card-body" action="<?php echo URLROOT; ?>/cpanels/categoryadd">
                    <div class="form-group">
                        <label for="inputEmail4">Category Name</label>
                        <input type="" name="c_name" class="form-control" id="inputEmail4" placeholder="Category Name" required>
                    </div>
                <button type="submit" name="addcategory" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/cpanels/admin/footer.php'; ?>