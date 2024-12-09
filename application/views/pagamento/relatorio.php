<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Relatório de Entrada Mensal</h3>
            	<div class="box-tools">
                    <!-- <a href="<?php echo site_url('pagamento/add'); ?>" class="btn btn-success btn-sm">Adicionar</a>  -->
                </div>
            </div>
            <div class="box-body">

                <div class="panel panel-default" id="form_filter">
                    <div class="panel-body">

                        <?php echo form_open('pagamento/filtrar/relatorio',['autocomplete'=>'off']); ?>

                        <div class="col-md-3">
                            <label for="Nome_Investidor" class="control-label">Cliente</label>
                            <div class="form-group">
                                <input type="text" name="Nome_Investidor"
                                    value="<?php echo $filtro['Nome_Investidor']; ?>" class="form-control"
                                    id="Nome_Investidor" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Ano_Mes_Pagamento">Mês do Pagamento</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right ano_mes"
                                        value="<?= $filtro['Ano_Mes_Pagamento']; ?>" name="Ano_Mes_Pagamento"
                                        id="Ano_Mes_Pagamento">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">&nbsp;</label>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-search"></i> Buscar
                                </button>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <?= (isset($filtro) ? '<a href="" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Limpar Filtro</a>' : ''); ?>
                        </div>

                        <?php echo form_close(); ?>

                    </div>
                </div>

                <table class="table table-striped">
                    <tr>
						<th>Cod. Lançamento</th>
						<th>Ref. Emprestimo</th>
						<th>Cliente</th>
						<th>Valor Recebido</th>
						<th>Valor Lucro</th>
						<th>Valor Retornado</th>
						<th>Data do Pagamento</th>
                        <th>Ações</th>
                    </tr>
                    <?php 

                    $Total_Recebido = 0;
                    $Total_Retorno = 0;
                    $Total_Lucro = 0;

                    foreach($pagamento as $p){ 

                    $Total_Recebido += $p['Valor_Pago']; 
                    $Total_Retorno += $p['Valor_Lucro_Pagamento']; 
                    $Total_Lucro += $p['Valor_Retorno_Pagamento']; 

                    ?>
                    
                    <tr>
						<td><?php echo $p['ID_Pagamento']; ?></td>
						<td><?php echo $p['ID_Emprestimo_Pai']; ?></td>
						<td><?php echo $p['Nome_Investidor']; ?></td>
						<td>R$ <?php echo number_format($p['Valor_Pago'],2,'.',''); ?></td>
						<td>R$ <?php echo number_format($p['Valor_Lucro_Pagamento'],2,'.',''); ?></td>
						<td>R$ <?php echo number_format($p['Valor_Retorno_Pagamento'],2,'.',''); ?></td>
						<td><?php echo formataData($p['Data_Pagamento'], true); ?></td>
                        <td>
                            <a href="<?php echo site_url('pagamento/recibo/'.$p['ID_Pagamento']); ?>" title="Recibo" target="_blank" class="btn btn-primary btn-xs"><span class="fa fa-file-o"></span> Recibo</a> 
                            <!-- <a href="<?php echo site_url('pagamento/edit/'.$p['ID_Pagamento']); ?>" title="Editar" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>  -->
                            <!-- <a href="<?php echo site_url('pagamento/remove/'.$p['ID_Pagamento']); ?>" title="Deletar" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a> -->
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
						<th colspan="3">Total</th>
						<th>R$ <?= number_format($Total_Recebido,2,'.',''); ?></th>
						<th>R$ <?= number_format($Total_Retorno,2,'.',''); ?></th>
						<th>R$ <?= number_format($Total_Lucro,2,'.',''); ?></th>
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