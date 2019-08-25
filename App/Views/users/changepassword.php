<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row" style="margin-top:100px;">
        <div class="col-8 mx-auto bg-white ">
            <div class="row">
                <div class="col text-center">
                    <?php flash('password_change_success'); ?>
                    <?php flash('password_change_failure'); ?>
                </div>
            </div>
            <div class="row  border-rounded shadow py-3">
                <div class="col-lg-6 col-md-6 ">
                    <h3 class="py-5">Change Your Password</h3>
                    <form method="POST" action="<?php echo URLROOT; ?>/users/changepassword/<?php echo $_SESSION['user_id']; ?>">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="password"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control " name="currentpassword" placeholder="Current Passwrod" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="password"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control " name="newpassword" placeholder="New Passwrod" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="password"><i class="fa fa-check"></i></span>
                                </div>
                                <input type="password" class="form-control " name="newpassword2" placeholder="Re-type Passwrod" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name='changepassword'>Login</button>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="https://awebstar.com.sg/wp-content/uploads/2018/04/images-1.png" class="img-fluid" alt="Responsive image">
                </div>
            </div>
            <div class="row bg-white border-rounded shadow">
                <div class="col">
                    <p class="text-danger text-center m-2"><?php echo isset($data['error']) ? $data['error'] : ''; ?></p>
                </div>
            </div>
            <!-- <?php 
                    ?> -->
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>