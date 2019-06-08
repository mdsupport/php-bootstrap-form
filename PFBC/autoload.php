<?php
/**
 * Basic autoloader for PFBC library which you may use as it is or as a template
 * to suit your application's environment.
 *
 * Usage in your script:
 * //Include this autoloader
 * include 'xxx/PFBC/autoload.php';
 * //Import PFBC namespace
 * use PFBC\Form; 
 *
 * Note that you'd ONLY need this file if you are not using composer.
 */

if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    throw new Exception('PFBC requires PHP version 5.3 or higher.');
}

/**
 * Register the autoloader for PFBC classes.
 *
 * Based off the official PSR-4 autoloader example found at
 * http://www.php-fig.org/psr/psr-4/examples/
 *
 * @param string $class The fully-qualified class name.
 *
 * @return void
 */
spl_autoload_register(
    function ($class) {
        // project-specific namespace prefix. Will only kicks in for PFBC's namespace.
        $prefix = 'PFBC\\';

        // base directory for the namespace prefix.
        $base_dir = __DIR__;   // By default, it points to this same folder.
                               // You may change this path if having trouble detecting the path to
                               // the source files.

        // Is the class using PFBC namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader.
            return;
        }

        // get the relative class name.
        $relative_class = substr($class, $len);

        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
        $file = $base_dir.DIRECTORY_SEPARATOR.str_replace('\\', DIRECTORY_SEPARATOR, $relative_class).'.php';

        // if the file exists, require it
        if (file_exists($file)) {
            require $file;
        }
    }
);
