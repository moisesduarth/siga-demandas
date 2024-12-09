
<!-- jQuery 2.2.3 -->
<script src="<?php echo site_url('resources/js/jquery.min.js');?>"></script>
 
<script src="<?php echo site_url('resources/js/select2.full.min.js');?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url('resources/js/demo.js');?>"></script>
<!-- Moment (required by DatePicker) -->
<script src="<?php echo site_url('resources/js/moment.js');?>"></script>

<script src="<?php echo site_url('resources/js/moment-with-locales.js');?>"></script>
<!-- DatePicker -->
<script src="<?php echo site_url('resources/js/bootstrap-datepicker.min.js');?>"></script>
<!-- TimePicker -->
<script src="<?php echo site_url('resources/js/bootstrap-timepicker.min.js');?>"></script>
<!-- DateTimePicker -->
<script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>

<script src="<?php echo site_url('resources/js/global.js');?>"></script>

<script src="<?php echo site_url('resources/js/Chart.js');?>"></script>

<script src="<?php echo site_url('resources/js/jquery.dataTables.min.js');?>"></script>

<script src="<?php echo site_url('resources/js/dataTables.bootstrap.min.js');?>"></script>

<script src="<?php echo site_url('resources/js/multiselect.min.js');?>"></script>

<script src="<?php echo site_url('resources/js/ion.rangeSlider.js');?>"></script>

<script src="<?php echo site_url('resources/js/gbr.js');?>"></script>

<script src="<?php echo site_url('resources/js/jsfx.js');?>"></script>

<script src="<?php echo site_url('resources/js/xlsx.core.min.js');?>"></script>

<script src="<?php echo site_url('resources/js/Blob.min.js');?>"></script>

<script src="<?php echo site_url('resources/js/FileSaver.min.js');?>"></script>

<script src="<?php echo site_url('resources/js/tableexport.min.js');?>"></script>

<script src="<?php echo site_url('resources/js/daterangepicker.js');?>"></script>

<script>

	/* Script utilizado para controlar as abas de Lista Técnica e Roteiro nas views do produto */

 	function changetab(pagina, id) {
 		
 		if (pagina == 'lista_tecnica') {
			$("#lista_tecnica").load("<?php echo base_url('lista_tecnica/tab/');?>"+id);
			$('.nav-tabs a:last').tab('show'); 
		} else {
			$("#roteiro").load("<?php echo base_url('roteiro/tab/');?>"+id);
			$('.nav-tabs a:first').tab('show'); 
		}
	}

	/* Script utilizado para gerenciar o upload da foto nas views do produto */

	function preg_quote( str ) {
	    return (str+'').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g, "\\$1");
	}

	document.addEventListener( 'DOMContentLoaded',

		function () {

			$('#arquivo_imagem').on('change', function(e) {
				e.preventDefault();
				if ($('#arquivo_imagem').val() == '')
				{
					alert("Favor selecionar um arquivo");
				}
				else 
				{
					$.ajax({
						url: "<?php echo base_url();?>funcao/ajax_upload",
						method: "POST",
						data: new FormData(document.getElementById('form_produto')),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							$('#div_foto').html(data);
						},
						error: function(data) {
							alert("Erro ao enviar arquivo!");
						}
					});
				}
			});

			
			$('[data-toggle="tabajax"]').click(function(e) {
		
			    var $this = $(this),
			        loadurl = $this.attr('href'),
			        targ = $this.attr('data-target');

			    if (targ == "#lista_tecnica") {
			    	loadurl = loadurl + document.getElementById("ID_Lista_Tecnica").value;
			    } else {
					loadurl = loadurl + document.getElementById("ID_Roteiro").value;
			    }

			    
			    $.get(loadurl, function(data) {
			        $(targ).html(data);
			    });
				
			    $this.tab('show');
			    return false;
			});
		
			//Tooltip como imagem
			$('a[data-toggle="tooltip"]').tooltip({
				animated: 'fade',
				placement: 'bottom',
				html: true
			});
		
			$(document).on('hidden.bs.modal', '.modal', function () {
			  var modalData = $(this).data('bs.modal');

			  // Destroy modal if has remote source – don't want to destroy modals with static content.
			  if (modalData && modalData.options.remote) {
				// Destroy component. Next time new component is created and loads fresh content
				$(this).removeData('bs.modal');
				// Also clear loaded content, otherwise it would flash before new one is loaded.
				$(this).find(".modal-content").empty();
			  }
			});
		
			
			$('.btn-exportar-tabela').click(function(e) {
				fnExcelReport();
			});

			//Todos os alerts fecham automaticamente em 3 segundos
			window.setTimeout(function() {
			    $(".alert").fadeTo(500, 0).slideUp(500, function(){
			        $(this).remove(); 
			    });
			}, 3000);

		}, false );

</script>