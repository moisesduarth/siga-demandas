<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Formas de Pagamento</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('forma_pagamento/add'); ?>" class="btn btn-success btn-sm">Adicionar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Forma Pagamento</th>
						<th class="text-right">Ações</th>
                    </tr>
                    <?php foreach($forma_pagamento as $f){ ?>
                    <tr>
						<td><?php echo $f['ID_Forma_Pagamento']; ?></td>
						<td><?php echo $f['Descricao_Forma_Pagamento']; ?></td>
						<td class="text-right">
                            <a href="<?php echo site_url('forma_pagamento/edit/'.$f['ID_Forma_Pagamento']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <a href="<?php echo site_url('forma_pagamento/remove/'.$f['ID_Forma_Pagamento']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
