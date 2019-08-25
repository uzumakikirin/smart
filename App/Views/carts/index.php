<?php require APPROOT . '/views/inc/header.php'; ?>
<input type="hidden" name="entry_url" value="<?php echo URLROOT; ?>" id="entry_url">
<div class="container mt-2">
    <div class="row">
        <div class="col-md-9">
            <?php if (!empty($data['carts'])) : ?>
                <div class="row pb-2 border-bottom">
                    <div class="col-md-7">
                        <h6>ショッピングカート</h6>
                    </div>
                    <div class="col-md-2 text-center">
                        <h6>価格</h6>
                    </div>
                    <div class="col-md-2 text-center">
                        <h6>クォンティティ</h6>
                    </div>
                </div>
                <?php foreach ($data['carts'] as $cart) : ?>
                    <div class="row border-bottom  py-3 my-3">
                        <div class="col-md-2">
                            <img class="rounded float-center" height="100" width="100" src="<?php echo URLROOT; ?>/image/product/<?php echo $cart->p_image ?>" alt="<?php echo $cart->p_image; ?>">
                        </div>
                        <div class="col-md-5">
                            <h5><?php echo $cart->p_name; ?></h5>
                            <p><?php echo $cart->p_detail; ?></p>
                            <a>ストーク有り</a>
                            <a href="<?php echo URLROOT; ?>/carts/deletecart/<?php echo $cart->crt_id; ?>">全て削除</a>

                        </div>
                        <div class="col-md-2 text-center">
                            &#165; <?php echo number_format($cart->p_price, 2); ?>
                        </div>
                        <input type="hidden" name="item_id" id="item_id" value="<?php echo $cart->p_id; ?>">
                        <div class="col-md-2 text-center">
                            <form action="<?php echo URLROOT;?>/carts/updatequantity/<?php echo $cart->p_id?>" method="post">
                                <select class="custom-select" name="qty" onchange="submit(this.form)">
                                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                                        <option value="<?php echo $i; ?>" <?php echo ($cart->num == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </form>
                            <!-- <?php echo number_format($cart->num); ?> -->

                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="row">
                    <div class="col-md-10 text-right pr-0">
                        <h5>小計(<?php echo $data['num'][0]->num; ?> アイテム) : </h5>
                    </div>
                    <div class="col-md-2 text-left pl-2">
                        <h5> &#165; <?php echo number_format($data['num'][0]->Price, 0); ?></h5>
                    </div>
                </div>
            <?php else : ?>
                <div class="card">
                    <div class="card-header">MY CART</div>
                </div>
                <div class="card-body">
                    <img src="https://img1a.flixcart.com/www/linchpin/fk-cp-zion/img/empty-cart_ee6141.png" width="200" height="500" class="card-img-top" alt="Shopping-Cart">
                    <div class="card-overlay">
                        <p class="card-text text-center text-danger">
                            YOUR SHOPPING CART IS EMPTY
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-3">
            <div class="card bg-secondary text-center">
                <div class="card-body ">
                    <strong>小計</strong>( <?php echo $data['num'][0]->num; ?> アイテム ): &#165; <?php echo $data['num'][0]->Price; ?><br><br>
                    <a role="button" href="<?php echo URLROOT; ?>/checkouts" class="btn btn-warning">チェックアウト</a>
                </div>
            </div>
            <div class="row">
                <div class="col my-3">

                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>