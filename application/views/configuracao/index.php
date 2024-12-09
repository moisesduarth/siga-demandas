<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Configuração</h3>
			</div>
			<?php echo form_open('configuracao/index'); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-4">
						<label for="Nome_Fantasia" class="control-label"><span class="text-danger">*</span>Nome Cliente</label>
						<div class="form-group">
							<input type="text" name="Nome_Fantasia" value="<?php echo ($this->input->post('Nome_Fantasia') ? $this->input->post('Nome_Fantasia') : $configuracao['Nome_Fantasia']); ?>" class="form-control" id="Nome_Fantasia" />
							<span class="text-danger"><?php echo form_error('Nome_Fantasia'); ?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="CNPJ_CPF" class="control-label"><span class="text-danger">*</span>CNPJ ou CPF</label>
						<div class="form-group">
							<input type="text" name="CNPJ_CPF" value="<?php echo ($this->input->post('CNPJ_CPF') ? $this->input->post('CNPJ_CPF') : ($configuracao['CNPJ_CPF']  ?: '')); ?>" class="form-control" id="CNPJ_CPF" />
							<span class="text-danger"><?php echo form_error('CNPJ_CPF'); ?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="Endereco" class="control-label">Endereço</label>
						<div class="form-group">
							<input type="text" name="Endereco" value="<?php echo ($this->input->post('Endereco') ? $this->input->post('Endereco') : ($configuracao['Endereco']  ?: '')); ?>" class="form-control" id="Endereco" />
							<span class="text-danger"><?php echo form_error('Endereco'); ?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="Cidade" class="control-label">Cidade</label>
						<div class="form-group">
							<input type="text" name="Cidade" value="<?php echo ($this->input->post('Cidade') ? $this->input->post('Cidade') : ($configuracao['Cidade']  ?: '')); ?>" class="form-control" id="Cidade" />
							<span class="text-danger"><?php echo form_error('Cidade'); ?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="UF" class="control-label">UF</label>
						<div class="form-group">
							<select name="UF" id="UF" class="form-control">
								<option <?= (null == $configuracao['UF'] ? 'selected' : ''); ?>value="">Selecione</option>
								<option <?= $configuracao['UF'] == "AC" || $this->input->post('UF') == "AC" ? 'selected' : ''; ?> value="AC">Acre</option>
								<option <?= $configuracao['UF'] == "AL" || $this->input->post('UF') == "AL" ? 'selected' : ''; ?> value="AL">Alagoas</option>
								<option <?= $configuracao['UF'] == "AP" || $this->input->post('UF') == "AP" ? 'selected' : ''; ?> value="AP">Amapá</option>
								<option <?= $configuracao['UF'] == "AM" || $this->input->post('UF') == "AM" ? 'selected' : ''; ?> value="AM">Amazonas</option>
								<option <?= $configuracao['UF'] == "BA" || $this->input->post('UF') == "BA" ? 'selected' : ''; ?> value="BA">Bahia</option>
								<option <?= $configuracao['UF'] == "CE" || $this->input->post('UF') == "CE" ? 'selected' : ''; ?> value="CE">Ceará</option>
								<option <?= $configuracao['UF'] == "DF" || $this->input->post('UF') == "DF" ? 'selected' : ''; ?> value="DF">Distrito Federal</option>
								<option <?= $configuracao['UF'] == "ES" || $this->input->post('UF') == "ES" ? 'selected' : ''; ?> value="ES">Espirito Santo</option>
								<option <?= $configuracao['UF'] == "GO" || $this->input->post('UF') == "GO" ? 'selected' : ''; ?> value="GO">Goiás</option>
								<option <?= $configuracao['UF'] == "MA" || $this->input->post('UF') == "MA" ? 'selected' : ''; ?> value="MA">Maranhão</option>
								<option <?= $configuracao['UF'] == "MS" || $this->input->post('UF') == "MS" ? 'selected' : ''; ?> value="MS">Mato Grosso do Sul</option>
								<option <?= $configuracao['UF'] == "MT" || $this->input->post('UF') == "MT" ? 'selected' : ''; ?> value="MT">Mato Grosso</option>
								<option <?= $configuracao['UF'] == "MG" || $this->input->post('UF') == "MG" ? 'selected' : ''; ?> value="MG">Minas Gerais</option>
								<option <?= $configuracao['UF'] == "PA" || $this->input->post('UF') == "PA" ? 'selected' : ''; ?> value="PA">Pará</option>
								<option <?= $configuracao['UF'] == "PB" || $this->input->post('UF') == "PB" ? 'selected' : ''; ?> value="PB">Paraíba</option>
								<option <?= $configuracao['UF'] == "PR" || $this->input->post('UF') == "PR" ? 'selected' : ''; ?> value="PR">Paraná</option>
								<option <?= $configuracao['UF'] == "PE" || $this->input->post('UF') == "PE" ? 'selected' : ''; ?> value="PE">Pernambuco</option>
								<option <?= $configuracao['UF'] == "PI" || $this->input->post('UF') == "PI" ? 'selected' : ''; ?> value="PI">Piauí</option>
								<option <?= $configuracao['UF'] == "RJ" || $this->input->post('UF') == "RJ" ? 'selected' : ''; ?> value="RJ">Rio de Janeiro</option>
								<option <?= $configuracao['UF'] == "RN" || $this->input->post('UF') == "RN" ? 'selected' : ''; ?> value="RN">Rio Grande do Norte</option>
								<option <?= $configuracao['UF'] == "RS" || $this->input->post('UF') == "RS" ? 'selected' : ''; ?> value="RS">Rio Grande do Sul</option>
								<option <?= $configuracao['UF'] == "RO" || $this->input->post('UF') == "RO" ? 'selected' : ''; ?> value="RO">Rondônia</option>
								<option <?= $configuracao['UF'] == "RR" || $this->input->post('UF') == "RR" ? 'selected' : ''; ?> value="RR">Roraima</option>
								<option <?= $configuracao['UF'] == "SC" || $this->input->post('UF') == "SC" ? 'selected' : ''; ?> value="SC">Santa Catarina</option>
								<option <?= $configuracao['UF'] == "SP" || $this->input->post('UF') == "SP" ? 'selected' : ''; ?> value="SP">São Paulo</option>
								<option <?= $configuracao['UF'] == "SE" || $this->input->post('UF') == "SE" ? 'selected' : ''; ?> value="SE">Sergipe</option>
								<option <?= $configuracao['UF'] == "TO" || $this->input->post('UF') == "TO" ? 'selected' : ''; ?> value="TO">Tocantins</option>
							</select>
							<span class="text-danger"><?php echo form_error('UF'); ?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="Telefone" class="control-label">Telefone</label>
						<div class="form-group">
							<input type="text" name="Telefone" value="<?php echo ($this->input->post('Telefone') ? $this->input->post('Telefone') : ($configuracao['Telefone']  ?: '')); ?>" class="form-control" id="Telefone" />
							<span class="text-danger"><?php echo form_error('Telefone'); ?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="Celular" class="control-label">Celular</label>
						<div class="form-group">
							<input type="text" name="Celular" value="<?php echo ($this->input->post('Celular') ? $this->input->post('Celular') : ($configuracao['Celular']  ?: '')); ?>" class="form-control" id="Celular" />
							<span class="text-danger"><?php echo form_error('Celular'); ?></span>
						</div>
					</div>
					<div class="col-md-4">
							<label for="Incluir_Juros_Pagamento_Parcial" class="control-label">Cobrar Juros no Pagamento Parcial</label>
							<div class="form-group">
								<select name="Incluir_Juros_Pagamento_Parcial" id="Incluir_Juros_Pagamento_Parcial" class="form-control">
									<option <?= $configuracao['Incluir_Juros_Pagamento_Parcial'] == "1" ? 'selected' : ''; ?> value="1">SIM</option>
									<option <?= $configuracao['Incluir_Juros_Pagamento_Parcial'] == "0" ? 'selected' : ''; ?> value="0">NÃO</option>
								</select>
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