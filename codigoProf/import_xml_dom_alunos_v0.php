<?php

	$doc = new DOMDocument();
	$doc->load( 'import_v2.xml' );
	if ($doc->hasChildNodes()){
	

		$nomeTabela = "";
		$comandoInsert = "";
		$values = "";
		$nomeColuna;
		$colunaValor;
		$contagem =0;
		$valorBuffer;
		$stringValores;


		//echo "---> path=" . $doc->getNodePath() . "<br>";
		$nodes = $doc->getElementsByTagName('*');
		foreach ($nodes as $node) {


			$level =  substr_count($node->getNodePath(), '/');
    		// echo "<font color='red'>level=</font>" .$level;
    		
			
			
    		// echo "<font color='red'>path=</font>" . $node->getNodePath() . "<font color='red'>nodeName=</font>" . $node->nodeName  . "<font color='red'>nodeValue=</font>" . $node->nodeValue . "<br><br>";

			// Contar cada caractere da string, para o nome da tabela :segunda barra;
			// 									para a coluna:			terceira barra
			
			// if ($level == 2) {

			// 	$nomeTabela = $node->nodeName;

			// 	echo "INSERT INTO $nomeTabela VALUES (\n";

			// }
			// else if ($level == 4) {
				
			// 	// $nomeColuna = $node->nodeName;
			// 	$colunaValor = $node->nodeValue;
			// 	$stringValores +=$colunaValor;
				

			// }
			// else if ($level == 1) {
			// 	echo "USE $node->nodeName;\n";
			// }


			if ($level == 1) {
				echo "USE $node->nodeName;<br>";
			}
			else if ($level == 3) {
				if (strlen($comandoInsert)==0){
					$nomeTabela = $node->nodeName;
					$comandoInsert= "INSERT INTO $nomeTabela (";
					$values = "VALUES (";
					} 
					else { 
						$tamanhoStr = strlen($values);
						$values[$tamanhoStr-2]=")";
						$comandoInsert[strlen($comandoInsert)-2]=")";
						echo $comandoInsert . $values . ";<br><br>";
					
					}
				}
			else if ($level ==4 ){
				// $colunaValor = $node->nodeValue;

				$comandoInsert .= " '$node->nodeName', ";

				$values .= " '$node->nodeValue', ";
			}

			

			// switch ($node->nodeName) {
			// 	case $level == 1:
			// 		 echo "USE $node->nodeName;\n";
				 

			// 	case $level == 3: 
			// 		if (strlen($comandoInsert)==0) {
						
			// 		$nomeTabela = $node->nodeName;
			// 		$comandoInsert= "INSERT INTO $nomeTabela (";
			// 		$values = " VALUES (";
			// 		} 
			// 		else { 
			// 			echo $comandoInsert . $values;
					
			// 		}
					

			// 	case $level == 4: 

			// 		$colunaValor = $node->nodeValue;
			// 		$comandoInsert .= " '$node->nodeName', ";

			// 		$values .= " '$node->nodeValue', ";
					
			// 		// $stringValores +="'$colunaValor,'";
			// 		break;		
			// }
			

			
    		
    		
		}
		
	}	
?>

