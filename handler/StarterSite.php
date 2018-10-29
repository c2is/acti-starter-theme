<?php

class StarterSite extends Timber\Site {

    /** Add timber support. */
    public function __construct() {

        add_filter('get_twig', array($this, 'addToTwig'));

        /* Handle hooks */
        $parentFunctionFolders = get_template_directory() . '/functions/';
        $childFunctionFolders = get_stylesheet_directory() . '/functions/';
        $this->loadFunctionsFiles($parentFunctionFolders);
        $this->loadFunctionsFiles($childFunctionFolders);

        parent::__construct();
    }

    /**
     * Load all files under functions directory, which contains all hooks
     *
     * @param $functionsDirectory string path to the functions directory
     */
    public function loadFunctionsFiles($functionsDirectory)
    {
        if (file_exists($functionsDirectory))
        {
            $files = scandir($functionsDirectory);

            unset($files[array_search('.', $files, true)]);
            unset($files[array_search('..', $files, true)]);

            // prevent empty ordered elements
            if (count($files) < 1)
                return;

            foreach($files as $file)
            {
                if(is_dir($functionsDirectory . '/' . $file)) {
                    $this->loadFunctionsFiles($functionsDirectory . '/' . $file);
                }
                else {
                    require_once $functionsDirectory . '/' . $file;
                }
            }
        }
    }

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension.
     */
    public function addToTwig( $twig ) {
        $twig->addExtension( new Twig_Extension_StringLoader() );
        return $twig;
    }

}
