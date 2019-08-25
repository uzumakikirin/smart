<?php
class Shops extends Controller
{
  public function __construct()
  {
    $this->shopModel = $this->model('Shop');
  }

  public function index()
  {
    $ctg_id = (isset($_GET['ctg_id']) === true && preg_match('/^[0-9]+$/', $_GET['ctg_id']) === 1) ? $_GET['ctg_id'] : '';
    if (isset($_GET['page']) === true && preg_match('/^[0-9]+$/', $_GET['page']) === 1) {
      $page = intval($_GET['page']);
    } else {
      $page = 1;
    }
    $categories =  $this->shopModel->getCategoryList();
    list($items, $nopage) = $this->shopModel->getProducts($ctg_id, $page);
    $data  = [
      'items' => $items,
      'pages' => $nopage,
      'categories' => $categories
    ];
    $this->view('shops/productview', $data);
  }

  public function productdetail($pid)
  {
    $product = $this->shopModel->getProduct($pid);
    $data  = [
      'item' => $product,
    ];
    $this->view('shops/productdetail', $data);
  }
}
