<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row py-3">
        <div class="col-lg-9">
            <div class="row">
                <?php foreach ($data['posts'] as $post) : ?>
                    <div class="col-md-12">
                        <div class="card mb-2 p-2">
                            <img src="<?php echo URLROOT; ?>/image/blog/<?php echo $post->b_image; ?>" class="img-fluid" alt="Responsive image">
                            <div class="text pt-2 mt-5">
                                <h3 class="mb-4"><a href="<?php echo URLROOT; ?>/blogs/show/<?php echo $post->b_id; ?>"><?php echo $post->b_title; ?></a></h3>
                                <p class="mb-4">
                                    <?php echo $post->b_body; ?>
                                </p>
                                <div class="author mb-4 d-flex align-items-center">
                                    <div class="">
                                        <span>Written by</span>
                                        <h5><a href="#"><?php echo $post->full_name; ?></a>, <span><?php echo date("jS F, Y", strtotime($post->b_createdat)); ?></span></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><a href="<?php echo URLROOT; ?>/blogs/show/<?php echo $post->b_id; ?>" class="btn btn-primary">Read more.</a></p>
                                    </div>
                                    <div class="col-md-6 text-right my-auto">
                                        <!-- <p>
                                                    <span><i class="fa fa-heart"></i> 3</span>
                                                    <span><i class="fa fa-eye"></i> 100</span>
                                                    <span><i class="fa fa-comment"></i> 5</span>
                                                </p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <ul class="list-group">
                <li class="list-group-item">POST ARCHIVE</li>
                <?php foreach ($data['posts'] as $post) : ?>
                    <li class="list-group-item"> <a href="<?php echo URLROOT; ?>/blogs/show/<?php echo $post->b_id; ?>"><?php echo $post->b_title; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>