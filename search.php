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
$query = htmlspecialchars(trim($_REQUEST['query'])); // $_REQUEST - zapytanie może być przekazane metodą GET i POST

if ($query !== '') {

    $query = strtolower($query); // zamiana na małe znaki
    $query_len = strlen($query); // ilość znaków zapytania q

    foreach($customer as $data) { // pętla - dla każdego wpisu z tablicy
        
        //fragment danych od początku ciągu o długości takiej jak bieżące zapytanie q
        $data_portion = substr($data, 0, $query_len);
        
        if(stristr($query, $data_portion)) { // jeśli występuje ciąg $data_portion w ciągu $query wykonuj dalej
            
            if($response === '') { // jeśli $response była wcześniej pusta to wpisz dane wiersza
                
                $response = $data;

            } else { // jeśli w $response są już jakieś dane, to dpoisz kolejne po przecinku
                
                $response .= ", " . $data;
            
            }
        }
    }
}

// zwracanie zmiennej z danymi
echo $response === '' ? "brak danych" : $response;

?>