<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Parcelas Renegociadas</h3>
                <p>Para incluir novas parcelas de negociação vá até o <a href="<?= site_url('emprestimo/index'); ?>">empréstimo</a> que deseja negociar e clique no botão <b><i class="fa fa-handshake-o"></i> Renegociar</b></p>
            	<div class="box-tools">
                    <!-- <a href="<?php echo site_url('renegociacao_parcela/add'); ?>" class="btn btn-success btn-sm">Add</a>  -->
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Cod. Parcela</th>
						<th>Cliente</th>
						<th>Forma Pagamento</th>
						<th>Ref. Renegociacao</th>
						<th>Status Parcela</th>
						<th>Valor Parcela</th>
						<th>Vencimento Parcela</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($renegociacao_parcela as $r){ ?>
                        <tr <?= strtotime($r['Data_Prazo_Parcela'])<strtotime(date('Y/m/d')) && $r['Status_Parcela'] == 0 ? 'class="danger"' : ''; ?>>
						<td><?php echo $r['ID_Renegociacao_Parcela']; ?></td>
						<td><?php echo $r['Nome_Investidor']; ?></td>
						<td><?php echo $r['Descricao_Forma_Pagamento']; ?></td>
						<td> <a href="<?= site_url('renegociacao/edit/'.$r['ID_Renegociacao']); ?>" class="btn btn-xs btn-primary pull-right"><i class="fa fa-handshake-o"></i> Negociação Nº 00<?php echo $r['ID_Renegociacao']; ?></a></td>
                        <td><?php echo ($r['Status_Parcela']==0 ? '<label class="label label-warning">Pendente</label>' : '<label class="label label-success">Quitada</label>'); ?></td>
						<td><?php echo $r['Valor_Parcela']; ?></td>
						<td><?php echo formataData($r['Data_Prazo_Parcela']); ?></td>
						<td>
                            <a href="<?php echo site_url('renegociacao_parcela/quitar/'.$r['ID_Renegociacao_Parcela']); ?>" class="btn btn-success btn-xs <?php echo ($r['Status_Parcela']=='1' ? 'disabled' : ''); ?>"><span class="fa fa-check"></span> Quitar</a> 
                            <!-- <a href="<?php echo site_url('renegociacao_parcela/remove/'.$r['ID_Renegociacao_Parcela']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a> -->
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
