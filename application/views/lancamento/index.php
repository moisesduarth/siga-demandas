<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Gerenciar Lancamentos</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('lancamento/add'); ?>" class="btn btn-success btn-sm">Novo Lançamento</a>
                </div>
            </div>
            <div class="box-body">

                <div class="panel panel-default" id="form_filter">
                    <div class="panel-body">

                        <?php echo form_open('lancamento/filtrar', ['autocomplete' => 'off']); ?>

                        <div class="col-md-3">
                            <label for="Nome_Usuario" class="control-label">Usuário</label>
                            <div class="form-group">
                                <input type="text" name="Nome_Usuario" value="<?php echo $filtro['Nome_Usuario']; ?>" class="form-control" id="Nome_Usuario" />
                            </div>
                        </div>
                        <div class="col-md-3" data-select2-id="14">
                            <div class="form-group" data-select2-id="13">
                                <label>Cidades / Rota</label>
                                <select multiple id="Cidades" name="Cidades[]" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecione as Rotas" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                    <?php foreach ($cidades as $c) { ?>
                                        <option <?= (isset($filtro['Cidades']) && in_array($c['Cidade'], $filtro['Cidades'])) ? 'selected' : ''; ?> data-select2-id="<?= $c['Cidade']; ?>"><?= $c['Cidade']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Data_Lancamento">Data</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control has-datepicker" value="<?= $filtro['Data_Lancamento'] ?? ''; ?>" name="Data_Lancamento" id="Data_Lancamento">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">&nbsp;</label>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-search"></i> Buscar
                                </button>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <?= (isset($filtro) ? '<a href="" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Limpar Filtro</a>' : ''); ?>
                        </div>

                        <!-- <div class="col-md-12">
                            <pre>
                                <?php print_r($filtro); ?>
                            </pre>
                        </div> -->

                        <?php echo form_close(); ?>

                    </div>
                </div>

                <br clear="all" />

                <div class="box-header">
                    <h3 class="box-title" style="margin-left: -10px;">Detalhes</h3>
                </div>

                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th class="text-center">Valor</th>
                        <th class="text-left">Forma Pgto</th>
                        <th>Usuário</th>
                        <th>Cidade</th>
                        <th class="text-center">Data</th>
                        <th class="text-right">Ações</th>
                    </tr>
                    <?php
                    $Total_Geral = 0;
                    ?>
                    <?php foreach ($lancamentos as $l) { ?>
                        <?php $Total_Geral += $l['Tipo_Lancamento'] == 0 ? -$l['Valor_Lancamento'] : $l['Valor_Lancamento']; ?>
                        <?php $bgColor = $l['Tipo_Lancamento'] == 0 ? 'bg-danger' : 'bg-success'; ?>
                        <tr>
                            <td class="<?= $bgColor; ?>"><?php echo $l['ID_Lancamento']; ?></td>
                            <td class="<?= $bgColor; ?>"><?php echo $l['Motivo_Lancamento'] != '' ? $l['Motivo_Lancamento'] : ($l['ID_Cliente_Relacionado'] ? 'EMPRESTIMO: ' . $l['Nome_Investidor'] : 'NÃO INFORMADO'); ?></td>
                            <td class="<?= $bgColor; ?>"><?php echo $l['Descricao_Forma_Pagamento']; ?></td>
                            <td class="<?= $bgColor; ?> text-center">R$ <?php echo $l['Valor_Lancamento']; ?></td>
                            <td class="<?= $bgColor; ?>"><?php echo isset($filtro['Nome_Usuario']) ? $filtro['Nome_Usuario'] : ''; ?></td>
                            <td class="<?= $bgColor; ?>"><?php echo $l['Cidade']; ?></td>
                            <td class="<?= $bgColor; ?> text-right"><?php echo formataData($l['Data_Lancamento']); ?></td>
                            <td class="<?= $bgColor; ?> text-right">
                                <a href="<?php echo site_url('lancamento/estornar/' . $l['ID_Lancamento']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-refresh"></span> Estornar</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="3">&nbsp;</th>
                        <th class="text-center">R$ <?php echo number_format($Total_Geral, 2, '.', ''); ?></th>
                        <th colspan="4">&nbsp;</th>
                    </tr>
                </table>

                <br clear="all" />

                <div class="row">

                    <div class="col-md-4">
                        <table class="table table-success table-striped">
                            <tr>
                                <th class="text-center bg-success" colspan="2">ENTRADAS</th>
                            </tr>
                            <?php $total_entradas = 0; ?>
                            <?php foreach ($entradas_forma_pagamento as $l) { ?>
                                <?php $total_entradas += $l['ID_Forma_Pagamento'] == 1 ? $l['Valor_Lancamento'] : 0; ?>
                                <tr>
                                    <td><?= $l['Descricao_Forma_Pagamento']; ?></td>
                                    <td class="text-right">R$ <?= $l['Valor_Lancamento']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table class="table table-danger table-striped">
                            <tr>
                                <th class="text-center bg-danger" colspan="2">SAÍDAS</th>
                            </tr>
                            <?php $total_saidas = 0; ?>
                            <?php foreach ($saidas_forma_pagamento as $l) { ?>
                                <?php $total_saidas += $l['ID_Forma_Pagamento'] == 1 ? $l['Valor_Lancamento'] : 0; ?>
                                <tr>
                                    <td><?= $l['Descricao_Forma_Pagamento']; ?></td>
                                    <td class="text-right">R$ <?= $l['Valor_Lancamento']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table class="table table-danger table-striped">
                            <tr>
                                <th colspan="2" class="text-center bg-<?= ($total_entradas - $total_saidas) < 0 ? 'info' : 'warning'; ?>">SALDO</th>
                            </tr>
                            <tr>
                                <td>DINHEIRO</td>
                                <td class="text-right">R$ <?= $total_entradas - $total_saidas; ?></td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>