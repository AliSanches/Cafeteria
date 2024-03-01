<?php

class ProdutoRepositorio
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function formarObjeto($dados)
    {
        return new Produto(
        $dados['id'],
        $dados['tipo'],
        $dados['nome'],
        $dados['descricao'],
        $dados['preco'],
        $dados['imagem']
        );
    }

    public function opcoesCafe(): array
    {
        $sqlCafe = "SELECT * FROM produtos WHERE tipo = 'Cafe' ORDER BY preco";
        $statement = $this->pdo->query($sqlCafe); //"QUERY" recebe um parametro
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC); //FETCHALL -> retorna tudo e fetch_assoc é uma constante que vai retornar em formato de array associativo
    
        $dadosCafe = array_map(function($cafe) { //Array map aplica uma função que fara uma ação para cada elemento desse array
            return $this->formarObjeto($cafe);
        }, $produtosCafe);

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array
    {
        $sqlAlmoco = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $statement = $this->pdo->query($sqlAlmoco);
        $produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        $dadosAlmoco = array_map(function($almoco) { //Array map aplica uma função que fara uma ação para cada elemento desse array
            return $this->formarObjeto($almoco);
        }, $produtosAlmoco);

        return $dadosAlmoco;
    }

    public function buscarProduto(): array
    {
        $sqlResgata = "SELECT * FROM produtos ORDER BY preco";
        $statement = $this->pdo->query($sqlResgata);
        $todosProdutos = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        $dadosProdutos = array_map(function($produto) { 
            return $this->formarObjeto($produto);
        }, $todosProdutos);

        return $dadosProdutos;
    }

    public function deletarProduto(int $id)
    {
        $sqlDeleta = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sqlDeleta);
        $statement->bindValue(1,$id);
        $statement->execute();
    }

    public function cadastrar(Produto $produto)
    {
        $sqlCadastrar = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sqlCadastrar);
        $statement->bindValue(1,$produto->getTipo());
        $statement->bindValue(2,$produto->getNome());
        $statement->bindValue(3,$produto->getDescricao());
        $statement->bindValue(4,$produto->getPreco());
        $statement->bindValue(5,$produto->getImagem());
        $statement->execute();
    }

    public function buscar(int $id)
    {
        $sqlEditar = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sqlEditar);
        $statement->bindValue(1,$id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    public function atualizar(Produto $produto)
    {
        $sqlEditar = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sqlEditar);
        $statement->bindValue(1,$produto->getTipo());
        $statement->bindValue(2,$produto->getNome());
        $statement->bindValue(3,$produto->getDescricao());
        $statement->bindValue(4,$produto->getPreco());
        $statement->bindValue(5,$produto->getImagem());
        $statement->bindValue(6,$produto->getId());
        $statement->execute();
    }

}