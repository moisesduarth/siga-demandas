<div class="box">
    <div class="box-header">
        <h3 class="box-title">Demandas Pendentes</h3>
    </div>
    <div class="box-body">
        <?php if (count($demandas_pendentes) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Prazo</th>
                        <th>Data de Inclusão</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($demandas_pendentes as $demanda): ?>
                        <tr>
                            <td><?= $demanda['titulo']; ?></td>
                            <td><?= $demanda['descricao']; ?></td>
                            <td><?= ucfirst($demanda['categoria']); ?></td>
                            <td><?= date('d/m/Y', strtotime($demanda['prazo'])); ?></td>
                            <td><?= date('d/m/Y', strtotime($demanda['data_inclusao'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma demanda pendente no momento.</p>
        <?php endif; ?>
    </div>
</div>
