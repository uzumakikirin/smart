<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container p-2">
    <div class="row">
        <div class="col-md-3 col-lg-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a class="nav-item" href="<?php echo URLROOT;?>/shops">全てのカテゴリー</a></li>
                <?php foreach ($data['categories'] as $category) : ?>
                    <li class="list-group-item"><a class="nav-item" href="<?php echo URLROOT; ?>/shops/?ctg_id=<?php echo $category->ctg_id; ?>&page=<?php echo $_GET['page'] = 1; ?>"><?php echo $category->category_name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-9 col-lg-9">
            <div class="row">
                <?php foreach ($data['items'] as $item) : ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img style="width:254px; height:200px;" src="<?php echo URLROOT; ?>/public/image/product/<?php echo $item->p_image ?>" class="card-img-top" alt="...">
                            <div class="card-body w-100" style="height:180px;">
                                <h5 class="card-title"><?php echo $item->p_name ;?></h3>
                                <p class="card-text"><?php echo mb_strimwidth($item->p_detail, 0, 10);?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?php echo URLROOT; ?>/carts/addcart/<?php echo $item->p_id ;?>" class="btn btn-sm btn-outline-secondary">カート追加</a>
                                        <a href="<?php echo URLROOT;?>/shops/productdetail/<?php echo $item->p_id; ?>" class="btn btn-sm btn-outline-secondary">見る</a>
                                    </div>
                                    <strong class=""> <i class="fa fa-yen-sign"></i> <?php echo $item->p_price; ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- <li class="page-item"><a class="page-link" href="">Previous</a></li> -->
                        <?php for ($p = 1; $p <= $data['pages']; $p++) : ?>
                            <li class="page-item"><a class="page-link" href="<?php echo URLROOT; ?>/shops/?ctg_id=<?php echo (isset($_GET['ctg_id']) ? $_GET['ctg_id'] : ''); ?>&page=<?php echo $p; ?>"><?php echo $p ?></a></li>
                        <?php endfor; ?>
                        <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>