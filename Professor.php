<?php

class Professor {
    private $nome;
    private $idade;
    private $titulacao;
    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of idade
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * Set the value of idade
     */
    public function setIdade($idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    /**
     * Get the value of titulacao
     */
    public function getTitulacao()
    {
        return $this->titulacao;
    }

    /**
     * Set the value of titulacao
     */
    public function setTitulacao($titulacao): self
    {
        $this->titulacao = $titulacao;

        return $this;
    }
}