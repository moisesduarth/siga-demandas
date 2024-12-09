<?php
if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SIGA > RECIBO</title>
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css'); ?>">
</head>

<body onload="window.print()">

    <div class="row">

        <div class="col-md-12 col-xs-12">

            <div class="container" id="all-recibo" style="border: #000000 solid 2px; border-radius: 5px; margin-top: 10px;">

                <div class="row" style="border-bottom:2px solid #000; margin-bottom:10px;">

                    <div class="col-md-6 col-xs-6 text-left" style="padding-top: 10px; padding-left: 0px;">
                        <img src="<?php echo site_url('resources/img/logo_login.png'); ?>" width="280px">
                    </div>

                    <div class="col-md-6 col-xs-6 text-right">
                        <h3 style="color:blue"><?= $configuracao['Nome_Fantasia']; ?></h3>
                        <h4 style="color:#BB6B5A">Celular: <?= $configuracao['Celular']; ?></h4>
                        <h4>Telefone: <?= $configuracao['Telefone']; ?></h4>
                    </div>

                </div>

                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12 col-xs-12">
                        <div class="col-md-5 col-xs-5 text-left" style="padding-left: 0px;">
                            <h1>Recibo</h1>
                        </div>
                        <div class="col-md-3 col-xs-3 pull-right" style="border:2px solid #000; border-radius:10px; ">
                            <h3><strong>R$ <?php echo $pagamento['Valor_Pago']; ?></strong></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-bottom: 10px; border-bottom: #000000 solid 1px; padding-left: 0px;">
                    Recebi do(a) Sr.(a): <b><?php echo $pagamento['Nome_Investidor']; ?></b>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-bottom: 10px; border-bottom: #000000 solid 1px; padding-left: 0px;">
                    A importância de: <b><?php echo extenso($pagamento['Valor_Pago']); ?></b>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-bottom: 30px; border-bottom: #000000 solid 1px; padding-left: 0px;">Referente à
                    <b>FINANCIAMENTO</b>
                </div>


                <div class="col-md-6 col-xs-6 text-left" id="data_recibo" style="padding-left: 0px">
                    <?= $configuracao['Cidade']; ?>, <?php echo date('d'); ?> de <?php echo date('m'); ?> de <?php echo date('Y'); ?>
                    <br>
                    <p>Horário: <?= date('H:i:s'); ?>
                    <br>
                    <small>Impresso pelo usuário: <?= $this->session->userdata['first_name']; ?></small>
                    </p>
                </div>

                <div class="col-md-5 col-xs-5 pull-right text-center" style="padding-right: 10px; border-top: #000000 solid 1px;">
                    ASSINATURA
                </div>

            </div>

        </div>

        
    </div>


</body>

</html>