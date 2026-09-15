<?php
class fwkPersist{
    public function __construct(private PDO $pdo)
    {

    }
    function save (object $objeto): void {
        $tabela = $this->getNomeTabela($objeto);
        $dados = $this->getDadosColuna($objeto);
        $dadosFiltrados = array_filter($dados, fn($valor) => $valor !== null);
        $colunas = array_keys($dadosFiltrados);
        $stringColunas = implode (', ', $colunas);
        $placeholders = ':' . implode(', :', $colunas);
        $sql = "INSERT INTO {$tabela} ({$stringColunas}) VALUES ({$placeholders})";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($dadosFiltrados);
    }
    function listAll(string $classe): array
    {
        $tabela = $this->getNomeTabela($classe);
        $sql = "SELECT * FROM {$tabela}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $classe);
    }
    function getNomeTabela(object|string $objetoOuString ): string
    {
        $espelho = new ReflectionClass($objetoOuString);
        $etiquetas = $espelho->getAttributes(Tabela::class);
        $etiquetaTabela = $etiquetas[0]->newInstance();
        return $etiquetaTabela->nome;
    }
    function getDadosColuna(object $objeto): array
    {
        $espelho = new ReflectionClass($objeto);
        $dados = [];
        foreach ($espelho->getProperties() as $propriedade){
            $etiquetas = $propriedade->getAttributes(Coluna::class);
            if (empty($etiquetas)) {
                continue;
            }
            $nomeColuna = $propriedade->getName();
            $valor = $propriedade->getValue($objeto);
            $dados[$nomeColuna] = $valor;
        }
        return $dados;
    }
}