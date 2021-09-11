<?php

class crud
{
 private $db;
 
 function __construct($DB_con)
 {
  $this->db = $DB_con;
 }
 
 public function createUniversity($country,$state_province,$alpha_two_code,$name)
 {
  try
  {
   $stmt = $this->db->prepare("INSERT INTO universities(country, state_province, alpha_two_code,name) VALUES(:country, :state_province, :alpha_two_code, :name)");
   $stmt->bindparam(":country",$country, PDO::PARAM_STR);
   $stmt->bindparam(":state_province",$state_province, PDO::PARAM_STR);
   $stmt->bindparam(":alpha_two_code",$alpha_two_code, PDO::PARAM_STR);
   $stmt->bindparam(":name",$name, PDO::PARAM_STR);
   $stmt->execute();
   return $this->db->lastInsertId(); // return the last insert id to use for domains and websites
   
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }
    
 public function createUniversityDomain($uid,$domain)
 {
  try
  {
   $stmt = $this->db->prepare("INSERT INTO domains(uid, domain) VALUES(:uid, :domain)");
   $stmt->bindparam(":uid",$uid, PDO::PARAM_INT);
   $stmt->bindparam(":domain",$domain, PDO::PARAM_STR);
   $stmt->execute();
   return $this->db->lastInsertId(); // return the last insert id 
   
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }
    
 public function createUniversityWebsite($uid,$url)
 {
  try
  {
   $stmt = $this->db->prepare("INSERT INTO web_pages(uid, url) VALUES(:uid, :url)");
   $stmt->bindparam(":uid",$uid, PDO::PARAM_INT);
   $stmt->bindparam(":url",$url, PDO::PARAM_STR);
   $stmt->execute();
   return $this->db->lastInsertId(); // return the last insert id 
   
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }
 
 public function getUniversities()
 {
 
     
    $sql="SELECT id,country, state_province, alpha_two_code,name from universities";
	
	$stmt = $this->db->prepare($sql);
	
	$stmt->execute(); 
	
	# setting the fetch mode
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	
	$i=0;
	$arrResults = array();
	//Check for at least 1 record
	while($row = $stmt->fetch()){		
		$arrResults[$i]['id'] =$row['id'];
		$arrResults[$i]['country'] =$row['country'];
		$arrResults[$i]['state_province'] =$row['state_province'];
		$arrResults[$i]['alpha_two_code'] =$row['alpha_two_code'];
		$arrResults[$i]['name'] =$row['name'];
		$i=$i+1;	
		
	}
	
	return $arrResults;
  
 }
    
public function getUniversityDomains($uid)
 {
  $sql="SELECT id,uid, domain from domains where uid=:uid";
	
	$stmt = $this->db->prepare($sql);
	
	$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
	$stmt->execute(); 
	
	# setting the fetch mode
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	
	$i=0;
	$arrResults = array();
	//Check for at least 1 record
	while($row = $stmt->fetch()){		
		$arrResults[$i]['id'] =$row['id'];
		$arrResults[$i]['uid'] =$row['uid'];
		$arrResults[$i]['domain'] =$row['domain'];
		$i=$i+1;	
		
	}
	
	return $arrResults;
 }
    
 public function getUniversityWebsites($uid)
 {
  $sql="SELECT id,uid, url from web_pages where uid=:uid";
	
	$stmt = $this->db->prepare($sql);
	
	$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
	$stmt->execute(); 
	
	# setting the fetch mode
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	
	$i=0;
	$arrResults = array();
	//Check for at least 1 record
	while($row = $stmt->fetch()){		
		$arrResults[$i]['id'] =$row['id'];
		$arrResults[$i]['uid'] =$row['uid'];
		$arrResults[$i]['url'] =$row['url'];
		$i=$i+1;	
		
	}
	
	return $arrResults;
 }
 
 
 
 
}