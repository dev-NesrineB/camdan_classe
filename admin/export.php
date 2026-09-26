<?php 
// Load the database configuration file 
include_once '../components/connect.php'; 
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('user_id', 'name', 'Number', 'address', 'total_products', 'total_price', 'placed_on', 'payment_status'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM orders ORDER BY id ASC"); 
if($query->rowCount() > 0){ 
    // Output each row of the data 
    $i=0;
    while($row = $query->fetch(PDO::FETCH_ASSOC)){ $i++;
    
        $lineData = array($row['user_id'], $row['name'],$row['number'] , $row['address'], $row['total_products'], $row['total_price'], $row['placed_on'], $row['payment_status']);
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;