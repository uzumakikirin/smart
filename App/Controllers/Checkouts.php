<?php
class Checkouts extends Controller
{
    public function __construct()
    {
        $this->checkoutModel = $this->model('Checkout');
    }

    public function index()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
            $_SESSION['url'] = $_GET['url'];
        } else{
            $u_id = $_SESSION['user_id'];
            $p_id = $this->checkoutModel->getCartData($u_id);
            $user= $this->checkoutModel->getUser($u_id);
            $itmcnt= $this->checkoutModel->getItemPrice($u_id);
        }
        $data = [
            'pdt'=>$p_id,
            'user'=>$user,
            'item'=>$itmcnt,
        ];

        $this->view('checkouts/index', $data);
    }

    public function order(){
        
    }
}
