<?php
require_once 'ComponenteIoT.php';

class SensorUmidade extends ComponenteIoT {
    private $valorSeco; // Limite ADC para seco (ex: 4095)
    private $valorUmido; // Limite ADC para úmido (ex: 1500) 

    public function __construct($id, $versao, $seco, $umido) {
        parent::__construct($id, $versao);
        $this->valorSeco = $seco;
        $this->valorUmido = $umido;
    }

    // Lógica para transformar leitura bruta em porcentagem 
    public function calcularPorcentagem($leituraAtual) {
        if ($leituraAtual >= $this->valorSeco) return 0;
        if ($leituraAtual <= $this->valorUmido) return 100;

        $amplitude = $this->valorSeco - $this->valorUmido;
        $diferenca = $this->valorSeco - $leituraAtual;
        
        return round(($diferenca / $amplitude) * 100, 2);
    }
}
?>