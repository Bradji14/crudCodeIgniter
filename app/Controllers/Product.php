<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class Product extends Controller
{
    public function index(){

        $model = new ProductModel();
        $data['all_products'] = $model->orderBy('id','DESC')->findAll();
        return view('list', $data);
    }

    //create new's products
    public function store(){
            
        $model = new ProductModel();

         $name = $this->request->getPost('txtname');
         $desc = $this->request->getPost('txtdesc');
         $price =$this->request->getPost('txtprice');
         $stock = $this->request->getPost('txtstock');

        $model->insertarProducto($name, $desc, $price, $stock);

        // helper(['form', 'url']);

    }

    //find id of selected product
    public function edit($id=null){

        $model = new ProductModel();
        $data = $model->where('id', $id)->first();
        if($data){
            echo json_encode(array('data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    }

    //update products 
    public function update(){

        $model = new ProductModel();
  
        $id = $this->request->getPost('id');
        echo $id;
       

         $data = [
            'name_product' => $this->request->getPost('txtname'),
            'description'  => $this->request->getPost('txtdesc'),
            'price'        => $this->request->getPost('txtprice'),
            'stock'        => $this->request->getPost('txtstock'),
            ];
  
        $update = $model->update($id,$data);
        if($update != false)
        {
            $data = $model->where('id', $id)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }
        else{
            echo json_encode(array("status" => false , 'data' => $data));
        }

    }

    // delete products
    public function delete($id = null){
        $model = new ProductModel();
        $data=$model->where('id',$id)->first();
        
        $model->where('id',$id)->delete($id);
    }

}


