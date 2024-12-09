<!DOCTYPE html>
<html>
<head>
    <title>Cautela de Empréstimo</title>
</head>
<body>
    <h1>Cautela de Empréstimo</h1>

    <p>Eu, <strong><?= $loan['membro_nome'] ?></strong>, declaro que recebi os itens descritos abaixo:</p>

    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Item</th>
                <th>Ativo</th>
                <th>Série</th>
                <th>Quantidade</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loanItems as $item): ?>
                <tr>
                    <td><?= $item['item_nome'] ?></td>
                    <td><?= $item['numero_ativo'] ?? 'N/A' ?></td>
                    <td><?= $item['numero_serie'] ?? 'N/A' ?></td>
                    <td><?= $item['quantidade'] ?></td>
                    <td><?= $item['usage_type'] === 'returnable' ? 'Retornável' : 'Consumível' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>Data do Empréstimo: <?= date('d/m/Y', strtotime($loan['data_emprestimo'])) ?></p>
    <p>Comprometo-me a devolver os itens retornáveis em perfeito estado.</p>

    <p>Impressa por <?= $this->session->userdata['first_name'] ?> em <?= date('d/m/Y H:i:s') ?>.</p>

    <br>
    <p>Assinatura do Membro: _______________________________</p>
    <p>Assinatura do Responsável: ___________________________</p>

    <a href="/loans">Voltar</a>
</body>
</html>
