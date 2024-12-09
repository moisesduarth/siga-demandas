<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Renegociação (Detalhamento)</h3>
				<div class="box-tools">
					Data da Renegociação: <?= formataData($renegociacao['Data_Renegociacao']); ?>
				</div>
            </div>


			<div class="box-body">
				<div class="row clearfix">

					<?php echo form_open('renegociacao/edit/'.$renegociacao['ID_Renegociacao'],['name'=>'form1', 'id'=>'form1']); ?>

					<input type="hidden" name="Data_Renegociacao" readonly value="<?php echo ($this->input->post('Data_Renegociacao') ? $this->input->post('Data_Renegociacao') : formataData($renegociacao['Data_Renegociacao'])); ?>" class="has-datepicker form-control" id="Data_Renegociacao" />

					<div class="col-md-4">
						<label for="Emprestimo" class="control-label">Emprestimo</label>
						<div class="form-group">
							<input type="hidden" name="ID_Emprestimo" readonly value="<?php echo $renegociacao['ID_Emprestimo']; ?>" class="form-control" id="ID_Emprestimo" />
							<input type="text" name="Emprestimo" readonly value="<?php echo $renegociacao['ID_Emprestimo']. ' - ' . $renegociacao['Nome_Investidor'] . ' (R$ ' . $renegociacao['Valor_Emprestimo'] . ')'; ?>" class="form-control" id="Emprestimo" />
							<span class="text-danger"><?php echo form_error('ID_Emprestimo');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="Prazo_Inicial" class="control-label">Primeiro Vencimento</label>
						<div class="form-group">
							<input type="text" name="Prazo_Inicial" readonly value="<?php echo formataData($renegociacao['Data_Pagamento']); ?>" class="has-datepicker form-control" id="Data_Renegociacao" />
							<span class="text-danger"><?php echo form_error('Prazo_Inicial');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="Status_Renegociacao" class="control-label">Status da Renegociação</label>
						<div class="form-group">
							<select name="Status_Renegociacao" readonly class="form-control">
								<option value="">...</option>
								<?php 
								$Status_Renegociacao_values = array(
									'0'=>'Pendente',
									'1'=>'Concluída',
								);

								foreach($Status_Renegociacao_values as $value => $display_text)
								{
									$selected = ($value == $renegociacao_parcela['Status_Renegociacao']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<label for="Valor_Emprestimo" class="control-label">Valor Corrigido</label>
						<div class="form-group">
							<input type="text" name="Valor_Emprestimo" readonly value="<?php echo $renegociacao['Valor_Emprestimo']+($renegociacao['Valor_Emprestimo']*$renegociacao['Percentual_Juros']/100); ?>" class="form-control disabled" id="Valor_Emprestimo" />
							<span class="text-danger"><?php echo form_error('Data_Renegociacao');?></span>
						</div>
					</div>

					<div class="col-md-4">
						<label for="Valor_Pago" class="control-label">Valor Pago até Agora</label>
						<div class="form-group">
							<input type="text" name="Valor_Pago" readonly value="<?= $valor_pago; ?>" class="form-control" id="Valor_Pago" />
							<span class="text-danger"><?php echo form_error('Valor_Pago');?></span>
						</div>
					</div>

					<div class="col-md-4">
						<label for="Valor_Pendente" class="control-label">Valor Pendente</label>
						<div class="form-group">
							<input type="text" name="Valor_Pendente" readonly value="<?= $valor_pendente ?>" class="form-control disabled" id="Valor_Emprestimo" />
							<span class="text-danger"><?php echo form_error('Data_Renegociacao');?></span>
						</div>
					</div>

					<?php echo form_close(); ?>


					<div class="col-md-12">
					
						<?php echo form_open('renegociacao_parcela/addin',['name'=>'form2', 'id'=>'form2']); ?>

						<hr />

						<div class="box-body">
							<div class="row clearfix">
	
								<input type="hidden" name="ID_Renegociacao" value="<?php echo $renegociacao['ID_Renegociacao']; ?>" id="ID_Renegociacao" />

								<div class="col-md-2">
									<label for="ID_Forma_Pagamento" class="control-label"><span class="text-danger">*</span>Forma Pagamento</label>
									<div class="form-group">
										<select name="ID_Forma_Pagamento" class="form-control">
											<option value="">...</option>
											<?php 
											foreach($all_forma_pagamento as $forma_pagamento)
											{
												$selected = ($forma_pagamento['ID_Forma_Pagamento'] == $this->input->post('ID_Forma_Pagamento')) ? ' selected="selected"' : "";

												echo '<option value="'.$forma_pagamento['ID_Forma_Pagamento'].'" '.$selected.'>'.$forma_pagamento['Descricao_Forma_Pagamento'].'</option>';
											} 
											?>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<label for="Valor_Parcela" class="control-label"><span class="text-danger">*</span>Valor Parcela</label>
									<div class="form-group">
										<input type="text" name="Valor_Parcela" value="<?php echo $this->input->post('Valor_Parcela'); ?>" class="form-control" id="Valor_Parcela" />
										<span class="text-danger"><?php echo form_error('Valor_Parcela');?></span>
									</div>
								</div>
								<div class="col-md-2">
									<label for="Data_Prazo_Parcela" class="control-label"><span class="text-danger">*</span>Data Prazo Parcela</label>
									<div class="form-group">
										<input type="text" name="Data_Prazo_Parcela" value="<?php echo $this->input->post('Data_Prazo_Parcela'); ?>" class="has-datepicker form-control" id="Data_Prazo_Parcela" />
										<span class="text-danger"><?php echo form_error('Data_Prazo_Parcela');?></span>
									</div>
								</div>
								
								<div class="col-md-4">
									<label for="Observacao_Parcela" class="control-label">Observação</label>
									<div class="form-group">
										<input type="text" name="Observacao_Parcela" value="<?php echo $this->input->post('Observacao_Parcela'); ?>" class="form-control" id="Observacao_Parcela" />
										<span class="text-danger"><?php echo form_error('Observacao_Parcela');?></span>
									</div>
								</div>
								<div class="col-md-2">
									<label for="Data_Prazo_Parcela" class="control-label"><span style="color:white;">*</span></label>
									<div class="form-group">
										<button type="button" class="btn btn-success"  onClick="document.form2.submit();">
											<i class="fa fa-plus"></i> Adicionar
										</button>
									</div>
								</div>
							</div>
						</div>
	
						<hr />

						<table class="table table-striped">
							<tr>
								<th>Ref. Parcela</th>
								<th>Forma Pagamento</th>
								<th>Valor</th>
								<th>Prazo</th>
								<th>Obs</th>
								<th>Status</th>
								<th></th>
							</tr>
							<?php foreach($renegociacao_parcela as $r){ ?>
							<tr <?= strtotime($r['Data_Prazo_Parcela'])<strtotime(date('Y/m/d')) && $r['Status_Parcela'] == 0 ? 'class="danger"' : ''; ?>>
								<td><?php echo $r['ID_Renegociacao_Parcela']; ?></td>
								<td><?php echo $r['Descricao_Forma_Pagamento']; ?></td>
								<td><?php echo $r['Valor_Parcela']; ?></td>
								<td><?php echo formataData($r['Data_Prazo_Parcela']); ?></td>
								<td><?php echo $r['Observacao_Parcela']; ?></td>
								<td><?php echo ($r['Status_Parcela']==0 ? '<label class="label label-warning">Pendente</label>' : '<label class="label label-success">Quitada</label>'); ?></td>
								<td>
									<a href="<?php echo site_url('renegociacao_parcela/quitar/'.$r['ID_Renegociacao_Parcela']); ?>" class="btn btn-success btn-xs <?php echo ($r['Status_Parcela']=='1' ? 'disabled' : ''); ?>"><span class="fa fa-check"></span> Quitar</a> 
									<a href="<?php echo site_url('renegociacao_parcela/removein/'.$r['ID_Renegociacao_Parcela']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>
								</td>
							</tr>
							<?php } ?>
						</table>

						<?php echo form_close(); ?>

					</div>


				</div>
			</div>
			<div class="box-footer">
				<div class="row">
					<div class="col-md-6 text-left <?= ($total_parcelas >= $valor_pendente ? 'text-success' : 'text-danger'); ?>">
						Total da Renegociação: <b>R$ <?= $total_parcelas; ?></b> <?= ($total_parcelas >= $valor_pendente ? '(Negociação sem prejuízo)' : '(Negociação com prejuízo)'); ?>
					</div>
					<div class="col-md-6 text-right">

						<?php if ($renegociacao['Status_Renegociacao']!=1) { ?>

							<a href="<?= site_url('renegociacao/remove/'.$renegociacao['ID_Renegociacao']); ?>" class="btn btn-danger">
								<i class="fa fa-close"></i> Excluir Negociação
							</a>
							
							<a href="<?= site_url('renegociacao/efetivar/'.$renegociacao['ID_Renegociacao']); ?>" class="btn btn-success">
								<i class="fa fa-check"></i> Salvar Negociação
							</a>

						<?php } ?>

					</div>
				</div>
	        </div>				
		</div>
    </div>
</div>