<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Renegociação</h3>
            </div>
            <?php echo form_open('renegociacao/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="ID_Emprestimo" class="control-label"><span class="text-danger">*</span>Emprestimo</label>
						<div class="form-group">
							<select name="ID_Emprestimo" class="form-control">
								<option value="">...</option>
								<?php 
								foreach($all_emprestimo_pendente as $emprestimo)
								{
									$selected = ($emprestimo['ID_Emprestimo'] == $this->input->post('ID_Emprestimo')) ? ' selected="selected"' : "";

									echo '<option value="'.$emprestimo['ID_Emprestimo'].'" '.$selected.'>'.$emprestimo['ID_Emprestimo'] . ' - ' . $emprestimo['Nome_Investidor'] . ' (R$ ' . $emprestimo['Valor_Emprestimo'] . ')'.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('ID_Emprestimo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Data_Renegociacao" class="control-label"><span class="text-danger">*</span>Data Renegociacao</label>
						<div class="form-group">
							<input type="text" name="Data_Renegociacao" value="<?php echo $this->input->post('Data_Renegociacao'); ?>" class="has-datepicker form-control" id="Data_Renegociacao" />
							<span class="text-danger"><?php echo form_error('Data_Renegociacao');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Status_Renegociacao" class="control-label">Status da Renegociação</label>
						<div class="form-group">
							<select name="Status_Renegociacao" class="form-control">
								<option value="">...</option>
								<?php 
								$Status_Renegociacao_values = array(
									'0'=>'Pendente',
									'1'=>'Concluída',
								);

								foreach($Status_Renegociacao_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('Status_Renegociacao')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
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