<img <?php 
	echo (isset($id) ? 'id="' . $id . '"' : ''); 
?> src="<?php 
	echo $mediaConcrete->getUrl(array(mdWebOptions::WIDTH => $width, mdWebOptions::HEIGHT => $height, mdWebOptions::EXACT_DIMENTIONS => $EXACT_DIMENTIONS, mdWebOptions::CODE => $CODE)); 
?>" <?php 
	echo (isset($html) ? $html : ''); 
?>/>

