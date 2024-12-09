<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Extrato da <b>Conta <?= $conta['Descricao_Conta']?></b> (Últimas Movimentações)</h3>
            	<div class="box-tools">
                    <!-- <a href="<?php echo site_url('pagamento/add'); ?>" class="btn btn-success btn-sm">Adicionar</a>  -->
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-hover">
                    <tr>
						<th>Ref. Emprestimo</th>
						<th>Cliente</th>
						<th>Valor</th>
						<th>Data</th>
						<th>Operação</th>
                    </tr>
                    
                    <?php foreach($historico as $h){ ?>
                        <tr <?= ($h['Tipo']=='P' ? 'class="success"' : 'class="danger"'); ?>>
                            <td><a href="<?= base_url('emprestimo/resumo/'.$h['ID_Emprestimo_Pai']);?>"><?php echo $h['ID_Emprestimo_Pai']; ?></a></td>
                            <td><a href="<?= base_url('investidor/edit/'.$h['ID_Investidor']);?>"><?php echo $h['Nome_Investidor']; ?></a></td>
                            <td><?php echo $h['Valor']; ?></td>
                            <td><?php echo formataData($h['Data'], true); ?></td>
                            <td><?= ($h['Tipo']=='P' ? '<label class="label label-success">Crédito</label>' : '<label class="label label-danger">Débito</label>'); ?></td>
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
