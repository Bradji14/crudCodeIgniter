<?php namespace App\Database\Migrations;
 
use CodeIgniter\Database\Migration;
 
class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id'          => [
                        'type'           => 'INT',
                        'constraint'     => 5,
                        'unsigned'       => TRUE,
                        'auto_increment' => TRUE
                ],
                'name_product'          => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 5,
                ],
                'description'       => [
                        'type'           => 'TEXT',
                ],
                'price' => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '10',
                ],
                'stock' => [
                    'type'           => 'BIT',
                    
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('products');
    }
 
    //--------------------------------------------------------------------
 
    public function down()
    {
        $this->forge->dropTable('products');
    }
}