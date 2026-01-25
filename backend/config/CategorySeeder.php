<?php
class CategorySeeder {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function seed(){
        $categories = [
            'Fara & Bime',
            'Ushqim & Mbrojtje Bimore',
            'Ujitje',
            'Mjete & Pajisje Kopshti',
            'Makineri & Pjese',
            'Kafshe & Produkte Veterinare',
            'Furnizime Bujqesore & Ndertim',
            'Vajra & Lubrifikante',
            'Aksesore, Bulona & Vida'
        ];

        foreach($categories as $category){
            $query = "INSERT INTO categories (emri) VALUES (:emri)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':emri', $category);
            $stmt->execute();
        }
    }
}
?>