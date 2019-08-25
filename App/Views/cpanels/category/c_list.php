<?php require APPROOT . '/views/cpanels/admin/header.php'; ?>
<div class="row">
  <div class="col">
    <h3 class="mb-2">Category <a style="font-size:18px;" href="<?php echo URLROOT;?>/cpanels/categoryadd">Add Category</a></h3>
    <hr>
    <?php flash('category_delete_success'); ?>
    <div class="row my-3">
      <ul class="nav col-md-7 col-sm-12 col-lg-9 mb-2">
        <li class="nav-item">
          <a class="nav-link active " href="#">Total Items ( <?php echo Count($data['cates']); ?> )</a>
        </li>
        <!-- <li class="nav-item">
                <a class="nav-link" href="#">Published(23)</a>
              </li> -->
        <li class="nav-item">
          <!-- <a class="nav-link" href="#">Sort Products</a> -->

        </li>
      </ul>
    </div>


    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ctg_id</th>
          <th scope="col">Category Name</th>
          <th scope="col">Category Status</th>
          <th colspan="2" scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data['cates'])) : ?>
          <?php foreach ($data['cates'] as $cate) : ?>
            <tr>
              <td><?php echo $cate->ctg_id; ?></td>
              <td><?php echo $cate->category_name; ?></td>
              <td><?php echo ($cate->delete_flg == 0) ? 'Active' : 'Deactive'; ?></td>
              <td><a href="<?php echo URLROOT; ?>/cpanels/categoryedit/<?php echo $cate->ctg_id; ?>">Edit</a></td>
              <td><a href="<?php echo URLROOT; ?>/cpanels/categorydelete/<?php echo $cate->ctg_id; ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        <?php else : ?>
        <tr><td colspan="9" class="text-center display-2">Data Unavailable</td></tr>
        
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
<?php require APPROOT . '/views/cpanels/admin/footer.php'; ?>