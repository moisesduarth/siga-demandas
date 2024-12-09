<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Gerenciar Conta</h3>
            	<div class="box-tools">
                    <!-- <a href="<?php echo site_url('conta/add'); ?>" class="btn btn-success btn-sm">Add</a>  -->
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Descrição Conta</th>
						<th>Saldo</th>
						<th>Status Conta</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($conta as $c){ ?>
                    <tr>
						<td><?php echo $c['ID_Conta']; ?></td>
						<td><?php echo $c['Descricao_Conta']; ?></td>
						<td><?php echo $c['Saldo_Conta']; ?></td>
                        <td><?php echo ($c['Status_Conta']==0 ? '<label class="label label-danger">Inativa</label>' : '<label class="label label-success">Ativa</label>'); ?></td>
						<td>
                            <a href="<?php echo site_url('conta/history/'.$c['ID_Conta']); ?>" class="btn btn-info btn-xs"><span class="fa fa-clock-o"></span> Extrato</a> 
                            <a href="<?php echo site_url('conta/edit/'.$c['ID_Conta']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <!-- <a href="<?php echo site_url('conta/remove/'.$c['ID_Conta']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
