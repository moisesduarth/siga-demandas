<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Recebimento de Empréstimo</h3>
            </div>
            <?php echo form_open('pagamento/juros/'.$emprestimo['ID_Emprestimo']); ?>
          	<div class="box-body">
          		<div class="row clearfix">
                  <div class="<?= $this->ion_auth->is_cobrador() ? 'col-md-6' : 'col-md-3';?>">
						<label for="Emprestimo" class="control-label">Emprestimo</label>
						<div class="form-group">
							<input type="text" name="Emprestimo" readonly value="<?php echo $emprestimo['ID_Emprestimo']. ' - ' . $emprestimo['Nome_Investidor'] . ' (R$ ' . $emprestimo['Valor_Emprestimo'] . ')'; ?>" class="form-control" id="Emprestimo" />
							<span class="text-danger"><?php echo form_error('ID_Emprestimo');?></span>
						</div>
					</div>
					<div class="col-md-3 <?= $this->ion_auth->is_cobrador() ? 'hidden' : '';?>">
						<label for="Prazo_Inicial" class="control-label">Vencimento</label>
						<div class="form-group">
							<input type="text" name="Prazo_Inicial" readonly value="<?php echo formataData($emprestimo['Data_Pagamento']); ?>" class="has-datepicker form-control" id="Data_Renegociacao" />
							<span class="text-danger"><?php echo form_error('Prazo_Inicial');?></span>
						</div>
					</div>
					<div class="<?= $this->ion_auth->is_cobrador() ? 'col-md-6' : 'col-md-2';?>">
						<label for="Valor_Emprestimo" class="control-label <?= $this->ion_auth->is_cobrador() ? 'hidden' : '';?>">Valor Corrigido</label>
						<label for="Valor_Emprestimo" class="control-label <?= !$this->ion_auth->is_cobrador() ? 'hidden' : '';?>">A Receber</label>
						<div class="form-group">
							<input type="text" name="Valor_Restante_Corrigido" readonly value="<?php echo $emprestimo['Valor_Restante_Corrigido']; ?>" class="form-control disabled" id="Valor_Restante_Corrigido" />
							<input type="hidden" name="Valor_Restante_Emprestimo" readonly value="<?php echo $emprestimo['Valor_Restante_Emprestimo']; ?>" class="form-control disabled" id="Valor_Restante_Emprestimo" />
						</div>
					</div>
					<div class="col-md-2 <?= $this->ion_auth->is_cobrador() ? 'hidden' : '';?>">
						<label for="Valor_Restante_Pagamento" class="control-label">Original</label>
						<div class="form-group">
						<input type="text" name="Valor_Emprestimo_Original" readonly value="<?php echo $emprestimo['Valor_Emprestimo']; ?>" class="form-control disabled" id="Valor_Emprestimo_Original" />
						<span class="text-danger"><?php echo form_error('Valor_Restante_Pagamento');?></span>
						</div>
					</div>

					<div class="col-md-2 <?= $this->ion_auth->is_cobrador() ? 'hidden' : '';?>">
						<label for="Valor_Restante_Pagamento" class="control-label">Restante</label>
						<div class="form-group">
							<input type="text" readonly name="Valor_Restante_Pagamento" value="<?php echo $emprestimo['Valor_Restante_Corrigido']; ?>" class="form-control" id="Valor_Restante_Pagamento" />
							<span class="text-danger"><?php echo form_error('Valor_Restante_Pagamento');?></span>
						</div>
					</div>

                    <div class="col-md-12">
						<input type="hidden" id="ID_Emprestimo" name="ID_Emprestimo" value="<?= $emprestimo['ID_Emprestimo'];?>">
						<input type="hidden" name="Data_Pagamento" value="<?= formataData(date('Y/m/d')); ?>" class="form-control" id="Data_Pagamento" />
                    </div>

					<div class="col-md-3">
						<label for="Valor_Lucro_Pagamento" class="control-label"><span class="text-danger">*</span>Valor do Lucro</label>
						<div class="form-group">
							<input type="text" readonly name="Valor_Lucro_Pagamento" value="<?php echo $this->input->post('Valor_Lucro_Pagamento'); ?>" class="form-control" id="Valor_Lucro_Pagamento" />
							<span class="text-danger"><?php echo form_error('Valor_Lucro_Pagamento');?></span>
						</div>
					</div>

					<div class="col-md-3">
						<label for="Valor_Retorno_Pagamento" readonly class="control-label"><span class="text-danger">*</span>Retorno de Investimento</label>
						<div class="form-group">
							<input type="text" readonly name="Valor_Retorno_Pagamento" value="<?php echo $this->input->post('Valor_Retorno_Pagamento'); ?>" class="form-control" id="Valor_Retorno_Pagamento" />
							<span class="text-danger"><?php echo form_error('Valor_Retorno_Pagamento');?></span>
						</div>
					</div>

					<!-- <div class="col-md-6 <?= $this->ion_auth->is_cobrador() ? 'hidden' : '';?>"">
						<label for="Novo_Prazo" class="control-label"><span class="text-danger">*</span>Novo Prazo Pagamento</label>
						<div class="form-group">
							<input type="text" name="Novo_Prazo" value="<?php echo formataData(date('d/m/Y')); ?>" class="has-datepicker form-control" id="Novo_Prazo" />
							<span class="text-danger"><?php echo form_error('Novo_Prazo');?></span>
						</div>
					</div> -->


					<div class="col-md-3">
						<label for="Valor_Pago_Anteriormente" class="control-label"><span class="text-danger">*</span>Valor Pago Anteriormente</label>
						<div class="form-group">
							<input type="text" disabled name="Valor_Pago_Anteriormente" value="<?php echo $emprestimo['Total_Pago']; ?>" class="form-control" id="Valor_Pago_Anteriormente" />
							<span class="text-danger"><?php echo form_error('Valor_Pago_Anteriormente');?></span>
						</div>
					</div>

					
					<div class="col-md-3">
						<label for="Lucro_Total" class="control-label">Lucro Total</label>
						<div class="form-group">
							<input type="text" readonly name="Lucro_Total" value="<?php echo $emprestimo['Lucro_Total']; ?>" class="form-control" id="Lucro_Total" />
							<span class="text-danger"><?php echo form_error('Lucro_Total');?></span>
						</div>
					</div>

					
					<div class="col-md-6">
						<label for="Valor_Pago" class="control-label"><span class="text-danger">*</span>Valor a Receber</label>
						<div class="form-group">
							<input type="text" autofocus name="Valor_Pago" onKeyUp="calculaLucro()" value="<?php echo $this->input->post('Valor_Pago') ?: $emprestimo['Valor_Restante_Corrigido']; ?>" class="form-control" id="Valor_Pago" />
							<span class="text-danger"><?php echo form_error('Valor_Pago');?></span>
						</div>
					</div>


					<div class="col-md-6">
						<label for="ID_Forma_Pagamento" class="control-label"><span class="text-danger">*</span>Forma Pagamento</label>
						<div class="form-group">
							<select name="ID_Forma_Pagamento" class="form-control">
								<?php 
								foreach($formas_pagamento as $p)
								{
									$selected = ($p['ID_Forma_Pagamento'] == $this->input->post('ID_Forma_Pagamento')) ? ' selected="selected"' : "";
									echo '<option value="'.$p['ID_Forma_Pagamento'].'" '.$selected.'>'.$p['Descricao_Forma_Pagamento'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('ID_Forma_Pagamento');?></span>
						</div>
					</div>
					
					<div class="col-md-12">
						<label for="Observacao" class="control-label">Observação</label>
						<div class="form-group">
							<textarea class="form-control" name="Observacao" id="Observacao" rows="3" placeholder="Observações diversas sobre o cliente"><?php echo nl2br($this->input->post('Observacao')); ?></textarea>
						</div>
					</div>

				</div>
			</div>
			
          	<div class="box-footer">
			  	<a href="javascript: window.history.go(-1)" type="button" class="btn btn-info ">
            		<i class="fa fa-arrow-left"></i> Voltar
            	</a>
            	<button type="submit" id="btnReceber" disabled class="btn btn-success pull-right">
            		<i class="fa fa-check"></i> Receber
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>

<script>

calculaLucro();

function calculaLucro() {

	valorPago = document.getElementById('Valor_Pago').value;
	valorPagoAnteriormente = document.getElementById('Valor_Pago_Anteriormente').value;
	valorLucroAtual = document.getElementById('Lucro_Total').value;
	percentualJuros = '<?= $emprestimo['Percentual_Juros']; ?>';
	valorCorrigidoOriginal = document.getElementById('Valor_Restante_Corrigido').value;
	valorRestanteCorrigidoOriginal = document.getElementById('Valor_Restante_Corrigido').value;
	valorRestanteOriginal = document.getElementById('Valor_Restante_Emprestimo').value;
	valorOriginal = document.getElementById('Valor_Emprestimo_Original').value;
	valorLucroInicial = valorCorrigidoOriginal*percentualJuros/100;


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


	<?php if ($configuracao['Incluir_Juros_Pagamento_Parcial'] == 1) { ?>

	valorRestante = valorDiferenca+valorLucroDiferenca;

	<?php } else { ?>

	valorRestante = (valorDiferenca).toFixed(2);

	<?php } ?>

	if (parseFloat(valorPago)<parseFloat(valorLucroSobreMontante)) {
		valorLucroSobreMontante = valorPago;
		valorRetornoDoQueFoiPago = 0;

	}

	if (valorPago == '' || valorPago == 0) {
		valorLucroSobreMontante = 0;
		valorRetornoDoQueFoiPago = 0;
		valorRestante = valorRestanteCorrigidoOriginal;
	}

	<?php if ($configuracao['Incluir_Juros_Pagamento_Parcial'] == 0) { ?>

	if (valorLucroAtual > valorLucroInicial) {
		valorLucroSobreMontante = 0;
		valorRetornoDoQueFoiPago = valorPago;
	}

	<?php } ?>

	document.getElementById('Valor_Lucro_Pagamento').value = valorLucroSobreMontante;
	document.getElementById('Valor_Retorno_Pagamento').value = valorRetornoDoQueFoiPago;
	document.getElementById('Valor_Restante_Pagamento').value = valorRestante;

	if (parseFloat(valorPago)>0 && parseFloat(valorPago) <= parseFloat(valorRestanteCorrigidoOriginal)) {
		document.getElementById('btnReceber').disabled = false;
	} else {
		document.getElementById('btnReceber').disabled = true;
	}


}
</script>