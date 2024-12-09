<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title <?= $this->ion_auth->is_cobrador() ? 'hidden' : ''; ?>">Novo Lançamento</h3>
              	<h3 class="box-title <?= !$this->ion_auth->is_cobrador() ? 'hidden' : ''; ?>">Lançar Despesa</h3>
            </div>
            <?php echo form_open('lancamento/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6 <?= $this->ion_auth->is_cobrador() ? 'hidden' : ''; ?>">
						<label for="Tipo_Lancamento" class="control-label">Tipo Lançamento</label>
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
									$selected = ($value == $this->input->post('Tipo_Lancamento')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Motivo_Lancamento" class="control-label <?= $this->ion_auth->is_cobrador() ? 'hidden' : '';?>"><span class="text-danger">*</span>Descricao Lancamento</label>
						<label for="Motivo_Lancamento" class="control-label <?= !$this->ion_auth->is_cobrador() ? 'hidden' : '';?>"><span class="text-danger">*</span>Motivo</label>
						<div class="form-group">
							<input type="text" name="Motivo_Lancamento" value="<?php echo $this->input->post('Motivo_Lancamento'); ?>" class="form-control" id="Motivo_Lancamento" />
							<span class="text-danger"><?php echo form_error('Motivo_Lancamento');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Valor_Lancamento" class="control-label <?= $this->ion_auth->is_cobrador() ? 'hidden' : '';?>"><span class="text-danger">*</span>Valor Lancamento</label>
						<label for="Valor_Lancamento" class="control-label <?= !$this->ion_auth->is_cobrador() ? 'hidden' : '';?>"><span class="text-danger">*</span>Valor da Despesa</label>
						<div class="form-group">
							<input type="text" name="Valor_Lancamento" value="<?php echo $this->input->post('Valor_Lancamento'); ?>" class="form-control" id="Valor_Lancamento" />
							<span class="text-danger"><?php echo form_error('Valor_Lancamento');?></span>
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
				</div>
			</div>
          	<div class="box-footer">
			  	<a href="javascript:history.go(-1)" class="btn btn-info pull-left">
            		<i class="fa fa-arrow-left"></i> Voltar
            	</a>
            	<button type="submit" class="btn btn-success pull-right">
            		<i class="fa fa-save"></i> Salvar
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>