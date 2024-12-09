<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">

            <div class="box-header with-border">
              	<h3 class="box-title">Resumo do Empréstimo</h3>
            </div>

			<div class="box-body">
          		<div class="row clearfix">
				  	<div class="col-md-1">
						<label for="ID_Emprestimo" class="control-label">ID</label>
						<div class="form-group">
							<input type="text" name="ID_Emprestimo" disabled value="<?php echo $emprestimo['ID_Emprestimo']; ?>" class="form-control" id="ID_Emprestimo" />
							<span class="text-danger"><?php echo form_error('ID_Emprestimo');?></span>
						</div>
					</div>
                  	<div class="col-md-7">
						<label for="Nome_Investidor" class="control-label">Cliente</label>
						<div class="form-group">
							<input type="text" name="Nome_Investidor" disabled value="<?php echo $emprestimo['Nome_Investidor']; ?>" class="form-control" id="Nome_Investidor" />
							<span class="text-danger"><?php echo form_error('Nome_Investidor');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="Data_Emprestimo" class="control-label">Data Empréstimo</label>
						<div class="form-group">
							<input type="text" name="Data_Emprestimo" disabled value="<?php echo formataData($emprestimo['Data_Emprestimo']); ?>" class="has-datepicker form-control" id="Data_Emprestimo" />
							<span class="text-danger"><?php echo form_error('Data_Emprestimo');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="Prazo_Inicial" class="control-label">1º Vencimento</label>
						<div class="form-group">
							<input type="text" name="Prazo_Inicial" disabled value="<?php echo formataData($emprestimo['Data_Pagamento']); ?>" class="has-datepicker form-control" id="Data_Renegociacao" />
							<span class="text-danger"><?php echo form_error('Prazo_Inicial');?></span>
						</div>
					</div>
					<div class="col-md-1">
						<label for="Numero_Parcelas" class="control-label">Nº Parc</label>
						<div class="form-group">
							<input type="text" name="Numero_Parcelas" disabled value="<?php echo $emprestimo['Numero_Parcelas']; ?>" class="form-control" id="Numero_Parcelas" />
							<span class="text-danger"><?php echo form_error('Numero_Parcelas');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="Modalidade" class="control-label">Modalidade</label>
						<div class="form-group">
							<select name="Modalidade" disabled id="Modalidade" class="form-control">
                                <option <?= $emprestimo['Modalidade'] == "3" ? 'selected' : ''; ?> value="3">Mensal</option>
                                <option <?= $emprestimo['Modalidade'] == "2" ? 'selected' : ''; ?> value="2">Semanal</option>
                                <option <?= $emprestimo['Modalidade'] == "1" ? 'selected' : ''; ?> value="1">Diária</option>
                            </select>
						</div>
					</div>
					<div class="col-md-2">
						<label for="Valor_Restante_Pagamento" class="control-label">Emprestado</label>
						<div class="form-group">
						<input type="text" name="Valor_Emprestimo_Original" disabled value="<?php echo number_format($emprestimo['Valor_Emprestimo'],2,'.',''); ?>" class="form-control disabled" id="Valor_Emprestimo_Original" />
						<span class="text-danger"><?php echo form_error('Valor_Restante_Pagamento');?></span>
						</div>
					</div>
					<div class="col-md-3">
						<label for="Valor_Restante_Pagamento" class="control-label">Corrigido</label>
						<div class="input-group">
						<input type="text" name="Valor_Emprestimo_Original" disabled value="<?php echo number_format(($emprestimo['Valor_Emprestimo']+($emprestimo['Valor_Emprestimo']*$emprestimo['Percentual_Juros']/100)),2,'.',''); ?>" class="form-control disabled" id="Valor_Emprestimo_Original" />
						<span class="input-group-addon">Juros: <?= number_format($emprestimo['Percentual_Juros'],2,'.','');?>%</span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="Total_Pago" class="control-label">Pago</label>
						<div class="form-group">
							<input type="text" name="Total_Pago" disabled value="<?php echo $emprestimo['Total_Pago']; ?>" class="form-control disabled" id="Total_Pago" />
							<span class="text-danger"><?php echo form_error('Total_Pago');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="Valor_Restante_Pagamento" class="control-label">Restante</label>
						<div class="form-group">
							<input type="text" disabled name="Valor_Restante_Pagamento" value="<?php echo $emprestimo['Valor_Restante_Corrigido']; ?>" class="form-control" id="Valor_Restante_Pagamento" />
							<span class="text-danger"><?php echo form_error('Valor_Restante_Pagamento');?></span>
						</div>
					</div>

                    <div class="col-md-12">
						<input type="hidden" id="ID_Emprestimo" name="ID_Emprestimo" value="<?= $emprestimo['ID_Emprestimo'];?>">
						<input type="hidden" name="Data_Pagamento" value="<?= formataData(date('Y/m/d')); ?>" class="form-control" id="Data_Pagamento" />
                    </div>

					<?php if (null != $observacao && count($observacao)>0) { ?>
					<div class="col-md-12">

						<div class="row box-header with-border">
							<b class="box-title">&nbsp;Observações</b>
						</div>
						<br />
						<table class="table table-striped">
							<?php foreach($observacao as $o){ ?>
							<tr>
								<td><b class="text-primary"><?php echo $o['first_name']; ?>: </b> <?php echo $o['Observacao']; ?> <i class="text-secondary"> <?php echo formataData($o['Date_Created']); ?> </i></td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<?php } ?>
					
					<div class="col-md-12">
						
						<div class="row box-header with-border">
							<b class="box-title">&nbsp;Parcelas</b>
						</div>

						<?php 

						function destaque($id, $id_origem) {
							return $id == $id_origem ? 'bg-info' : ''; 
						}

						?>

						<table class="table table-stripped table-hovered">
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Parcela</th>
								<th class="text-center">Recebido</th>
								<th class="text-center">A Receber</th>
								<th class="text-center">Status</th>
								<th class="text-center">Vencimento / Pagamento</th>
								<th class="text-right">Ações</th>
							</tr>
							<?php foreach($parcelas_emprestimo as $p) { ?>
							<tr>
								<td class="<?= destaque($p['ID_Filho'], $emprestimo_filho['ID_Emprestimo']); ?> text-center"><?= $p['ID_Filho']; ?></td>
								<td class="<?= destaque($p['ID_Filho'], $emprestimo_filho['ID_Emprestimo']); ?> text-center"><?= $p['Parcela_Atual'] . '/' . $p['Numero_Parcelas']; ?></td>
								<td class="<?= destaque($p['ID_Filho'], $emprestimo_filho['ID_Emprestimo']); ?> text-center"><?php echo $p['Total_Pago']; ?></td>
								<td class="<?= destaque($p['ID_Filho'], $emprestimo_filho['ID_Emprestimo']); ?> text-center"><?php echo $p['Valor_Restante_Corrigido']; ?></td>
								<td class="<?= destaque($p['ID_Filho'], $emprestimo_filho['ID_Emprestimo']); ?> text-center">
									<?= $p['Status_Emprestimo'] == 1 ?  '<label class="label label-success">Quitado</label>' : ( $p['Valor_Pago'] > 0 ? '<label class="label label-warning">Parcial</label>' : '<label class="label label-danger">Pendente</label>' ); ?>
								</td>
								<td class="<?= destaque($p['ID_Filho'], $emprestimo_filho['ID_Emprestimo']); ?> text-center"><?= formataData($p['Data_Pagamento'] ? $p['Data_Pagamento'] : $p['Data_Previsao']); ?></td>
								<td class="<?= destaque($p['ID_Filho'], $emprestimo_filho['ID_Emprestimo']); ?> text-right">
									<a href="<?php echo site_url('emprestimo/reprogramar/'.$p['ID_Filho']); ?>" class="btn btn-danger btn-xs <?php echo ($p['Status_Emprestimo']==1 ? 'disabled' : ''); ?>" title="Reprogramar" ><span class="fa fa-calendar"></span> Reprogramar</a> 
									<a href="<?php echo site_url('emprestimo/quitar/'.$p['ID_Filho']); ?>" class="btn btn-success btn-xs <?php echo ($p['Status_Emprestimo']!=0 ? 'disabled' : ''); ?>" title="Quitar" ><span class="fa fa-check"></span> Quitar</a> 
									<a href="<?php echo site_url('emprestimo/promissoria/'.$p['ID_Filho']); ?>" title="Promissória" target="_blank" class="btn btn-warning btn-xs"><span class="fa fa-file-text"></span> Promissória</a> 
									<a href="<?php echo site_url('pagamento/recibo/'.$p['ID_Pagamento']); ?>" title="Recibo" target="_blank" class="btn btn-primary btn-xs <?= $p['ID_Pagamento'] == '' ? 'disabled' : ''; ?>"><span class="fa fa-file-o"></span> Recibo</a> 
								</td>
							</tr>
							<?php } ?>
						</table>

					</div>


				</div>
			</div>

          	<div class="box-footer text-right">
				<?php if ($emprestimo['Modalidade'] == "1") { ?>
				<a href="<?= base_url('emprestimo/cartao/'.$emprestimo['ID_Emprestimo']);?>" target="_blank" type="button" class="btn btn-info">
					<i class="fa fa-calendar"></i> Cartão Diário
				</a>
				<?php } ?>
				<!-- <button type="button" class="btn btn-primary">
					<i class="fa fa-clock-o"></i> Histórico de Pagamentos
				</button> -->
				<a href="<?= base_url('emprestimo/promissorias/'.$emprestimo['ID_Emprestimo']);?>" target="_blank" type="button" class="btn btn-warning">
					<i class="fa fa-file-text"></i> Promissórias
				</a>
				<!-- <a href="<?= base_url('emprestimo/recibo-total/'.$emprestimo['ID_Emprestimo']);?>" target="_blank" type="button" class="btn btn-success">
					<i class="fa fa-file-text-o"></i> Recibo Total
				</a> -->
          	</div>

		</div>
    </div>
</div>

<script>
function calculaLucro() {

	valorPago = document.getElementById('Valor_Pago').value;
	percentualJuros = '<?= $emprestimo['Percentual_Juros']; ?>';
	valorCorrigidoOriginal = document.getElementById('Valor_Restante_Corrigido').value;
	valorRestanteCorrigidoOriginal = document.getElementById('Valor_Restante_Corrigido').value;
	valorRestanteOriginal = document.getElementById('Valor_Restante_Emprestimo').value;
	valorOriginal = document.getElementById('Valor_Emprestimo_Original').value;


	valorDiferenca = valorCorrigidoOriginal-valorPago;
	valorLucroDiferenca = valorDiferenca*percentualJuros/100;

	//alert('valorCorridoOriginal antes: ' + valorCorrigidoOriginal);

	if (parseFloat(valorPago)<parseFloat(valorCorrigidoOriginal)) {
		valorLucroSobreMontante = valorOriginal*percentualJuros/100;
	} else {
		valorCorrigidoOriginal = valorRestanteOriginal;
		valorLucroSobreMontante = valorRestanteOriginal*percentualJuros/100;
		//alert('valorCorridoOriginal depois: ' + valorCorrigidoOriginal);

	}

	valorRetornoDoQueFoiPago = valorPago-valorLucroSobreMontante;
	valorRestante = valorDiferenca+valorLucroDiferenca;

	if (parseFloat(valorPago)<parseFloat(valorLucroSobreMontante)) {
		valorLucroSobreMontante = valorPago;
		valorRetornoDoQueFoiPago = 0;

	}

	if (valorPago == '' && valorPago == 0) {
		valorLucroSobreMontante = 0;
		valorRetornoDoQueFoiPago = 0;
		valorRestante = valorRestanteCorrigidoOriginal;
	}

	document.getElementById('Valor_Lucro_Pagamento').value = valorLucroSobreMontante;
	document.getElementById('Valor_Retorno_Pagamento').value = valorRetornoDoQueFoiPago;
	document.getElementById('Valor_Restante_Pagamento').value = valorRestante;


}
</script>