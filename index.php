<?php

require __DIR__ . '/vendor/autoload.php';

use Lamarques\Conexao;
try {
    $pdo = Conexao::getConnection();
    $acao = filter_input(INPUT_GET, 'acao');

    switch ($acao) {
        case 'show':
        default:
            //metodo get
            \Lamarques\Controller\CadastrosController::show($pdo);
            break;
        case 'new':
            //metodo post
            $dados = [];
            $posts_vars = (isset($_POST)) ? $_POST : [];
            foreach ($posts_vars as $key=>$var){
                $dados[':' . $key] = $var;
            }
            \Lamarques\Controller\CadastrosController::add($pdo, $dados);
            break;
        case 'update':
            //atualiza
            $dados = [];
            $posts_vars = (isset($_POST)) ? $_POST : [];
            foreach ($posts_vars as $key=>$var){
                if($key != 'id')
                    $dados[$key] = $var;
            }
            $id = filter_input(INPUT_POST, 'id');
            \Lamarques\Controller\CadastrosController::update($pdo, $dados, $id);
            break;
        case 'delete':
            //deleta
            $id = filter_input(INPUT_POST, 'id');
            \Lamarques\Controller\CadastrosController::delete($pdo, $id);
            break;
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}
