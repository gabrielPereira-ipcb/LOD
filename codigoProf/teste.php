<?php

	$doc = new DOMDocument();
	$doc->load( 'import_v2.xml' );
	if ($doc->hasChildNodes()){
	
		//echo "---> path=" . $doc->getNodePath() . "<br>";
		$nodes = $doc->getElementsByTagName('*');
		foreach ($nodes as $node) {

			

			$level =  substr_count($node->getNodePath(), '/');
    		echo "<font color='red'>level=</font>" .$level;
    		
			
			
    		echo "<font color='red'>path=</font>" . $node->getNodePath() . "<font color='red'>nodeName=</font>" . $node->nodeName  . "<font color='red'>nodeValue=</font>" . $node->nodeValue . "<br><br>";

			
    		
		}
		
	}	
?>

