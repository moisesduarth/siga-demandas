<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Membros</h3>
        <a href="<?php echo site_url('membros/add'); ?>" class="btn btn-success btn-sm pull-right">Adicionar Novo Membro</a>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th class="text-right nowrap">Ações</th>
            </tr>
            <?php foreach ($membros as $membro): ?>
                <tr>
                    <td><?php echo $membro['nome']; ?></td>
                    <td><?php echo $membro['rg']; ?></td>
                    <td><?php echo $membro['cpf']; ?></td>
                    <td><?php echo $membro['endereco']; ?></td>
                    <td class="text-right nowrap">
                        <a href="<?php echo site_url('membros/edit/' . $membro['id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?php echo site_url('membros/delete/' . $membro['id']); ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

