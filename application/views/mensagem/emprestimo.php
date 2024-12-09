<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Empréstimo Realizado com Sucesso</h3>

            </div>
            <div class="box-body">

                <div class="col-md-12">
                    <!-- The time line -->
                    <ul class="timeline">
                        <!-- timeline time label -->
                        <li class="time-label">
                            <span class="bg-blue">
                               Status das Tarefas
                            </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa <?= ($sms_enviado ? 'fa-envelope' : 'fa-warning'); ?> <?= ($sms_enviado ? 'bg-blue' : 'bg-red'); ?>"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?= $horario_envio_sms; ?></span>

                                <h3 class="timeline-header <?= ($sms_enviado ? 'text-green' : 'text-red'); ?>">O SMS <?= ($sms_enviado ? 'foi' : 'não foi'); ?> Enviado para o cliente!</h3>

                                <!-- <div class="timeline-body">
                                    Um SMS foi enviado para o celular do cliente confirmando o empréstimo.
                                </div> -->
                                
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa <?= ($sms_enviado ? 'fa-calendar' : 'fa-close'); ?> <?= ($sms_agendado ? 'bg-aqua' : 'bg-red'); ?>"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?= $horario_agendamento_sms; ?></span>

                                <h3 class="timeline-header no-border <?= ($sms_agendado ? 'text-green' : 'text-red'); ?>">Um SMS <?= ($sms_enviado ? 'foi' : 'não foi'); ?> agendado para lembrar o cliente do pagamento na data!</h3>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-whatsapp bg-green"></i>

                            <div class="timeline-item">
                                <span class="time"></span>

                                <h3 class="timeline-header">Você ainda pode enviar uma mensagem por Whatsapp</h3>

                                <div class="timeline-body">
                                    Para abrir o whatsapp e enviar uma mensagem para o cliente,
                                    basta clicar no botão abaixo!
                                </div>
                                <div class="timeline-footer">
                                    <a href="https://api.whatsapp.com/send?phone=<?= $celular; ?>&text=<?= "Acordo Nr. $codigo. Valor: R$ " . $valor . " Vencimento: " . $vencimento; ?>" target="_blank" class="btn btn-success btn-lg"> <i class="fa fa-whatsapp"></i> Enviar Mensagem</a>
                                    <a href="<?= base_url("emprestimo/promissoria/$codigo");?>" target="_blank" class="btn btn-info btn-lg"> <i class="fa fa-file-text"></i> Nota Promissória</a>
                                    <a href="<?= base_url("emprestimo/resumo/$codigo");?>" class="btn btn-warning btn-lg"> <i class="fa fa-list-alt"></i> Resumo</a>
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <li>
                            <i class="fa fa-check bg-aqua"></i>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>