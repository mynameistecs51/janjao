<?php

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('รายชื่อ นักศึกษา');
$pdf->SetTitle('รายชื่อ นักศึกษา');
$pdf->SetSubject('รายชื่อ นักศึกษา');
$pdf->SetKeywords('รายชื่อ นักศึกษา');

/*
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 046', PDF_HEADER_STRING);
*/
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setPrintHeader(false);
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// $pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------


// add a page
$pdf->AddPage();
// set font

// $pdf->AddFont(''thsarabunnew','',''thsarabunnew.php');
// $pdf->SetFont(''thsarabunnew','',13);
$pdf->AddFont('thsarabun','','thsarabun.php');
$pdf->SetFont('thsarabun','',12,true);

$pdf->Ln(1);  //ความก้างของบรรทัด


// ob_start();

			// HTML text with soft hyphens (&shy;)

// $couse = "";

$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
// --------------------------------//

$html = '
<table id="fairlist" class="table table-striped table-bordered" cellspacing="0" width="100%" border="1" >
	<thead style="background:#BDBDBD;font-size: 12px; ">
		<tr>
			<th style="text-align: center;width: 40px;">No.</th>
			<th style="text-align: center;width:  100px;">BOOKED NUMBER</th>
			<th style="text-align: center;width:  150px;">NAME </th>
			<th style="text-align: center;width:  80px;">ROOM</th>
			<th style="text-align: center;width:  100px;">BOOKED DATE</th>
			<th style="text-align: center;width:  100px;">CHECKIN DATE</th>
			<th style="text-align: center;width:  80px;"> CREATE BY</th>
		</tr>
	</thead>
	<tbody>	';
		$i=1;
		if(count($getBooked)>0) {
			foreach ($getBooked as $key => $rowbooked) :
				$numRoom = count($rowbooked['selectRoom']);
			$html .='	<tr id="row">';
			$html .='<td style="text-align: center;width: 40px;">'.$i++.'</td>';
			$html .='<td style="text-align: center;width:  100px;">'.$rowbooked['bookedCode'].'</td>';
			$html .='<td style="text-align: center;width:  150px;">'.$rowbooked['firstName']." ".$rowbooked['lastName']." ( ".$rowbooked['mobile']." )".'</td>';
			$html .='<td style="text-align: center;width:  100px;">';
			for($j=0;$j < $numRoom; $j++)
			{
				$html .= 'Room '.$rowbooked['selectRoom'][$j]['roomID'];
			}
			$html .='</td>';
			$html .='<td style="text-align: center;width:  100px;">'.$rowbooked['bookedDate'].'</td>';
			$html .='<td style="text-align: center;width:  100px;">'.$rowbooked['checkInAppointDate'].'</td>';
			$html .='<td style="text-align: center;width:  80px;">'.$rowbooked['updateBY'].'</td>';
			$html .='</tr>';
			endforeach;
		}else{
			$html .='<tr>';
			$html .='<td colspan="8">No Booked Data !</td>';
			$html .='</tr>';
		}
		$html .='
	</tbody>
</table>
';
			// $pdf->AddFont('THSarabun','','THSarabun.php');
			// $pdf->SetFont('THSarabun','',14);
			// $pdf->SetDrawColor(255,0,0);
			// $pdf->SetTextColor(0,63,300);

			// print a cell
			// สร้างเนื้อหาจาก  HTML code
			// $pdf->writeHTML($html, true, 0, true, 0);
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('student request.pdf','I');
			// ---------------------------------------------------------

			//Close and output PDF document

			//$pdf->Output('register_success.pdf','I');	//load document แสดง pdf

			//============================================================+
			// END OF FILE
			//============================================================+
			//======= SEND EMAIL ==========\\
			//$pdf->Output("folder/filename.pdf", "F"); //save the pdf to a folder


			//header('Content-type: application/pdf');
?>
