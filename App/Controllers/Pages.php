<?php
class Pages extends Controller{
    public function __construct()
    {
      $this->postModel = $this->model('Blog');
      $this->pageModel = $this->model('Page');
      $this->shopModel = $this->model('Shop');
    }

    public function index(){
      $items = $this->pageModel->getProducts();
      $categories =  $this->shopModel->getCategoryList();
        $data  = [
          'posts' => $items, 
          'categories'=> $categories,
        ];
        $this->view('pages/index', $data );

        
    }

    public function about(){
        $data  = [
            'title' => 'About'  
          ];
        $this->view('pages/about', $data );
    }
}