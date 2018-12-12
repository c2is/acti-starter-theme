<?php

class StarterSite extends Timber\Site {

    /** Add timber support. */
    public function __construct() {

        add_filter('get_twig', array($this, 'addToTwig'));

        /* Handle hooks */
        $parentFunctionFolders = get_template_directory() . '/functions/';
        $childFunctionFolders = get_stylesheet_directory() . '/functions/';
        $childBlocksFolders = get_stylesheet_directory() . '/helpers/ContentBuilder/Block/';
        $this->loadFunctionsFiles($parentFunctionFolders);
        $this->loadFunctionsFiles($childFunctionFolders);
        $this->loadContentBuilderBlocks($childBlocksFolders);

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

    /**
     * Load all files under blocks directory, which contains child content builder block classes
     *
     * @param $blocksDirectory string path to the blocks directory
     */
    public function loadContentBuilderBlocks($blocksDirectory)
    {
        if (file_exists($blocksDirectory))
        {
            $files = scandir($blocksDirectory);

            unset($files[array_search('.', $files, true)]);
            unset($files[array_search('..', $files, true)]);

            // prevent empty ordered elements
            if (count($files) < 1)
                return;

            foreach($files as $file)
            {
                require_once $blocksDirectory . '/' . $file;
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