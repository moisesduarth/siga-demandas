<div class="row">
    <div class="col-md-8">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo lang('edit_user_heading');?></h3>
            </div>

			<?php echo form_open(uri_string());?>

				  <div class="col-md-12">
						<label for="first_name" class="control-label">
							<span class="text-danger">*</span>
							<?php echo lang('edit_user_fname_label', 'first_name');?>
					  	</label>
						<div class="form-group">
							<?php echo form_input($first_name, '','class="form-control"');?>
							<span class="text-danger"><?php echo form_error('first_name');?></span>
					  	</div>
				  </div>

				  <div class="col-md-12">
						<label class="control-label">
					  		<span class="text-danger">*</span>
							<?php echo lang('edit_user_lname_label', 'last_name');?>
					    </label>
					    <div class="form-group">
							<?php echo form_input($last_name, '','class="form-control"');?>
							<span class="text-danger"><?php echo form_error('last_name');?></span>
					    </div>
				  </div>

				  <div class="col-md-12">
						<label class="control-label">
					  		<?php echo lang('edit_user_password_label', 'password');?>
					    </label>
					    <div class="form-group">
							<?php echo form_input($password, '','class="form-control"');?>
					    </div>
				  </div>

				  <div class="col-md-12">
						<label class="control-label">
					  		<?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
					    </label>
					    <div class="form-group">
							<?php echo form_input($password_confirm, '','class="form-control"');?>
					    </div>
				  </div>

				  <div class="col-md-8">
						<label for="city" class="control-label">
							<span class="text-danger">*</span>
							<?php echo lang('edit_user_city_label', 'city');?>
					  	</label>
						<div class="form-group">
							<?php echo form_input($city, '','class="form-control"');?>
							<span class="text-danger"><?php echo form_error('city');?></span>
					  	</div>
				  </div>

				  <div class="col-md-4">
						<label for="uf" class="control-label">
							<span class="text-danger">*</span>
							<?php echo lang('edit_user_uf_label', 'uf');?>
					  	</label>
						<div class="form-group">
							<?php 
							$uf_list = array(
								"AC" => "AC",
								"AL" => "AL",
								"AP" => "AP",
								"AM" => "AM",
								"BA" => "BA",
								"CE" => "CE",
								"DF" => "DF",
								"ES" => "ES",
								"GO" => "GO",
								"MA" => "MA",
								"MS" => "MS",
								"MT" => "MT",
								"MG" => "MG",
								"PA" => "PA",
								"PB" => "PB",
								"PR" => "PR",
								"PE" => "PE",
								"PI" => "PI",
								"RJ" => "RJ",
								"RN" => "RN",
								"RS" => "RS",
								"RO" => "RO",
								"RR" => "RR",
								"SC" => "SC",
								"SP" => "SP",
								"SE" => "SE",
								"TO" => "TO",
							);
							echo form_dropdown('uf', $uf_list, $uf['value'], 'class="form-control"');
							?>
							<span class="text-danger"><?php echo form_error('uf');?></span>
					  	</div>
				  </div>
			
				  <div class="col-md-6" style="margin-top: 20px;">

							<div class="panel panel-default">

								<div class="panel-heading text-center">
									<b><?php echo lang('edit_user_groups_heading');?></b>
								</div>
								<div class="panel-body">

									<?php if ($this->ion_auth->is_admin()): ?>

									  <?php foreach ($groups as $group):?>
										  
									      <!--
										  <label class="checkbox">
										  <?php
											  $gID=$group['id'];
											  $checked = null;
											  $item = null;
											  foreach($currentGroups as $grp) {
												  if ($gID == $grp->id) {
													  $checked= ' checked="checked"';
												  break;
												  }
											  }
										  ?>
										  <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
										  <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
										  </label>
										  -->
									
										  <div class="form-group col-md-4 col-sm-4 col-xs-4 text-center">
											<label for="groups[]" class="control-label">
												<?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
											</label>
											<label class="switch">
											  <input type="checkbox" 
													 <?php echo $checked; ?> 
													 value="<?php echo $group['id'];?>"
													 name="groups[]">
											  <span class="slider round"></span>
											</label>

										</div>
									
									  <?php endforeach?>

								  <?php endif ?>
									
								</div>
								
							</div>


						</div>
			
						<br clear="all" />	  		
			
						<?php echo form_hidden('id', $user->id);?>
						<?php echo form_hidden($csrf); ?>
			
					  	<div class="box-footer">
							<button type="submit" class="btn btn-success pull-right ml-1">
							 	Salvar
							</button>
							<button type="button" class="btn btn-warning pull-right" onClick="history.back();">
							 	Voltar
							</button>
				  		</div>

			<?php echo form_close();?>
			
      	</div>
    </div>
</div>


			
