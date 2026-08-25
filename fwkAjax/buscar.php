<?php
$termo = $_GET ['busca'];
if(trim($termo)===' '){
    echo "Digite um nome para buscar";
    exit;
}

$usuarios = ["Sara", "Amanda", "Isabela", "Maria Luiza", "Gordo", "Guilerme", "Vitin"];
$encontrados = array_filter($usuarios, function ($nome) use ($termo){
    return stripos($termo, $nome) !== false;
});
if(count($encontrados) > 0){
    echo "<ul>";
    foreach($encontrados as $nome){
        echo "<li>". $nome. "</li>";
    }
    echo "</ul>";
} else{
    echo "Nenhum resultado encontrado";
}