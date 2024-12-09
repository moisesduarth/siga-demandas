<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Todos os Financiamentos</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('emprestimo/add'); ?>" class="btn btn-success btn-sm">Adicionar</a> 
                </div>
            </div>
            <div class="box-body">

                <!-- Formulario de Busca / Inicio -->
                <div class="panel panel-default" id="form_filter">
                    <div class="panel-body">

                        <?php echo form_open('emprestimo/filtrar/index',['autocomplete'=>'off']); ?>

                        <div class="col-md-4">
                            <label for="Nome_Investidor" class="control-label">Cliente</label>
                            <div class="form-group">
                                <input type="text" name="Nome_Investidor"
                                    value="<?php echo $filtro['Nome_Investidor']; ?>" class="form-control"
                                    id="Nome_Investidor" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Data_Emprestimo">Data Empréstimo</label>
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Data_Pagamento">Data Pagamento</label>
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
                            <label for="Status_Emprestimo" class="control-label">Status</label>
                            <div class="form-group">
                                <select name="Status_Emprestimo" class="form-control">
                                    <option value="">...</option>
                                    <?php 
                                    $Status_Emprestimo_values = array(
                                        '0'=>'Pendente',
                                        '1'=>'Quitado',
                                    );

                                    foreach($Status_Emprestimo_values as $value => $display_text)
                                    {
                                        $selected = ($value == $filtro['Status_Emprestimo'] && isset($filtro['Status_Emprestimo']) && !empty($filtro['Status_Emprestimo'])) ? ' selected="selected"' : "";

                                        echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label class="control-label">&nbsp;</label>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
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
						<!-- <th>Emprestado</th> -->
						<th>Parc</th>
						<!-- <th>Juros (%)</th> -->
						<th>Emprestado</th>
						<th>Pago</th>
						<th>Resta</th>
						<th>Lucro</th>
						<th>Saída</th>
						<th>Previsao</th>
						<th class="text-right">Ações</th>
                    </tr>
                    <?php foreach($emprestimo as $e){ 
					
						// Comparar a data de pagamento com a data de hoje
						$hoje = formataData(Date('Y/m/d 23:59:59'), false); // Data de hoje no formato Y-m-d
						$dataPagamento = formataData($e['Data_Pagamento'], false); // Formata a data de pagamento
	
						$classeCor = ''; // Variável para definir a classe de cor

						// Se a data de pagamento for igual à data de hoje, aplicar classe de warning ou danger
						if ($dataPagamento == $hoje) {
							$classeCor = 'warning'; // Ou use 'table-danger' para cor mais forte
						}

						// Definir número do WhatsApp (substitua pelo número real com DDI e DDD)
						$numeroWhatsapp = $e['Celular']; 

						// Definir mensagem de cobrança
						$mensagem = 'Olá, %20' . urlencode($e['Nome_Investidor']) . '!%20Lembrete%20de%20vencimento%20do%20seu%20empréstimo%20no%20valor%20' . $e['Valor_Restante_Corrigido'] . '%20que%20vence%20hoje.%20Favor%20usar%20a%20chave%20PIX%20Celular%2092991418860%20para%20realizar%20o%20pagamento.';

						// Link do WhatsApp
						$linkWhatsapp = "https://wa.me/$numeroWhatsapp?text=$mensagem";
					
					?>
                    <tr <?= strtotime($e['Data_Pagamento'])<strtotime(date('Y/m/d')) && $e['Status_Emprestimo'] == 0 ? 'class="danger '. $classeCor .'"' : 'class="'. $classeCor .'"'; ?>>
						<td><a href="<?= site_url('emprestimo/resumo/'.$e['ID_Emprestimo']);?>"><?php echo $e['ID_Emprestimo']; ?></a></td>
						<td><a href="<?= site_url('investidor/edit/'.$e['ID_Investidor']);?>"><?php echo character_limiter(str_replace('-',' ',$e['Nome_Investidor']),10,'...'); ?></a></td>
						<td><?php if ($e['Status_Emprestimo'] == 0) { echo '<label class="label label-danger">Pendente</label>'; } elseif ($e['Status_Emprestimo']==3) { echo '<label class="label label-warning">Renegociado</label>'; } else { echo '<label class="label label-success">Quitado</label>'; } ?></td>
						<!-- <td><?php echo $e['Valor_Emprestimo']; ?></td> -->
                        <td><?php echo $e['Parcela_Atual'] > 0 ? $e['Parcela_Atual'] . '/' . $e['Numero_Parcelas'] : 1; ?></td>
						<!-- <td><?php echo $e['Percentual_Juros']; ?></td> -->
						<td><?php echo $e['Valor_Emprestimo']+($e['Valor_Emprestimo']*$e['Percentual_Juros']/100); ?></td>
						<td><?php echo $e['Total_Pago']; ?></td>
						<td><?php echo $e['Valor_Restante_Corrigido']; ?></td>
						<td class="<?= ( $e['Lucro_Total'] < 0 ? 'text-danger' : 'text-success') ?>"><b><?php echo $e['Lucro_Total'] . ( $e['Lucro_Total']>0 ? ' (' . num($e['Lucro_Total']/$e['Valor_Emprestimo']*100) . '%)' : ' (0%) '); ?></b></td>
						<td><?php echo formataData($e['Data_Emprestimo'], false); ?></td>
						<td>
							<?php echo formataData($e['Data_Pagamento'], false); ?>
							<?php if ($dataPagamento == $hoje): ?>
								<a href="<?= $linkWhatsapp; ?>" target="_blank" 
								   title="Enviar lembrete pelo WhatsApp" class="btn btn-success btn-xs">
									<span class="fa fa-whatsapp"></span>
								</a>
							<?php endif; ?></td>
						<td class="text-right" nowrap>
                            <a title="Atualizar Juros" target="_blank" href="<?php echo site_url('emprestimo/atualizar/'.$e['ID_Emprestimo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-refresh"></span></a> 
                            <a title="Promissoria" target="_blank" href="<?php echo site_url('emprestimo/promissoria/'.$e['ID_Emprestimo']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-file-text"></span></a> 
                            <a title="Editar" href="<?php echo site_url('emprestimo/edit/'.$e['ID_Emprestimo']); ?>" class="btn btn-warning <?= $e['Total_Pago'] > 0 ? 'disabled' : ''; ?> btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a title="Quitar" href="<?php echo site_url('emprestimo/quitar/'.$e['ID_Emprestimo']); ?>" class="btn btn-success btn-xs <?php echo ($e['Status_Emprestimo']!=0 ? 'disabled' : ''); ?>"><span class="fa fa-check"></span></a> 
                            <a title="Deletar" href="<?php echo site_url('emprestimo/remove/'.$e['ID_Emprestimo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
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
