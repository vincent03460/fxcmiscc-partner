<?php

/**
 * captcha actions.
 *
 * @package    sf_sandbox
 * @subpackage captcha
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class captchaActions extends sfActions
{
    /**
     * Executes index action
     *
     */
    public function executeIndex()
    {
        $this->forward('home', 'login');
    }

    public function executeImage()
    {
        $str =  $this->getUser()->getAttribute(Globals::SYSTEM_CAPTCHA_ID, 'ERROR!');

        // Set the content type
        // header('Content-type: image/png');
        header('Cache-control: no-cache');

        // Create an image from button.png
        $image = imagecreatefrompng('images/captcha/button.png');

        // Set the font colour
        $colour = imagecolorallocate($image, 91, 91, 91);

        // Set the font
        $font = 'fonts/Anorexia.ttf';

        // Set a random integer for the rotation between -15 and 15 degrees
        //$rotate = rand(-15, 15);
        $rotate = 0;

        // Create an image using our original image and adding the detail
        imagettftext($image, 22, $rotate, 25, 30, $colour, $font, $str);

        // Output the image as a png
        imagepng($image);

        return sfView::HEADER_ONLY;
    }

    public function executeNewSession()
    {
        $char = strtoupper(substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 2));

        // Concatenate the random string onto the random numbers
        // The font 'Anorexia' doesn't have a character for '8', so the numbers will only go up to 7
        // '0' is left out to avoid confusion with 'O'
        $str = rand(1, 7).rand(1, 7).$char;

        $this->getUser()->setAttribute(Globals::SYSTEM_CAPTCHA_ID, $str);

        return sfView::HEADER_ONLY;
    }

    public function executeImageRequest()
    {
        // Echo the image - timestamp appended to prevent caching
        echo '<a href="#" id="refreshimg" title="Click to refresh image"><img src="/captcha/image?' . time() . '" width="90" height="30" alt="Captcha image" style="border-style: none"/></a>';
        return sfView::HEADER_ONLY;
    }

    public function executeProcess()
    {
        // To avoid case conflicts, make the input uppercase and check against the session value
        // If it's correct, echo '1' as a string
        if (strtoupper($this->getRequestParameter('captcha')) == $this->getUser()->getAttribute(Globals::SYSTEM_CAPTCHA_ID)){
            echo 'true';
            // Else echo '0' as a string
    	}else{
            echo 'false';
    	}
    
        return sfView::HEADER_ONLY;
    }
}
