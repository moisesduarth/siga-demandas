<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('dateHuman')) {

	function dateHuman($datetime)
	{
		$datestring = '%d de %m de %Y';
		$time = $datetime != '' ? $datetime : date('YmdHis');
		return mdate($datestring, $time);
	}
}

if (!function_exists('nomeMes')) {

	function nomeMes($nrMes)
	{
		$meses = ['Janeiro', 'Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
		return $meses[(int)($nrMes)-1];
	}
}


if (!function_exists('padronizaData')) {

	/* Esta funcao servirá apenas para padronizar datas com / ao invés de - */

	function padronizaData($date)
	{
		return str_replace("-", "/", $date);
	}
}

if (!function_exists('formataData')) {

	/* Recebe uma data no formato YYYY/MM/DD ou yyyy/mm/dd e retorna no formato brasileiro dd/mm/YYYY */
	function formataData($date, $exibirDataHora = true)
	{

		$dh = explode(' ', padronizaData($date));
		$dx = explode('/', $dh[0]);

		$data = '';

		if (count($dx) > 1) {
			$data = $dx[2] . '/' . $dx[1] . '/' . $dx[0];
		}

		if (count($dh) > 1) {

			$hora = $dh[1];

			if ($exibirDataHora == true) {

				return $data . ' ' . $hora;
			} else {

				return $data;
			}
		}

		return $data;
	}
}

if (!function_exists('convertDateYmd')) {
	/*
		@param: String dateDMY
		@info: Recebe uma data no formato dd/mm/yyyy ou dd-mm-yyyy e retorna no formato yyyy/mm/dd
	*/
	function convertDateYmd($date, $separador = '/')
	{
		if ($date != '' && $date != '00/00/0000 00:00:00') {
			$dh = explode(' ', $date);
			$date = str_replace("-", "/", $dh[0]);
			$dx = explode("/", $date);
			$dt = $dx[2] . "/" . $dx[1] . "/" . $dx[0];
			return $dt;
		} else {
			return '';
		}
	}


	if (!function_exists('convertDateYmdHis')) {

		/*
		@param: String dateDMYHis
		@info: Recebe uma data no formato dd/mm/yyyy hh:ii:ss ou dd-mm-yyyy hh:ii:ss e retorna no formato yyyy/mm/dd HH:ii:ss
	*/
		function convertDateYmdHis($date)
		{
			if ($date != '' && $date != '00/00/0000 00:00:00') {
				$dh = explode(' ', $date);
				$date = str_replace("-", "/", $dh[0]);
				$dx = explode("/", $date);
				$dt = $dx[2] . "/" . $dx[1] . "/" . $dx[0];
				return $dt . ' ' . $dh[1];
			} else {
				throw new Exception('Data inválida');
			}
		}
	}

	if (!function_exists('adicionarDias')) {

		function adicionarDias($date, $dias)
		{
			return date('Y-m-d', strtotime($date . '+' . $dias . ' days'));
		}
	}


	if (!function_exists('removerDias')) {

		function removerDias($date, $dias)
		{
			return date('Y-m-d', strtotime($date . '-' . $dias . ' days'));
		}
	}


	if (!function_exists('diaMes')) {
		/*
			@param: String Y/m/d
			@info:  Deve receber uma data no formato Y/m/d e retornar no formato d/m 
		*/

		function diaMes($date)
		{

			if ($date != '' && $date != '00/00/0000' && $date != '0000/00/00') {
				$date = str_replace("-", "/", $date);
				$dx = explode("/", $date);
				$dt = $dx[2] . "/" . $dx[1];
				return $dt;
			} else {
				return '';
			}
		}
	}

	if (!function_exists('siglaDia')) {
		/*
			@param: String Y/m/d
			@info: Recebe uma data como string no formato Y/m/d e retorna a sigla equivalente ao dia
				ex: siglaDia('2018/04/23') deverá retornar 'Seg' que indica uma segunda-feira
		*/
		function siglaDia($date)
		{
			$nomeDia = date('D', strtotime($date));
			$nomeDia = strtolower($nomeDia);
			return lang($nomeDia); //Note que aqui faz-se uso do Helper de Idioma para traduzir a data
		}
	}


	if (!function_exists('nomeDia')) {

		/*
		@param: String Y/m/d
		@info: Recebe uma data como string no formato Y/m/d e retorna o nome completo do dia
		       ex: siglaDia('2018/04/23') deverá retornar 'Segunda'
	*/
		function nomeDia($date)
		{
			$nomeDia = date('D', strtotime($date));
			$nomeDia = strtolower($nomeDia);
			return lang($nomeDia);
		}
	}


	if (!function_exists('siglaMes')) {
		/*
		@param: String Y/m/d
		@info: Recebe uma data como string no formato Y/m/d e retorna a sigla equivalente ao mês
		       ex: siglaDia('2018/04/23') deverá retornar 'Abr' que indica o mês de Abril
	*/
		function siglaMes($date)
		{
			$nomeMes = date('M', strtotime($date));
			$nomeMes = strtolower($nomeMes);
			return lang($nomeMes);
		}
	}


	if (!function_exists('diferencaHora')) {

		function diferencaHora($data_inicio, $data_fim)
		{

			$data1 = new DateTime($data_inicio);
			$data2 = new DateTime($data_fim);

			$diff = $data1->diff($data2)->format("%d dia(s), %h hora(s), %i minuto(s) e %s segundo(s)");

			return $diff;
		}
	}


	if (!function_exists('diferencaEmHoras')) {

		function diferencaEmHoras($data_inicio, $data_fim)
		{

			$data1 = new DateTime($data_inicio);
			$data2 = new DateTime($data_fim);

			$diff_dias = $data1->diff($data2)->format("%d");
			$diff_horas = $data1->diff($data2)->format("%h");
			$diff_minutos = $data1->diff($data2)->format("%i");
			$diff_segundos = $data1->diff($data2)->format("%s");

			$diff = ($diff_dias * 24 * 60) + $diff_horas * 60 + $diff_minutos;
			$diff = $diff / 60;

			return $diff;
		}
	}

	function diferencaEmAnos($data_inicio, $data_fim) {

		$ano_inicial = substr($data_inicio,2,2);
		$ano_final = substr($data_fim,2,2);

		$diferenca = $ano_final - $ano_inicial;

		return $diferenca;
	}

	function diferencaEmMeses($data_inicio, $data_fim) {

		$data_inicial = new DateTime($data_inicio);
		$data_final = new DateTime($data_fim);

		$diferenca = $data_final->diff($data_inicial);

		return $diferenca->m;
	}


	if (!function_exists('dias_do_mes')) {
		function dias_do_mes($Mes, $Ano = '')
		{

			if ($Ano == '') $Ano = date('Y');

			$list = array();
			$month = $Mes;
			$year = $Ano;

			for ($d = 1; $d <= 31; $d++) {
				$time = mktime(12, 0, 0, $month, $d, $year);
				if (date('m', $time) == $month)
					$list[] = date('d/m/Y', $time);
			}

			return $list;
		}
	}


	if (!function_exists('eFimSemana')) {
		//Recebe uma data no formato Y/m/d e retorna true se a data for fim de semana (Sábado ou Domingo)
		function eFimSemana($Data)
		{

			$diaSemana = date('w', strtotime($Data));

			if ($diaSemana == 0 || $diaSemana == 6) {
				return true;
			}

			return false;
		}
	}

	function validateDateTimeFormat($dateTime) {
		var_dump($dateTime);
		$dateTime = str_replace('-','/', $dateTime);
		$format = 'Y/m/d H:i:s';
		$dateTimeObj = DateTime::createFromFormat($format, $dateTime);
		return $dateTimeObj && $dateTimeObj->format($format) === $dateTime;
	}
}
