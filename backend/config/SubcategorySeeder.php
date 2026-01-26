<?php
class SubcategorySeeder {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function seed(){
        $subcategories = [
            ['emri' => 'Fara Perimesh', 'category_id' => 1],
            ['emri' => 'Fara Frutash', 'category_id' => 1],
            ['emri' => 'Fara Lulesh', 'category_id' => 1],
            ['emri' => 'Fara Dritherash', 'category_id' => 1],
            ['emri' => 'Fidane / Bime', 'category_id' => 1],
            ['emri' => 'Fara Patatesh', 'category_id' => 1],
            ['emri' => 'Plehra Organike', 'category_id' => 2],
            ['emri' => 'Plehra NBK', 'category_id' => 2],
            ['emri' => 'Plehra te Lengshme', 'category_id' => 2],
            ['emri' => 'Vitamina per Bime', 'category_id' => 2],
            ['emri' => 'Pesticide', 'category_id' => 2],
            ['emri' => 'Herbicide', 'category_id' => 2],
            ['emri' => 'Fungicide', 'category_id' => 2],
            ['emri' => 'Sisteme Ujitjeje', 'category_id' => 3],
            ['emri' => 'Pikezim', 'category_id' => 3],
            ['emri' => 'Sisteme Sperkatese', 'category_id' => 3],
            ['emri' => 'Tuba (PVC / HDBE)', 'category_id' => 3],
            ['emri' => 'Mjete Sperkatjeje', 'category_id' => 3],
            ['emri' => 'Pompa Uji', 'category_id' => 3],
            ['emri' => 'Mjete Dore', 'category_id' => 4],
            ['emri' => 'Mjete Elektrike', 'category_id' => 4],
            ['emri' => 'Mjete & Aksesore', 'category_id' => 4],
            ['emri' => 'Doreza & Lidhese', 'category_id' => 4],
            ['emri' => 'Makineri te Renda', 'category_id' => 5],
            ['emri' => 'Pajisje Sperkatjeje', 'category_id' => 5],
            ['emri' => 'Pjese Motori', 'category_id' => 5],
            ['emri' => 'Pjese Hidraulike', 'category_id' => 5],
            ['emri' => 'Goma & Rrota', 'category_id' => 5],
            ['emri' => 'Ushqim per Shpende', 'category_id' => 6],
            ['emri' => 'Ushqim per Bageti', 'category_id' => 6],
            ['emri' => 'Ushqim per Kafshe Shtepie', 'category_id' => 6],
            ['emri' => 'Vitamina & suplemente', 'category_id' => 6],
            ['emri' => 'Produkte Veterinare', 'category_id' => 6],
            ['emri' => 'Pajisje per Kafshe', 'category_id' => 6],
            ['emri' => 'Pajisje per Serra', 'category_id' => 7],
            ['emri' => 'Rrjeta & Mbulesa', 'category_id' => 7],
            ['emri' => 'Flete Plastike', 'category_id' => 7],
            ['emri' => 'Gardhe & Rrethime', 'category_id' => 7],
            ['emri' => 'Ene Ruajtjeje', 'category_id' => 7],
            ['emri' => 'Veshje Sigurie', 'category_id' => 7],
            ['emri' => 'Vaj Motorri', 'category_id' => 8],
            ['emri' => 'Vaj Hidraulik', 'category_id' => 8],
            ['emri' => 'Lubrifikante', 'category_id' => 8],
            ['emri' => 'Kontenier Karburanti', 'category_id' => 8],
            ['emri' => 'Bulona', 'category_id' => 9],
            ['emri' => 'Vida', 'category_id' => 9],
            ['emri' => 'Dado', 'category_id' => 9],
            ['emri' => 'Rondela', 'category_id' => 9],
            ['emri' => 'Kushineta', 'category_id' => 9],
            ['emri' => 'Rripa', 'category_id' => 9],
            ['emri' => 'Filtra', 'category_id' => 9],
            ['emri' => 'Bateri', 'category_id' => 9],
            ['emri' => 'Llampa & Drita', 'category_id' => 9],
            ['emri' => 'Komponente Elektrike', 'category_id' => 9]
        ];

        foreach($subcategories as $subcategory){
            $query = "INSERT INTO subcategories (emri, category_id) VALUES (:emri, :category_id)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':emri', $subcategory['emri']);
            $stmt->bindParam(':category_id', $subcategory['category_id']);
            $stmt->execute();
        }
    }
}
?>