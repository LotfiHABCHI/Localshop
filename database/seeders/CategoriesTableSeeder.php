<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=new \App\Models\Categories();
       
        $category->id=1;
        $category->name="epicerie";
       // $category->description=NULL;
        $category->image=NULL;
        $category->save();
        
        //['id'=>1, 'name'=>'fruits', 'description'=>NULL, 'image'=>"fruits.jpg"];
       //$category->['id'=>2, 'name'=>'legumes', 'description'=>NULL, 'image'=>"legumes.jpg"];
       /* ['id'=>3, 'name'=>'boulangerie', 'description'=>NULL, 'image'=>"boulangeries.jpg"],
        ['id'=>4, 'name'=>'viandes', 'description'=>NULL, 'image'=>"viandes.jpg"],
        ['id'=>5, 'name'=>'boissons', 'description'=>NULL, 'image'=>"boissons.jpg"],
        ['id'=>6, 'name'=>'vins', 'description'=>NULL, 'image'=>"vins.jpg"],
        ['id'=>7, 'name'=>'produits laitiers', 'description'=>NULL, 'image'=>NULL],*/

       
    }
}
