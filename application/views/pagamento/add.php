<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Pagamento (Cadastrar)</h3>
            </div>
            <?php echo form_open('pagamento/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="ID_Emprestimo" class="control-label"><span class="text-danger">*</span>Emprestimo</label>
						<div class="form-group">
							<select name="ID_Emprestimo" class="form-control">
								<option value="">select emprestimo</option>
								<?php 
								foreach($all_emprestimo as $emprestimo)
								{
									$selected = ($emprestimo['ID_Emprestimo'] == $this->input->post('ID_Emprestimo')) ? ' selected="selected"' : "";

									echo '<option value="'.$emprestimo['ID_Emprestimo'].'" '.$selected.'>'.$emprestimo['ID_Emprestimo'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('ID_Emprestimo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Valor_Pago" class="control-label"><span class="text-danger">*</span>Valor Pago</label>
						<div class="form-group">
							<input type="text" name="Valor_Pago" value="<?php echo $this->input->post('Valor_Pago'); ?>" class="form-control" id="Valor_Pago" />
							<span class="text-danger"><?php echo form_error('Valor_Pago');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Data_Pagamento" class="control-label"><span class="text-danger">*</span>Data Pagamento</label>
						<div class="form-group">
							<input type="text" name="Data_Pagamento" value="<?php echo $this->input->post('Data_Pagamento'); ?>" class="has-datetimepicker form-control" id="Data_Pagamento" />
							<span class="text-danger"><?php echo form_error('Data_Pagamento');?></span>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Salvar
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>