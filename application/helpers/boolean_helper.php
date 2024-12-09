<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertDateBr'))
{
	/*
	@param: String or Null
	@info: Recebe uma string "on" ou "off" e retorna 1 ou 0
	*/
	function convertSwitch($value)
	{
		if ($value == null) {
			return 0;
		} else if ($value = 'on') {
			return 1;
		} else if ($value = 'off') {
			return 0;
		}
	}
}