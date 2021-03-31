<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    function products()
    {
        /*return [
            ['id' => 1, 'name' => 'Pomme', 'description'=>'golden','image'=> "pomme1.jpg", 'price' =>1.99, 'catId'=>1, 'stock'=>50],
            ['id' => 2, 'name' => 'croissant',  'description'=>'sans gluten','image'=> "croissant.jpg", 'price' =>0.99, 'catId'=>3, 'stock'=>50],
            ['id' => 3, 'name' => 'Banane', 'description'=>'cavendish','image'=> "banane.jpg", 'price' =>0.99, 'catId'=>1, 'stock'=>50],
            ['id' => 4, 'name' => 'courgette',  'description'=>'bio','image'=> "courgette1.jpg", 'price' =>1.99, 'catId'=>2, 'stock'=>50],
            ['id' => 5, 'name' => 'poulet', 'description'=>'poule elevée en plein air','image'=> "poulet.jpg", 'price' =>6.99, 'catId'=>4, 'stock'=>50],
            ['id' => 6, 'name' => 'vin rouge', 'description'=>'cuvée 1987','image'=> "vinrouge.jpg", 'price' =>20.99, 'catId'=>6, 'stock'=>50],
            ['id' => 7, 'name' => 'boeuf', 'description'=>'boeuf de kobé','image'=> "boeuf.jpg", 'price' =>30, 'catId'=>4, 'stock'=>50],
            ['id' => 8, 'name' => 'vin blanc', 'description'=>'cuvée 1995','image'=> "vinblanc.jpg", 'price' =>16.9, 'catId'=>6, 'stock'=>50],
            ['id' => 9, 'name' => 'carotte', 'description'=>'bio','image'=> "carotte.jpg", 'price' =>1.99, 'catId'=>2, 'stock'=>50],
            ['id' => 10, 'name' => 'pomme', 'description'=>'bio','image'=> "pomme2.jpg", 'price' =>2.5, 'catId'=>1, 'stock'=>50],

        ];*/


        /*return [
            ['productid' => 1, 'productname' => 'Pomme', 'productimage'=> "pomme1.jpg", 'productinfo'=>'golden', 'productprice' =>1.99, 'categoryid'=>1, 'productquantity'=>50],
            ['productid' => 2, 'productname' => 'croissant', 'productimage'=> "croissant.jpg",  'productinfo'=>'sans gluten', 'productprice' =>0.99, 'categoryid'=>3, 'productquantity'=>50],
            ['productid' => 3, 'productname' => 'Banane', 'productimage'=> "banane.jpg", 'productinfo'=>'cavendish', 'productprice' =>0.99, 'categoryid'=>1, 'productquantity'=>50],
            ['productid' => 4, 'productname' => 'courgette', 'productimage'=> "courgette1.jpg",  'productinfo'=>'bio', 'productprice' =>1.99, 'categoryid'=>2, 'productquantity'=>50],
            ['productid' => 5, 'productname' => 'poulet', 'productimage'=> "poulet.jpg", 'productinfo'=>'poule elevée en plein air', 'productprice' =>6.99, 'categoryid'=>4, 'productquantity'=>50],
            ['productid' => 6, 'productname' => 'vin rouge', 'productimage'=> "vinrouge.jpg", 'productinfo'=>'cuvée 1987', 'productprice' =>20.99, 'categoryid'=>6, 'productquantity'=>50],
            ['productid' => 7, 'productname' => 'boeuf', 'productimage'=> "boeuf.jpg", 'productinfo'=>'boeuf de kobé', 'productprice' =>30, 'categoryid'=>4, 'productquantity'=>50],
            ['productid' => 8, 'productname' => 'vin blanc', 'productimage'=> "vinblanc.jpg", 'productinfo'=>'cuvée 1995', 'productprice' =>16.9, 'categoryid'=>6, 'productquantity'=>50],
            ['productid' => 9, 'productname' => 'carotte', 'productimage'=> "carotte.jpg", 'productinfo'=>'bio', 'productprice' =>1.99, 'categoryid'=>2, 'productquantity'=>50],
            ['productid' => 10, 'productname' => 'pomme', 'productimage'=> "pomme2.jpg", 'productinfo'=>'bio', 'productprice' =>2.5, 'categoryid'=>1, 'productquantity'=>50],

        ];*/

        return [
            ['productid'=>1, 'productname'=>'Pomme Golden', 'productimage'=>'pomme.png', 'productprice'=>0.35, 'productinfo'=>'bio', 'productquantity'=>100, 'categoryid'=>1],
            ['productid'=>2, 'productname'=>'Courge', 'productimage'=>'courge.png', 'productprice'=>1.5, 'productinfo'=>'bio', 'productquantity'=>50, 'categoryid'=>1],
            ['productid'=>3, 'productname'=>'Carottes', 'productimage'=>'carotte.png', 'productprice'=>0.6, 'productinfo'=>'bio, 500g', 'productquantity'=>50, 'categoryid'=>1],
            ['productid'=>4, 'productname'=>'Pommes de terre', 'productimage'=>'pommeterre.png', 'productprice'=>1, 'productinfo'=>'bio, 500g', 'productquantity'=>100, 'categoryid'=>1],
            ['productid'=>5, 'productname'=>'Asperges', 'productimage'=>'asperge.png', 'productprice'=>0.5, 'productinfo'=>'bio, 200g', 'productquantity'=>100, 'categoryid'=>1],
            
            ['productid'=>6, 'productname'=>'Boeuf (pas de Kobe)', 'productimage'=>'boeuf.png', 'productprice'=>2, 'productinfo'=>'100g', 'productquantity'=>30, 'categoryid'=>2],
            ['productid'=>7, 'productname'=>'Poulet fermier', 'productimage'=>'poulet.png', 'productprice'=>15, 'productinfo'=>'plein air, 1600g', 'productquantity'=>30, 'categoryid'=>2], 
            ['productid'=>8, 'productname'=>'Bavette de boeuf', 'productimage'=>'bavette.png', 'productprice'=>12, 'productinfo'=>'plein air, 200g', 'productquantity'=>30, 'categoryid'=>2], 
            ['productid'=>9, 'productname'=>'Gobi de Marseille', 'productimage'=>'gobi.png', 'productprice'=>1, 'productinfo'=>'Vieux Port', 'productquantity'=>50, 'categoryid'=>2],
            
            ['productid'=>10, 'productname'=>'Pain au chocolat', 'productimage'=>'painChoco.jpg', 'productprice'=>0.8, 'productinfo'=>'sans gluten', 'productquantity'=>30, 'categoryid'=>3],
            ['productid'=>11, 'productname'=>'Croissant', 'productimage'=>'croissant.jpg', 'productprice'=>0.7, 'productinfo'=>'au beurre ', 'productquantity'=>30, 'categoryid'=>3],
            ['productid'=>12, 'productname'=>'Ficelle au olive', 'productimage'=>'ficelle.jpg', 'productprice'=>1.2, 'productinfo'=>'olive noire de Nyons', 'productquantity'=>30, 'categoryid'=>3],
            ['productid'=>13, 'productname'=>'Baguette', 'productimage'=>'baguette.jpg', 'productprice'=>0.7, 'productinfo'=>'sans gluten', 'productquantity'=>100, 'categoryid'=>3],
            ['productid'=>14, 'productname'=>'Pain complet', 'productimage'=>'complet.jpg', 'productprice'=>1, 'productinfo'=>'3 céréales', 'productquantity'=>20, 'categoryid'=>3],
            
            ['productid'=>15, 'productname'=>'Oeufs x6', 'productimage'=>'oeuf6.jpg', 'productprice'=>3, 'productinfo'=>'bio', 'productquantity'=>50, 'categoryid'=>4],
            ['productid'=>16, 'productname'=>'Oeufs x12', 'productimage'=>'oeuf12.jpg', 'productprice'=>5, 'productinfo'=>'bio', 'productquantity'=>20, 'categoryid'=>4],
            ['productid'=>17, 'productname'=>'Fromage de chèvre x3', 'productimage'=>'chevre.jpg', 'productprice'=>6, 'productinfo'=>'bio, 3x crottin', 'productquantity'=>10, 'categoryid'=>4],
            ['productid'=>18, 'productname'=>'Compté AOP', 'productimage'=>'compte.jpg', 'productprice'=>3, 'productinfo'=>'AOP', 'productquantity'=>20, 'categoryid'=>4],
            ['productid'=>19, 'productname'=>'Mix Fromages', 'productimage'=>'mixF.jpg', 'productprice'=>25, 'productinfo'=>'Assortiment de 5', 'productquantity'=>10, 'categoryid'=>4],
            
            ['productid'=>20, 'productname'=>'Bordeau du Creusot', 'productimage'=>'bordeau.png', 'productprice'=>15, 'productinfo'=>'bio', 'productquantity'=>30, 'categoryid'=>5],
            ['productid'=>21, 'productname'=>'Le Gigondas', 'productimage'=>'gigondas.png', 'productprice'=>15, 'productinfo'=>'bio, rouge, grenache', 'productquantity'=>30, 'categoryid'=>5],
            ['productid'=>22, 'productname'=>'Vacqueyras', 'productimage'=>'vacqueyras.png', 'productprice'=>20, 'productinfo'=>'bio, rouge, grenache', 'productquantity'=>30, 'categoryid'=>5],
            ['productid'=>23, 'productname'=>'Châteauneuf-du-Pape', 'productimage'=>'pape.png', 'productprice'=>25, 'productinfo'=>'bio, rouge, grenache', 'productquantity'=>30, 'categoryid'=>5],
            ['productid'=>24, 'productname'=>'Cassis', 'productimage'=>'cassis.png', 'productprice'=>10, 'productinfo'=>'blanc', 'productquantity'=>30, 'categoryid'=>5],
            
            ['productid'=>25, 'productname'=>'Jus de pomme-poire', 'productimage'=>'jusPoire.jpg', 'productprice'=>2, 'productinfo'=>'bio', 'productquantity'=>50, 'categoryid'=>6],
            ['productid'=>26, 'productname'=>'Nectar d\'abricot', 'productimage'=>'jusAbricot.jpg', 'productprice'=>1.5, 'productinfo'=>'bio', 'productquantity'=>50, 'categoryid'=>6],
            ['productid'=>27, 'productname'=>'Jus de pomme', 'productimage'=>'jusPomme.jpg', 'productprice'=>1.3, 'productinfo'=>'bio', 'productquantity'=>50, 'categoryid'=>6],
            ['productid'=>28, 'productname'=>'Jus de raisin', 'productimage'=>'jusRaisin.jpg', 'productprice'=>2, 'productinfo'=>'bio', 'productquantity'=>30, 'categoryid'=>6],
            ['productid'=>29, 'productname'=>'Cidre', 'productimage'=>'cidre.jpg', 'productprice'=>5, 'productinfo'=>'pomme, bio', 'productquantity'=>30, 'categoryid'=>6],
            
            ['productid'=>30, 'productname'=>'Confiture de fraise', 'productimage'=>'confit.jpg', 'productprice'=>4.8, 'productinfo'=>'bio', 'productquantity'=>20, 'categoryid'=>7],
            ['productid'=>31, 'productname'=>'Compote de pomme', 'productimage'=>'compote.jpg', 'productprice'=>4, 'productinfo'=>'bio', 'productquantity'=>50, 'categoryid'=>7],
            ['productid'=>32, 'productname'=>'Chocolat praliné', 'productimage'=>'praline.jpg', 'productprice'=>7, 'productinfo'=>'200g', 'productquantity'=>30, 'categoryid'=>7],
            ['productid'=>33, 'productname'=>'Mandiants', 'productimage'=>'mandiants.jpg', 'productprice'=>5, 'productinfo'=>'200g', 'productquantity'=>30, 'categoryid'=>7],
            ['productid'=>34, 'productname'=>'Chocolat Ganache', 'productimage'=>'ganache.jpg', 'productprice'=>7.5, 'productinfo'=>'200g', 'productquantity'=>30, 'categoryid'=>7],
            
            ['productid'=>35, 'productname'=>'Tapenade Noire', 'productimage'=>'noire.png', 'productprice'=>3.5, 'productinfo'=>'bio', 'productquantity'=>20, 'categoryid'=>8],
            ['productid'=>36, 'productname'=>'Tapenade Vert', 'productimage'=>'vert.png', 'productprice'=>3.5, 'productinfo'=>'bio', 'productquantity'=>20, 'categoryid'=>8],
            ['productid'=>37, 'productname'=>'Pois chiche', 'productimage'=>'pois.png', 'productprice'=>4, 'productinfo'=>'500g', 'productquantity'=>20, 'categoryid'=>8],
            ['productid'=>38, 'productname'=>'Huile d\'olive', 'productimage'=>'huile.png', 'productprice'=>14, 'productinfo'=>'bio, vierge, 1.5L', 'productquantity'=>20, 'categoryid'=>8],
            ['productid'=>39, 'productname'=>'Pâtes Fraiches', 'productimage'=>'pate.png', 'productprice'=>3, 'productinfo'=>'bio, 200g', 'productquantity'=>20, 'categoryid'=>8],
            

        ];
    }
}
