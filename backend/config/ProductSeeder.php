<?php
class ProductSeeder {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function seed(){

        $products = [
            // ===== Fara & Bime (1–6) =====
            ['name'=>'Fara Domate','description'=>'Fara domate cilësore','price'=>3.50,'image'=>'products/tomato.jpg','subcategory_id'=>1,'stock'=>50],
            ['name'=>'Fara Speci','description'=>'Fara speci për rendiment të lartë','price'=>3.00,'image'=>'products/fara-speci.jpg','subcategory_id'=>1,'stock'=>45],

            // ['name'=>'Fara Molle','description'=>'Fara mollësh vendore','price'=>4.50,'image'=>'products/fara-molle.jpg','subcategory_id'=>2,'stock'=>30],
            // ['name'=>'Fara Dardhe','description'=>'Fara dardhe rezistente','price'=>4.00,'image'=>'products/fara-dardhe.jpg','subcategory_id'=>2,'stock'=>25],

            // ['name'=>'Fara Trëndafili','description'=>'Fara trëndafili dekorativ','price'=>2.50,'image'=>'products/fara-trendafili.jpg','subcategory_id'=>3,'stock'=>40,'is_active'=>1],
            // ['name'=>'Fara Tulipani','description'=>'Fara tulipani shumëngjyrëshe','price'=>3.20,'image'=>'products/fara-tulipani.jpg','subcategory_id'=>3,'stock'=>35,'is_active'=>1],

            // ['name'=>'Fara Gruri','description'=>'Fara gruri për prodhim bujqësor','price'=>15.00,'image'=>'products/fara-gruri.jpg','subcategory_id'=>4,'stock'=>100,'is_active'=>1],
            // ['name'=>'Fara Misri','description'=>'Fara misri hibride','price'=>18.00,'image'=>'products/fara-misri.jpg','subcategory_id'=>4,'stock'=>90,'is_active'=>1],

            // ['name'=>'Fidan Molle','description'=>'Fidan molle njëvjeçar','price'=>6.50,'image'=>'products/fidan-molle.jpg','subcategory_id'=>5,'stock'=>20,'is_active'=>1],
            // ['name'=>'Fidan Kumbulle','description'=>'Fidan kumbulle rezistente','price'=>6.00,'image'=>'products/fidan-kumbulle.jpg','subcategory_id'=>5,'stock'=>18,'is_active'=>1],

            // ['name'=>'Fara Patate','description'=>'Fara patate për mbjellje','price'=>12.00,'image'=>'products/fara-patate.jpg','subcategory_id'=>6,'stock'=>60,'is_active'=>1],
            // ['name'=>'Fara Patate Premium','description'=>'Fara patate cilësi e lartë','price'=>14.00,'image'=>'products/fara-patate-premium.jpg','subcategory_id'=>6,'stock'=>50,'is_active'=>1],

            // // ===== Ushqim & Mbrojtje Bimore (7–13) =====
            // ['name'=>'Plehra Organike','description'=>'Plehra organike natyrale','price'=>9.50,'image'=>'products/plehra-organike.jpg','subcategory_id'=>7,'stock'=>80,'is_active'=>1],
            // ['name'=>'Plehra Organike Premium','description'=>'Plehra organike të përforcuara','price'=>12.00,'image'=>'products/plehra-organike-premium.jpg','subcategory_id'=>7,'stock'=>70,'is_active'=>1],

            // ['name'=>'Plehra NPK 15-15-15','description'=>'Plehra minerale','price'=>22.00,'image'=>'products/npk-15-15-15.jpg','subcategory_id'=>8,'stock'=>60,'is_active'=>1],
            // ['name'=>'Plehra NPK Pro','description'=>'Plehra NPK profesionale','price'=>25.00,'image'=>'products/npk-pro.jpg','subcategory_id'=>8,'stock'=>55,'is_active'=>1],

            // ['name'=>'Plehra Lengshme','description'=>'Plehra të lëngshme universale','price'=>10.00,'image'=>'products/plehra-lengshme.jpg','subcategory_id'=>9,'stock'=>40,'is_active'=>1],
            // ['name'=>'Plehra Lengshme Pro','description'=>'Plehra të lëngshme intensive','price'=>13.00,'image'=>'products/plehra-lengshme-pro.jpg','subcategory_id'=>9,'stock'=>35,'is_active'=>1],

            // ['name'=>'Vitamina per Bime','description'=>'Vitamina për rritje','price'=>7.50,'image'=>'products/vitamina-bime.jpg','subcategory_id'=>10,'stock'=>45,'is_active'=>1],
            // ['name'=>'Vitamina Bimore Plus','description'=>'Vitamina bimore profesionale','price'=>9.00,'image'=>'products/vitamina-bime-plus.jpg','subcategory_id'=>10,'stock'=>40,'is_active'=>1],

            // ['name'=>'Pesticid Universal','description'=>'Pesticid për insekte','price'=>11.00,'image'=>'products/pesticid.jpg','subcategory_id'=>11,'stock'=>30,'is_active'=>1],
            // ['name'=>'Pesticid Pro','description'=>'Pesticid profesional','price'=>15.00,'image'=>'products/pesticid-pro.jpg','subcategory_id'=>11,'stock'=>25,'is_active'=>1],

            // ['name'=>'Herbicid Selektiv','description'=>'Herbicid kundër barërave','price'=>14.00,'image'=>'products/herbicid.jpg','subcategory_id'=>12,'stock'=>35,'is_active'=>1],
            // ['name'=>'Herbicid Forte','description'=>'Herbicid me veprim të shpejtë','price'=>18.00,'image'=>'products/herbicid-forte.jpg','subcategory_id'=>12,'stock'=>30,'is_active'=>1],

            // ['name'=>'Fungicid Bimor','description'=>'Fungicid për sëmundje','price'=>13.00,'image'=>'products/fungicid.jpg','subcategory_id'=>13,'stock'=>28,'is_active'=>1],
            // ['name'=>'Fungicid Pro','description'=>'Fungicid profesional','price'=>17.00,'image'=>'products/fungicid-pro.jpg','subcategory_id'=>13,'stock'=>25,'is_active'=>1],
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