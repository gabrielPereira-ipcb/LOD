<?php
    //Esta é uma cópia de outro arquivo que serve para exportar um arquivo XML.
    //  Mudar para XSD
	$doc = new DOMDocument();
	$doc->load( 'import_v4.xsd' );
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

