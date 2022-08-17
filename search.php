<?php
$customer[] = "Adam";
$customer[] = "Andrzej";
$customer[] = "Alfons";
$customer[] = "Marek";
$customer[] = "Marcin";
$customer[] = "Maciej";
$customer[] = "Sonia";
$customer[] = "Beata";
$customer[] = "Jadwiga";
$customer[] = "Katarzyna";
$customer[] = "Mariusz";
$customer[] = "Sabina";
$customer[] = "Sylwia";
$customer[] = "Anastazja";
$customer[] = "Alfred";

$response = '';
$query = htmlspecialchars(trim($_REQUEST['query'])); // $_REQUEST - query could be send by GET or POST method

if ($query !== '') {

    $query = strtolower($query); 
    $query_len = strlen($query); 

    foreach($customer as $data) { // loop through $customer array
        
        // part of data from string begining & with lenght equal to current query
        $data_portion = substr($data, 0, $query_len);
        
        if(stristr($query, $data_portion)) { // if string $data_portion is present in string $query
            
            if($response === '') { 
                
                $response = $data;

            } else { // if $response is not empty, add next values from loop
                
                $response .= ", " . $data;
            }
        }
    }
}

// returning variable with data
echo $response === '' ? "brak danych" : $response;

?>