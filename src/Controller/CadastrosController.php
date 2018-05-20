<?php
/**
 * Created by PhpStorm.
 * User: RogerioLamarques
 * Date: 20/05/2018
 * Time: 16:25
 */

namespace Lamarques\Controller;


use Lamarques\Model\Cadastros;

class CadastrosController
{

    public static function show(\PDO $pdo){
        $cadastros = new Cadastros();
        echo json_encode($cadastros->show($pdo));
    }

    public static function add(\PDO $pdo, $dados){
        $cadastros = new Cadastros();
        echo json_encode(($cadastros->add($pdo, $dados)) ? true : false);
    }

    public static function update(\PDO $pdo, $dados, $id){
        $cadastros = new Cadastros();
        echo json_encode(($cadastros->update($pdo, $dados, $id)) ? true : false);
    }

    public static function delete(\PDO $pdo, $id){
        $cadastros = new Cadastros();
        echo json_encode(($cadastros->delete($pdo, $id)) ? true : false);
    }

}