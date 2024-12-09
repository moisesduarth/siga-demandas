<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-thumbs-o-up"></i> Renegociação Concluída</h3>
                <p>Esta renegociação já foi concluída e não pode mais ser alterada!</p>
            </div>


            <div class="box-body">
                <div class="row clearfix">

                    <?php echo form_open('renegociacao/edit/'.$renegociacao['ID_Renegociacao'],['name'=>'form1', 'id'=>'form1']); ?>


                    <div class="col-md-4">
                        <label for="ID_Emprestimo" class="control-label">Emprestimo</label>
                        <div class="form-group">
                            <input type="text" name="Emprestimo" readonly
                                value="<?php echo $renegociacao['ID_Emprestimo']. ' - ' . $renegociacao['Nome_Investidor'] . ' (R$ ' . $renegociacao['Valor_Emprestimo'] . ')'; ?>"
                                class="form-control" id="Emprestimo" />
                            <span class="text-danger"><?php echo form_error('ID_Emprestimo');?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="Data_Renegociacao" class="control-label">Data Renegociacao</label>
                        <div class="form-group">
                            <input type="text" name="Data_Renegociacao" readonly
                                value="<?php echo ($this->input->post('Data_Renegociacao') ? $this->input->post('Data_Renegociacao') : formataData($renegociacao['Data_Renegociacao'])); ?>"
                                class="has-datepicker form-control" id="Data_Renegociacao" />
                            <span class="text-danger"><?php echo form_error('Data_Renegociacao');?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="Status_Renegociacao" class="control-label">Status da Renegociação</label>
                        <div class="form-group">
                            <select name="Status_Renegociacao" readonly class="form-control">
                                <option value="">...</option>
                                <?php 
								$Status_Renegociacao_values = array(
									'0'=>'Pendente',
									'1'=>'Concluída',
								);

								foreach($Status_Renegociacao_values as $value => $display_text)
								{
									$selected = ($value == $renegociacao_parcela['Status_Renegociacao']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="Valor_Emprestimo" class="control-label">Valor Corrigido</label>
                        <div class="form-group">
                            <input type="text" name="Valor_Emprestimo" readonly
                                value="<?php echo $renegociacao['Valor_Emprestimo']+($renegociacao['Valor_Emprestimo']*$renegociacao['Percentual_Juros']/100); ?>"
                                class="form-control disabled" id="Valor_Emprestimo" />
                            <span class="text-danger"><?php echo form_error('Data_Renegociacao');?></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="Valor_Pago" class="control-label">Valor Pago</label>
                        <div class="form-group">
                            <input type="text" name="Valor_Pago" readonly value="<?= $valor_pago; ?>"
                                class="form-control" id="Valor_Pago" />
                            <span class="text-danger"><?php echo form_error('Valor_Pago');?></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="Valor_Pendente" class="control-label">Valor Pendente</label>
                        <div class="form-group">
                            <input type="text" name="Valor_Pendente" readonly value="<?= $valor_pendente ?>"
                                class="form-control disabled" id="Valor_Emprestimo" />
                            <span class="text-danger"><?php echo form_error('Data_Renegociacao');?></span>
                        </div>
                    </div>

                    <?php echo form_close(); ?>


                    <div class="col-md-12">

                        <hr />

                        <table class="table table-striped">
                            <tr>
                                <th>Ref. Parcela</th>
                                <th>Forma Pagamento</th>
                                <th>Valor</th>
                                <th>Prazo</th>
                                <th>Obs</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            <?php foreach($renegociacao_parcela as $r){ ?>
                            <tr>
                                <td><?php echo $r['ID_Renegociacao_Parcela']; ?></td>
                                <td><?php echo $r['Descricao_Forma_Pagamento']; ?></td>
                                <td><?php echo $r['Valor_Parcela']; ?></td>
                                <td><?php echo formataData($r['Data_Prazo_Parcela']); ?></td>
                                <td><?php echo $r['Observacao_Parcela']; ?></td>
                                <td><?php echo ($r['Status_Parcela']==0 ? '<label class="label label-warning">Pendente</label>' : '<label class="label label-success">Quitada</label>'); ?>
                                </td>
                                <td>
                                    <!-- <a href="<?php echo site_url('renegociacao_parcela/edit/'.$r['ID_Renegociacao_Parcela']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>  -->
                                    <!-- <a href="<?php echo site_url('renegociacao_parcela/removein/'.$r['ID_Renegociacao_Parcela']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a> -->
                                </td>
                            </tr>
                            <?php } ?>
                        </table>

                    </div>


                </div>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div
                        class="col-md-6 text-left <?= ($total_parcelas >= $valor_pendente ? 'text-success' : 'text-danger'); ?>">
                        Total da Renegociação: <b>R$ <?= $total_parcelas; ?></b>
                        <?= ($total_parcelas >= $valor_pendente ? '(Negociação concluída sem prejuízo)' : '(Negociação com prejuízo)'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>