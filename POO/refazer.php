<?php

abstract class carro{
    protected $modelo;
    protected $marca;
    protected $ano;
    protected $num_porta;
    protected $cor;
    protected $num_ascento;

    abstract public function tipo(): string;

    public function __construct(string $modelo, string $marca, float $ano, float $num_porta, string $cor, float $num_ascento)
    {
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->ano = $ano;
        $this->num_porta = $num_porta;
        $this->cor = $cor;
        $this->num_ascento = $num_ascento;
        
    }

    public function acelerando(){
        echo "{$this->marca}  {$this->modelo} {$this->ano} está acelerando<br>";
    }

    public function freiando(){
        echo "{$this->marca}  {$this->modelo} {$this->ano} está freiando<br>";
    }

    public function virandoEsquerda(){
        echo "{$this->marca}  {$this->modelo} {$this->ano} está virando para esquerda<br>";
    }

    public function virandoDireita(){
        echo "{$this->marca}  {$this->modelo} {$this->ano} está virando para esquerda<br>";
    }

 }

class carroEsportivo extends carro {

    public function tipo(): string{

        return "Carro Esportivo";
    }

}

$porsche991 = new carroEsportivo("991", "Porsche", "2021", 2, "Vermelho", 2);

$porsche991->acelerando();

$porsche991->freiando();

$porsche991->virandoEsquerda();

$porsche991->virandodireita();