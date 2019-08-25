<?php
class Carts extends Controller
{
  public function __construct()
  {
    $this->cartModel = $this->model('Cart');
  }

  public function index()
  {
    if (isLoggedIn()) {
      $u_id = $_SESSION['user_id'];
      // $carts =  $this->cartModel->cartView($u_id); 
      $carts =  $this->cartModel->getCartData($u_id);
      $num = $this->cartModel->getItemPrice($u_id);
      $data = [
        'carts' => $carts,
        // 'price'=>$price,
        'num' => $num,
      ];
      $this->view('carts/index', $data);
    } else {

      redirect('users/login');
    }
  }

  public function addCart($item_id)
  {
    if (!isLoggedIn()) {
      redirect('users/login');
      $_SESSION['url'] = $_GET['url'];
    } else {
      $u_id = $_SESSION['user_id'];
      if($this->cartModel->checkCartData($item_id, $u_id)){
        $cart= $this->cartModel->updateCartData($item_id, $u_id);
      }else{
        $cart = $this->cartModel->insertCartData($item_id, $u_id);
      } 
      $data = [
        'cart' => $cart,
      ];

      $this->view('carts/addcart', $data);
    }
  }

  public function updatequantity($id){
    if(!isLoggedIn()){
      redirect('users/login');
      $_SESSION['url'] = $_GET['url'];
    }else{
      $u_id = $_SESSION['user_id'];
      $qty = isset($_POST['qty'])? $_POST['qty']: '';
      $cart = $this->cartModel->updateQuantity($id, $u_id, $qty);
        $data = [
          'cart' => $cart,
        ];
        $this->view('carts/updatecart', $data); 
    }
  }

  public function deletecart($crt_id)
  {
    $cart = $this->cartModel->delCartData($crt_id);
    $data = [
      'cart' => $cart
    ];
    $this->view('carts/delete', $data);
  }
}
