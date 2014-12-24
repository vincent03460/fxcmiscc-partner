<?php

/**
 * component actions.
 *
 * @package    sf_sandbox
 * @subpackage component
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class componentActions extends sfActions
{
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
}
