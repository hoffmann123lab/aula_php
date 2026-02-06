<?php

abstract class produto {//classe produto
    //atributos classe produto
    protected string $nome;
    protected float $preco;
    public float $estoque;

    //inserção dos atributos
    public function __construct(string $nome, float $preco, float $estoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }
    //funçao abstrata para ser usada em outra classe
    abstract public function preco();

    //mostra as informaçoes da classe
    public function info(){
        echo "Produto: {$this->nome}<br>";
        echo "Preço: R$ {$this->preco}<br>";
        echo "Estoque: {$this->estoque}<br><br>";
    }
}

//classe para o produto comum
class produtoSimples extends produto {
    
    //funcao abstrata da classe produto
    public function preco() {
        return $this->preco;
    }
}


//classe cliente
abstract class cliente {
    protected string $nome;

    //inserção dos atributos
    public function __construct(string $nome){
        $this->nome = $nome;
    }

     //funçao abstrata para ser usada em outra classe
    abstract public function aplicarDesconto(float $total);

    //mostra as informaçoes do cliente
    public function nome(){
        echo "Cliente: {$this->nome}<br><br>";
    }
}

//classe cliente comum
class clienteComum extends cliente {

    //sem desconto
    public function aplicarDesconto(float $total){
        return $total;
    }
}


//classe cliente vip
    class clienteVIP extends cliente {

    //com desconto
    public function aplicarDesconto(float $total){
        return $total * 0.9;
    }
}


//classe pedido
class pedido {
    //atirbutos classe pedido
    private string $status = "aberto";
    private produto $produto;
    private float $quantidade;
    private cliente $cliente;

    //inserçao de atributos
    public function __construct(produto $produto, float $quantidade, cliente $cliente) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->cliente = $cliente;
        }

    //calcula o valor a pagar
    public function calcularTotal(){
        $total = $this->produto->preco() * $this->quantidade;
        return $this->cliente->aplicarDesconto($total);
    }

    //finaliza o pedido como pago se tiver produtos suficientes
    public function finalizarPedido(){
        if ($this->quantidade <= $this->produto->estoque) {
            $this->produto->estoque -= $this->quantidade;
            $this->status = "pago";
            echo "Valor final: R$ " . $this->calcularTotal() . "<br>";
        } else {
            echo "Estoque insuficiente<br>";
        }
        }

    //cancela o pedido
    public function cancelarPedido(){
        $this->status = "cancelado";
        echo "Pedido cancelado<br>";
        }
    //envia o pedido
    public function enviarPedido(){
        $this->status = "enviado";
        echo "Pedido enviado<br>";
        }
    //mostra o estatus atual
    public function mostrarStatus(){
        echo "Status: {$this->status}<br><br>";
    }
}

//inserçao do produto banana
$banana = new produtoSimples("Banana", 2, 300);
$banana->info();

//inserçao do produto laranja
$laranja = new produtoSimples("Laranja", 5, 100);
$laranja->info();

//insercao cliente 1
$cliente1 = new clienteComum("Roger");
$cliente1->nome();

//fazendo e finalizando o pedido 1 do cliente 1
$pedido1 = new pedido($banana, 10, $cliente1);
$pedido1->mostrarStatus();
$pedido1->finalizarPedido();
$pedido1->enviarPedido();
$pedido1->mostrarStatus();
$pedido1->finalizarPedido();
$pedido1->mostrarStatus();

//insercao do cliente 2
$cliente2 = new clienteVIP("Hoffmann");
$cliente2->nome();

//fazendo e finalizando o pedido 3
$pedido3 = new pedido($laranja, 20, $cliente2);
$pedido3->mostrarStatus();
$pedido3->finalizarPedido();
$pedido3->enviarPedido();
$pedido3->mostrarStatus();
$pedido3->finalizarPedido();
$pedido3->mostrarStatus();

//fazendo e cancelando o pedido 2
$pedido2 = new pedido($laranja, 20, $cliente2);
$pedido2->mostrarStatus();
$pedido2->cancelarPedido();
$pedido2->mostrarStatus();

//mostra o estoque de banana atual
echo "Estoque final Banana: {$banana->estoque}";

//mostra o estoque de laranja atual
echo "<br>Estoque final Laranja {$laranja->estoque}";
