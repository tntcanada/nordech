<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php

include_once 'db-config.php';

$arrUn=array();
$arrUn=$crud->getUniversities();

if(count($arrUn)){

$dspListings="";	
	for($i=0;$i<count($arrUn);$i++){
		
		$id="";
		$id=$arrUn[$i]['id'];
		
		$country="";
		$country=$arrUn[$i]['country'];
		
		$state_province="";
		$state_province=$arrUn[$i]['state_province'];
		
		
		$alpha_two_code="";
		$alpha_two_code=$arrUn[$i]['alpha_two_code'];
        
        $name="";
		$name=$arrUn[$i]['name'];
        
        $arrUnDoms=array();
        $arrUnDoms=$crud->getUniversityDomains($id);
        $dspDomain="";
        $classMulti="";
        
		if(count($arrUnDoms)){
            if(count($arrUnDoms)>1){
                $classMulti="panel-success"; //highlight this item
            }
            for($ii=0;$ii<count($arrUnDoms);$ii++){
		
		      $domain="";
		      $domain=$arrUnDoms[$ii]['domain'];
              $dspDomain.="<p><strong>Domain:</strong> $domain</p>";
            }
            
        }
        
        $arrUnWeb=array();
        $arrUnWeb=$crud->getUniversityWebsites($id);
        $dspURL="";
        
		if(count($arrUnWeb)){
            for($iii=0;$iii<count($arrUnWeb);$iii++){
		
		      $url="";
		      $url=$arrUnWeb[$iii]['url'];
              $dspURL.="<p><strong>URL:</strong> $url</p>";
            }
            
        }
	
	
	
        $dspListings.="<div class='panel panel-default $classMulti'>
            <div class='panel-heading'>
            <h3 class='panel-title'>$name</h3>
            </div>
            <div class='panel-body'>
            <p><strong>Contry:</strong> $country</p>
            <p><strong>Abbr:</strong> $alpha_two_code</p>
            $dspDomain
            $dspURL
            </div>
		</div>";
	}
	
}else{
	$dspListings="<p>There are currently no Universites Imported.</p><br clear='all'/>";
}

echo $dspListings;
?>

