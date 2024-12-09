<!-- Painel Administrativo -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Bem-vindo ao seu painel administrativo!
                </h3>
            </div>
            <div class="box-body">
                <!-- Contadores -->
                <div class="row">
                    <!-- Contador de Membros -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3><?= $total_membros; ?></h3>
                                <p>Total de Membros</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="<?= site_url('membros'); ?>" class="small-box-footer">Mais Detalhes <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Contador de Instituições -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?= $total_instituicoes; ?></h3>
                                <p>Total de Instituições</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-building"></i>
                            </div>
                            <a href="<?= site_url('instituicoes'); ?>" class="small-box-footer">Mais Detalhes <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Contador de Áreas -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?= $total_areas; ?></h3>
                                <p>Total de Áreas</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-map"></i>
                            </div>
                            <a href="<?= site_url('areas'); ?>" class="small-box-footer">Mais Detalhes <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Contador de Demandas Pendentes -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?= $demandas_pendentes; ?></h3>
                                <p>Demandas Pendentes</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-tasks"></i>
                            </div>
                            <a href="<?= site_url('demandas/pendentes'); ?>" class="small-box-footer">Mais Detalhes <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Gráficos -->
                <div class="row">
                    <!-- Demandas por Área (Gráfico de Pizza) -->
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Demandas por Área</h3>
                            </div>
                            <div class="box-body">
                                <canvas id="chart_demandas_area" style="height:230px"></canvas>
                                <!-- Legenda -->
                                <div id="legend_demandas_area"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Membros por Área (Gráfico de Pizza) -->
                    <div class="col-md-6">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Membros por Área</h3>
                            </div>
                            <div class="box-body">
                                <canvas id="chart_membros_area" style="height:230px"></canvas>
                                <!-- Legenda -->
                                <div id="legend_membros_area"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Demandas Encerradas com Sucesso vs. Sem Sucesso -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Demandas Encerradas com Sucesso vs. Sem Sucesso (Mês a Mês)</h3>
                            </div>
                            <div class="box-body">
                                <canvas id="chart_demandas_encerradas" style="height:230px"></canvas>
                                <!-- Legenda -->
                                <div id="legend_demandas_encerradas"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- fim da box-body -->
        </div> <!-- fim da box -->
    </div> <!-- fim da col-md-12 -->
</div> <!-- fim da row -->

<!-- Scripts -->
<script>
    // Carregar gráficos 
    // Carregar gráficos 
    document.addEventListener('DOMContentLoaded', function() {

        // Função para gerar cores aleatórias
        function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Função para inicializar o gráfico
        function initializeChart(canvasId, chartType, chartData, chartOptions) {
            var canvasElement = document.getElementById(canvasId);
            if (canvasElement) {
                var ctx = canvasElement.getContext('2d');
                new Chart(ctx, {
                    type: chartType.toLowerCase(),
                    data: chartData,
                    options: chartOptions
                });
            }
        }

        // Dados dinâmicos para Demandas por Área (Pie Chart)
        var labelsDemandasArea = [];
        var dataValuesDemandasArea = [];
        var backgroundColorsDemandasArea = [];

        <?php foreach ($data_demandas_area as $item): ?>
            labelsDemandasArea.push("<?= $item['area']; ?>");
            dataValuesDemandasArea.push(<?= $item['total']; ?>);
            backgroundColorsDemandasArea.push(getRandomColor());
        <?php endforeach; ?>

        var dataDemandasPorArea = {
            labels: labelsDemandasArea,
            datasets: [{
                data: dataValuesDemandasArea,
                backgroundColor: backgroundColorsDemandasArea
            }]
        };

        // Dados dinâmicos para Membros por Área (Pie Chart)
        var labelsMembrosArea = [];
        var dataValuesMembrosArea = [];
        var backgroundColorsMembrosArea = [];

        <?php foreach ($data_membros_area as $item): ?>
            labelsMembrosArea.push("<?= $item['area']; ?>");
            dataValuesMembrosArea.push(<?= $item['total']; ?>);
            backgroundColorsMembrosArea.push(getRandomColor());
        <?php endforeach; ?>

        var dataMembrosPorArea = {
            labels: labelsMembrosArea,
            datasets: [{
                data: dataValuesMembrosArea,
                backgroundColor: backgroundColorsMembrosArea
            }]
        };

        // Dados para Demandas Encerradas com Sucesso vs. Sem Sucesso (Bar Chart Empilhado)
        var labelsMeses = <?= json_encode($labels_meses); ?>;
        var dadosSucesso = <?= json_encode(array_values($dados_sucesso)); ?>;
        var dadosSemSucesso = <?= json_encode(array_values($dados_sem_sucesso)); ?>;

        var dataDemandasEncerradas = {
            labels: labelsMeses,
            datasets: [{
                    label: "Demandas Encerradas com Sucesso",
                    backgroundColor: "rgba(54,162,235,1)",
                    data: dadosSucesso
                },
                {
                    label: "Demandas Encerradas sem Sucesso",
                    backgroundColor: "rgba(255,99,132,1)",
                    data: dadosSemSucesso
                }
            ]
        };

        // Opções para os gráficos
        var chartOptionsPie = {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        };

        var chartOptionsStacked = {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        };

        // Inicializar gráficos com dados dinâmicos
        initializeChart('chart_demandas_area', 'pie', dataDemandasPorArea, chartOptionsPie);
        initializeChart('chart_membros_area', 'pie', dataMembrosPorArea, chartOptionsPie);
        initializeChart('chart_demandas_encerradas', 'bar', dataDemandasEncerradas, chartOptionsStacked);
    });
</script>