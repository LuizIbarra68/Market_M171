<?php



/**
 * Description of clsPedido
 *
 * @author 181700008
 */
class Pedido {
    private $id, $endereco, $pagamento, $horario, $cliente, $valor;
    
    function getId() {
        return $this->id;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getPagamento() {
        return $this->pagamento;
    }

    function getHorario() {
        return $this->horario;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getValor() {
        return $this->valor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setPagamento($pagamento) {
        $this->pagamento = $pagamento;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }


}
