<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de Instituições</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('instituicoes/add'); ?>" class="btn btn-success btn-sm">Adicionar Nova Instituição</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Área</th>
                        <th>Líder</th>
                        <th>Tesoureiro</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach($instituicoes as $i){ ?>
                    <tr>
                        <td><?php echo $i['id']; ?></td>
                        <td><?php echo $i['codigo']; ?></td>
                        <td><?php echo $i['descricao']; ?></td>
                        <td><?php echo $i['area_nome']; ?></td>
                        <td><?php echo $i['lider_nome']; ?></td>
                        <td><?php echo $i['tesoureiro']; ?></td>
                        <td>
                            <a href="<?php echo site_url('instituicoes/edit/'.$i['id']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('instituicoes/delete/'.$i['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Deseja realmente remover esta instituição?');"><span class="fa fa-trash"></span> Remover</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
