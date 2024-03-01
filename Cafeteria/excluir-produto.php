<?php

    require_once('./src/conecta.php');
    require "./src/modelo/Produto.php";
    require "./src/repositorio/ProdutoRepositorio.php";

    $produtoRepositorio = new ProdutoRepositorio($pdo);

    if($_POST['id'] !== '')
    {
        $produtoRepositorio->deletarProduto(($_POST['id']));
        header('Location:admin.php');
    }
    else
    {
        echo "!!!!ERRO AO EXCLUIR!!!!";
    }
?>