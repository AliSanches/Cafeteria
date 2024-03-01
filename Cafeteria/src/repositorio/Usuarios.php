<?php

class Usuarios
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function obterUsuarios(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'password');

        $sqlObter = "SELECT * FROM usuarios WHERE email = ?";
        $statement = $this->pdo->prepare($sqlObter);
        $statement->bindValue(1, $email);
        $statement->execute();

        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        var_dump($userData);


    }
}
?>