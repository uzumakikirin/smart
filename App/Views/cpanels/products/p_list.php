<?php require APPROOT . '/views/cpanels/admin/header.php'; ?>
<div class="row">
  <div class="col">
    <h3 class="mb-2">Products <a style="font-size:18px;" href="<?php echo URLROOT;?>/cpanels/productadd">Add Product</a></h3>
    <hr>
    <div class="row my-3">
      <ul class="nav col-md-7 col-sm-12 col-lg-9 mb-2">
        <li class="nav-item">
          <a class="nav-link active " href="#">Total Items ( <?php echo Count($data['items']); ?> )</a>
        </li>
        <!-- <li class="nav-item">
                <a class="nav-link" href="#">Published(23)</a>
              </li> -->
        <li class="nav-item">
          <!-- <a class="nav-link" href="#">Sort Products</a> -->

        </li>
      </ul>
      <form class="form-inline col-md-4 col-sm-12 col-lg-3 mb-2" style="flex-wrap:nowrap; flex-basis:90%;" action="<?php echo URLROOT ?>/cpanels/productview/?product=<?php $_POST['search']; ?>">
        <input class="form-control mr-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-sm-0" type="submit">Search</button>
      </form>
    </div>


    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col" class="text-center"><i class="fa fa-image"></i></th>
          <th scope="col">Product</th>
          <th scope="col">Category</th>
          <th scope="col">Detail</th>
          <th scope="col">Price</th>
          <th scope="col">Status</th>
          <th colspan="2" scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data['items'])) : ?>
          <?php foreach ($data['items'] as $item) : ?>
            <tr>
              <td style="width:40px; height:40;"><a href="<?php echo URLROOT; ?>/public/image/product/<?php echo $item->p_image; ?>">
                  <img class="img-thumbnail" width="64" height="64" src="<?php echo URLROOT; ?>/public/image/product/<?php echo $item->p_image; ?>" alt="<?php echo $item->image; ?>">
                </a></td>
              <td><?php echo $item->p_name; ?></td>
              <td>
                <?php foreach ($data['cates']  as $cate) : ?>
                  <?php echo (($cate->ctg_id == $item->p_ctg_id) ? $cate->category_name : ''); ?>
                <?php endforeach; ?>

              </td>
              <td><?php echo $item->p_detail; ?></td>
              <td><?php echo number_format($item->p_price, 2); ?></td>
              <td><?php echo ($item->delete_flg == 0) ? 'Active' : 'Deactive'; ?></td>
              <td><a href="<?php echo URLROOT; ?>/cpanels/productedit/<?php echo $item->p_id; ?>">Edit</a></td>
              <td><a href="<?php echo URLROOT; ?>/cpanels/productdelete/<?php echo $item->p_id; ?>">Delete</a></td>
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