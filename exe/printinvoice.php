<?php
include("dbconnect.php");
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();


$print = '<h4 align="center">INROMASI INSTALASI FARMASI<br>PUSKESMAS SINGANDARU</h4>';
$print .= '<p style="font-size:12px;" align="center">Jl. Letnan Djidun No.4, Telp. (0254) 201775, Serang 42115</p><hr>';
$print .= '<table width="100%" style="font-size:12px; ">';
$print .= '<tbody>';
$print .= '<tr>';
$print .= '<td>NO. INVOICE</td><td>:</td><td>.....</td><td><b>Kepada Yth.</b></td>';
$print .= '</tr>';
$print .= '<tr>';
$print .= '<td>TANGGAL CETAK</td><td>:</td><td>'.date('d/M/Y').'</td><td>....</td>';
$print .= '</tr>';
$print .= '<tr>';
$print .= '<td></td><td></td><td></td><td>Penanggung : </td><td>BPJS</td>';
$print .= '</tr>';
$print .= '</tbody>';
$print .= '</table>';
$print .= '<table style="border-collapse: collapse; border: 1px solid black;" width="100%">';
$print .= '<thead align="center">';
$print .= '<tr>';
$print .= '<th>KODE</th><th>NAMA BARANG</th><th>BANYAKNYA</th><th>HARGA</th><th>SUBTOTAL</th>';
$print .= '</tr>';
$print .= '</thead>';
$print .= '<tbody>';
$print .= '<tr>';
$print .= '<td>.....</td><td>.....</td><td>.....</td><td>......</td><td>.......</td>';
$print .= '</tr>';
$print .= '</tbody>';
$print .= '</table>';
$print .= '<p align="right">Serang, '.date('d-m-Y').'</p>';

$print .= '<table width="100%" style="font-size:15px; ">';
$print .= '<tbody align="center">';
$print .= '<tr>';
$print .= '<td>KASIR</td><td>PASIEN</td>';
$print .= '</tr>';
$print .= '<tr>';
$print .= '<td><br><br><br>..........<br>[Tanda Tangan & Nama Jelas]</td><td><br><br><br>..........<br>[Tanda Tangan & Nama Jelas]</td>';
$print .= '</tr>';
$print .= '</tbody>';
$print .= '</table>'; 



$dompdf->loadHtml($print);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Invoice_Number_.pdf');
?>