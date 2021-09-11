<?php

include_once 'db-config.php';

$api_url = 'http://universities.hipolabs.com/search?country=Canada';//canada end point - couldn't find USA data?? no results

// Read JSON file
$json_data = file_get_contents($api_url);


// Decode JSON data into PHP array
$response_data = json_decode($json_data,true);


//loop through array to insert into db

foreach($response_data as $university) { 
    $name = $university['name']; 
    $country = $university['country']; 
    $state_province = $university['state-province']; 
    $alpha_two_code = $university['alpha_two_code']; 

    
    echo"<br/>";
    echo $name." ".$country." ". $alpha_two_code;
    
    //insert into db
    
    $uid="";
    $uid=$crud->createUniversity($country,$state_province,$alpha_two_code,$name);
    
    echo"<br/>".$uid;


    //insert into domains use the last insert id to associate to the domains table
    
    $domains=array();
    $domains = $university['domains']; 
   
    $domainname="";
    foreach($domains as $domain) {
        $domainname = $domain; 
        echo"<br/>";
        echo $domainname;
        $crud->createUniversityDomain($uid,$domainname);
        
    }
    
    //insert into webpages use the last insert id to associate to the webpages table
    
    $web_pages=array();
    $web_pages = $university['web_pages']; 

    $url="";
    foreach($web_pages as $web_page) {
        $url = $web_page; 
        echo"<br/>";
        echo $url;
        $crud->createUniversityWebsite($uid,$url);
    }
    echo"<hr/><br/>";
        
}

?>