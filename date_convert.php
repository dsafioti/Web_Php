<?php	
	
	function dateConvert ($data) {

		// Verifica se uma data foi informada
		if(empty($data)) {
			return false;
		}

		$replaced_data = str_replace("/", "-", $data);
	    $converted_data = date('Y-m-d', strtotime($replaced_data));

	    return $converted_data;
		
	}

?>