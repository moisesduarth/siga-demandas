<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Relatório de Saída Mensal</h3>
            	<div class="box-tools">
                    <!-- <a href="<?php echo site_url('pagamento/add'); ?>" class="btn btn-success btn-sm">Adicionar</a>  -->
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Cod. Lançamento</th>
						<th>Ref. Emprestimo</th>
						<th>Cliente</th>
						<th>Valor Emprestado</th>
						<th>Vencimento / Pagamento</th>
						<th>Ações</th>
                    </tr>
                    <?php 
                    $Total_Pago = 0;
                    foreach($pagamento as $p) {  
                        $Total_Pago += $p['Valor_Emprestimo']; 
                    ?>
                    <tr>
						<td><?php echo $p['ID_Pagamento']; ?></td>
						<td><?php echo $p['ID_Emprestimo_Pai']; ?></td>
						<td><?php echo $p['Nome_Investidor']; ?></td>
						<td><label class="label label-danger" style="font-size: 12px">R$ <?php echo number_format($p['Valor_Emprestimo'],2,'.',''); ?></label></td>
						<td><?php echo formataData($p['Data_Pagamento'], true); ?></td>
						<td>
                            <a href="<?php echo site_url('emprestimo/promissoria/'.$p['ID_Emprestimo']); ?>" target="_blank" class="btn btn-warning btn-xs"><span class="fa fa-file-text"></span> Promissória</a> 
                            <!-- <a href="<?php echo site_url('pagamento/edit/'.$p['ID_Pagamento']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>  -->
                            <!-- <a href="<?php echo site_url('pagamento/remove/'.$p['ID_Pagamento']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
						<th colspan="3">Total</th>
						<th>R$ <?= number_format($Total_Pago,2,'.',''); ?></th>
						<th colspan="2">&nbsp;</th>
                    </tr>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
