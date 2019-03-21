<?php

namespace App\Core\Database;

use PDO;
use Exception;


class QueryBuilder 

{
    protected $pdo;

    public function __construct(PDO $pdo) 
    
    {
        $this->pdo = $pdo;
    }


    public function selectAll($table)

    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);

    }


    public function insert($table, $parameters)

    {

        $implodedKeys = implode(', ', array_keys($parameters));

        $placeHolders = ':'.implode(', :', array_keys($parameters));

        $sql = sprintf('insert into %s (%s) value (%s)',
            $table, 
            $implodedKeys, 
            $placeHolders);

        try {
            
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);

        } catch(Exception $e) {

            die('Something went wrong!');

        }

    }


    public function delete($table, $parameters)

    {
        
        $sql = sprintf('delete from %s where id = :id',
            $table);

        try {
            
            $statement = $this->pdo->prepare($sql);

            $statement->execute([':id' => $parameters]);


        } catch(Exception $e) {

            die('Something went wrong!');

        }

    }


}