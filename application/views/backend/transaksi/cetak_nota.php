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
$pdf->SetTitle('Invoice');
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
				<td width="500" style="font-family:sans-serif; font-size:18px; font-weight:bold;">Londri Online</td>
				<td style="font-family:sans-serif; font-size:18px; font-weight:bold;">Invoice</td>
			</tr><br>';
	$table1.='<tr> 
				<td style="font-family:sans-serif; font-size:12px;">Banjarbendo</td>
			</tr>';
	$table1.='<tr> 
				<td style="font-family:sans-serif; font-size:12px;">Telpon: 087 xxx xxx xxx</td>
			</tr>';
	$table1.='<tr> 
				<td style="font-family:sans-serif; font-size:12px;">Email: londrionline@email.com</td>
			</tr>';
$table1 .= '</table> <br> <hr> <br/>';

// =======================================================

$table2 = '<table border="0" width="650px">';
	$table2.='<tr> 
				<td width="80" style="font-family:sans-serif; font-weight:bold; font-size:12px;">Customer</td>
				<td width="380" style="font-family:sans-serif; font-size:12px;">'.$data['nama_konsumen'].'</td>

				<td width="110" style="font-family:sans-serif; font-weight:bold; font-size:12px;">Kode Transaksi</td>
				<td style="font-family:sans-serif; font-size:12px;">'.$data['kode_transaksi'].'</td>
			</tr>';
	$table2.='<tr> 
				<td width="80" style="font-family:sans-serif; font-weight:bold; font-size:12px;"></td>
				<td style="font-family:sans-serif; font-size:12px;">'.$data['alamat_konsumen'].'</td>
			
				<td width="110" style="font-family:sans-serif; font-weight:bold; font-size:12px;">Tanggal Masuk</td>
				<td style="font-family:sans-serif; font-size:12px;">'.mediumdate_indo($data['tgl_masuk']).'</td>
			</tr>';
	$table2.='<tr> 
				<td width="80" style="font-family:sans-serif; font-weight:bold; font-size:12px;"></td>
				<td style="font-family:sans-serif; font-size:12px;">'.$data['no_hp'].'</td>
			
				<td width="110" style="font-family:sans-serif; font-weight:bold; font-size:12px;">Tanggal Masuk</td>
				<td style="font-family:sans-serif; font-size:12px;">'.mediumdate_indo($data['tgl_masuk']).'</td>
			</tr>';
$table2 .= '</table> <br><br><br>';

// ========================================

$table3 = '<table border="1" cellpadding="5" width="650px">';
	$table3.='<tr> 
				<td height="20" style="font-family:sans-serif; font-size:12px; text-align:center; font-weight:bold;">Paket Londri</td>
				<td style="font-family:sans-serif; font-size:12px; text-align:center; font-weight:bold;">Berat /KG</td>
				<td style="font-family:sans-serif; font-size:12px; text-align:center; font-weight:bold;">Harga</td>
				<td style="font-family:sans-serif; font-size:12px; text-align:center; font-weight:bold;">Sub Total</td>
			</tr>';

	$table3.='<tr> 
				<td height="20" style="font-family:sans-serif; font-size:12px;">'.$data['nama_paket'].'</td>
				<td style="font-family:sans-serif; font-size:12px;">'.$data['berat'].'</td>
				<td style="font-family:sans-serif; font-size:12px;">Rp. '.number_format($data['harga_paket'],0,'.','.').'</td>
				<td style="font-family:sans-serif; font-size:12px;">Rp. '.number_format($data['berat'] * $data['harga_paket'],0,'.','.').'</td>
			</tr>';

	$table3.='<tr> 
				<td colspan="3" height="20" style="font-family:sans-serif; text-align:right; font-weight:bold; font-size:12px;">Total</td>
				<td style="font-family:sans-serif; font-size:12px; font-weight:bold;">Rp. '.number_format($data['berat'] * $data['harga_paket'],0,'.','.').'</td>
			</tr>';
	
$table3 .= '</table> <br><br>';

// ==========================================

$table4 = '<table border="0" cellpadding="3" width="650px">';
	$table4.='<tr> 
				<td height="20" style="font-family:sans-serif; font-size:12px; font-weight:bold;">Keterangan</td>
			</tr>';

	$table4.='<tr> 
				<td height="15" style="font-family:sans-serif; font-size:12px;">1. Pengambilan cucian harus membawa nota</td>
			</tr>';
	$table4.='<tr> 
				<td height="15" style="font-family:sans-serif; font-size:12px;">2. Cuci luntur bukan tanggung jawab kami</td>
			</tr>';
	$table4.='<tr> 
				<td height="15" style="font-family:sans-serif; font-size:12px;">3. Hitung dan periksa sebelum pergi</td>
			</tr>';
	$table4.='<tr> 
				<td height="15" style="font-family:sans-serif; font-size:12px;">4. Klaim kekurangan/kehilangan cucian setelah meninggalkan londri tidak dilayani</td>
			</tr>';
	
	
$table4 .= '</table>';



$pdf->WriteHTMLCell(0,0,'', '', $table1, 0,1,0, true,'L',true);
$pdf->WriteHTMLCell(0,0,'', '', $table2, 0,1,0, true,'L',true);
$pdf->WriteHTMLCell(0,0,'', '', $table3, 0,1,0, true,'L',true);
$pdf->WriteHTMLCell(0,0,'', '', $table4, 0,1,0, true,'L',true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
