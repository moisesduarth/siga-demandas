<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Renegociacao Parcela Edit</h3>
            </div>
			<?php echo form_open('renegociacao_parcela/edit/'.$renegociacao_parcela['ID_Renegociacao_Parcela']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="ID_Forma_Pagamento" class="control-label">Forma Pagamento</label>
						<div class="form-group">
							<select name="ID_Forma_Pagamento" class="form-control">
								<option value="">select forma_pagamento</option>
								<?php 
								foreach($all_forma_pagamento as $forma_pagamento)
								{
									$selected = ($forma_pagamento['ID_Forma_Pagamento'] == $renegociacao_parcela['ID_Forma_Pagamento']) ? ' selected="selected"' : "";

									echo '<option value="'.$forma_pagamento['ID_Forma_Pagamento'].'" '.$selected.'>'.$forma_pagamento['Descricao_Forma_Pagamento'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ID_Renegociacao" class="control-label">Renegociacao</label>
						<div class="form-group">
							<select name="ID_Renegociacao" class="form-control">
								<option value="">select renegociacao</option>
								<?php 
								foreach($all_renegociacao as $renegociacao)
								{
									$selected = ($renegociacao['ID_Renegociacao'] == $renegociacao_parcela['ID_Renegociacao']) ? ' selected="selected"' : "";

									echo '<option value="'.$renegociacao['ID_Renegociacao'].'" '.$selected.'>'.$renegociacao['ID_Renegociacao'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Status_Parcela" class="control-label">Status Parcela</label>
						<div class="form-group">
							<select name="Status_Parcela" class="form-control">
								<option value="">Selecionar</option>
								<?php 
								$Status_Parcela_values = array(
									'0'=>'Pendente',
									'1'=>'Quitada',
								);

								foreach($Status_Parcela_values as $value => $display_text)
								{
									$selected = ($value == $renegociacao_parcela['Status_Parcela']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Valor_Parcela" class="control-label"><span class="text-danger">*</span>Valor Parcela</label>
						<div class="form-group">
							<input type="text" name="Valor_Parcela" value="<?php echo ($this->input->post('Valor_Parcela') ? $this->input->post('Valor_Parcela') : $renegociacao_parcela['Valor_Parcela']); ?>" class="form-control" id="Valor_Parcela" />
							<span class="text-danger"><?php echo form_error('Valor_Parcela');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Data_Prazo_Parcela" class="control-label"><span class="text-danger">*</span>Data Prazo Parcela</label>
						<div class="form-group">
							<input type="text" name="Data_Prazo_Parcela" value="<?php echo ($this->input->post('Data_Prazo_Parcela') ? $this->input->post('Data_Prazo_Parcela') : $renegociacao_parcela['Data_Prazo_Parcela']); ?>" class="has-datepicker form-control" id="Data_Prazo_Parcela" />
							<span class="text-danger"><?php echo form_error('Data_Prazo_Parcela');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>