<div class="row">
    <div class="col-md-8">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo lang('create_user_heading');?></h3>
            </div>


			<?php echo form_open("auth/create_user");?>

				  <div class="col-md-12">
						<label for="first_name" class="control-label">
							<span class="text-danger">*</span><?php echo lang('edit_user_fname_label', 'first_name');?>
					  	</label>
						<div class="form-group">
							<?php echo form_input($first_name,'','class="form-control"');?>
							<span class="text-danger"><?php echo form_error('first_name');?></span>
					  	</div>
				  </div>

				  <div class="col-md-12">
					  	<label class="control-label">
							<span class="text-danger">*</span><?php echo lang('create_user_lname_label', 'last_name');?> 
					  	</label>
					  	<div class="form-group">
							<?php echo form_input($last_name,'','class="form-control"');?>
							<span class="text-danger"><?php echo form_error('last_name');?></span>
					  	</div>
				  </div>

				  <?php
				  if($identity_column!=='email') {
					  echo '<p>';
					  echo lang('create_user_identity_label', 'identity');
					  echo '<br />';
					  echo form_error('identity');
					  echo form_input($identity);
					  echo '</p>';
				  }
				  ?>


				  <div class="col-md-12">
					  	<label class="control-label">
							<span class="text-danger">*</span><?php echo lang('create_user_email_label', 'email');?> 
					  	</label>
					  	<div class="form-group">
							<?php echo form_input($email,'','class="form-control"');?>
							<span class="text-danger"><?php echo form_error('email');?></span>
					  	</div>
				  </div>

				  <div class="col-md-12">
					  	<label class="control-label">
						<?php echo lang('create_user_password_label', 'password');?> 
					  	</label>
					  	<div class="form-group">
							<?php echo form_input($password,'','class="form-control"');?>
							<span class="text-danger"><?php echo form_error('password');?></span>
					  	</div>
				  </div>

				  <div class="col-md-12">
					  	<label class="control-label">
						<?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
					  	</label>
					  	<div class="form-group">
							<?php echo form_input($password_confirm,'','class="form-control"');?>
							<span class="text-danger"><?php echo form_error('password_confirm');?></span>
					  	</div>
				  </div>

				  <div class="col-md-8">
						<label for="city" class="control-label">
							<span class="text-danger">*</span>
							<?php echo lang('create_user_city_label', 'city');?>
					  	</label>
						<div class="form-group">
							<?php echo form_input($city, '','class="form-control"');?>
							<span class="text-danger"><?php echo form_error('city');?></span>
					  	</div>
				  </div>

				  <div class="col-md-4">
						<label for="uf" class="control-label">
							<span class="text-danger">*</span>
							<?php echo lang('create_user_uf_label', 'uf');?>
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
							echo form_dropdown('uf', $uf_list, 'AC', 'class="form-control"');
							?>
							<span class="text-danger"><?php echo form_error('uf');?></span>
					  	</div>
				  </div>
			
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

