<?php

abstract class produto {
    protected string $nome;
    protected float $preco;
    public float $estoque;

    public function __construct(string $nome, float $preco, float $estoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    abstract public function preco();

    public function info(){
        echo "Produto: {$this->nome}<br>";
        echo "Preço: R$ {$this->preco}<br>";
        echo "Estoque: {$this->estoque}<br><br>";
    }
}

class produtoSimples extends produto {
    public function preco() {
        return $this->preco;
    }
}

abstract class cliente {
    protected string $nome;

    public function __construct(string $nome){
        $this->nome = $nome;
    }

    abstract public function aplicarDesconto(float $total);

    public function nome(){
        echo "Cliente: {$this->nome}<br><br>";
    }
}

class clienteComum extends cliente {
    public function aplicarDesconto(float $total){
        return $total;
    }
}

    class clienteVIP extends cliente {
    public function aplicarDesconto(float $total){
        return $total * 0.9;
    }
}

class pedido {
    private string $status = "aberto";
    private produto $produto;
    private float $quantidade;
    private cliente $cliente;

    public function __construct(produto $produto, float $quantidade, cliente $cliente) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->cliente = $cliente;
        }

    public function calcularTotal(){
        $total = $this->produto->preco() * $this->quantidade;
        return $this->cliente->aplicarDesconto($total);
    }

    public function finalizarPedido(){
        if ($this->quantidade <= $this->produto->estoque) {
            $this->produto->estoque -= $this->quantidade;
            $this->status = "pago";
            echo "Valor final: R$ " . $this->calcularTotal() . "<br>";
        } else {
            echo "Estoque insuficiente<br>";
        }
        }

    public function cancelarPedido(){
        $this->status = "cancelado";
        echo "Pedido cancelado<br>";
        }

    public function enviarPedido(){
        $this->status = "enviado";
        echo "Pedido enviado<br>";
        }

    public function mostrarStatus(){
        echo "Status: {$this->status}<br><br>";
    }
}

$banana = new produtoSimples("Banana", 2, 300);
$banana->info();

$laranja = new produtoSimples("Laranja", 5, 100);
$laranja->info();

$cliente1 = new clienteComum("Roger");
$cliente1->nome();

$pedido1 = new pedido($banana, 10, $cliente1);
$pedido1->mostrarStatus();
$pedido1->finalizarPedido();
$pedido1->enviarPedido();
$pedido1->mostrarStatus();
$pedido1->finalizarPedido();
$pedido1->mostrarStatus();

$cliente2 = new clienteVIP("Hoffmann");
$cliente2->nome();

$pedido2 = new pedido($laranja, 20, $cliente2);
$pedido2->mostrarStatus();
$pedido2->cancelarPedido();
$pedido2->mostrarStatus();

echo "Estoque final Banana: {$banana->estoque}";

echo "<br>Estoque final Laranja {$laranja->estoque}";
