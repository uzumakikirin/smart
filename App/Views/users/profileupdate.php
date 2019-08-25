<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row" style="margin-top:100px;">
        <div class="col-11 mx-auto bg-white border-rounded shadow py-3 ">
            <?php flash('profile_update_success'); ?>
            <div class="card">
                <div class="card-header">
                    <h3>Edit Your Profile</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo URLROOT; ?>/users/profileupdate/<?php echo $_SESSION['user_id']; ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo $data['user']->image_path ?>/<?php echo $data['user']->image_name ?>" class="img-thumbnail" style="width:200px;">
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="full_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['user']->full_name; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" disabled id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['user']->email; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Birthday</label>
                                    <input type="text" name="dob" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['user']->dob; ?>" required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Gender</label>
                                    <select class="form-control" name="gender" >
                                        <option value= 1 <?php if ($data['user']->gender == '1') echo 'selected'; ?>> Male　</option>
                                        <option value= 2 <?php if ($data['user']->gender == '2') echo 'selected'; ?> >Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['user']->address; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cotanct</label>
                                    <input type="text" name="contact" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['user']->contact; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Profile Picture</label>
                                    <input type="file" name="image" value="<?php echo $data['user']->image_name ?>" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <button type="submit" class="btn btn-primary" name="updateprofile">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>