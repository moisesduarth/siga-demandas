<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Observacao Parcela (Lista)</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('observacao_parcela/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID Observacao Parcela</th>
						<th>ID Parcela</th>
						<th>Observacao Parcela</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($observacao_parcela as $o){ ?>
                    <tr>
						<td><?php echo $o['ID_Observacao_Parcela']; ?></td>
						<td><?php echo $o['ID_Parcela']; ?></td>
						<td><?php echo $o['Observacao_Parcela']; ?></td>
						<td>
                            <a href="<?php echo site_url('observacao_parcela/edit/'.$o['ID_Observacao_Parcela']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('observacao_parcela/remove/'.$o['ID_Observacao_Parcela']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
