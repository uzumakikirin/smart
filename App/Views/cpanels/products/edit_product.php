<?php require APPROOT . '/views/cpanels/admin/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
        <?php flash('product_update_success'); ?>
            <h3 class="text-primary text-uppercase mb-4 px-2">Edit Product</h3>
            <form class="p-3 shadow bg-light rounded" action="<?php echo URLROOT; ?>/cpanels/productedit/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputpname">Product Name</label>
                    <input type="text" value = "<?php echo $data['item_name']; ?>" class="form-control shadow <?php echo (!empty($data['item_name_err'])) ? 'is-invalid' : ''; ?>" name="item_name" placeholder="Product Name"  required>
                     <span class="invalid-feedback">
                        <?php echo ($data['item_name_err']); ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="ProductDetail">Product Detail</label>
                    <textarea name="detail"  class="form-control shadow <?php echo (!empty($data['detail_err'])) ? 'is-invalid' : ''; ?>" rows="3">
                    <?php echo $data['detail']; ?>
                </textarea>
                    <span class="invalid-feedback">
                        <?php echo ($data['detail_err']); ?>
                    </span>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="price">Price</label>
                        <input type="text" value = "<?php echo $data['price']; ?>" class="form-control shadow <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" name="price" required>
                        <span class="invalid-feedback">
                        <?php echo ($data['price_err']); ?>
                    </span>
                    </div>
                    <div class="form-group col-md-4 <?php echo (!empty($data['detail_err'])) ? 'is-invalid' : ''; ?>">
                        <label for="inputState">Category</label>
                        <select name="ctg_id" class="form-control shadow">
                            <?php foreach($data['categories'] as $category) :?>
                            <option value="<?php echo $category->ctg_id ;?>" <?php echo ($data['ctg_id'] == $category->ctg_id)? 'selected': '' ; ?>><?php echo $category->category_name; ?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="invalid-feedback">
                        <?php echo ($data['ctg_err']); ?>
                    </span>
                    </div>
                    <div class="form-group col-md-4 <?php echo (!empty($data['detail_err'])) ? 'is-invalid' : ''; ?>">
                        <label for="inputState">Status</label>
                        <select name="dlt_flg" class="form-control shadow">
                            <option value="0" <?php echo ($data['dlt_flg'] == 0)? 'selected':'';?> >Active</option>
                            <option value="1" <?php echo ($data['dlt_flg'] == 1)? 'selected':'';?> >Deactive</option>
                        </select>
                        <span class="invalid-feedback">
                        <?php echo ($data['ctg_err']); ?>
                    </span>
                    </div>
                </div>
                <div class="form-group <?php echo (!empty($data['detail_err'])) ? 'is-invalid' : ''; ?>">
                    <label for="exampleFormControlFile1">Upload</label>
                    <input type="file"  value = "<?php echo $data['image']; ?>" name="image">
                    <span class="invalid-feedback">
                        <?php echo ($data['item_name_err']); ?>
                    </span>
                </div>
                <button type="submit" name="productupdate" class="btn  btn-primary">EDIT PRODUCT</button>
            </form>
        </div>
        <div class="col-md-4 my-3">
            <img src="<?php echo URLROOT; ?>/image/product/<?php echo $data['image'] ;?>" class="img-fluid" alt="">
        </div>
    </div>
</div>
<?php require APPROOT . '/views/cpanels/admin/footer.php'; ?>