<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create{name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MySQL database based on config file or the porvided parameter';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() //on defini la fonction de la commande
    {
        //Création de la BD

        //Chercher le name de la base de données, s'il n'a pas été récupéré, on cherche dans la zone connexion de database dans le fichier config
        $schemaName = $this->argument('name')?: config('database.connections.mysql.database');
        

        $charset=config('database.connections.mysql.charset', 'utf8mb4');
        
        $collation=config('database.connections.mysql.collation', 'utf8mb4_general_ci');

        //↑ On a donc récupéré la configuration qu'on souhaite

        //Pour faire les requetes on doit d'abord vider la BD
        config(['database.connections.mysql.database' => null]);

        //On crée nos requêtes :
        //$query = "DROP DATABASE IF EXISTS $schemaName;";

        //On execute :
        //DB::statement($query);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";
        DB::statement($query);

        echo "Database $schemaName created succefully";

        config(['database.connections.mysql.database' => $schemaName]);

    }
}
