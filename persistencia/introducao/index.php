<?php

#[Attribute(Attribute::TARGET_CLASS)]
class Tabela
{
    public function __construct(public string $nome) {}
}

#[Attribute(Attribute::TARGET_PROPERTY)]
class Coluna
{
    public function __construct(public ?string $nome = null) {}
}

//uma nota que leva o que tem dentro de usuario para a tabela do bd usuarios
#[Tabela(nome: "usuarios")]
class Usuario
{
    #[Coluna]
    public ?int $id = null;
    #[Coluna]
    public string $nome;
    #[Coluna]
    public string $email;
}

function pegarNomeTabela(object $objeto): string
{
    $espelho = new ReflectionClass($objeto);
    $etiquetas = $espelho->getAttributes(Tabela::class);
    $etiquetaTabela = $etiquetas[0]->newInstance();
    return $etiquetaTabela->nome;
}
$usuario = new Usuario();
$tabela = pegarNomeTabela($usuario);
echo "A tabela do objeto é: " . $tabela;

function pegarDadosDasColunas(object $objeto): array
{
    $espelho = new ReflectionClass($objeto);
    $dados = [];
    foreach ($espelho->getProperties() as $propriedades) {
        $etiquetas = $propriedades->getAttributes(Coluna::class);
        if (empty($etiquetas)) {
            continue;
        }
        $nomeColuna = $propriedades->getName();
        $valor = $propriedades->getValue($objeto);
        $dados[$nomeColuna] = $valor;
    }
    return $dados;
}

$usuario->nome = "Sara Luz";
$usuario->email = "sl@gmail.com";
$colunasValores = pegarDadosDasColunas($usuario);
echo "<pre>";
print_r($colunasValores);
echo "</pre>";

function gerarSQL(object $objeto): array
{
    $tabela = pegarNomeTabela($objeto);
    $dados = pegarDadosDasColunas($objeto);
    $dadosFiltrados = array_filter($dados, fn($v) => $v !== null);
    $colunas = array_keys($dadosFiltrados);
    $stringColunas = implode(", ", $colunas);
    $placeholders = ":" . implode(", :", $colunas);
    $sql = "INSERT INTO {$tabela} ({$stringColunas}) VALUES ({$placeholders})";
    return ["sql " => $sql, "colunas"=>$dadosFiltrados];
}

$resultado = gerarSQL($usuario);
echo "<pre>";
print_r($resultado);
echo "</pre>";
