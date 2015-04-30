<?php /* Template Name: Topthemen Template */ 
	global $based;
	$based = get_post_meta($post->ID, 'rgs_top_link', true);	
	if($based){ 
			$lp = file_get_contents($based);
			$doc = new DOMDocument(); // create DOMDocument
		    //libxml_use_internal_errors(true);
		    $doc->loadHTML($lp); // load HTML you can add $html
			$el = $doc->createElement('base');
			$el->setAttribute("href", $based."/");
			$head = $doc->getElementsByTagName('head')->item(0);
			$bar = $head->firstChild;
			// echo "<pre>";
			// print_r($bar);
			// echo "</pre>";
			// // $foo = $doc->documentElement->lastChild;
			// // $foo->appendChild($bar);
			// // print $doc->saveXML();	
			// $bar->appendChild($el);
			$head->insertBefore($el, $bar);
			$tags = $doc->documentElement->getElementsByTagName('meta');
			foreach($tags as $tag) {
				if($tag->getAttribute('property') == "og:url")  $tag->setAttribute('content', get_permalink( $post->ID ));
			}



			// $doc->appendChild($el); 

			echo $doc->saveHTML();

		// $based_sub = parse_url($based);		
		// if($based && $based_sub['host'] == 'fasttrack.rgnrtr.com'){
		// 	$lp = file_get_contents($based);
		// 	echo $lp;
		// }
	}
	?>