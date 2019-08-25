<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">カート</span>
                <span class="badge badge-secondary badge-pill">アイテム　<?php echo $data['item'][0]->num; ?></span>
            </h4>
            <ul class="list-group mb-3">
                <?php foreach($data['pdt'] as $pdt) : ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?php echo $pdt->p_name; ?></h6>
                        <small class="text-muted"><?php echo $pdt->num; ?></small>
                    </div>
                    <span class="text-muted"><span>&#165;</span><?php echo $pdt->p_price; ?></span>
                </li>
                <?php endforeach; ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">合計</h6>
                    </div>
                    <span class="text-muted"><span>&#165; <?php echo number_format($data['item'][0]->Price, 0); ?></span>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">届け先情報</h4>
            <form  method="POST" action="<?php echo URLROOT; ?>/checkouts/order">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">氏名</label>
                        <input type="text" class="form-control" name="full_name" disabled placeholder="" value="<?php echo $data['user']->full_name;?>" required="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">メールアドレス</label>
                        <input type="email" class="form-control" id="email" <?php echo (empty($data['user']->email)?'':"disabled");?> placeholder="" value="<?php echo $data['user']->email;?>" required="">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">住所</label>
                    <input type="text" name="address" class="form-control" <?php echo (empty($data['user']->address)?'':"disabled");?> id="address" value="<?php echo $data['user']->address;?>" placeholder="1234 Main St" required="">
                </div>

                <div class="mb-3">
                    <label for="address2">連絡先 </label>
                    <input type="text" name="contact" class="form-control" <?php echo (empty($data['user']->contact)?'':"disabled");?> value="<?php echo $data['user']->contact;?>" id="address2" placeholder="Apartment or suite">
                </div>

                <h4 class="mb-3">支払い情報</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Cash on delivery</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" name="order" type="submit">Place Order</button>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>