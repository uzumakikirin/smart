<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row" style="margin-top:100px;">
        <div class="col-8 mx-auto bg-white ">
            <div class="row  border-rounded shadow py-3">
                <div class="col-lg-6 col-md-6 ">
                    <h3 class="py-2">新規登録</h3>
                    <form method="POST" action="<?php echo URLROOT; ?>/users/register">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="full_name"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control " value='<?php echo (isset($_POST['full_name']))?$_POST['full_name']: ''; ?>' name='full_name' placeholder="名前" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="email"><i class="fa fa-at"></i></span>
                                </div>
                                <input type="email" class="form-control" value="<?php echo (isset($_POST['email']))?$_POST['email']:'';?>" name="email" placeholder="メール" aria-describedby="inputGroupPrepend2" required>
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
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="password2"><i class="fa fa-check"></i></span>
                                </div>
                                <input type="password" class="form-control " name="password2" placeholder="パスワード確認" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name= 'agree' class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Agree to terms and conditions</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name='register'>登録</button>
                    </form>
                    <h5 class="text-muted mt-3">登録されている! <a href="<?php echo URLROOT; ?>/users/login"><small>ここをクリック</small></a> </h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="http://orelextech.com/site/sign/images/school.png" class="img-fluid" alt="Responsive image">
                </div>
            </div>
            <div class="row bg-white border-rounded shadow">
                <div class="col">
                    <p class="text-danger text-center m-2"><?php echo isset($data['error']) ? $data['error'] : ''; ?></p>
                    <p class="text-danger text-center m-2"><?php echo isset($data['password_error']) ? $data['password_error'] : ''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>