<?php 
///////////////////////////////// 

$SQL_USER='root'; 
$SQL_PWD=''; 
$SQL_DB='depa_system_new'; 
//////////////////////////////// 

$table = 'tire_reg_main';// table name 
$Field = 'reg_num';// field name 
$LIMIT = '10';// number of results 
/////////////////////////////// 


    $db = new mysqli('localhost', $SQL_USER ,$SQL_PWD, $SQL_DB); 
    if(!$db) { 
        echo 'error with connect to database'; 
    } else { 
        if(isset($_POST['queryString'])) { 
            $queryString = $db->real_escape_string($_POST['queryString']); 
            if(mb_strlen($queryString) > 2) { 
                $query = $db->query("SELECT $Field FROM $table WHERE $Field LIKE '%$queryString%' LIMIT $LIMIT"); 
                if($query) { 
                    while ($result = $query ->fetch_object()) { 
                         echo '<li onClick="fill(\''.$result->$Field.'\');">'.$result->$Field.'</li>'; 
                     } 
                } else { 
                   //    echo 'error'; 
                } 
            } else { 
            } 
        } else { 
            exit(); 
        } 
    } 
?>