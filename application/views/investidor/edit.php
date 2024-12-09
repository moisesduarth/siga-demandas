<div class="row">
	<div class="col-md-12">

		<!-- Box Dados Basicos -->

		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Cliente (Dados Básicos)</h3>
			</div>
			<?php echo form_open('investidor/edit/' . $investidor['ID_Investidor']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-4">
						<label for="Nome_Investidor" class="control-label"><span class="text-danger">*</span>Nome Cliente</label>
						<div class="form-group">
							<input type="text" name="Nome_Investidor" value="<?php echo ($this->input->post('Nome_Investidor') ? $this->input->post('Nome_Investidor') : $investidor['Nome_Investidor']); ?>" class="form-control" id="Nome_Investidor" />
							<span class="text-danger"><?php echo form_error('Nome_Investidor'); ?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="RG" class="control-label"><span class="text-danger">*</span>RG</label>
						<div class="form-group">
							<input type="text" name="RG" value="<?php echo ($this->input->post('RG') ? $this->input->post('RG') : ($investidor['RG']  ?: '')); ?>" class="form-control" id="RG" />
							<span class="text-danger"><?php echo form_error('RG'); ?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="CPF" class="control-label"><span class="text-danger">*</span>CPF</label>
						<div class="form-group">
							<input type="text" name="CPF" value="<?php echo ($this->input->post('CPF') ? $this->input->post('CPF') : ($investidor['CPF']  ?: '')); ?>" class="form-control" id="CPF" />
							<span class="text-danger"><?php echo form_error('CPF'); ?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="Rua" class="control-label">Rua</label>
						<div class="form-group">
							<input type="text" name="Rua" value="<?php echo ($this->input->post('Rua') ? $this->input->post('Rua') : $investidor['Rua']); ?>" class="form-control" id="Rua" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Numero" class="control-label">Numero</label>
						<div class="form-group">
							<input type="text" name="Numero" value="<?php echo ($this->input->post('Numero') ? $this->input->post('Numero') : $investidor['Numero']); ?>" class="form-control" id="Numero" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Bairro" class="control-label">Bairro</label>
						<div class="form-group">
							<input type="text" name="Bairro" value="<?php echo ($this->input->post('Bairro') ? $this->input->post('Bairro') : $investidor['Bairro']); ?>" class="form-control" id="Bairro" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Cidade" class="control-label">Cidade</label>
						<div class="form-group">
							<input type="text" name="Cidade" value="<?php echo $this->input->post('Cidade') ? $this->input->post('Cidade') : $investidor['Cidade']; ?>" class="form-control" id="Cidade" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="UF" class="control-label">UF</label>
						<div class="form-group">
							<select name="UF" id="UF" class="form-control">
								<option <?= (null == $investidor['UF'] ? 'selected' : ''); ?>value="">Selecione</option>
								<option <?= $investidor['UF'] == "AC" || $this->input->post('UF') == "AC" ? 'selected' : ''; ?> value="AC">Acre</option>
								<option <?= $investidor['UF'] == "AL" || $this->input->post('UF') == "AL" ? 'selected' : ''; ?> value="AL">Alagoas</option>
								<option <?= $investidor['UF'] == "AP" || $this->input->post('UF') == "AP" ? 'selected' : ''; ?> value="AP">Amapá</option>
								<option <?= $investidor['UF'] == "AM" || $this->input->post('UF') == "AM" ? 'selected' : ''; ?> value="AM">Amazonas</option>
								<option <?= $investidor['UF'] == "BA" || $this->input->post('UF') == "BA" ? 'selected' : ''; ?> value="BA">Bahia</option>
								<option <?= $investidor['UF'] == "CE" || $this->input->post('UF') == "CE" ? 'selected' : ''; ?> value="CE">Ceará</option>
								<option <?= $investidor['UF'] == "DF" || $this->input->post('UF') == "DF" ? 'selected' : ''; ?> value="DF">Distrito Federal</option>
								<option <?= $investidor['UF'] == "ES" || $this->input->post('UF') == "ES" ? 'selected' : ''; ?> value="ES">Espirito Santo</option>
								<option <?= $investidor['UF'] == "GO" || $this->input->post('UF') == "GO" ? 'selected' : ''; ?> value="GO">Goiás</option>
								<option <?= $investidor['UF'] == "MA" || $this->input->post('UF') == "MA" ? 'selected' : ''; ?> value="MA">Maranhão</option>
								<option <?= $investidor['UF'] == "MS" || $this->input->post('UF') == "MS" ? 'selected' : ''; ?> value="MS">Mato Grosso do Sul</option>
								<option <?= $investidor['UF'] == "MT" || $this->input->post('UF') == "MT" ? 'selected' : ''; ?> value="MT">Mato Grosso</option>
								<option <?= $investidor['UF'] == "MG" || $this->input->post('UF') == "MG" ? 'selected' : ''; ?> value="MG">Minas Gerais</option>
								<option <?= $investidor['UF'] == "PA" || $this->input->post('UF') == "PA" ? 'selected' : ''; ?> value="PA">Pará</option>
								<option <?= $investidor['UF'] == "PB" || $this->input->post('UF') == "PB" ? 'selected' : ''; ?> value="PB">Paraíba</option>
								<option <?= $investidor['UF'] == "PR" || $this->input->post('UF') == "PR" ? 'selected' : ''; ?> value="PR">Paraná</option>
								<option <?= $investidor['UF'] == "PE" || $this->input->post('UF') == "PE" ? 'selected' : ''; ?> value="PE">Pernambuco</option>
								<option <?= $investidor['UF'] == "PI" || $this->input->post('UF') == "PI" ? 'selected' : ''; ?> value="PI">Piauí</option>
								<option <?= $investidor['UF'] == "RJ" || $this->input->post('UF') == "RJ" ? 'selected' : ''; ?> value="RJ">Rio de Janeiro</option>
								<option <?= $investidor['UF'] == "RN" || $this->input->post('UF') == "RN" ? 'selected' : ''; ?> value="RN">Rio Grande do Norte</option>
								<option <?= $investidor['UF'] == "RS" || $this->input->post('UF') == "RS" ? 'selected' : ''; ?> value="RS">Rio Grande do Sul</option>
								<option <?= $investidor['UF'] == "RO" || $this->input->post('UF') == "RO" ? 'selected' : ''; ?> value="RO">Rondônia</option>
								<option <?= $investidor['UF'] == "RR" || $this->input->post('UF') == "RR" ? 'selected' : ''; ?> value="RR">Roraima</option>
								<option <?= $investidor['UF'] == "SC" || $this->input->post('UF') == "SC" ? 'selected' : ''; ?> value="SC">Santa Catarina</option>
								<option <?= $investidor['UF'] == "SP" || $this->input->post('UF') == "SP" ? 'selected' : ''; ?> value="SP">São Paulo</option>
								<option <?= $investidor['UF'] == "SE" || $this->input->post('UF') == "SE" ? 'selected' : ''; ?> value="SE">Sergipe</option>
								<option <?= $investidor['UF'] == "TO" || $this->input->post('UF') == "TO" ? 'selected' : ''; ?> value="TO">Tocantins</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label for="Telefone" class="control-label">Telefone</label>
						<div class="form-group">
							<input type="text" name="Telefone" value="<?php echo ($this->input->post('Telefone') ? $this->input->post('Telefone') : $investidor['Telefone']); ?>" class="form-control" id="Telefone" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Celular" class="control-label"><span class="text-danger">*</span>Celular (DDD + Número)</label>
						<div class="form-group">
							<input type="text" name="Celular" value="<?php echo ($this->input->post('Celular') ? $this->input->post('Celular') : ($investidor['Celular']  ?: '')); ?>" placeholder="Exemplo: 5592984321155" class="form-control" id="Celular" />
							<span class="text-danger"><?php echo form_error('Celular'); ?></span>
						</div>
					</div>
					<div class="col-md-8">
						<label for="Email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="Email" value="<?php echo ($this->input->post('Email') ? $this->input->post('Email') : $investidor['Email']); ?>" class="form-control" id="Email" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="Observacao" class="control-label">Observação</label>
						<div class="form-group">
							<textarea class="form-control" name="Observacao" id="Observacao"  rows="3" placeholder="Observações diversas sobre o cliente"><?php echo $this->input->post('Observacao') ? nl2br($this->input->post('Observacao')) : nl2br($investidor['Observacao']); ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- /Box Dados Basicos -->

		<!-- Box Credito -->

		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Análise de Crédito</h3>
			</div>
			<div class="box-body">
				<div class="row clearfix">

				<div class="col-md-4">
						<label for="Profissao" class="control-label">Profissão</label>
						<div class="form-group">
							<input type="text" name="Profissao" value="<?php echo $this->input->post('Profissao') ? $this->input->post('Profissao') : $investidor['Profissao']; ?>" class="form-control" id="Profissao" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Local_Trabalho" class="control-label">Local Trabalho</label>
						<div class="form-group">
							<input type="text" name="Local_Trabalho" value="<?php echo $this->input->post('Local_Trabalho') ? $this->input->post('Local_Trabalho') : $investidor['Local_Trabalho']; ?>" class="form-control" id="Local_Trabalho" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Salario_Atual" class="control-label">Salário Atual</label>
						<div class="form-group">
							<input type="text" name="Salario_Atual" value="<?php echo $this->input->post('Salario_Atual') ? $this->input->post('Salario_Atual') : $investidor['Salario_Atual']; ?>" class="form-control" id="Salario_Atual" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Data_Admissao" class="control-label">Data Admissão</label>
						<div class="form-group">
							<input type="text" name="Data_Admissao" id="Data_Admissao" value="<?php echo ($this->input->post('Data_Admissao') ? $this->input->post('Data_Admissao') : formataData($investidor['Data_Admissao'])); ?>" class="has-datepicker form-control" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Tempo_Servico" class="control-label">Tempo Serviço</label>
						<div class="form-group">
							<input type="text" readonly name="Tempo_Servico" value="<?php echo $tempo_servico < date('Y') ? $tempo_servico : ''; ?>" class="form-control" id="Tempo_Servico" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Limite_Credito" class="control-label">Limite Crédito</label>
						<div class="form-group">
							<input type="text" name="Limite_Credito" value="<?php echo $this->input->post('Limite_Credito') ? $this->input->post('Limite_Credito') : $investidor['Limite_Credito']; ?>" class="form-control" id="Limite_Credito" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Data_Serasa" class="control-label">Última Consulta Serasa</label>
						<div class="form-group">
							<input type="text" name="Data_Serasa" id="Data_Serasa" value="<?php echo ($this->input->post('Data_Serasa') ? $this->input->post('Data_Serasa') : formataData($investidor['Data_Serasa'])); ?>" class="has-datepicker form-control" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Pendencia_Bancaria" class="control-label">Pendência Bancária</label>
						<div class="form-group">
							<select name="Pendencia_Bancaria" id="Pendencia_Bancaria" class="form-control">
								<option <?= (null == $this->input->post('Pendencia_Bancaria')) ? 'selected' : ''; ?>value="">Selecione</option>
								<option <?= $investidor['Pendencia_Bancaria'] == "1" ? 'selected' : ''; ?> value="1">SIM</option>
								<option <?= $investidor['Pendencia_Bancaria'] == "0" ? 'selected' : ''; ?> value="0">NÃO</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label for="Pendencia_Banco" class="control-label">Banco Pendência</label>
						<div class="form-group">
							<input type="text" name="Pendencia_Banco" value="<?php echo $this->input->post('Pendencia_Banco') ? $this->input->post('Pendencia_Banco') : $investidor['Pendencia_Banco']; ?>" class="form-control" id="Pendencia_Banco" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="Pendencia_Valor" class="control-label">Valor Pendência</label>
						<div class="form-group">
							<input type="text" name="Pendencia_Valor" value="<?php echo $this->input->post('Pendencia_Valor') ? $this->input->post('Pendencia_Valor') : $investidor['Pendencia_Valor']; ?>" class="form-control" id="Pendencia_Valor" />
						</div>
					</div>

					<div class="col-md-4">
						<label for="Bloqueio_Serasa" class="control-label">Restrição Serasa</label>
						<div class="form-group">
							<select name="Bloqueio_Serasa" id="Bloqueio_Serasa" class="form-control">
								<option <?= (null == $this->input->post('Bloqueio_Serasa')) ? 'selected' : ''; ?>value="">Selecione</option>
								<option <?= $investidor['Bloqueio_Serasa'] == "1" ? 'selected' : ''; ?> value="1">SIM</option>
								<option <?= $investidor['Bloqueio_Serasa'] == "0" ? 'selected' : ''; ?> value="0">NÃO</option>
							</select>
						</div>
					</div>

				</div>

			</div>
			<div class="box-footer text-right">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-save"></i> Salvar
				</button>
			</div>
		</div>

		<!-- /Box Credito -->

		<?php echo form_close(); ?>

	</div>
</div>