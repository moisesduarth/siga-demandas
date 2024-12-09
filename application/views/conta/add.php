<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Conta Add</h3>
            </div>
            <?php echo form_open('conta/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="Status_Conta" class="control-label">Status Conta</label>
						<div class="form-group">
							<select name="Status_Conta" class="form-control">
								<option value="">Selecionar</option>
								<?php 
								$Status_Conta_values = array(
									'0'=>'Inativa',
									'1'=>'Ativa',
								);

								foreach($Status_Conta_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('Status_Conta')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Descricao_Conta" class="control-label"><span class="text-danger">*</span>Descricao Conta</label>
						<div class="form-group">
							<input type="text" name="Descricao_Conta" value="<?php echo $this->input->post('Descricao_Conta'); ?>" class="form-control" id="Descricao_Conta" />
							<span class="text-danger"><?php echo form_error('Descricao_Conta');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Saldo_Conta" class="control-label"><span class="text-danger">*</span>Saldo Conta</label>
						<div class="form-group">
							<input type="text" name="Saldo_Conta" value="<?php echo $this->input->post('Saldo_Conta'); ?>" class="form-control" id="Saldo_Conta" />
							<span class="text-danger"><?php echo form_error('Saldo_Conta');?></span>
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