<?php require APPROOT . '/views/cpanels/admin/header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 shadow py-2">
            <h3 class="text-primary card-title text-uppercase mb-4 px-4">Add Product</h3>
            <form method="POST" class="card-body" action="<?php echo URLROOT; ?>/cpanels/productadd" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="inputEmail4">Product Name</label>
                        <input type="" name="p_name" class="form-control" id="inputEmail4" placeholder="Product Name" required>
                    </div>
                <div class="form-group">
                    <label for="inputAddress">Product Detail</label>
                    <textarea name="p_detail" class="form-control" aria-label="With textarea" rows="5" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputCity">Price</label>
                        <input type="text" name="p_price" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Category</label>
                        <select id="inputState" required name="p_ctg_id" class="form-control">
                            <?php foreach($data['categories'] as $category) :?>
                            <option value="<?php echo $category->ctg_id ;?>"><?php echo $category->category_name ;?></option>
                            <?php endforeach ;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Product Image</label><br>
                    <input type="file" name="p_image" accept="image/*" onchange="readURL(this);" >
                </div>
                <button type="submit" name="addproduct" class="btn btn-primary">Add Product</button>
            </form>
        </div>
        <div class="col-md-4 my-3">
            <img src="" id="blah" class="img-fluid shadow" alt="">
        </div>
    </div>
</div>
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(auto)
                        .height(auto);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<?php require APPROOT . '/views/cpanels/admin/footer.php'; ?>