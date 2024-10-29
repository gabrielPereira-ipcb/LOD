<?php

	$doc = new DOMDocument();
	$doc->load( 'import_v2.xml' );
	if ($doc->hasChildNodes()){
	
		//echo "---> path=" . $doc->getNodePath() . "<br>";
		$nodes = $doc->getElementsByTagName('*');
		foreach ($nodes as $node) {

			$nomeTabela;
			$nomeColuna;
			$colunaValor;
			$contagem =0;
			$valorBuffer;
			$stringValores;

			$level =  substr_count($node->getNodePath(), '/');
    		// echo "<font color='red'>level=</font>" .$level;
    		
			
			
    		// echo "<font color='red'>path=</font>" . $node->getNodePath() . "<font color='red'>nodeName=</font>" . $node->nodeName  . "<font color='red'>nodeValue=</font>" . $node->nodeValue . "<br><br>";

			// Contar cada caractere da string, para o nome da tabela :segunda barra;
			// 									para a coluna:			terceira barra
			
			if ($level == 2) {

				$nomeTabela = $node->nodeName;

				echo "INSERT INTO $nomeTabela VALUES (\n";

			}
			else if ($level == 4) {
				
				// $nomeColuna = $node->nodeName;
				$colunaValor = $node->nodeValue;
				$stringValores +=$colunaValor;
				

			}
			else if ($level == 1) {
				echo "USE $node->nodeName;\n";
			}

			

			
    		
    		
		}
		
	}	
?>

