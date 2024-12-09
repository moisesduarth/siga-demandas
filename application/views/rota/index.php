<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">

                <!-- Formulario de Busca / Inicio -->
                <div class="panel panel-default" id="form_filter">
                    <div class="panel-body">

                        <?php echo form_open('rota/filtrar/index', ['autocomplete' => 'off']); ?>

                        <div class="col-md-4">
                            <label for="Nome_Investidor" class="control-label">Cliente</label>
                            <div class="form-group">
                                <input type="text" name="Nome_Investidor" value="<?php echo $filtro['Nome_Investidor']; ?>" class="form-control" id="Nome_Investidor" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Data_Pagamento">Data do Pagamento</label>
                                <div class="input-group">
                                    <input type="text" name="Data_Pagamento" value="<?php echo $filtro['Data_Pagamento'] ? $filtro['Data_Pagamento'] : $hoje_ou_proximo_dia_util; ?>" class="has-datepicker form-control" id="Data_Pagamento" />
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?= (isset($filtro) ? '<a href="" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Limpar Filtro</a>' : ''); ?>
                        </div>

                        <?php echo form_close(); ?>

                    </div>
                </div>
                <!-- Formulario de Busca / Fim -->

                <?php foreach ($rotas as $r) { ?>
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="user-header col-md-1 col-xs-3">
                                <img src="<?=base_url('/resources/img/user2-160x160.jpg');?>" style="margin-left: -15px" class="img-circle" alt="User Image">
                            </div>
                            <div class="col-md-11 col-xs-9">
                                <b class="info-box-text"><?= $r['Nome_Investidor']; ?></b>
                                <span class="info-box-text">
                                    <?= $r['Rua'] ?: 'SEM RUA'; ?>, <?= $r['Numero'] ?: 'SN'; ?><br>
                                    <?= $r['Bairro'] ?: 'SEM BAIRRO'; ?> - <?= $r['Cidade'] ?: 'SEM CIDADE'; ?>-<?= $r['UF'] ?: 'SEM ESTADO'; ?></span>
                                <span class="info-box-number">
                                    R$ <?= $r['Valor_Restante_Corrigido']; ?>
                                    <label class="label label-<?= $r['Data_Pagamento'] < date('Y-m-d') ? 'danger' : 'info'; ?>"><?= formataData($r['Data_Pagamento'], false);?></label>
                                </span>
                                <a href="<?= base_url('pagamento/juros/' . $r['ID_Emprestimo']); ?>" class="btn btn-social-icon btn-primary" style="border-radius: 50% !important; float: right !important; margin-right: -25px !important; margin-top: -30px !important;">
                                    <i class="fa fa-check"></i>
                                </a>
                                <a href="<?= 'https://www.google.com/maps/place/'. ($r['Rua'] ?: '').($r['Numero'] ? ', '.$r['Numero'] : '').($r['Bairro'] ? ', '.$r['Bairro']:'').($r['Cidade'] ? ' - '.$r['Cidade']: '').($r['UF'] ? '-'.$r['UF']: ''); ?>" target="_blank" class="btn btn-social-icon btn-warning" style="border-radius: 50% !important; float: right !important; margin-right: -33px !important; margin-top: -80px !important;">
                                    <i class="fa fa-map-marker"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>