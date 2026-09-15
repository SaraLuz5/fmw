<?php
require_once 'Atributos/Tabela.php';
require_once 'Atributos/Coluna.php';
require_once 'Entidades/Usuarios.php';
require_once 'Framework/fwkPersist.php';

$pdo = new PDO ("mysql:host=localhost;dbname=sistema_teste;charset=utf8mb4", "root", "bancodedados");
$usuarios = new Usuario();
$usuarios->nome = "Alice";
$usuario->email = "alice@gmail.com";
$fwk = new fwkPersist($pdo);
$produto = new Produtos();
$produto->preco = 100;
$produto->nome = "Teclado";
$fwk->save($produto);
$registros = $fwk->listAll(Produtos::class);
/* $fwk->save($usuario);
$registros = $fwk->listAll(Usuario::class);
echo "Registros salvo com sucesso no banco!"; */
foreach ($registros as $registro){
    echo "Nome : ".$registro->nome . "<br>";
    echo "Email : ".$registro->email . "<hr>";
} 