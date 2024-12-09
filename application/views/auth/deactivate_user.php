<div class="row">
    <div class="col-md-6">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo lang('deactivate_heading');?></h3>
            </div>

			<?php echo form_open("auth/deactivate/".$user->id);?>

			<div class="box-body">
								
				  <div class="col-md-2">
					<label class="control-label">
						<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
					</label>
					<div class="form-group">
						<input type="radio" name="confirm" value="yes" checked="checked" />
					</div>
				  </div>
				
				  <div class="col-md-2">
				  	<label class="control-label">
						<?php echo lang('deactivate_confirm_n_label', 'confirm');?>
					</label>
					<div class="form-group">
						<input type="radio" name="confirm" value="no" />
					</div>
				  </div>

				  <?php echo form_hidden($csrf); ?>
				  <?php echo form_hidden(array('id'=>$user->id)); ?>

				  <br clear="all" />
				
  				  <div class="box-footer">
					<button type="submit" class="btn btn-success pull-right ml-1">
						<i class="fa fa-save"></i> Salvar
					</button>
					<button type="button" class="btn btn-warning pull-right" onClick="history.back();">
						<i class="fa fa-history"></i> Voltar
					</button>
				 </div>

				 <?php echo form_close();?>
						
      	</div>
    </div>
</div>