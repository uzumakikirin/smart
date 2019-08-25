<?php require APPROOT . '/views/cpanels/admin/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <?php flash('category_update_success'); ?>
            <h3 class="text-primary text-uppercase mb-4 px-2">Edit Category</h3>
            <form class="p-3 shadow bg-light rounded" action="<?php echo URLROOT; ?>/cpanels/categoryedit/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputpname">Category Name</label>
                    <input type="text" value="<?php echo $data['category_name']; ?>" class="form-control shadow" name="category_name" placeholder="Category Name" required>
                </div>
                <div class="form-group col-md-2 px-0">
                    <label for="inputState">Status</label>
                    <select name="dlt_flg" class="form-control shadow">
                        <option value="0" <?php echo ($data['dlt_flg'] == 0) ? 'selected' : ''; ?>>Active</option>
                        <option value="1" <?php echo ($data['dlt_flg'] == 1) ? 'selected' : ''; ?>>Deactive</option>
                    </select>
                </div>
                <button type="submit" name="categoryupdate" class="btn  btn-primary">EDIT CATEGORY</button>
            </form>
        </div>
        <div class="col-md-4 my-3">
            <img src="<?php echo URLROOT; ?>/image/product/<?php echo $data['image']; ?>" class="img-fluid" alt="">
        </div>
    </div>
</div>
<?php require APPROOT . '/views/cpanels/admin/footer.php'; ?>