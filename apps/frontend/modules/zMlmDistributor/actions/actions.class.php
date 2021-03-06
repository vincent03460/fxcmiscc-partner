<?php
// auto-generated by sfPropelCrud
// date: 2013/03/12 13:31:26
?>
<?php

/**
 * zMlmDistributor actions.
 *
 * @package    sf_sandbox
 * @subpackage zMlmDistributor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class zMlmDistributorActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('zMlmDistributor', 'list');
  }

  public function executeList()
  {
    $this->mlm_distributors = MlmDistributorPeer::doSelect(new Criteria());
  }

  public function executeShow()
  {
    $this->mlm_distributor = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('distributor_id'));
    $this->forward404Unless($this->mlm_distributor);
  }

  public function executeCreate()
  {
    $this->mlm_distributor = new MlmDistributor();

    $this->setTemplate('edit');
  }

  public function executeEdit()
  {
    $this->mlm_distributor = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('distributor_id'));
    $this->forward404Unless($this->mlm_distributor);
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('distributor_id'))
    {
      $mlm_distributor = new MlmDistributor();
    }
    else
    {
      $mlm_distributor = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('distributor_id'));
      $this->forward404Unless($mlm_distributor);
    }

    $mlm_distributor->setDistributorId($this->getRequestParameter('distributor_id'));
    $mlm_distributor->setDistributorCode($this->getRequestParameter('distributor_code'));
    $mlm_distributor->setUserId($this->getRequestParameter('user_id'));
    $mlm_distributor->setStatusCode($this->getRequestParameter('status_code'));
    $mlm_distributor->setFullName($this->getRequestParameter('full_name'));
    $mlm_distributor->setNickname($this->getRequestParameter('nickname'));
    $mlm_distributor->setMt4UserName($this->getRequestParameter('mt4_user_name'));
    $mlm_distributor->setMt4Password($this->getRequestParameter('mt4_password'));
    $mlm_distributor->setIc($this->getRequestParameter('ic'));
    $mlm_distributor->setCountry($this->getRequestParameter('country'));
    $mlm_distributor->setAddress($this->getRequestParameter('address'));
    $mlm_distributor->setAddress2($this->getRequestParameter('address2'));
    $mlm_distributor->setCity($this->getRequestParameter('city'));
    $mlm_distributor->setState($this->getRequestParameter('state'));
    $mlm_distributor->setPostcode($this->getRequestParameter('postcode'));
    $mlm_distributor->setEmail($this->getRequestParameter('email'));
    $mlm_distributor->setAlternateEmail($this->getRequestParameter('alternate_email'));
    $mlm_distributor->setContact($this->getRequestParameter('contact'));
    $mlm_distributor->setGender($this->getRequestParameter('gender'));
    if ($this->getRequestParameter('dob'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('dob'), $this->getUser()->getCulture());
      $mlm_distributor->setDob("$y-$m-$d");
    }
    $mlm_distributor->setBankName($this->getRequestParameter('bank_name'));
    $mlm_distributor->setBankAccNo($this->getRequestParameter('bank_acc_no'));
    $mlm_distributor->setBankHolderName($this->getRequestParameter('bank_holder_name'));
    $mlm_distributor->setBankSwiftCode($this->getRequestParameter('bank_swift_code'));
    $mlm_distributor->setVisaDebitCard($this->getRequestParameter('visa_debit_card'));
    $mlm_distributor->setEzyCashCard($this->getRequestParameter('ezy_cash_card'));
    $mlm_distributor->setTreeLevel($this->getRequestParameter('tree_level'));
    $mlm_distributor->setTreeStructure($this->getRequestParameter('tree_structure'));
    $mlm_distributor->setPlacementTreeLevel($this->getRequestParameter('placement_tree_level'));
    $mlm_distributor->setPlacementTreeStructure($this->getRequestParameter('placement_tree_structure'));
    $mlm_distributor->setInitRankId($this->getRequestParameter('init_rank_id'));
    $mlm_distributor->setInitRankCode($this->getRequestParameter('init_rank_code'));
    $mlm_distributor->setUplineDistId($this->getRequestParameter('upline_dist_id'));
    $mlm_distributor->setUplineDistCode($this->getRequestParameter('upline_dist_code'));
    $mlm_distributor->setTreeUplineDistId($this->getRequestParameter('tree_upline_dist_id'));
    $mlm_distributor->setTreeUplineDistCode($this->getRequestParameter('tree_upline_dist_code'));
    $mlm_distributor->setTotalLeft($this->getRequestParameter('total_left'));
    $mlm_distributor->setTotalRight($this->getRequestParameter('total_right'));
    $mlm_distributor->setPlacementPosition($this->getRequestParameter('placement_position'));
    if ($this->getRequestParameter('placement_datetime'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('placement_datetime'), $this->getUser()->getCulture());
      $mlm_distributor->setPlacementDatetime("$y-$m-$d");
    }
    $mlm_distributor->setRankId($this->getRequestParameter('rank_id'));
    $mlm_distributor->setRankCode($this->getRequestParameter('rank_code'));
    if ($this->getRequestParameter('active_datetime'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('active_datetime'), $this->getUser()->getCulture());
      $mlm_distributor->setActiveDatetime("$y-$m-$d");
    }
    $mlm_distributor->setActivatedBy($this->getRequestParameter('activated_by'));
    $mlm_distributor->setLeverage($this->getRequestParameter('leverage'));
    $mlm_distributor->setSpread($this->getRequestParameter('spread'));
    $mlm_distributor->setDepositCurrency($this->getRequestParameter('deposit_currency'));
    $mlm_distributor->setDepositAmount($this->getRequestParameter('deposit_amount'));
    $mlm_distributor->setSignName($this->getRequestParameter('sign_name'));
    if ($this->getRequestParameter('sign_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('sign_date'), $this->getUser()->getCulture());
      $mlm_distributor->setSignDate("$y-$m-$d");
    }
    $mlm_distributor->setTermCondition($this->getRequestParameter('term_condition'));
    $mlm_distributor->setIbCommission($this->getRequestParameter('ib_commission'));
    $mlm_distributor->setIsIb($this->getRequestParameter('is_ib'));
    $mlm_distributor->setCreatedBy($this->getRequestParameter('created_by'));
    if ($this->getRequestParameter('created_on'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('created_on'), $this->getUser()->getCulture());
      $mlm_distributor->setCreatedOn("$y-$m-$d");
    }
    $mlm_distributor->setUpdatedBy($this->getRequestParameter('updated_by'));
    if ($this->getRequestParameter('updated_on'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('updated_on'), $this->getUser()->getCulture());
      $mlm_distributor->setUpdatedOn("$y-$m-$d");
    }
    $mlm_distributor->setPackagePurchaseFlag($this->getRequestParameter('package_purchase_flag'));
    $mlm_distributor->setFileBankPassBook($this->getRequestParameter('file_bank_pass_book'));
    $mlm_distributor->setFileProofOfResidence($this->getRequestParameter('file_proof_of_residence'));
    $mlm_distributor->setFileNric($this->getRequestParameter('file_nric'));
    $mlm_distributor->setExcludedStructure($this->getRequestParameter('excluded_structure'));
    $mlm_distributor->setProductMte($this->getRequestParameter('product_mte'));
    $mlm_distributor->setProductFxgold($this->getRequestParameter('product_fxgold'));
    $mlm_distributor->setRemark($this->getRequestParameter('remark'));
    $mlm_distributor->setLoanAccount($this->getRequestParameter('loan_account'));

    $mlm_distributor->save();

    return $this->redirect('zMlmDistributor/show?distributor_id='.$mlm_distributor->getDistributorId());
  }

  public function executeDelete()
  {
    $mlm_distributor = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('distributor_id'));

    $this->forward404Unless($mlm_distributor);

    $mlm_distributor->delete();

    return $this->redirect('zMlmDistributor/list');
  }
}
