<?php
 class automovel{
    public $modelo;
    public $marca;
    public $ano;
    public $num_porta;
    public $cor;
    public $num_ascento;

    function __construct(string $modelo, string $marca, float $ano, float $num_porta, string $cor, float $num_ascento)
    {
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->ano = $ano;
        $this->num_porta = $num_porta;
        $this->cor = $cor;
        $this->num_ascento = $num_ascento;
        
    }

    function acelerando(){
        echo "{$this->marca}  {$this->modelo} {$this->ano} está acelerando<br>";
    }

    function freiando(){
        echo "{$this->marca}  {$this->modelo} {$this->ano} está freiando<br>";
    }

    function virandoEsquerda(){
        echo "{$this->marca}  {$this->modelo} {$this->ano} está virando para esquerda<br>";
    }

    function virandoDireita(){
        echo "{$this->marca}  {$this->modelo} {$this->ano} está virando para esquerda<br>";
    }

 }

 $carro = new automovel("Mobi", "Fiat", 2008, 4, "Azul", 5);

 $carro->acelerando();

 $carro->freiando();

 $carro->virandoEsquerda();

 $carro->virandodireita();


 $moto = new automovel("CG 160", "Yamaha", 2015, 0, "Vermelha", 2);

 $moto->acelerando();

 $moto->freiando();

 $moto->virandoEsquerda();

 $moto->virandodireita();


 $onibus = new automovel("Paradiso G8", "Marcopolo", 2025, 2, "Branco", 42);

 $onibus->acelerando();

 $onibus->freiando();

 $onibus->virandoEsquerda();

 $onibus->virandodireita();

 class animal{
    public $locomove;
    public $come;
    public $;
 }
