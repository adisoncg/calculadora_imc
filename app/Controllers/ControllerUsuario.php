<?php

require_once('app/Database/ConexaoDB.php');

class ControllerUsuario
{
    public function createUsuario(Usuario $usuario){
        try{
            $insertUsuario = "INSERT INTO usuarios (nome, sexo, idade, peso, altura, imc) VALUES (:nome, :sexo, :idade, :peso, :altura, :imc)";
            $stmt = ConexaoDB::getConn()->prepare($insertUsuario);
            $stmt->bindValue(':nome', $usuario->getNome());
            $stmt->bindValue(':sexo', $usuario->getSexo());
            $stmt->bindValue(':idade', $usuario->getIdade());
            $stmt->bindValue(':peso', $usuario->getPeso());
            $stmt->bindValue(':altura', $usuario->getAltura());
            $stmt->bindValue(':imc', $usuario->getImc());
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function readUsuario(){
        try{
            $queryUsuario = "SELECT * FROM usuarios";
            $stmt = ConexaoDB::getConn()->prepare($queryUsuario);
            $stmt->execute();

            if($stmt->rowCount()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateUsuario(Usuario $usuario){

    }

    public function deleteUsuario(int $id){

    }
}

?>