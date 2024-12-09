<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Demandas</h3>
        <a href="<?php echo site_url('demandas/add'); ?>" class="btn btn-success btn-sm pull-right">Adicionar Demanda</a>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Membro</th>
                    <th>Aprovador</th>
                    <th>Status</th>
                    <th>Data de Inclusão</th>
                    <th class="text-right nowrap">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demandas as $demanda): ?>
                <tr>
                    <td><?php echo $demanda['id']; ?></td>
                    <td><?php echo $demanda['titulo']; ?></td>
                    <td><?php echo $demanda['membro_nome']; ?></td>
                    <td><?php echo $demanda['aprovador_nome'] ?? 'N/A'; ?></td>
                    <td><?php echo ucfirst($demanda['status']); ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($demanda['data_inclusao'])); ?></td>
                    <td class="text-right nowrap">
                        <a href="<?php echo site_url('demandas/edit/' . $demanda['id']); ?>" class="btn btn-info btn-xs">Editar</a>
                        <a href="<?php echo site_url('demandas/delete/' . $demanda['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

