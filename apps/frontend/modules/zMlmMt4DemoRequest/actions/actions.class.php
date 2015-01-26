<?php
// auto-generated by sfPropelCrud
// date: 2012/11/12 16:07:08
?>
<?php

/**
 * zMlmMt4DemoRequest actions.
 *
 * @package    sf_sandbox
 * @subpackage zMlmMt4DemoRequest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class zMlmMt4DemoRequestActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('zMlmMt4DemoRequest', 'list');
  }

  public function executeList()
  {
    $this->mlm_mt4_demo_requests = MlmMt4DemoRequestPeer::doSelect(new Criteria());
  }

  public function executeShow()
  {
    $this->mlm_mt4_demo_request = MlmMt4DemoRequestPeer::retrieveByPk($this->getRequestParameter('request_id'));
    $this->forward404Unless($this->mlm_mt4_demo_request);
  }

  public function executeCreate()
  {
    $this->mlm_mt4_demo_request = new MlmMt4DemoRequest();

    $this->setTemplate('edit');
  }

  public function executeEdit()
  {
    $this->mlm_mt4_demo_request = MlmMt4DemoRequestPeer::retrieveByPk($this->getRequestParameter('request_id'));
    $this->forward404Unless($this->mlm_mt4_demo_request);
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('request_id'))
    {
      $mlm_mt4_demo_request = new MlmMt4DemoRequest();
    }
    else
    {
      $mlm_mt4_demo_request = MlmMt4DemoRequestPeer::retrieveByPk($this->getRequestParameter('request_id'));
      $this->forward404Unless($mlm_mt4_demo_request);
    }

    $mlm_mt4_demo_request->setRequestId($this->getRequestParameter('request_id'));
    $mlm_mt4_demo_request->setFirstName($this->getRequestParameter('first_name'));
    $mlm_mt4_demo_request->setEmail($this->getRequestParameter('email'));
    $mlm_mt4_demo_request->setStatusCode($this->getRequestParameter('status_code'));
    $mlm_mt4_demo_request->setCreatedBy($this->getRequestParameter('created_by'));
    if ($this->getRequestParameter('created_on'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('created_on'), $this->getUser()->getCulture());
      $mlm_mt4_demo_request->setCreatedOn("$y-$m-$d");
    }
    $mlm_mt4_demo_request->setUpdatedBy($this->getRequestParameter('updated_by'));
    if ($this->getRequestParameter('updated_on'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('updated_on'), $this->getUser()->getCulture());
      $mlm_mt4_demo_request->setUpdatedOn("$y-$m-$d");
    }
    $mlm_mt4_demo_request->setCountry($this->getRequestParameter('country'));
    $mlm_mt4_demo_request->setPhoneNumber($this->getRequestParameter('phone_number'));
    $mlm_mt4_demo_request->setLastName($this->getRequestParameter('last_name'));
    $mlm_mt4_demo_request->setTitle($this->getRequestParameter('title'));
    $mlm_mt4_demo_request->setLiveDemo($this->getRequestParameter('live_demo'));
    $mlm_mt4_demo_request->setAddress1($this->getRequestParameter('address1'));
    $mlm_mt4_demo_request->setAddress2($this->getRequestParameter('address2'));
    $mlm_mt4_demo_request->setAgreeOfBusiness($this->getRequestParameter('agree_of_business'));
    $mlm_mt4_demo_request->setRiskDisclosure($this->getRequestParameter('risk_disclosure'));
    $mlm_mt4_demo_request->setCountryOfCitizen($this->getRequestParameter('country_of_citizen'));
    $mlm_mt4_demo_request->setDobDay($this->getRequestParameter('dob_day'));
    $mlm_mt4_demo_request->setDobMonth($this->getRequestParameter('dob_month'));
    $mlm_mt4_demo_request->setDobYear($this->getRequestParameter('dob_year'));
    $mlm_mt4_demo_request->setRefId($this->getRequestParameter('ref_id'));
    $mlm_mt4_demo_request->setPassport($this->getRequestParameter('passport'));
    $mlm_mt4_demo_request->setSubject($this->getRequestParameter('subject'));

    $mlm_mt4_demo_request->save();

    return $this->redirect('zMlmMt4DemoRequest/show?request_id='.$mlm_mt4_demo_request->getRequestId());
  }

  public function executeDelete()
  {
    $mlm_mt4_demo_request = MlmMt4DemoRequestPeer::retrieveByPk($this->getRequestParameter('request_id'));

    $this->forward404Unless($mlm_mt4_demo_request);

    $mlm_mt4_demo_request->delete();

    return $this->redirect('zMlmMt4DemoRequest/list');
  }
}