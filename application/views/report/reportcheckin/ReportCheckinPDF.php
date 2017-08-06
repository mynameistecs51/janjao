<?php

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ReportCheckin');
$pdf->SetTitle('ReportCheckin');
$pdf->SetSubject('ReportCheckin');
$pdf->SetKeywords('ReportCheckin');

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


// add a page กระดาษแนวนอน
$pdf->AddPage('L', 'A4');
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
<caption> <h3><b>รายงานยอดการเข้าพัก (จันทร์เจ้าโฮเทล)'.$keyword.'</b></h3></caption>
<table id="fairlist" class="table table-striped table-bordered" cellspacing="0" width="100%" border="1" >
	<thead style="background:#BDBDBD;font-size: 12px; ">
		<tr>
			<th style="text-align: center;width: 20px;"> No. </th>
			<th style="text-align: center;width: 80px;"> BOOKED No. </th>
			<th style="text-align: center;width: 100px;"> NAME  </th>
			<th style="text-align: center;width: 50px;"> ROOM </th>
			<th style="text-align: center;width: 80px;"> CHECKIN DATE </th>
			<th style="text-align: center;width: 80px;"> CHECKOUT DATE </th>
			<th style="text-align: center;width: 80px;"> UPDATE DTATE </th>
			<th style="text-align: center;width: 80px;"> STATUS </th>
			<th style="text-align: center;width: 90px;"> CASH PLEDGE </th>
			<th style="text-align: center;width: 90px;"> RETES ROOM </th>
			<th style="text-align: center;width: 90px;"> SERVICE </th>
			<th style="text-align: center;width: 90px;"> DISCOUNT </th>
			<th style="text-align: center;width: 80px;"> # </th>
		</tr>
	</thead>
	<tbody>';

		$sumAll = array(); $roomAll = array(); $sumPledge = array(); $sumRetes = array(); $sumService = array(); $sumDiscount = array();
		$j=1;
		if(count($repCheckout)>0) {
			foreach ($repCheckout as $key => $report) {
				$mobile = (empty($report['mobile']))?"" : "( ".$report['mobile'].")";
				$sum = (empty($report['sumtotal']))?$report['totalLast'] :  $report['totalLast'] + ($report['sumtotal'] - $report['cashPledge']) ;
				$numRoom = count($report['selectRoom']);
				$html .= '<tr>';
				$html .='<td style="text-align: center;width: 20px;">'.$j++.'</td>';
				$html .='<td style="text-align: center;width:  80px;">'.$report['bookedCode'] .'</td>';
				$html .='<td style="text-align: center;width: 100px;">'.$report['firstName']." ".$report['lastName'].$mobile.'</td>';
				$html .='<td style="text-align: center;width:  50px;display:block;">';
				for($i=0;$i < $numRoom; $i++)
				{
					$html .= "<u>".$report['selectRoom'][$i]['roomID'].'</u>, &nbsp;';
					array_push($roomAll,$report['selectRoom'][$i]['roomID']);
				}
				$html .='</td>';
				// date checkin
				$dateIn = explode('/',$report['checkinDate']); $yearIn = explode(" ",$dateIn[2]);
				$html .='<td style="text-align: center;width:  80px;">'.$dateIn[0]."/".$dateIn[1]."/".($yearIn[0]+543).'</td>';

				// date checkout
				$dateOut = explode('/',$report['checkoutDate']); $yearYear = explode(" ",$dateOut[2]);
				$html .='<td style="text-align: center;width:  80px;">'.$dateOut[0]."/".$dateOut[1]."/".($yearYear[0]+543).'</td>';

				//date update
				$dateUpdate = explode('-',$report['updateDT']); $yearCreate = explode(" ",$dateUpdate[2]);
				$html .='<td style="text-align: center;width:  80px;">'.$yearCreate[0]."/".$dateUpdate[1]."/".($dateUpdate[0]+543)." <br> เวลา ".date_format(date_create($yearCreate[1]),"H:i").'</td>';

				// status
				$html .='<td style="text-align: center;width:  80px;">' .$report['status']."<br> BY ".$report['updateBY'].'</td>';

				// มัดจำ
				$pledge = ($report['status'] == 'CHECKOUT')? 0.00 :$report['cashPledge'];
				array_push($sumPledge, $pledge);
				$html .='<td style="text-align: center;width:  90px;">'.	number_format($pledge,2).'</td>';

				//ค่าห้อง
				$retes = ($report['totalLast'] == 0.00)? 0.00 : ($report['totalLast'] - $report['cashPledge']);
				array_push($sumRetes, $a = ($retes == 0.00)? 0.00 :$report['totalLast'] - $report['cashPledge']);
				$html .='<td style="text-align: center;width:  90px;">'.	number_format($retes,2).'</td>';

				//service
				$service = $report['sumtotal'];
				array_push($sumService,$report['sumtotal']);
				$html .='<td style="text-align: center;width:  90px;">'.	number_format($service,2).'</td>';

				//มัดจำ
				$discount = (empty($report['discount']))?0.00 : $report['discount'];
				array_push($sumDiscount, $discount);
				$html .='<td style="text-align: center;width:  90px;">'.	number_format($discount,2).'</td>';

				//รวม
				$sum = (empty($report['sumtotal']))?$report['totalLast'] :  $report['totalLast'] + ($report['sumtotal'] - $report['cashPledge']) - $discount ;
				array_push($sumAll, $sum);
				$html .='<td style="text-align: center;width:  80px;">'.number_format($sum,2).' บาท</td>';

				$html .= '</tr>';

			}

			$html .= '<tr>';
			$html .= '<td colspan="3">';
			$html .= '	</td>';
			$html .= '	<td align="center"> <b>'. count($roomAll).' ห้อง</b>';
			$html .= '</td>';
			$html .= '<td colspan="4">';
			$html .= '</td>';
			$html .= '<td align="center">'. number_format(array_sum($sumPledge),2).' บาท</td>';
			$html .= '<td align="center">'. number_format(array_sum($sumRetes),2).'  บาท</td>';
			$html .= '	<td align="center">'. number_format(array_sum($sumService),2).'  บาท </td>';
			$html .= '	<td align="center">'. number_format(array_sum($sumDiscount),2).'  บาท </td>';
			$html .= '	<td align="center">	<b> '. number_format(array_sum($sumAll),2).'  บาท</b>	</td>';
			$html .= '</tr>';
		}else{
			$html .= '<tr>';
			$html .= '<td colspan="13">No Booked And Checkin Data !</td>';
			$html .= '</tr>';
		}
		$html .='
	</tbody>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('ReportCheckin.pdf','I');
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
