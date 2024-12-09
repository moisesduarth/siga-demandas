<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-users"></i> Usuários (Lista)</h3>
                <h3><div id="infoMessage"><?php echo $message;?></div></h3>
            	<div class="box-tools">
                    <!--a href="<?php echo site_url('auth/create_group'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> &nbsp;Adicionar Grupo</a--> 
                    <a href="<?php echo site_url('auth/create_user'); ?>" class="btn btn-success btn-sm"> &nbsp;Adicionar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tabela">
                    <tr>
						<th>Nome</th>
						<th>Cidade</th>
						<th>E-mail</th>
						<th>Grupos</th>
						<th>Status</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach ($users as $user):?>
						<tr>
				            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars(($user->city ? $user->city . '-' . $user->uf : ''),ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
							<td>
								<?php foreach ($user->groups as $group):?>
									<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?> / 
				                <?php endforeach?>
							</td>
							<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
							<td><a href="<?php echo site_url('auth/edit_user/'.$user->id); ?>" class="btn btn-info btn-xs">Editar</a> </td>
						</tr>
					<?php endforeach;?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
