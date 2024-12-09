<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Empréstimos</h3>
        <a href="<?php echo site_url('loans/add'); ?>" class="btn btn-success btn-sm pull-right">Adicionar Novo Empréstimo</a>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Membro</th>
                <th>Data do Empréstimo</th>
                <th>Usuário Responsável</th>
                <th>Status</th>
                <th class="text-right nowrap">Ações</th>
            </tr>
            <?php if (!empty($loans)): ?>
                <?php foreach ($loans as $loan): ?>
                    <tr>
                        <td><?php echo $loan['id']; ?></td>
                        <td><?php echo $loan['membro_nome']; ?></td>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($loan['data_emprestimo'])); ?></td>
                        <td><?php echo $loan['usuario_nome']; ?></td>
                        <td><?php echo ucfirst($loan['status']); ?></td>
                        <td class="text-right nowrap">
                            <a href="<?php echo site_url('loans/view/' . $loan['id']); ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="<?php echo site_url('loans/delete/' . $loan['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este empréstimo?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Nenhum empréstimo registrado.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>
