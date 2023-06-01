<?php

namespace models;

class Orientador extends Model {
    
    protected $table = "orientador";
    #nao esqueça da ID
    protected $fields = ["id","nome","email","senha","curso", "projeto_id"];

    public function findById($id){
        $sql = "SELECT orientadores.*, projetos.titulo AS titulo FROM {$this->table} "
                ." LEFT JOIN orientadores ON orientadores.id = projetos.orient_id "
                ." WHERE orient.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $sql = "SELECT orientadores.*, projetos.titulo as titulo FROM {$this->table} "
                ." LEFT JOIN orientadores ON orientadores.id = projetos.orient_id ";
        
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

