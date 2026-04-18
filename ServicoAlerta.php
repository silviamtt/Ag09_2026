<?php
require_once 'ComponenteIoT.php';

class ServicoAlerta extends ComponenteIoT {
    private $emailDestinatario;
    private $limiarAlerta; 

    public function __construct($id, $versao, $email, $limiar) {
        parent::__construct($id, $versao);
        $this->emailDestinatario = $email;
        $this->limiarAlerta = $limiar;
    }

    public function verificarNecessidadeAlerta($umidadeAtual) {
        if ($umidadeAtual < $this->limiarAlerta) {
            return "ALERTA: Umidade em {$umidadeAtual}%. 
            Enviando e-mail para {$this->emailDestinatario}...";
        }
        return "Umidade adequada ({$umidadeAtual}%). Nenhum alerta necessário.";
    }
}
?>