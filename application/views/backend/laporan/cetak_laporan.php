<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Laporan');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

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

// set font
$pdf->SetFont('times');

// add a page
$pdf->AddPage();

$table1 = '<table border="0" width="650px">';
	$table1.='<tr> 
				<td style="font-family:sans-serif; text-align:center; font-size:18px; font-weight:bold;">Laporan Londri Online</td>
			</tr> <br>';

	$table1.='<tr> 
				<td style="font-family:sans-serif; text-align:center; font-size:12px;">
					Dari Tanggal '.mediumdate_indo($this->session->userdata('tanggal_mulai')).' Sampai Tanggal '.mediumdate_indo($this->session->userdata('tanggal_ahir')).'
				</td>
			</tr>';
$table1 .= '</table> <br><br>';

// ===========================================

$table2 = '<table border="1" width="650px">';
	$table2.='<tr style="background-color: #bdbcbb;"> 
				<td style="font-family:sans-serif; text-align:center; font-size:12px; font-weight:bold;">Tanggal Masuk</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px; font-weight:bold;">Kode Transaksi</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px; font-weight:bold;">Konsumen</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px; font-weight:bold;">Paket</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px; font-weight:bold;">Berat (KG)</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px; font-weight:bold;">Grand Total</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px; font-weight:bold;">Tanggal Ambil</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px; font-weight:bold;">Status</td>
			</tr>';

	foreach ($data as $row) {
		$table2.='<tr> 
				<td style="font-family:sans-serif; text-align:center; font-size:12px;">'.mediumdate_indo($row->tgl_masuk).'</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px;">'.$row->kode_transaksi.'</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px;">'.$row->nama_konsumen.'</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px;">'.$row->nama_paket.'</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px;">'.$row->berat.'</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px;">Rp. '.number_format($row->grand_total,0,'.','.').'</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px;">'.mediumdate_indo($row->tgl_ambil).'</td>
				<td style="font-family:sans-serif; text-align:center; font-size:12px;">'.$row->status.'</td>
			</tr>';
	}

$table2 .= '</table>';





$pdf->WriteHTMLCell(0,0,'', '', $table1, 0,1,0, true,'L',true);
$pdf->WriteHTMLCell(0,0,'', '', $table2, 0,1,0, true,'L',true);
// $pdf->WriteHTMLCell(0,0,'', '', $table3, 0,1,0, true,'L',true);
// $pdf->WriteHTMLCell(0,0,'', '', $table4, 0,1,0, true,'L',true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
