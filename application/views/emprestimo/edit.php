<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?= $emprestimo['ID_Emprestimo_Pai'] == $emprestimo['ID_Emprestimo'] ? 'Emprestimo' : 'Parcela ' . $emprestimo['Parcela_Atual'] . '/' . $emprestimo['Numero_Parcelas'] ;?> (Editar)</h3>
            </div>
			<?php echo form_open('emprestimo/edit/'.$emprestimo['ID_Emprestimo']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-3">
					<label for="ID_Investidor" class="control-label"><span class="text-danger">*</span>Cliente</label>
                        <div class="form-group">
                            <select name="ID_Investidor" class="form-control select2">
                                <option value="">...</option>
								<?php 
								foreach($all_investidor as $investidor)
								{
									$selected = ($investidor['ID_Investidor'] == $emprestimo['ID_Investidor']) ? ' selected="selected"' : "";

									echo '<option value="'.$investidor['ID_Investidor'].'" '.$selected.'>'.$investidor['Nome_Investidor'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('ID_Investidor');?></span>
						</div>
					</div>
					<div class="col-md-3">
                        <label for="Valor_Emprestimo" class="control-label"><span class="text-danger">*</span>Valor
                            Emprestimo</label>
                        <div class="form-group">
						<input type="text" name="Valor_Emprestimo" value="<?php echo ($this->input->post('Valor_Emprestimo') ? $this->input->post('Valor_Emprestimo') : $emprestimo['Valor_Emprestimo']); ?>" class="form-control" id="Valor_Emprestimo" />
                            <span class="text-danger"><?php echo strpos(form_error('Valor_Emprestimo'), 'menor ou igual') > 0 ? form_error('Valor_Emprestimo') . '<b>LIMITE DE CRÉDITO INSUFICIENTE!</b>' : form_error('Valor_Emprestimo'); ?></span>
                        </div>
                    </div>
					<div class="col-md-3">
                        <label for="Percentual_Juros" class="control-label"><span class="text-danger">*</span>Percentual
                            Juros</label>
                        <div class="form-group">
                            <input type="text" name="Percentual_Juros" value="<?php echo ($this->input->post('Percentual_Juros') ? $this->input->post('Percentual_Juros') : $emprestimo['Percentual_Juros']); ?>" class="form-control" id="Percentual_Juros" />
                            <span class="text-danger"><?php echo form_error('Percentual_Juros'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <label for="Modalidade" class="control-label">Modalidade do Pagamento</label>
                        <div class="form-group">
                            <select name="Modalidade" id="Modalidade" class="form-control" onchange="calculaDataEParcelas(this.value)">
                                <option <?= null == $this->input->post('Modalidade') || ($this->input->post('Modalidade') == "3" || $emprestimo['Modalidade'] == "3" ? 'selected' : ''); ?> value="3">Mensal</option>
                                <option <?= $this->input->post('Modalidade') == "2" || $emprestimo['Modalidade'] == "2" ? 'selected' : ''; ?> value="2">
                                    Semanal</option>
                                <option <?= $this->input->post('Modalidade') == "1" || $emprestimo['Modalidade'] == "1" ? 'selected' : ''; ?> value="1">
                                    Diária</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="Numero_Parcelas" class="control-label"><span class="text-danger">*</span>Numero
                            Parcelas</label>
                        <div class="form-group">
                            <input type="text" <?= $emprestimo['ID_Emprestimo_Pai'] != $emprestimo['ID_Emprestimo'] ? 'readonly' : ''; ?> name="Numero_Parcelas" value="<?php echo ($this->input->post('Numero_Parcelas') ? $this->input->post('Numero_Parcelas') : ($emprestimo['ID_Emprestimo_Pai'] != $emprestimo['ID_Emprestimo'] ? 1 : $emprestimo['Numero_Parcelas'])); ?>" class="form-control" id="Numero_Parcelas" />
                            <span class="text-danger"><?php echo form_error('Numero_Parcelas'); ?></span>
                        </div>
                    </div>
					<div class="col-md-3">
                        <label for="Data_Pagamento" class="control-label"><span class="text-danger">*</span>Primeiro
                            Vencimento</label>
                        <div class="form-group">
                            <input type="text" name="Data_Pagamento" value="<?php echo $emprestimo['Data_Pagamento'] ? formataData($emprestimo['Data_Pagamento']) :  date("d/m/Y", strtotime("+1 month", strtotime(Date('Y-m-d')))); ?>" class="has-datepicker form-control" id="Data_Pagamento" />
                            <span class="text-danger"><?php echo form_error('Data_Pagamento'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="Data_Emprestimo" class="control-label"><span class="text-danger">*</span>Data
                            Emprestimo</label>
                        <div class="form-group">
                            <input type="text" name="Data_Emprestimo" value="<?php echo $emprestimo['Data_Emprestimo'] ? formataData($emprestimo['Data_Emprestimo']) : Date('d/m/Y'); ?>" class="has-datepicker form-control" id="Data_Emprestimo" />
                            <span class="text-danger"><?php echo form_error('Data_Emprestimo'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-12">
						<label for="Observacao" class="control-label">Observação</label>
						<div class="form-group">
							<textarea class="form-control" name="Observacao" id="Observacao" rows="3" placeholder="Observações diversas sobre o emprestimo"><?php echo nl2br($observacao['Observacao'] ? $observacao['Observacao'] : $this->input->post('Observacao')); ?></textarea>
						</div>
					</div>
					<input type="hidden" id="ID_Emprestimo_Pai" name="ID_Emprestimo_Pai" value="<?= $emprestimo['ID_Emprestimo_Pai']; ?>" />
					<input type="hidden" id="Parcela_Atual_Original" name="Parcela_Atual_Original" value="<?= $emprestimo['Parcela_Atual']; ?>" />
					<input type="hidden" id="Numero_Parcelas_Original" name="Numero_Parcelas_Original" value="<?= $emprestimo['Numero_Parcelas']; ?>" />
				</div>
			</div>
			<div class="box-footer">
				<a href="javascript: window.history.go(-1)" type="button" class="btn btn-primary pull-left">
					<i class="fa fa-arrow-left"></i> Voltar
				</a>
            	<button type="submit" class="btn btn-success pull-right">
					<i class="fa fa-save"></i> Alterar
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>