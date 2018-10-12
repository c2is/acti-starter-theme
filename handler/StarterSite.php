<?php

class StarterSite extends Timber\Site {

    /** Add timber support. */
    public function __construct() {

        add_filter('get_twig', array($this, 'add_to_twig'));

        $this->load_functions();

        parent::__construct();
    }

    /** Load all files under functions directory, which contains all hooks **/
    public function load_functions()
    {
        $functionsDirectory = get_template_directory() . '/functions/';
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

    /** This Would return 'foo bar!'.
     *
     * @param string $text being 'foo', then returned 'foo bar!'.
     */
//	public function myfoo( $text ) {
//		$text .= ' bar!';
//		return $text;
//	}

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension.
     */
    public function add_to_twig( $twig ) {
        $twig->addExtension( new Twig_Extension_StringLoader() );
//		$twig->addFilter( new Twig_SimpleFilter( 'myfoo', array( $this, 'myfoo' ) ) );
        return $twig;
    }

}
