<?php

namespace models;

class Midia extends Model {

    protected $table = "midia";
    #nao esqueça da ID
    protected $fields = ["id","usuario_id","projeto_id"];

    
    public function all(){
        $sql = "SELECT midia.*, projetos.titulo as titulo FROM {$this->table} "
                ." LEFT JOIN midia ON midia.projeto_id = projetos.id ";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }  
    
}

