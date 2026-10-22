<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Resultado do cálculo de estacionamento — Park Fácil">
    <title>Resultado — Park Fácil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="result-page">
    <!-- Barra de Acessibilidade -->
    <div class="accessibility-bar">
        <div class="container accessibility-bar__inner">
            <span class="accessibility-bar__label">🏛️ Portal Municipal — Secretaria de Mobilidade Urbana</span>
        </div>
    </div>

    <!-- Header -->
    <header class="gov-header">
        <div class="container gov-header__inner">
            <div class="gov-header__brand">
                <div class="gov-header__logo">
                    <span class="gov-header__logo-icon">🅿️</span>
                </div>
                <div class="gov-header__text">
                    <h1 class="gov-header__title">Park Fácil</h1>
                    <p class="gov-header__subtitle">Sistema Municipal de Estacionamento Rotativo</p>
                </div>
            </div>
            <nav class="gov-header__nav" aria-label="Navegação principal">
                <a href="index.html" class="gov-header__nav-link">← Voltar</a>
            </nav>
        </div>
    </header>

    <!-- Resultado -->
    <div class="result-content">
        <?php
        $horas = $_POST['horas'];
        $veiculo = $_POST['veiculo'];

        if (isset($_POST['lavagem'])) {
            $lavagem = "sim";
        } else {
            $lavagem = "Não";
        }

        if ($veiculo == "0") {
            $primeira = 10;
            $adicional = 6;
            $nomeVeiculo = "Carro";
            $iconeVeiculo = "🚘";
        } else {
            $primeira = 6;
            $adicional = 3;
            $nomeVeiculo = "Moto";
            $iconeVeiculo = "🏍️";
        }

        $total = $primeira;
        for ($i = 2; $i <= $horas; $i++) {
            $total = $total + $adicional;
        }

        $subtotal = $total;
        if ($total > 50) {
            $total = 50;
            $subtotal = 50;
        }

        $valorLavagem = 0;
        if ($lavagem == "sim") {
            $valorLavagem = 20;
            $total += 20;
        }
        ?>

        <div class="result-card">
            <div class="result-card__header">
                <span class="result-card__header-icon">✅</span>
                <h2 class="result-card__header-title">Cálculo Realizado</h2>
                <p class="result-card__header-subtitle">Confira os detalhes abaixo</p>
            </div>
            <div class="result-card__body">
                <div class="result-card__details">
                    <div class="result-card__detail-row">
                        <span class="result-card__detail-label">Veículo</span>
                        <span class="result-card__detail-value"><?php echo $iconeVeiculo . " " . $nomeVeiculo; ?></span>
                    </div>
                    <div class="result-card__detail-row">
                        <span class="result-card__detail-label">Horas</span>
                        <span class="result-card__detail-value"><?php echo $horas; ?>h</span>
                    </div>
                    <div class="result-card__detail-row">
                        <span class="result-card__detail-label">1ª Hora</span>
                        <span class="result-card__detail-value">R$ <?php echo number_format($primeira, 2, ',', '.'); ?></span>
                    </div>
                    <?php if ($horas > 1): ?>
                    <div class="result-card__detail-row">
                        <span class="result-card__detail-label">Horas adicionais (<?php echo $horas - 1; ?>x R$ <?php echo number_format($adicional, 2, ',', '.'); ?>)</span>
                        <span class="result-card__detail-value">R$ <?php echo number_format(($horas - 1) * $adicional, 2, ',', '.'); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="result-card__detail-row">
                        <span class="result-card__detail-label">Subtotal estacionamento</span>
                        <span class="result-card__detail-value">R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></span>
                    </div>
                    <?php if ($lavagem == "sim"): ?>
                    <div class="result-card__detail-row">
                        <span class="result-card__detail-label">💧 Lavagem</span>
                        <span class="result-card__detail-value">R$ <?php echo number_format($valorLavagem, 2, ',', '.'); ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="result-card__total">
                    <span class="result-card__total-label">Total a Pagar</span>
                    <div class="result-card__total-value">R$ <?php echo number_format($total, 2, ',', '.'); ?></div>
                </div>

                <div class="result-card__actions">
                    <a href="index.html" class="btn btn--primary">
                        <span class="btn__icon">🔄</span>
                        Novo Cálculo
                    </a>
                    <button onclick="window.print()" class="btn btn--secondary">
                        <span class="btn__icon">🖨️</span>
                        Imprimir
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="gov-footer">
        <div class="gov-footer__bottom">
            <div class="container">
                <p>© 2026 Prefeitura Municipal — Todos os direitos reservados</p>
            </div>
        </div>
    </footer>
</body>
</html>
