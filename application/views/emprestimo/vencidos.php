<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Empréstimos Vencidos</h3>
            	<div class="box-tools">
                    <a href="<?php echo current_url().'/print'; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-print"></i> Imprimir</a> 
                </div>
            </div>
            <div class="box-body">

                <!-- Formulario de Busca / Inicio -->
                <div class="panel panel-default" id="form_filter">
                    <div class="panel-body">

                        <?php echo form_open('emprestimo/filtrar/vencidos',['autocomplete'=>'off']); ?>

                        <div class="col-md-4">
                            <label for="Nome_Investidor" class="control-label">Cliente</label>
                            <div class="form-group">
                                <input type="text" name="Nome_Investidor"
                                    value="<?php echo $filtro['Nome_Investidor']; ?>" class="form-control"
                                    id="Nome_Investidor" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Data_Emprestimo">Data do Empréstimo</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right daterange"
                                        value="<?= $filtro['Data_Emprestimo']; ?>" name="Data_Emprestimo"
                                        id="Data_Emprestimo">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Data_Pagamento">Data do Pagamento</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right daterange"
                                        value="<?= $filtro['Data_Pagamento']; ?>" name="Data_Pagamento"
                                        id="Data_Pagamento">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-2">
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
                <!-- Formulario de Busca / Fim -->

                <table class="table table-striped">
                    <tr>
						<th>Código</th>
						<th>Cliente</th>
						<th>Status</th>
						<th>Valor Financiado</th>
						<th>Pct</th>
						<th>Valor com Juros</th>
						<th>Data Empréstimo</th>
						<th>Data Pgto</th>
                    </tr>
                    <?php foreach($emprestimo as $e){ ?>
                    <tr>
						<td><?php echo $e['ID_Emprestimo']; ?></td>
						<td><a href="<?= site_url('investidor/edit/'.$e['ID_Investidor']);?>"><?php echo character_limiter(str_replace('-',' ',$e['Nome_Investidor']),10,'...'); ?></a></td>
						<td><?php if ($e['Status_Emprestimo'] == 0) { echo '<label class="label label-danger">Pendente</label>'; } elseif ($e['Status_Emprestimo']==3) { echo '<label class="label label-warning">Renegociado</label>'; } else { echo '<label class="label label-success">Quitado</label>'; } ?></td>
						<td><?php echo num($e['Valor_Emprestimo']); ?></td>
						<td><?php echo $e['Percentual_Juros']; ?></td>
						<td><?php echo num($e['Valor_Emprestimo']+($e['Valor_Emprestimo']*$e['Percentual_Juros']/100)); ?></td>
						<td><?php echo formataData($e['Data_Emprestimo']); ?></td>
						<td><?php echo formataData($e['Data_Pagamento']); ?></td>
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
