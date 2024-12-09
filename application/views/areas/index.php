<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Áreas</h3>
        <a href="<?php echo site_url('areas/add'); ?>" class="btn btn-success btn-sm pull-right">Adicionar Nova Área</a>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>Nome</th>
                <th>Líder</th>
                <th class="text-right nowrap">Ações</th>
            </tr>
            <?php foreach ($areas as $area): ?>
                <tr>
                    <td><?php echo $area['nome']; ?></td>
                    <td><?php echo $area['lider_nome']; ?></td>
                    <td class="text-right nowrap">
                        <a href="<?php echo site_url('areas/edit/' . $area['id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?php echo site_url('areas/delete/' . $area['id']); ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

