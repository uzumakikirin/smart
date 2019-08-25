<?php

class Cpanels extends Controller
{
    public function __construct()
    {
        $this->cpanelModel =  $this->model('Cpanel');
        $this->postModel =  $this->model('Blog');
        $this->itemModel =  $this->model('Shop');
        $this->cartModel = $this->model('Cart');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        if (isLoggedIn()) {
            if (isAdmin()) {
                $data = [
                    'items' => 'items',
                ];
                $this->view('cpanels/index', $data);
            } else {
                redirect('pages/index');
            }
        } else {
            redirect('users/login');
        }
    }

    public function productview()
    {
        if (!isLoggedIn()) {
            if (!isAdmin()) {
                redirect('pages/index');
            }
        }
        $s = isset($_GET['search']) ? $_GET['search'] : '';

        $data = [
            'items' => $this->cpanelModel->getProductList($s),
            'cates' => $this->cpanelModel->getCate(),
        ];
        $this->view('cpanels/products/p_list', $data);
    }

    public function productedit($id)
    {
        if (!isLoggedIn()) {
            if (!isAdmin()) {
                redirect('pages/index');
            }
        }

        $item = $this->cpanelModel->getProduct($id);
        $categories = $this->itemModel->getCategoryList();

        if (isset($_POST['productupdate'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "id" => $id,
                "categories" => $categories,
                'item_name' => trim($_POST['item_name']),
                'detail' => trim($_POST['detail']),
                'price' => trim($_POST['price']),
                'ctg_id' => trim($_POST['ctg_id']),
                'dlt_flg' => trim($_POST['dlt_flg']),
                'image' => $_FILES['image'],
                'imagename' => '',
                'old_image_name' => $item->p_image,
                'error' => ''
            ];
            if ($data['image']['error'] === 0 && $data['image']['size'] !== 0) {
                if (is_uploaded_file($data['image']['tmp_name']) === true) {
                    $image_info = getimagesize($data['image']['tmp_name']);
                    $image_mine =  $image_info['mime'];

                    if ($data['image']['size'] > 1048576) {
                        $data['error'] = "アップロードできる画像のサイズは、1 MB です";
                    } elseif (preg_match('/^image\/p?jpeg$/i', $image_mine) === 0) {
                        $data['error'] = 'アップロードできる画像形式は JPEG形式だけです';
                    } elseif (move_uploaded_file($data['image']['tmp_name'], './image/product/' . $item->p_name . '.jpg') === true) {
                        $data['image_name'] = $item->p_name  . '.jpg';
                    } else {
                        $data['image_name'] = 'pavatar.jpg';
                    }
                }
            }
            if (empty($data['error'])) {
                if ($this->cpanelModel->updateProduct($data)) {
                    flash('product_update_success', 'Succcessfully Updated');
                    redirect('cpanels/productedit/' . $id);
                } else {
                    die(var_dump(($data)));
                }
            } else {
                $this->view('cpanels/products/edit_product', $data);
            }
        } else {
            $data = [
                "id" => $id,
                "categories" => $categories,
                'item_name' => $item->p_name,
                'detail' => $item->p_detail,
                'price' => number_format($item->p_price, 2),
                'ctg_id' => $item->p_ctg_id,
                'dlt_flg' => $item->delete_flg,
                'image' => $item->p_image,
            ];
            $this->view('cpanels/products/edit_product', $data);
        }
    }

    public function productdelete($id)
    {
        $item = $this->cpanelModel->deleteProduct($id);
        $data = [
            'item' => $item
        ];
        $this->view('cpanels/products/delete_product', $data);
    }

    public function productadd()
    {
        if (!isLoggedIn()) {
            if (!isAdmin()) {
                redirect('pages/index');
            }
        }
        $categories = $this->itemModel->getCategoryList();
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['addproduct'])) {
            $data = [
                "categories" => $categories,
                'item_name' => trim($_POST['p_name']),
                'detail' => trim($_POST['p_detail']),
                'price' => trim($_POST['p_price']),
                'ctg_id' => trim($_POST['p_ctg_id']),
                'image' => $_FILES['p_image'],
                'image_name' => '',
                'error' => ''
            ];

            if ($data['image']['error'] === 0 && $data['image']['size'] !== 0) {
                if (is_uploaded_file($data['image']['tmp_name']) === true) {
                    $image_info = getimagesize($data['image']['tmp_name']);
                    $image_mine =  $image_info['mime'];

                    if ($data['image']['size'] > 1048576) {
                        $data['error'] = "アップロードできる画像のサイズは、1 MB です";
                    } elseif (preg_match('/^image\/p?jpeg$/i', $image_mine) === 0) {
                        $data['error'] = 'アップロードできる画像形式は JPEG形式だけです';
                    } elseif (move_uploaded_file($data['image']['tmp_name'], './image/product/' . $data['item_name'] . '.jpg') === true) {
                        $data['image_name'] = $data['item_name']  . '.jpg';
                    } else {
                        $data['image_name'] = 'pavatar.jpg';
                    }
                }
            }

            if (empty($data['error'])) {
                if ($this->cpanelModel->productAdd($data)) {
                    flash('product_add_success', 'Successfully Added');
                    redirect('cpanels/productadd');
                }
            } else {
                $this->view('cpanels/products/add_product', $data);
            }
        } else {
            $data = [
                "categories" => $categories,
                'item_name' => '',
                'detail' => '',
                'price' => '',
                'ctg_id' => '',
                'image' => ''
            ];
            $this->view('cpanels/products/add_product', $data);
        }
    }

    public function categoryview()
    {
        if (!isLoggedIn()) {
            if (!isAdmin()) {
                redirect('pages/index');
            }
        }

        $data = [
            'cates' => $this->cpanelModel->getCate(),
        ];
        $this->view('cpanels/category/c_list', $data);
    }

    public function categoryedit($id)
    {
        if (!isLoggedIn()) {
            if (!isAdmin()) {
                redirect('pages/index');
            }
        }

        $cate = $this->cpanelModel->getSingleCate($id);

        if (isset($_POST['categoryupdate'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "id" => $id,
                'category_name' => trim($_POST['category_name']),
                'dlt_flg'=> trim($_POST['dlt_flg']),
                'error' => ''
            ];
            if (empty($data['error'])) {
                if ($this->cpanelModel->updateCategory($data)) {
                    flash('category_update_success', 'Succcessfully Updated');
                    redirect('cpanels/categoryedit/' . $id);
                } else {
                    die(var_dump(($data)));
                }
            } else {
                $this->view('cpanels/category/edit_category', $data);
            }
        } else {
            $data = [
                "id" => $id,
                'category_name' => $cate->category_name,
                'dlt_flg'=>$cate->delete_flg,
            ];
            $this->view('cpanels/category/edit_category', $data);
        }
    }

    public function categorydelete($id)
    {
        $item = $this->cpanelModel->deleteCategory($id);
        $data = [
            'item' => $item
        ];
        $this->view('cpanels/category/delete_category', $data);
    }

    public function categoryadd()
    {
        if (!isLoggedIn()) {
            if (!isAdmin()) {
                redirect('pages/index');
            }
        }
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['addcategory'])) {
            $data = [
                'c_name' => trim($_POST['c_name']),
                'error' => ''
            ];

            if (empty($data['error'])) {
                if ($this->cpanelModel->categoryAdd($data)) {
                    flash('category_add_success', 'Successfully Added');
                    redirect('cpanels/categoryadd');
                }
            } else {
                $this->view('cpanels/category/add_category', $data);
            }
        } else {
            $data = [
                'c_name' => '',
            ];
            $this->view('cpanels/category/add_category', $data);
        }
    }
}
