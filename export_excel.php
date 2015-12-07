<?php
require_once 'PHPExcel.php';

$inputFileType = 'HTML';
$inputFileName = 'login2.html';
$outputFileType = 'Excel2007';
$outputFileName = 'myExcelFile.xlsx';

$objPHPExcelReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objPHPExcelReader->load($inputFileName);

$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,$outputFileType);
$objPHPExcel = $objPHPExcelWriter->save($outputFileName);

?>