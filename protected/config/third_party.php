<?php

function ThirdPartyAutoload($class) {
	$class_array = explode('\\', $class);
	
	//if (count($class_array)>1) {
		//if ($class_array[0] == 'ThirdParty') {

			if (isset($class_array[1]))
				$file_load = \Kecik\Config::get('path.third_party').'/'.$class_array[0].'/'.$class_array[1].'.php';
			else
				$file_load = \Kecik\Config::get('path.third_party').'/'.$class_array[0].'/'.$class_array[0].'.php';

			if (file_exists($file_load)) {
				include_once $file_load;
			} else {
				$file_load = \Kecik\Config::get('path.third_party').'/'.$class_array[0].'.php';
				if (file_exists($file_load))
					include_once $file_load;
			}
		//}
	//}
}

spl_autoload_register('ThirdPartyAutoload');