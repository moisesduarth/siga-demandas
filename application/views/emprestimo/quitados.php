<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Empréstimos Quitados</h3>
                <div class="box-tools">
                    <a href="<?php echo current_url().'/print'; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-print"></i> Imprimir</a> 
                </div>
            </div>
            <div class="box-body">

                <div class="panel panel-default" id="form_filter">
                    <div class="panel-body">

                        <?php echo form_open('emprestimo/filtrar/quitados',['autocomplete'=>'off']); ?>

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
                        <th>Código</th>
                        <th>Cliente</th>
                        <th>Emprestado</th>
                        <th>Parc</th>
                        <th>Recebido</th>
                        <th>Lucro</th>
                        <th>Data</th>
                    </tr>
                    <?php foreach($emprestimo as $e){ ?>
                    <?php $valor_emprestimo_total += $e['Valor_Emprestimo']; $valor_com_juros_total += $e['Total_Pago']; ?>
                    <tr>
                        <td><?php echo $e['ID_Emprestimo']; ?></td>
						<td><?php echo character_limiter(str_replace('-',' ',$e['Nome_Investidor']),10,'...'); ?></td>
                        <td><?php echo num($e['Valor_Emprestimo']); ?></td>
                        <td><?php echo $e['Parcela_Atual'].'/'.$e['Numero_Parcelas']; ?></td>
                        <td><?php echo $e['Total_Pago']; ?> <?php if ($e['Status_Emprestimo'] == 0) { echo '<i class="fa fa-close"></i>'; } elseif ($e['Status_Emprestimo']==3) { echo '<i class="fa fa-refresh"></i>'; } else { echo '<i class="fa fa-check"></i>'; } ?></td>
                        <td><?php echo num($e['Lucro_Total']); ?>
                        </td>
                        <td><?php echo formataData($e['Data_Emprestimo'], false); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><?= num($valor_emprestimo_total); ?></th>
                        <th></th>
                        <th><?= num($valor_com_juros_total); ?></th>
                        <th><?= num($valor_com_juros_total-$valor_emprestimo_total); ?></th>
                        <th></th>
                    </tr>
                </table>
                
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>