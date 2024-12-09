<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include('css.php'); ?>
    <title>SAF - Cartão Diário</title>
</head>

<body>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body">
                    <div class="row clearfix">

                        <div class="col-md-4">
                            <div class="well">
                                <span class="fa fa-user"></span> <?= $emprestimo_pai['Nome_Investidor']; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="well">
                                <span class="glyphicon glyphicon-calendar"></span> <?= Date('M/Y', strtotime($dates[0])); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="well">
                                <span class="glyphicon glyphicon-road"></span> Pago R$ <?= $emprestimo_pai['Total_Pago'] . ' de R$ ' . number_format($emprestimo_pai['Valor_Emprestimo']+($emprestimo_pai['Valor_Emprestimo']*$emprestimo_pai['Percentual_Juros']/100),2,'.',''); ?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-bordered table-responsive">
                                <tr>
                                    <th class="text-center fds">DOM</th>
                                    <th class="text-center">SEG</th>
                                    <th class="text-center">TER</th>
                                    <th class="text-center">QUA</th>
                                    <th class="text-center">QUI</th>
                                    <th class="text-center">SEX</th>
                                    <th class="text-center fds">SAB</th>
                                </tr>
                                <tr>
                                    <td class="text-center fds"><?= date("d/m", strtotime("-1 day", strtotime($dates[0]))); ?></td>
                                    <td class="text-center"> 
                                        <?= $datas[0]; ?> <br>
                                        <div class="<?= $status[0] == '-' ? 'hidden' : ''; ?>">
                                            <label class="label <?= $status[0] == '1' ? 'label-success' : ( $valores_pagos[0] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[0] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[0] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                            <h4>R$ <?= $valores_pagos[0] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[0], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[0] > 0 ? number_format($valores_restantes[0], 2, '.', '') : ''; ?></h4>
                                        </div>
                                    </td>
                                    <td class="text-center"> 
                                        <?= $datas[1]; ?> <br>
                                        <div class="<?= $status[1] == '-' ? 'hidden' : ''; ?>">
                                            <label class="label <?= $status[1] == '1' ? 'label-success' : ( $valores_pagos[1] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[1] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[1] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                            <h4>R$ <?= $valores_pagos[1] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[1], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[1] > 0 ? number_format($valores_restantes[1], 2, '.', '') : ''; ?></h4>
                                        </div>
                                    </td>
                                    <td class="text-center"> 
                                        <?= $datas[2]; ?> <br>
                                        <div class="<?= $status[2] == '-' ? 'hidden' : ''; ?>">
                                            <label class="label <?= $status[2] == '1' ? 'label-success' : ( $valores_pagos[2] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[2] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[2] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                            <h4>R$ <?= $valores_pagos[2] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[2], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[2] > 0 ? number_format($valores_restantes[2], 2, '.', '') : ''; ?></h4>
                                        </div>
                                    </td>
                                    <td class="text-center"> 
                                        <?= $datas[3]; ?> <br>
                                        <div class="<?= $status[3] == '-' ? 'hidden' : ''; ?>">
                                            <label class="label <?= $status[3] == '1' ? 'label-success' : ( $valores_pagos[3] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[3] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[3] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                            <h4>R$ <?= $valores_pagos[3] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[3], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[3] > 0 ? number_format($valores_restantes[3], 2, '.', '') : ''; ?></h4>
                                        </div>
                                    </td>
                                    <td class="text-center"> 
                                        <?= $datas[4]; ?> <br>
                                        <div class="<?= $status[4] == '-' ? 'hidden' : ''; ?>">
                                            <label class="label <?= $status[4] == '1' ? 'label-success' : ( $valores_pagos[4] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[4] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[4] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                            <h4>R$ <?= $valores_pagos[4] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[4], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[4] > 0 ? number_format($valores_restantes[4], 2, '.', '') : ''; ?></h4>
                                        </div>
                                    </td>
                                    <td class="text-center fds"><?= date("d/m", strtotime("+1 day", strtotime($dates[4]))); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center fds"><?= date("d/m", strtotime("+2 day", strtotime($dates[4]))); ?></td>
                                    <td class="text-center">
                                        <?= $datas[5]; ?> <br>
                                        <label class="label <?= $status[5] == '1' ? 'label-success' : ( $valores_pagos[5] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[5] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[5] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[5] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[5], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[5] > 0 ? number_format($valores_restantes[5], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[6]; ?> <br>
                                        <label class="label <?= $status[6] == '1' ? 'label-success' : ( $valores_pagos[6] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[6] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[6] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[6] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[6], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[6] > 0 ? number_format($valores_restantes[6], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[7]; ?> <br>
                                        <label class="label <?= $status[7] == '1' ? 'label-success' : ( $valores_pagos[7] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[7] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[7] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[7] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[7], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[7] > 0 ? number_format($valores_restantes[7], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[8]; ?> <br>
                                        <label class="label <?= $status[8] == '1' ? 'label-success' : ( $valores_pagos[8] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[8] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[8] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[8] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[8], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[8] > 0 ? number_format($valores_restantes[8], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[9]; ?> <br>
                                        <label class="label <?= $status[9] == '1' ? 'label-success' : ( $valores_pagos[9] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[9] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[9] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[9] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[9], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[9] > 0 ? number_format($valores_restantes[9], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center fds"><?= date("d/m", strtotime("+1 day", strtotime($dates[9]))); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center fds"><?= date("d/m", strtotime("-1 day", strtotime($dates[10]))); ?></td>
                                    <td class="text-center">
                                        <?= $datas[10]; ?> <br>
                                        <label class="label <?= $status[10] == '1' ? 'label-success' : ( $valores_pagos[10] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[10] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[10] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[10] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[10], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[10] > 0 ? number_format($valores_restantes[10], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[11]; ?> <br>
                                        <label class="label <?= $status[11] == '1' ? 'label-success' : ( $valores_pagos[11] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[11] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[11] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[11] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[11], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[11] > 0 ? number_format($valores_restantes[11], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[12]; ?> <br>
                                        <label class="label <?= $status[12] == '1' ? 'label-success' : ( $valores_pagos[12] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[12] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[12] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[12] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[12], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[12] > 0 ? number_format($valores_restantes[12], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[13]; ?> <br>
                                        <label class="label <?= $status[13] == '1' ? 'label-success' : ( $valores_pagos[13] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[13] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[13] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[13] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[13], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[13] > 0 ? number_format($valores_restantes[13], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[14]; ?> <br>
                                        <label class="label <?= $status[14] == '1' ? 'label-success' : ( $valores_pagos[14] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[14] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[14] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[14] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[14], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[14] > 0 ? number_format($valores_restantes[14], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center fds"><?= date("d/m", strtotime("+1 day", strtotime($dates[14]))); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center fds"><?= date("d/m", strtotime("-1 day", strtotime($dates[15]))); ?></td>
                                    <td class="text-center">
                                        <?= $datas[15]; ?> <br>
                                        <label class="label <?= $status[15] == '1' ? 'label-success' : ( $valores_pagos[15] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[15] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[15] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[15] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[15], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[15] > 0 ? number_format($valores_restantes[15], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[16]; ?> <br>
                                        <label class="label <?= $status[16] == '1' ? 'label-success' : ( $valores_pagos[16] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[16] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[16] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[16] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[16], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[16] > 0 ? number_format($valores_restantes[16], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[17]; ?> <br>
                                        <label class="label <?= $status[17] == '1' ? 'label-success' : ( $valores_pagos[17] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[17] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[17] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[17] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[17], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[17] > 0 ? number_format($valores_restantes[17], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[18]; ?> <br>
                                        <label class="label <?= $status[18] == '1' ? 'label-success' : ( $valores_pagos[18] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[18] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[18] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[18] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[18], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[18] > 0 ? number_format($valores_restantes[18], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[19]; ?> <br>
                                        <label class="label <?= $status[19] == '1' ? 'label-success' : ( $valores_pagos[19] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[19] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[19] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[19] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[19], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[19] > 0 ? number_format($valores_restantes[19], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center fds"><?= date("d/m", strtotime("+1 day", strtotime($dates[19]))); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center fds"><?= date("d/m", strtotime("-1 day", strtotime($dates[20]))); ?></td>
                                    <td class="text-center">
                                        <?= $datas[20]; ?> <br>
                                        <label class="label <?= $status[20] == '1' ? 'label-success' : ( $valores_pagos[20] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[20] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[20] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[20] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[20], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[20] > 0 ? number_format($valores_restantes[20], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[21]; ?> <br>
                                        <label class="label <?= $status[21] == '1' ? 'label-success' : ( $valores_pagos[21] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[21] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[21] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[21] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[21], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[21] > 0 ? number_format($valores_restantes[21], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[22]; ?> <br>
                                        <label class="label <?= $status[22] == '1' ? 'label-success' : ( $valores_pagos[22] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[22] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[22] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[22] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[22], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[22] > 0 ? number_format($valores_restantes[22], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[23]; ?> <br>
                                        <label class="label <?= $status[23] == '1' ? 'label-success' : ( $valores_pagos[23] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[23] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[23] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[23] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[23], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[23] > 0 ? number_format($valores_restantes[23], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[24]; ?> <br>
                                        <label class="label <?= $status[24] == '1' ? 'label-success' : ( $valores_pagos[24] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[24] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[24] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                        <h4>R$ <?= $valores_pagos[24] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[24], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[24] > 0 ? number_format($valores_restantes[24], 2, '.', '') : ''; ?></h4>
                                    </td>
                                    <td class="text-center fds"><?= date("d/m", strtotime("+1 day", strtotime($dates[24]))); ?></td>
                                </tr>
                                <?php if (null !== $datas && count($datas) > 25) { ?>
                                <tr>
                                    <td class="text-center fds"><?= date("d/m", strtotime("-1 day", strtotime($dates[25]))); ?></td>
                                    <td class="text-center">
                                        <?= $datas[25]; ?> <br>
                                        <div class="<?= $status[25] == '-' ? 'hidden' : ''; ?>">
                                            <label class="label <?= $status[25] == '1' ? 'label-success' : ( $valores_pagos[25] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[25] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[25] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                            <h4>R$ <?= $valores_pagos[25] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[25], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[25] > 0 ? number_format($valores_restantes[25], 2, '.', '') : ''; ?></h4>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[26]; ?> <br>
                                        <div class="<?= $status[26] == '-' ? 'hidden' : ''; ?>">
                                            <label class="label <?= $status[26] == '1' ? 'label-success' : ( $valores_pagos[26] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[26] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[26] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                            <h4>R$ <?= $valores_pagos[26] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[26], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[26] > 0 ? number_format($valores_restantes[26], 2, '.', '') : ''; ?></h4>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[27]; ?> <br>
                                        <div class="<?= $status[27] == '-' ? 'hidden' : ''; ?>">
                                            <label class="label <?= $status[27] == '1' ? 'label-success' : ( $valores_pagos[27] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[27] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[27] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                            <h4>R$ <?= $valores_pagos[27] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[27], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[27] > 0 ? number_format($valores_restantes[27], 2, '.', '') : ''; ?></h4>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[28]; ?> <br>
                                        <div class="<?= $status[28] == '-' ? 'hidden' : ''; ?>">
                                            <label class="label <?= $status[28] == '1' ? 'label-success' : ( $valores_pagos[28] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[28] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[28] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                            <h4>R$ <?= $valores_pagos[28] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[28], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[28] > 0 ? number_format($valores_restantes[28], 2, '.', '') : ''; ?></h4>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <?= $datas[29]; ?> <br>
                                        <div class="<?= $status[29] == '-' ? 'hidden' : ''; ?>">
                                            <label class="label <?= $status[29] == '1' ? 'label-success' : ( $valores_pagos[29] > 0 ? 'label-warning' : 'label-danger' ); ?>"><?= $status[29] == '1' ? '<i class="fa fa-check"></i> Quitado' : ( $valores_pagos[29] > 0 ? '<i class="fa fa-refresh"></i> Parcial' : '<i class="fa fa-close"></i> Pendente'); ?></label>
                                            <h4>R$ <?= $valores_pagos[29] > 0 ? '<i style="text-decoration: line-through;">' . number_format($valores_pagos[29], 2, '.', '') . '</i>' : ''; ?> <?= $valores_restantes[29] > 0 ? number_format($valores_restantes[29], 2, '.', '') : ''; ?></h4>
                                        </div>
                                    </td>
                                    <td class="text-center fds"><?= date("d/m", strtotime("+1 day", strtotime($dates[29]))); ?></td>
                                </tr>
                                <?php } ?>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>