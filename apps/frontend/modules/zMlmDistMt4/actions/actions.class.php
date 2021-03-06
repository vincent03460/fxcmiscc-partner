<?php
// auto-generated by sfPropelCrud
// date: 2012/09/07 00:19:28
?>
<?php

/**
 * zMlmDistMt4 actions.
 *
 * @package    sf_sandbox
 * @subpackage zMlmDistMt4
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class zMlmDistMt4Actions extends sfActions
{
    public function executeIndex()
    {
        $dateUtil = new DateUtil();
        $purchase_date = "2011-01-29 19:17:04";
        $purchase_date = $dateUtil->formatDate("Y-m-d", date("Y-m-d")) . " 00:00:00";
        $purchase_date_timestamp = strtotime($purchase_date);
        $purchase_date_3months = strtotime("+1 months", $purchase_date_timestamp);

        echo "Purchase date + 3months = " . date("Y-m-d h:i:s", $purchase_date_3months);
        //return $this->forward('zMlmDistMt4', 'list');
    }

    public function executeList()
    {
        $this->mlm_dist_mt4s = MlmDistMt4Peer::doSelect(new Criteria());
    }

    public function executeShow()
    {
        $this->mlm_dist_mt4 = MlmDistMt4Peer::retrieveByPk($this->getRequestParameter('mt4_id'));
        $this->forward404Unless($this->mlm_dist_mt4);
    }

    public function executeCreate()
    {
        $this->mlm_dist_mt4 = new MlmDistMt4();

        $this->setTemplate('edit');
    }

    public function executeEdit()
    {
        $this->mlm_dist_mt4 = MlmDistMt4Peer::retrieveByPk($this->getRequestParameter('mt4_id'));
        $this->forward404Unless($this->mlm_dist_mt4);
    }

    public function executeUpdate()
    {
        if (!$this->getRequestParameter('mt4_id')) {
            $mlm_dist_mt4 = new MlmDistMt4();
        }
        else
        {
            $mlm_dist_mt4 = MlmDistMt4Peer::retrieveByPk($this->getRequestParameter('mt4_id'));
            $this->forward404Unless($mlm_dist_mt4);
        }

        $mlm_dist_mt4->setMt4Id($this->getRequestParameter('mt4_id'));
        $mlm_dist_mt4->setDistId($this->getRequestParameter('dist_id'));
        $mlm_dist_mt4->setMt4UserName($this->getRequestParameter('mt4_user_name'));
        $mlm_dist_mt4->setMt4Password($this->getRequestParameter('mt4_password'));
        $mlm_dist_mt4->setCreatedBy($this->getRequestParameter('created_by'));
        if ($this->getRequestParameter('created_on')) {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('created_on'), $this->getUser()->getCulture());
            $mlm_dist_mt4->setCreatedOn("$y-$m-$d");
        }
        $mlm_dist_mt4->setUpdatedBy($this->getRequestParameter('updated_by'));
        if ($this->getRequestParameter('updated_on')) {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('updated_on'), $this->getUser()->getCulture());
            $mlm_dist_mt4->setUpdatedOn("$y-$m-$d");
        }

        $mlm_dist_mt4->save();

        return $this->redirect('zMlmDistMt4/show?mt4_id=' . $mlm_dist_mt4->getMt4Id());
    }

    public function executeDelete()
    {
        $mlm_dist_mt4 = MlmDistMt4Peer::retrieveByPk($this->getRequestParameter('mt4_id'));

        $this->forward404Unless($mlm_dist_mt4);

        $mlm_dist_mt4->delete();

        return $this->redirect('zMlmDistMt4/list');
    }
}
