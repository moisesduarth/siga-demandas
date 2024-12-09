<!DOCTYPE html>
<html>
<head>
    <title>Recibo de Devolução</title>
</head>
<body>
    <h1>Recibo de Devolução</h1>

    <p>Confirmo a devolução dos itens descritos abaixo, recebidos pelo responsável no sistema.</p>

    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Item</th>
                <th>Ativo</th>
                <th>Série</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $loan['item_nome'] ?></td>
                <td><?= $loan['numero_ativo'] ?? 'N/A' ?></td>
                <td><?= $loan['numero_serie'] ?? 'N/A' ?></td>
                <td>Devolvido</td>
            </tr>
        </tbody>
    </table>

    <p>Data da Devolução: <?= date('d/m/Y') ?></p>

    <p>Impressa por <?= $this->session->userdata['first_name'] ?> em <?= date('d/m/Y H:i:s') ?>.</p>
    
    <br>
    <p>Assinatura do Cliente: _______________________________</p>
    <p>Assinatura do Responsável: ___________________________</p>

    <br>
    <a href="/loans" class="btn btn-primary">Voltar</a>
</body>
</html>
