<?php

class Produto
{
    private $id;
    private $tipo;
    private $nome;
    private $descricao;
    private $preco;
    private $imagem;

    public function __construct(?int $id, string $tipo, string $nome, string $descricao, float $preco, ?string $imagem = "logo-serenatto.png")
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->imagem = $imagem;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function imagemDiretorio():string
    {
        return "img/" . $this->imagem;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getPrecoFormatado():string
    {
        return "R$ " . number_format($this->preco,2);
    }

    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;
    }
}