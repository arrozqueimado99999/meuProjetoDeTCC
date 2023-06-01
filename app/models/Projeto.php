<?php

namespace models;

class Projeto extends Model {
    
    protected $table = "projetos";
    #nao esqueça da ID
    protected $fields = ["id","titulo","descricao","categoria","sub_categ", "usuario_id", "orient_id"];

    public function findById($id){
        $sql = "SELECT projetos.*, usuarios.nome AS nome FROM {$this->table} "
                ." LEFT JOIN usuarios ON usuarios.id = projetos.usuario_id "
                ." WHERE projetos.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $sql = "SELECT projetos.*, usuarios.nome as nome FROM {$this->table} "
                ." LEFT JOIN usuarios ON usuarios.id = projetos.usuario_id ";
        
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


    public function getMidia($idMidia){
        $sql = "SELECT * FROM midia
            INNER JOIN projetos ON
                usuarios.id = projetos.usuario_id
            WHERE projetos.usuario_id = :idMidia ";

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute([':idMidia' => $idMidia]);

        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }




    
}

