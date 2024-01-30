<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model {

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name_product', 'description','price','stock'];
   

    public function insertarProducto($name, $desc,$price,$stock)
    {
        $data = 
        [
                'name_product'  => $name, 
                'description'   => $desc,
                'price'         => $price,
                'stock'         => $stock
        ];
        return $this->insert($data);
    
    }

}