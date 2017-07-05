<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once './src/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
	function __construct()
	{
		parent::__construct();
	}
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */