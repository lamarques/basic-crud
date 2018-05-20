<?php

namespace Lamarques;


final class Conexao
{

    public static function getConnection(){
        return new \PDO('mysql:host=localhost;dbname=unialcance', 'root', '', array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }


}