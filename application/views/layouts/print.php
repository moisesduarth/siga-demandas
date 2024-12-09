<?php
if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGA > RELATORIO > <?php echo ucfirst($this->uri->segment(1)); ?></title>
    <?php include('css.php'); ?>

    <style>

        #form_filter {
            display: none !important;
        }
        table, tr, td, th {
            border:#333333 solid 1px !important;
        }

        .label {
            border: none !important;
            font-family: Arial !important;
            font-size: 13px !important;
            font-weight: normal;
            color: #000000 !important;
            background-color: #ffffff !important;
        }

        .box {
            border: none !important;
        }

        .box-header .box-title {
            width: 98%;
            text-align: center;
            border: none !important;
        }

        .box-tools {
            display: none;
        }

    </style>


</head>

<body onload="window.print();">


    <section class="content">
        <?php                    
            if(isset($_view) && $_view)
                $this->load->view($_view);
        ?>
    </section>


</body>

</html>