<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div class="text-center"><b>Fechamento <?= Date('d/m/Y');?></b></div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Motivo</th>
						<th class="text-center">Valor</th>
						<th class="text-right">Hora</th>
                    </tr>
                    <?php 
                    $Total_Geral = 0;
                    ?>
                    <?php foreach($lancamentos as $l){ ?>
                    <?php $Total_Geral += $l['Tipo_Lancamento'] == 0 ? -$l['Valor_Lancamento'] : $l['Valor_Lancamento']; ?>
                    <?php $bgColor = $l['Tipo_Lancamento'] == 0 ? 'bg-danger' : 'bg-success'; ?>
                    <tr>
						<td class="<?= $bgColor;?>"><?php echo $l['ID_Lancamento']; ?></td>
						<td class="<?= $bgColor;?>"><?php echo $l['Motivo_Lancamento'] != '' ? $l['Motivo_Lancamento'] : ($l['ID_Cliente_Relacionado'] ? 'EMPRESTIMO: ' . $l['Nome_Investidor'] : 'NÃO INFORMADO'); ?></td>
						<td class="<?= $bgColor;?> text-center">R$ <?php echo number_format($l['Tipo_Lancamento'] == 0 ? -$l['Valor_Lancamento'] : $l['Valor_Lancamento'], 2, '.', ''); ?></td>
						<td class="<?= $bgColor;?> text-right"><?php echo Date('H:i', strtotime($l['Data_Lancamento'])); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
						<th colspan="2">&nbsp;</th>
						<th class="text-center">R$ <?php echo number_format($Total_Geral,2,'.',''); ?></th>
                    </tr>
                </table>
                                
            </div>
        </div>
    </div>
</div>
