<div class="row">
    <div class="col-md-6">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo lang('create_group_title');?></h3>
            </div>

			<?php echo form_open("auth/create_group");?>

			<div class="box-body">
				
				  <div id="infoMessage"><?php echo $message;?></div>

				  <div class="col-md-12">
					<label class="control-label">
						<?php echo lang('create_group_name_label', 'group_name');?>
					</label>
					<div class="form-group">
						<?php echo form_input($group_name,'','class="form-control"');?>
					 </div>
				  </div>

				  <div class="col-md-12">
					<label class="control-label">
						<?php echo lang('create_group_desc_label', 'description');?>
					</label>
					<div class="form-group">
						<?php echo form_input($description,'','class="form-control"');?>
					</div>
				</div>

			</div>

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