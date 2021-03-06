<?php

function mssql_connect($db_server, $db_user, $db_pass) {
    global $link,$db_server,$db_user,$db_pass;

    $connectionOptions = array(
        "Database" => "xx",
        "Uid" => $db_user,
        "PWD" => $db_pass,        
        "TraceOn"=>"0",
        "CharacterSet" =>"UTF-8",
        "ConnectionPooling" => "1",
        'MultipleActiveResultSets'=>false
        );    
    //Establishes the connection
    $link = sqlsrv_connect($db_server, $connectionOptions);
    if( $link === false ) {    
    }else{
        return $link;
    }
}

function mssql_select_db($db_database, $link){
    return true;
}

function mssql_query($query, $link = 0){    
    global $db_server,$db_user,$db_pass,$link;

    if($link == 0){
        $link = mssql_connect($db_server, $db_user, $db_pass);        
    }
  
    $r = sqlsrv_query($link, $query,array(), array( "Scrollable" => 'buffered' ));        
    return $r;   
}

function mssql_num_rows($r){
    //return number of rows
    return sqlsrv_num_rows($r);
}

function mssql_fetch_object($r){
    //return objects
    return sqlsrv_fetch_object($r);
}
function mssql_close(){
    return true;
}

function mssql_fetch_array($r){    
    //return array
    return sqlsrv_fetch_array($r);
}

?>
