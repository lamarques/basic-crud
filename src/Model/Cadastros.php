<?php
/**
 * Created by PhpStorm.
 * User: RogerioLamarques
 * Date: 20/05/2018
 * Time: 16:23
 */

namespace Lamarques\Model;


class Cadastros
{

    public function show(\PDO $pdo){
        $sql = "SELECT * FROM cadastros";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function add(\PDO $pdo, array $dados){
        $sql = "INSERT INTO `cadastros` (`id`, `nome`, `email`, `cidade`, `celular`, `curso`, `ocupacao`, `dt_cadastro`, `confirmacao`) 
                VALUES (NULL, :nome, :email, :cidade, :celular, :curso, :ocupacao, NOW(), NULL)";
        $consulta = $pdo->prepare($sql);
        return $consulta->execute($dados);
    }

    public function update(\PDO $pdo, array $dados, $id){
        $sql = "UPDATE `cadastros` SET ";
        foreach ($dados as $key=>$dado){
            $sql .= " {$key} = '$dado' ";
        }
        $sql .= " WHERE id = {$id}";
        $consulta = $pdo->prepare($sql);
        return $consulta->execute();
    }

    public function delete(\PDO $pdo, $id){
        $sql = "DELETE FROM cadastros WHERE id=:id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':id', $id, \PDO::PARAM_INT);
        return $consulta->execute();
    }

}