<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><i class="fa fa-calendar"></i> Reprogramar Empréstimo</h3>
            </div>
            <?php echo form_open('emprestimo/reprogramar/'.$emprestimo['ID_Emprestimo']); ?>
          	<div class="box-body">
          		<div class="row clearfix">
                  <div class="<?= $this->ion_auth->is_cobrador() ? 'col-md-4' : 'col-md-4';?>">
						<label for="Emprestimo" class="control-label">Emprestimo</label>
						<div class="form-group">
							<input type="text" name="Emprestimo" readonly value="<?php echo $emprestimo['ID_Emprestimo']. ' - ' . $emprestimo['Nome_Investidor'] . ' (R$ ' . $emprestimo['Valor_Emprestimo'] . ')'; ?>" class="form-control" id="Emprestimo" />
							<span class="text-danger"><?php echo form_error('ID_Emprestimo');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="Data_Pagamento" class="control-label">Vencimento</label>
						<div class="form-group">
							<input type="text" name="Data_Pagamento" value="<?php echo formataData($emprestimo['Data_Pagamento']); ?>" class="has-datepicker form-control" id="Data_Renegociacao" />
							<span class="text-danger"><?php echo form_error('Data_Pagamento');?></span>
						</div>
					</div>

					<div class="col-md-4 <?= $this->ion_auth->is_cobrador() ? 'hidden' : '';?>">
						<label for="Valor_Restante_Pagamento" class="control-label">A Receber</label>
						<div class="form-group">
							<input type="text" readonly name="Valor_Restante_Pagamento" value="<?php echo $emprestimo['Valor_Restante_Corrigido']; ?>" class="form-control" id="Valor_Restante_Pagamento" />
							<span class="text-danger"><?php echo form_error('Valor_Restante_Pagamento');?></span>
						</div>
					</div>
					
				</div>
			</div>
			
          	<div class="box-footer">
			  	<button type="button" class="btn btn-info" onclick="javascript: window.history.go(-1)">
            		<i class="fa fa-arrow-left"></i> Voltar
            	</button>
            	<button type="submit" class="btn btn-primary pull-right">
            		<i class="fa fa-check"></i> Reprogramar
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>