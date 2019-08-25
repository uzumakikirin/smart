<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- Page Content -->
<div class="container">
    <a class="mx-1" onclick="history.back(); return false;" href="#"> <i class="fa fa-backward"></i> Back To Page</a>
    <!-- Portfolio Item Heading -->
    <h1 class="my-4"><?php echo $data['item']->p_name; ?>
    </h1>

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <img class="img-fluid" src="<?php echo URLROOT; ?>/image/product/<?php echo $data['item']->p_image; ?>" alt="">
        </div>

        <div class="col-md-4">
            <h3 class="my-3">デスクリプション</h3>
            <p>
                <?php echo $data['item']->p_detail; ?>
            </p>
            <h3 class="my-3">価格</h3>
            <ul>
                <li> &#165;<?php echo number_format($data['item']->p_price, 2); ?></li>
            </ul>
            <a href="<?php echo URLROOT; ?>/carts/addcart/<?php echo $data['item']->p_id; ?>/<?php echo isset($_POST['qty'])?$_POST['qty']:1;?>" class="btn btn-primary">カート追加</a>
        </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <!-- /.row -->

</div>
<!-- /.container -->
<?php require APPROOT . '/views/inc/footer.php'; ?>