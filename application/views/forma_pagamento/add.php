<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Forma Pagamento Add</h3>
            </div>
            <?php echo form_open('forma_pagamento/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="Descricao_Forma_Pagamento" class="control-label">Descricao Forma Pagamento</label>
						<div class="form-group">
							<input type="text" name="Descricao_Forma_Pagamento" value="<?php echo $this->input->post('Descricao_Forma_Pagamento'); ?>" class="form-control" id="Descricao_Forma_Pagamento" />
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