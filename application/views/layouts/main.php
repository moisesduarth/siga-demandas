<?php
if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGA > <?php echo ucfirst($this->uri->segment(1)); ?></title>
    <?php include('css.php'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url(); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">SIGA</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"> <img src="<?php echo site_url('resources/img/siga-logo-white.png'); ?>" alt="SIGA" style="width: 200px;"> </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo site_url('resources/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $this->session->userdata['first_name']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo site_url('resources/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $this->session->userdata['first_name']; ?>
                                        <br>
                                        <small><?php echo $this->session->userdata['identity']; ?></small>
                                        <small><?php echo $this->session->userdata['city']; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sair</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo site_url('resources/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $this->session->userdata['first_name']; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">

                    <li class="header">MENU PRINCIPAL</li>

                    <?php if ($this->ion_auth->is_admin()) { ?>

                        <li>
                            <a href="<?php echo site_url(); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Instituições -->
                        <li>
                            <a href="<?php echo site_url('instituicoes'); ?>">
                                <i class="fa fa-building"></i> <span>Instituições</span>
                            </a>
                        </li>

                        <!-- Membros -->
                        <li>
                            <a href="<?php echo site_url('membros'); ?>">
                                <i class="fa fa-group"></i> <span>Membros</span>
                            </a>
                        </li>

                        <!-- Áreas -->
                        <li>
                            <a href="<?php echo site_url('areas'); ?>">
                                <i class="fa fa-map"></i> <span>Áreas</span>
                            </a>
                        </li>

                        <!-- Demandas -->
                        <li>
                            <a href="<?php echo site_url('demandas'); ?>">
                                <i class="fa fa-list"></i> <span>Demandas</span>
                            </a>
                        </li>

                        <!-- Novo Menu de Empréstimos -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-exchange"></i> <span>Empréstimos</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo site_url('loans/create'); ?>"><i class="fa fa-plus"></i> Novo Empréstimo</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('loans/index'); ?>"><i class="fa fa-list"></i> Listar Empréstimos</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('loans/overdue'); ?>"><i class="fa fa-clock-o"></i> Empréstimos Atrasados</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Novo Menu de Itens -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cubes"></i> <span>Itens</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo site_url('items/create'); ?>"><i class="fa fa-plus"></i> Novo Item</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('items/index'); ?>"><i class="fa fa-list"></i> Listar Itens</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('items/stock'); ?>"><i class="fa fa-archive"></i> Controle de Estoque</a>
                                </li>
                            </ul>
                        </li>



                    <?php } ?>


                    <li>
                        <a href="<?php echo site_url('lancamento/index'); ?>">
                            <i class="fa fa-black-tie"></i> <span>Lançamentos Financeiros</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('auth/list_user'); ?>">
                            <i class="fa fa-users"></i> <span>Usuários</span>
                        </a>
                    </li>


                    <li>
                        <a href="<?php echo site_url('configuracao/index'); ?>">
                            <i class="fa fa-cogs"></i> <span>Configurações</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('lancamento/despesa'); ?>">
                            <i class="fa fa-dollar"></i> <span>Lançar Despesa</span>
                        </a>
                    </li>

                    <!-- Relatórios -->

                    <li class="treeview menu-open" style="height: auto;">
                        <a href="#">
                            <i class="fa fa-bar-chart"></i> <span>Relatórios</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="display: block;">
                            <li>
                                <a href="<?php echo site_url('emprestimo/pendentes'); ?>"><i class="fa fa-warning"></i>Relatório Geral</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-thumbs-down"></i>Demandas Pendentes</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-check-square-o"></i>Demandas Resolvidas</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-plus-square"></i> <span>Demandas x Área</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-minus-square"></i> <span>Demandas Aguardando</span></a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_view) && $_view)
                    $this->load->view($_view);
                ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Desenvolvido por <a href="http://www.mduarth.com.br/" target="_blank">MDUARTH</a></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->

            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

</body>

</html>


<?php include('js.php'); ?>

<script type="text/javascript">
    //Rastreia a tecla ENTER e converte para TAB em todos os formulários
    $('.form-control').keydown(function(e) {
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
        if (key == 13) {
            e.preventDefault();
            var inputs = $(this).closest('form').find(':input:visible');
            inputs.eq(inputs.index(this) + 1).focus();
        }
    });

    $('.select2').select2();

    $.fn.datepicker.dates['pt'] = {
        days: ["Domingo", "Segunda", "Terca", "Quarta", "Quinta", "Sexta", "Sabado"],
        daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
        daysMin: ["D", "S", "T", "Q", "Q", "S", "S"],
        months: ["Janeiro", "Fevereiro", "Marco", "Abril", "Maio", "Junio", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        today: "Hoje",
        clear: "Limpar",
        format: "dd/mm/yyyy",
        titleFormat: "MM yyyy",
        /* Leverages same syntax as 'format' */
        weekStart: 0
    };

    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //-------------
        //- BAR CHART -
        //-------------

        var barChartData = {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
            datasets: [{
                    label: 'Electronics',
                    fillColor: 'rgba(210, 214, 222, 1)',
                    strokeColor: 'rgba(210, 214, 222, 1)',
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55]
                },
                {
                    label: 'Digital Goods',
                    fillColor: 'rgba(60,141,188,0.9)',
                    strokeColor: 'rgba(60,141,188,0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27]
                }
            ]
        }

        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChart = new Chart(barChartCanvas)
        barChartData.datasets[1].fillColor = '#00a65a'
        barChartData.datasets[1].strokeColor = '#00a65a'
        barChartData.datasets[1].pointColor = '#00a65a'
        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        }

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)
    });

    //Date range picker
    $(function() {
        $('.daterange').daterangepicker({
            autoUpdateInput: false,
            locale: {
                applyLabel: 'Aplicar',
                cancelLabel: 'Limpar',
                format: "DD/MM/YYYY"
            }
        });

        $('.daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });

        $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        $(".ano_mes").datepicker({
            viewMode: 'years',
            format: 'mm-yyyy',
            startView: 'month',
            minViewMode: 'months'
        });
    });
</script>