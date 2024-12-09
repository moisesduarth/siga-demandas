<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cliente (Lista)</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('investidor/add'); ?>" class="btn btn-success btn-sm">Adicionar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID Cliente</th>
						<th>Nome Cliente</th>
						<th>Limite</th>
						<th>CPF</th>
						<th>Endereço</th>
						<th>Cidade</th>
						<th>Celular</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($investidor as $i) { ?>
                    <tr>
						<td><?php echo $i['ID_Investidor']; ?></td>
						<td><?php echo $i['Nome_Investidor']; ?></td>
						<td>R$ <?php echo number_format($i['Limite_Credito'],2,'.',''); ?></td>
						<td><?php echo $i['CPF']; ?></td>
						<td><?= $i['Rua'] . ($i['Numero'] > 0 ? ', ' . $i['Numero'] : ''); ?></td>
						<td><?= $i['Cidade'] != '' ? $i['Cidade'] . '-' . $i['UF'] : ''; ?></td>
						<td nowrap><?php echo $i['Celular']!='' ? telefone($i['Celular']) : ''; ?></td>
						<td nowrap>
                            <a href="<?php echo site_url('investidor/edit/'.$i['ID_Investidor']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('investidor/remove/'.$i['ID_Investidor']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
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
