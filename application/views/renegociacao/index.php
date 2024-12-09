<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Empréstimos Renegociados</h3>
                <p>Para incluir novas negociações vá até o <a href="<?= site_url('emprestimo/index'); ?>">empréstimo</a> que deseja negociar e clique no botão <b><i class="fa fa-handshake-o"></i> Renegociar</b></p>
            	<div class="box-tools">
                    <!-- <a href="<?php echo site_url('renegociacao/add'); ?>" class="btn btn-success btn-sm">Add</a>  -->
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Código</th>
						<th>Ref. Empréstimo</th>
						<th>Cliente</th>
						<th>Valor</th>
						<th>Data da Renegociação</th>
						<th>Status</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($renegociacao as $r){ ?>
                    <tr>
						<td><?php echo $r['ID_Renegociacao']; ?></td>
						<td><?php echo $r['ID_Emprestimo_Pai']; ?></td>
						<td><?php echo $r['Nome_Investidor']; ?></td>
						<td>R$ <?php echo $r['Valor_Emprestimo']; ?></td>
						<td><?php echo formataData($r['Data_Renegociacao']); ?></td>
						<td><?php if ($r['Status_Renegociacao'] == 0) { echo '<label class="label label-danger">Pendente</label>'; } elseif ($r['Status_Renegociacao']==3) { echo '<label class="label label-warning">Rascunho</label>'; } else { echo '<label class="label label-success">Concluída</label>'; } ?></td>
						<td>
                            <?php if ($r['Status_Renegociacao'] == 0) { ?>
                            <a href="<?php echo site_url('renegociacao/edit/'.$r['ID_Renegociacao']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <?php } else { ?>
                            <a href="<?php echo site_url('renegociacao/view/'.$r['ID_Renegociacao']); ?>" class="btn btn-info btn-xs"><span class="fa fa-eye"></span> Visualizar</a> 
                            <?php } ?>
                            <a href="<?php echo site_url('renegociacao/remove/'.$r['ID_Renegociacao']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
