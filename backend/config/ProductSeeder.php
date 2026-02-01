<?php
class ProductSeeder {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function seed(){

        $products = [
            ['name'=>'Fara Domate','description'=>'Fara domate cilësore','price'=>3.50,'image'=>'products/tomato.jpg','subcategory_id'=>1,'stock'=>50],
            ['name'=>'Fara Speci','description'=>'Fara speci për rendiment të lartë','price'=>3.00,'image'=>'products/fara-speci.jpg','subcategory_id'=>1,'stock'=>45],
        ];

        foreach($products as $product){
            $query = "INSERT INTO products (name, description, price, image, subcategory_id, stock) 
                    VALUES (:name, :description, :price, :image, :subcategory_id, :stock)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':name', $product['name']);
            $stmt->bindParam(':description', $product['description']);
            $stmt->bindParam(':price', $product['price']);
            $stmt->bindParam(':image', $product['image']);
            $stmt->bindParam(':subcategory_id', $product['subcategory_id']);
            $stmt->bindParam(':stock', $product['stock']);
            $stmt->execute();
        }
    }
}


?>