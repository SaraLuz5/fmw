<?php

include("LeitorSQL.php");
function criarClasse()
{

  if (is_dir("model")) {
    mkdir("model", 0777, true);
  }
  $objSQL = new LeitorSQL("framework.sql");

  $entidades = $objSQL->getTabelas();
  foreach ($entidades as $entidade) {
    $listarAtributos = $objSQL->getAtributos($entidade);
    $attr = "";
    $metodos = "";
    foreach ($listarAtributos as $key => $atributo) {
      $atr .= "private $" . $atributo . ";\n";
      $metodos .= "function get" . ucfirst($key) . "(){\n";
      $metodos .= "return \$this->" . $key . ";\n}\n";
      $metodos .= "function set" . ucfirst($key) . "(\$arg)(\n";
      $metodos .= "\$this->" . $key . "=\$arg;\n}\n";
    }
    $nomeClasse = ucfirst($entidade);
    $conteudo = <<<CLASS

<?php
class $nomeClasse{
$attr
$metodos
CLASS;
    file_put_contents("model/ " . $entidade . ".php" . $conteudo);
  } 
}
