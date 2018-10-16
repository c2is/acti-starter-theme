<?php

class StarterSite extends Timber\Site {

    /** Add timber support. */
    public function __construct() {

        add_filter('get_twig', array($this, 'addToTwig'));

        $this->loadFunctions();

        parent::__construct();
    }

    /** Load all files under functions directory, which contains all hooks **/
    public function loadFunctions()
    {
        $functionsDirectory = get_stylesheet_directory() . '/functions/';
        if (is_dir($functionsDirectory))
        {
            $files = scandir($functionsDirectory);
            foreach ($files as $file)
            {
                if ($file != '.' && $file != '..') {
                    require_once $functionsDirectory . $file;
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
