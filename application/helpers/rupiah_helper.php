<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if ( ! function_exists('rupiah'))
{
	function rupiah($harga)
	{
		return "Rp " . number_format($harga , 0 , ',' , '.' );
	}
}