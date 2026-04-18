<body>
<?php
require_once 'SensorUmidade.php';
require_once 'ServicoAlerta.php';

// 1. Instanciando o Sensor (Valores baseados na calibração ADC) 
$meuSensor = new SensorUmidade("ESP32-SOLO-01", "v1.0.4", 4095, 1200);
$meuSensor->setStatusOnline(true);

// 2. Instanciando o Serviço de Alerta[cite: 110]
$servicoEmail = new ServicoAlerta("SRV-MAIL-01", "v1.0.0", "silviamtt@gmail.com", 35.0);

// Simulação de uma leitura vinda do HW-103
$leituraBruta = 3200; 
$umidadeCalculada = $meuSensor->calcularPorcentagem($leituraBruta);

// Exibição no navegador
echo "<h2>Painel de Monitoramento MUS</h2>";
echo "<p><strong>ID do Dispositivo:</strong> " . $meuSensor->getIdDispositivo() . "</p>";
echo "<p><strong>Status:</strong> " . $meuSensor->obterStatusFormatado() . "</p>";
echo "<p><strong>Leitura Bruta (ADC):</strong> " . $leituraBruta . "</p>";
echo "<h3>Umidade Real Calculada: " . $umidadeCalculada . "%</h3>";

echo "<hr>";
echo "<h3>Lógica de Notificação</h3>";
echo "<p>" . $servicoEmail->verificarNecessidadeAlerta($umidadeCalculada) . "</p>";
?>
</body>