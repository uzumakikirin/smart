<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row" style="margin-top:100px;">
        <div class="col-8 mx-auto bg-white ">
        <?php flash('register_success'); ?>
            <div class="row  border-rounded shadow py-3">
                <div class="col-lg-6 col-md-6 ">
                    <h3 class="py-5">入力してログイン下さい</h3>
                    <form method="POST" action="<?php echo URLROOT; ?>/users/login">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="email"><i class="fa fa-at"></i></span>
                                </div>
                                <input type="email" class="form-control" name="email" value="<?php echo (isset($_COOKIE["email"]))? $_COOKIE["email"]: ''; ?>" placeholder="メール" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="password"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control " name="password" placeholder="パスワード" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name= 'remember' class="form-check-input" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?>>
                            <label class="form-check-label" for="exampleCheck1">覚える</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name='login'>ログイン</button>  
                    </form>
                    <h5 class="mt-3">新規登録!<small> <a href="<?php echo URLROOT; ?>/users/register">ここをクリック</a> </small></h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="https://cdn-images-1.medium.com/max/800/1*nh4e2k1IjeXjrbPKn4S7sg.png" class="img-fluid" alt="Responsive image">
                </div>
            </div>
            <div class="row bg-white border-rounded shadow">
                <div class="col">
                    <p class="text-danger text-center m-2"><?php echo isset($data['error']) ? $data['error'] : ''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>