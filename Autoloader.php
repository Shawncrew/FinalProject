<?php 
namespace \Project4;

class Autoloader {

    /** @var array */
    protected $prefixes = array();

    /** @return void */
    public function register() {
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function addNamespace(string $prefix, string $base_dir, bool $prepend = false) {
        $prefix = trim($prefix, '\\') . '\\';

        $base_dir = rtrim($base_dir, DIRECTORY_SEPERATOR) . '/';

        if(isset($this->prefixes[$prefix])===false) {
            $this->prefixes[$prefix] = array();
        }

        if($prepend) {
            array_unshift($this->prefixes[$prefix], $base_dir);
        } else {
            array_push($this->prefixes[$prefix], $base_dir);
        }
    }

    /** @return mixed */
    public function loadClass($class) {
        $prefix = $class;

        while(false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);

            $relative_class = substr($class, $pos + 1);

            $mapped_file = $this->loadMappedFile($prefix, $relative_class);
            if($mapped_file) {
                return $mapped_file;
            }

            $prefix = rtrim($prefix, '\\');
        }

        return false;
    }

    /** @return mixed */
    protected function loadMappedFile(string $prefix, string $relative_class) {
        if(isset($this->prefixes[$prefix]) === false) {
            return false;
        }

        foreach ($this->prefixes[$prefix] as $base_dir) {
            $file = $base_dir
                  . str_replace('\\', '/', $relative_class)
                  . '.php';

            if($this->requireFile($file)) {
                return $file;
            }
        }

        return false;
    }

    /** @return bool */
    protected function requireFile($file) {
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }
}