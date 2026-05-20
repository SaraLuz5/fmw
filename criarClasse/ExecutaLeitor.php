<?php

require_once "LeitorSQL.php";

$leitor = new LeitorSQL("framework.sql");
echo "<h2>Tabelas:<h2>";
print_r($leitor->getTabelas());

echo "<hr>";
echo "<h2>Atributos da tabela Aluno:<h2>";
print_r($leitor->getAtributos("aluno"));
