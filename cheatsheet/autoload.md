the aim of autoloading is to require files that contain PHP class.
When we are using a class located into a file that is not already required, PHP will try to load it by using the autoloading functions.

To register a new autoloading function, we make use of 'spl_autoload_register' function.
It will register it into the core system.

Our function will receive the namespace of the class as parameter.
As our namespace follow the file system path, we have to convert this namespace into path.

// autoload

spl_autoload_register
	function($namespace){						//<= receiving Model\User
		$filename = ($namespace.'.php);		// Adding .php at the end, so 'Model\User.php'
		$filename = str_replace('\\', '/', $filename); // converting namepsace separator by directory
		$filename = _DIR_.DIRECTORY_SEPARATOR. $filename;
		if(is_file($filename)){
		require_once $filename;
		}
	}		
};