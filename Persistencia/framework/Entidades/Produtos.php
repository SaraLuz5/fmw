<?php
#[Tabela(nome: 'produtos')]
class Produtos{
    #[Coluna]
    public $id;
    #[Coluna]
    public $nome;
    #[Coluna]
    public $preco;
}