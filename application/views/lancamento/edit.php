<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
			<h3 class="box-title">Editar Despesa</h3>
            </div>
			<?php echo form_open('lancamento/edit/'.$lancamento['ID_Lancamento']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="Tipo_Lancamento" class="control-label">Status Lancamento</label>
						<div class="form-group">
							<select name="Tipo_Lancamento" class="form-control">
								<option value="">Selecionar</option>
								<?php 
								$Tipo_Lancamento_values = array(
									'0'=>'Despesa',
									'1'=>'Receita',
								);

								foreach($Tipo_Lancamento_values as $value => $display_text)
								{
									$selected = ($value == $lancamento['Tipo_Lancamento']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Motivo_Lancamento" class="control-label"><span class="text-danger">*</span>Descricao Lancamento</label>
						<div class="form-group">
							<input type="text" name="Motivo_Lancamento" value="<?php echo ($this->input->post('Motivo_Lancamento') ? $this->input->post('Motivo_Lancamento') : $lancamento['Motivo_Lancamento']); ?>" class="form-control" id="Motivo_Lancamento" />
							<span class="text-danger"><?php echo form_error('Motivo_Lancamento');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Valor_Lancamento" class="control-label"><span class="text-danger">*</span>Saldo Lancamento</label>
						<div class="form-group">
							<input type="text" name="Valor_Lancamento" value="<?php echo ($this->input->post('Valor_Lancamento') ? $this->input->post('Valor_Lancamento') : $lancamento['Valor_Lancamento']); ?>" class="form-control" id="Valor_Lancamento" />
							<span class="text-danger"><?php echo form_error('Valor_Lancamento');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-save"></i> Salvar
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>