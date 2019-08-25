<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <h1></h1>
    <img src="" alt="">

    <div class="row">
        <div class="card col-lg-2 py-2">
            <img src="<?php echo $data['user']->image_path; ?>/<?php echo $data['user']->image_name; ?>" class="card-img-top img-thumbnail" style="width:200px;" alt="<?php echo $data['user']->image_name; ?>">
            <div class="card-body">
                <h5 class="text-center"><?php echo $data['user']->full_name; ?></h5>
            </div>
        </div>
        <div class="card col-lg-10 py-2">
            <div class="card-header bg-transparent display-5">

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h2>Profile</h2>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="<?php echo URLROOT; ?>/users/profileupdate/<?php echo $_SESSION['user_id'];?>" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Email Address</h5>
                <p class="card-text"><?php echo $data['user']->email; ?></p>
                <h5 class="card-title">Birthday</h5>
                <p class="card-text"><?php echo $data['user']->dob; ?></p>
                <h5 class="card-title">Gender</h5>
                <p class="card-text">
                    <?php switch($data['user']->gender){
                        case 1:
                        echo 'Male';
                        break;
                        case 2:
                        echo 'Female';
                        break;
                        default:
                        echo 'Not Selected';
                    } ?>
                </p>
                <h5 class="card-title">Address</h5>
                <p class="card-text"><?php echo $data['user']->address; ?></p>
                <h5 class="card-title">Contact</h5>
                <p class="card-text"><?php echo $data['user']->contact; ?></p>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>