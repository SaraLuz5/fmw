<?php

class Curso {
    private $nome;
    private $turno;
    private $anos;
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
     * Get the value of turno
     */
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * Set the value of turno
     */
    public function setTurno($turno): self
    {
        $this->turno = $turno;

        return $this;
    }

    /**
     * Get the value of anos
     */
    public function getAnos()
    {
        return $this->anos;
    }

    /**
     * Set the value of anos
     */
    public function setAnos($anos): self
    {
        $this->anos = $anos;

        return $this;
    }
}