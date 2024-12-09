<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('campo'))
{
	/*
	@param: Int|Float|Real, Int
	@info: Recebe um nome de campo parecido com ID_Alguma_Coisa re torna "Alguma Coisa" para tornar labels mais amigáveis
	*/
	function campo($nome_campo)
	{
		$string = str_replace('ID','',str_replace('_',' ',$nome_campo));
		$string = str_replace('DATE FORMAT(Data Envio,"%Y")','Ano', $string);
		$string = str_replace('DATE FORMAT(Data Inicio,"%Y")','Ano', $string);
		$string = str_replace('DATE FORMAT(Data Envio,"%m")','Mês', $string);
		$string = str_replace('DATE FORMAT(Data Inicio,"%m")','Mês', $string);
		$string = str_replace('posto.','', $string);
		$string = str_replace('tipo parada.','', $string);
		return $string;
	}
}

if (!function_exists('telefone'))
{
		
	/**
	 * Recebe um número no formato 5592984399480 e retorna 55 (92) 98439-9480
	 */
	function telefone($numerointeiro) {

		$numeroComCodPais = sprintf("+%s (%s) %s-%s",
				substr($numerointeiro, 0, 2),
				substr($numerointeiro, 2, 2),
				substr($numerointeiro, 4, 5),
				substr($numerointeiro, 9, 4));
		
		$numeroSemCodPais = sprintf("(%s) %s-%s",
				substr($numerointeiro, 0, 2),
				substr($numerointeiro, 2, 5),
				substr($numerointeiro, 7, 4));

		return strlen($numerointeiro) > 11 ? $numeroComCodPais : $numeroSemCodPais;

	}

}