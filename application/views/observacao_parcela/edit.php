<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Observacao Parcela Edit</h3>
            </div>
			<?php echo form_open('observacao_parcela/edit/'.$observacao_parcela['ID_Observacao_Parcela']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="ID_Parcela" class="control-label"><span class="text-danger">*</span>Renegociacao Parcela</label>
						<div class="form-group">
							<select name="ID_Parcela" class="form-control">
								<option value="">select renegociacao_parcela</option>
								<?php 
								foreach($all_renegociacao_parcela as $renegociacao_parcela)
								{
									$selected = ($renegociacao_parcela['ID_Renegociacao_Parcela'] == $observacao_parcela['ID_Parcela']) ? ' selected="selected"' : "";

									echo '<option value="'.$renegociacao_parcela['ID_Renegociacao_Parcela'].'" '.$selected.'>'.$renegociacao_parcela['ID_Renegociacao_Parcela'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('ID_Parcela');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Observacao_Parcela" class="control-label"><span class="text-danger">*</span>Observacao Parcela</label>
						<div class="form-group">
							<input type="text" name="Observacao_Parcela" value="<?php echo ($this->input->post('Observacao_Parcela') ? $this->input->post('Observacao_Parcela') : $observacao_parcela['Observacao_Parcela']); ?>" class="form-control" id="Observacao_Parcela" />
							<span class="text-danger"><?php echo form_error('Observacao_Parcela');?></span>
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