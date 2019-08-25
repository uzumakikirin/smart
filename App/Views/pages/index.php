<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-1">
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="http://www.food.ubc.ca/wp-content/uploads/2016/11/Peer-to-Peer-Nutrition-Tour-WEB_Oct_2016.png" class="d-block w-100" style="height:667px;" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://cdn.imgbin.com/11/1/4/imgbin-grocery-store-supermarket-cartoon-shopping-bag-supermarket-shopping-man-pushing-cart-in-convenience-store-illustration-vwLM7F5kRGUxdEfaJRZGQSCQR.jpg" class="d-block w-100" style="height:667px;" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="card-deck mb-3 mt-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">送料無料</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title"> <small class=""><i class="fa fa-paper-plane"></i></small></h1>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">安全</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><small class=""><i class="fa fa-shield-alt"></i></small></h1>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">24/7 サポート</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><small class=""><i class="fa fa-phone"></i></small></h1>
      </div>
    </div>
  </div>
  <div class="album">
    <div class="row">
      <div class="col-md-12 my-2">
        <h3 class="bg-primary p-2 text-white"> 新商品 </h3>
      </div>
      <?php foreach ($data['posts'] as $post) : ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img style="width:auto; height:200px;" src="<?php echo URLROOT; ?>/public/image/product/<?php echo $post->p_image ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h3 class="card-title"><?php echo $post->p_name; ?></h3>
              <p class="card-text"><?php echo mb_strimwidth($post->p_detail, 0, 10); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a href="<?php echo URLROOT; ?>/carts/addcart/<?php echo $post->p_id ;?>" class="btn btn-sm btn-outline-secondary">カート追加</a>
                                        <a href="<?php echo URLROOT;?>/shops/productdetail/<?php echo $post->p_id; ?>" class="btn btn-sm btn-outline-secondary">見る</a>
                </div>
                <strong class=""> <i class="fa fa-yen-sign"></i> <?php echo $post->p_price; ?></strong>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <footer class="pt-4 my-md-5 pt-md-5 border-top ">
    <div class="row">
      <div class="col-lg-8 col-md-6">
        <h5>連絡先</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">電話: 047-010234</a></li>
          <li><a class="text-muted" href="#">住所: 千葉県、船橋市、第三ベール</a></li>
          <li><a class="text-muted" href="#">メール: Something@support.com</a></li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-3">
        <h5>カテゴリー</h5>
        <ul class="list-unstyled text-small">
          <?php foreach ($data['categories'] as $category) : ?>
            <li><a class="text-muted" href="<?php echo URLROOT; ?>/shops/?ctg_id=<?php echo $category->ctg_id; ?>&page=<?php echo $_GET['page'] = 1; ?>"><?php echo $category->category_name ;?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-lg-2 col-md-3">
        <h5>クイックリンク</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="<?php echo URLROOT; ?>">ホーム</a></li>
          <li><a class="text-muted" href="<?php echo URLROOT; ?>/Blogs">ブログ</a></li>
          <li><a class="text-muted" href="<?php echo URLROOT; ?>/Shops">ショップ</a></li>
        </ul>
      </div>
    </div>
    <p class="float-right mt-2"><a href="#">トップに戻る</a></p>
    <p class="mt-2">© <?php echo Date('Y');?> <?php echo SITENAME ;?>, Inc. · <a href="#">プライバシー</a> </p>
  </footer>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>