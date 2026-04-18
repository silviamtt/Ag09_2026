<?php
// Classe base que define o que todo componente do MUS possui
class ComponenteIoT {
    private $idDispositivo;
    private $versaoFirmware;
    protected $statusOnline; // Protected para permitir que filhas vejam o estado

    public function __construct($id, $versao) {
        $this->idDispositivo = $id;
        $this->versaoFirmware = $versao;
        $this->statusOnline = false;
    }

    // Getters e Setters (Encapsulamento)
    public function getIdDispositivo() {
        return $this->idDispositivo;
    }

    public function getVersaoFirmware() {
        return $this->versaoFirmware;
    }

    public function setStatusOnline($status) {
        $this->statusOnline = (bool)$status;
    }

    public function obterStatusFormatado() {
        return $this->statusOnline ? "Ativo (Online)" : "Inativo (Offline)";
    }
}
?>