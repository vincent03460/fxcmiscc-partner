<?php

/**
 * download actions.
 *
 * @package    sf_sandbox
 * @subpackage download
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class downloadActions extends sfActions
{

    public function executeLearnCentre()
    {

    }
	public function executeGuide()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/octet-stream');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=core-capital.'.$this->getRequestParameter('p').'.ppt', TRUE);
        $response->sendHttpHeaders();
        readfile(sfConfig::get('sf_upload_dir')."/core-capital.".$this->getRequestParameter('p').".ppt");
        return sfView::NONE;
    }
    public function executeDownloadFxGuide()
    {
    }
    public function executeDownloadVideo()
    {

    }
    public function executeDownloadMT4()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "DOWNLOAD");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "DOWNLOAD_MT4");
    }
    public function executeMT4()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/exe');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=FXCMISCCForex_MT4.exe', TRUE);
        $response->sendHttpHeaders();
        readfile(sfConfig::get('sf_upload_dir')."/FXCMISCCForex_MT4.exe");
        return sfView::NONE;
    }

    public function executeDemo()
    {

    }
    public function executeIndex()
    {

    }
    public function executeUploadify()
    {
        $targetFolder = '/uploads/guide'; // Relative to the root

        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $targetFile = rtrim($targetPath, '/') . '/' . $_FILES['Filedata']['name'];

            // Validate the file type
            //$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileTypes = array('pdf'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                $mlm_file_download = new MlmFileDownload();
                $mlm_file_download->setFileType("GUIDE");
                $mlm_file_download->setFileSrc($targetFile);
                $mlm_file_download->setFileName($_FILES['Filedata']['name']);
                $mlm_file_download->setContentType("application/pdf");
                $mlm_file_download->setStatusCode(Globals::STATUS_ACTIVE);
                $mlm_file_download->setRemarks("");
                $mlm_file_download->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_file_download->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_file_download->save();

                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }
    public function executeUploadFxGuideCN()
    {
    }
    public function executeUploadFxGuideEN()
    {
    }
    public function executeUploadFxGuideJP()
    {
    }

    public function executeDoUploadChineseGuide()
    {
        if ($this->getRequest()->getFileName('fxguide') != '') {
            $uploadedFilename = $this->getRequest()->getFileName('fxguide');

            $filename = "chinese_".$uploadedFilename;
            $this->getRequest()->moveFile('fxguide', sfConfig::get('sf_upload_dir') . '/guide/' . $filename);

            $mlm_file_download = new MlmFileDownload();
            $mlm_file_download->setFileType("GUIDE_CN");
            $mlm_file_download->setFileSrc(sfConfig::get('sf_upload_dir') . '/guide/' . $filename);
            $mlm_file_download->setFileName($filename);
            $mlm_file_download->setContentType("application/pdf");
            $mlm_file_download->setStatusCode(Globals::STATUS_ACTIVE);
            $mlm_file_download->setRemarks("");
            $mlm_file_download->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->save();

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array('fxguide' => '@'.sfConfig::get('sf_upload_dir') . '/guide/' . $filename));
            curl_setopt($ch, CURLOPT_URL, 'http://cn.maplefx.com/download/doUploadChineseGuide');
            curl_exec($ch);

            curl_close($ch);
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array('fxguide' => '@'.sfConfig::get('sf_upload_dir') . '/guide/' . $filename));
            curl_setopt($ch, CURLOPT_URL, 'http://my.maplefx.com/download/doUploadChineseGuide');
            curl_exec($ch);

            curl_close($ch);

            $this->setFlash('successMsg', "Upload successful.");
            return $this->redirect('/download/uploadFxGuideCN');
        }
        $this->setFlash('successMsg', "Upload failure.");
        return $this->redirect('/download/uploadFxGuideCN');
    }

    public function executeDoUploadEnglishGuide()
    {
        if ($this->getRequest()->getFileName('fxguide') != '') {
            $uploadedFilename = $this->getRequest()->getFileName('fxguide');

            $filename = "english_".$uploadedFilename;
            $this->getRequest()->moveFile('fxguide', sfConfig::get('sf_upload_dir') . '/guide/' . $filename);

            $mlm_file_download = new MlmFileDownload();
            $mlm_file_download->setFileType("GUIDE_EN");
            $mlm_file_download->setFileSrc(sfConfig::get('sf_upload_dir') . '/guide/' . $filename);
            $mlm_file_download->setFileName($filename);
            $mlm_file_download->setContentType("application/pdf");
            $mlm_file_download->setStatusCode(Globals::STATUS_ACTIVE);
            $mlm_file_download->setRemarks("");
            $mlm_file_download->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->save();

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array('fxguide' => '@'.sfConfig::get('sf_upload_dir') . '/guide/' . $filename));
            curl_setopt($ch, CURLOPT_URL, 'http://cn.maplefx.com/download/doUploadEnglishGuide');
            curl_exec($ch);

            curl_close($ch);
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array('fxguide' => '@'.sfConfig::get('sf_upload_dir') . '/guide/' . $filename));
            curl_setopt($ch, CURLOPT_URL, 'http://my.maplefx.com/download/doUploadEnglishGuide');
            curl_exec($ch);

            curl_close($ch);

            $this->setFlash('successMsg', "Upload successful.");
            return $this->redirect('/download/uploadFxGuideEN');
        }
        $this->setFlash('successMsg', "Upload failure.");
        return $this->redirect('/download/uploadFxGuideEN');
    }

    public function executeDoUploadJapaneseGuide()
    {
        if ($this->getRequest()->getFileName('fxguide') != '') {
            $uploadedFilename = $this->getRequest()->getFileName('fxguide');

            $filename = "japanese_".$uploadedFilename;
            $this->getRequest()->moveFile('fxguide', sfConfig::get('sf_upload_dir') . '/guide/' . $filename);

            $mlm_file_download = new MlmFileDownload();
            $mlm_file_download->setFileType("GUIDE_JP");
            $mlm_file_download->setFileSrc(sfConfig::get('sf_upload_dir') . '/guide/' . $filename);
            $mlm_file_download->setFileName($filename);
            $mlm_file_download->setContentType("application/pdf");
            $mlm_file_download->setStatusCode(Globals::STATUS_ACTIVE);
            $mlm_file_download->setRemarks("");
            $mlm_file_download->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->save();

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array('fxguide' => '@'.sfConfig::get('sf_upload_dir') . '/guide/' . $filename));
            curl_setopt($ch, CURLOPT_URL, 'http://cn.maplefx.com/download/doUploadJapaneseGuide');
            curl_exec($ch);

            curl_close($ch);
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array('fxguide' => '@'.sfConfig::get('sf_upload_dir') . '/guide/' . $filename));
            curl_setopt($ch, CURLOPT_URL, 'http://my.maplefx.com/download/doUploadJapaneseGuide');
            curl_exec($ch);

            curl_close($ch);

            $this->setFlash('successMsg', "Upload successful.");
            return $this->redirect('/download/uploadFxGuideJP');
        }
        $this->setFlash('successMsg', "Upload failure.");
        return $this->redirect('/download/uploadFxGuideJP');
    }
    public function executeAmlPolicy()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/pdf');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=AML-Policy.pdf', TRUE);
        $response->sendHttpHeaders();
        readfile(sfConfig::get('sf_upload_dir')."/agreements/AML-Policy.pdf");
        return sfView::NONE;
    }
    public function executeCustomerAgreement()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/pdf');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=Customer-Agreement.pdf', TRUE);
        $response->sendHttpHeaders();
        readfile(sfConfig::get('sf_upload_dir')."/agreements/Customer-Agreement.pdf");
        return sfView::NONE;
    }
    public function executePrivateInvestmentAgreement()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/pdf');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=Private_Investment_Agreement.pdf', TRUE);
        $response->sendHttpHeaders();
        readfile(sfConfig::get('sf_upload_dir')."/agreements/Private_Investment_Agreement.pdf");
        return sfView::NONE;
    }
    public function executeMteAgreement()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/pdf');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=MTE_Agreement.pdf', TRUE);
        $response->sendHttpHeaders();
        readfile(sfConfig::get('sf_upload_dir')."/agreements/MTE_Agreement.pdf");
        return sfView::NONE;
    }
    public function executeIBAgreement()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/pdf');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=IB_Agreement.pdf', TRUE);
        $response->sendHttpHeaders();
        readfile(sfConfig::get('sf_upload_dir')."/agreements/FXCMISCC_GLOBAL_IB_Agreement.pdf");
        return sfView::NONE;
    }
    public function executeRiskDisclosureStatement()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/pdf');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=Risk-Disclosure-Statement.pdf', TRUE);
        $response->sendHttpHeaders();
        readfile(sfConfig::get('sf_upload_dir')."/agreements/Risk-Disclosure-Statement.pdf");
        return sfView::NONE;
    }
    public function executeTermsOfBusiness()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/pdf');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=TERMS-OF-BUSINESS.pdf', TRUE);
        $response->sendHttpHeaders();
        readfile(sfConfig::get('sf_upload_dir')."/agreements/TERMS-OF-BUSINESS.pdf");
        return sfView::NONE;
    }

    public function executeDownloadDemoMt4()
    {
        if ($this->getRequestParameter('email') <> "" && $this->getRequestParameter('requesterName') <> "") {
            $mlmMt4DemoRequest = new MlmMt4DemoRequest();
            $mlmMt4DemoRequest->setFullName( $this->getRequestParameter('requesterName'));
            $mlmMt4DemoRequest->setEmail($this->getRequestParameter('email'));
            $mlmMt4DemoRequest->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmMt4DemoRequest->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmMt4DemoRequest->save();

            $response = $this->getResponse();
            $response->clearHttpHeaders();
            $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
            $response->setContentType('application/exe');
            $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
            $response->setHttpHeader('Content-Disposition','attachment; filename=pro4setup.exe', TRUE);
            $response->sendHttpHeaders();
            readfile(sfConfig::get('sf_upload_dir')."/pro4setup.exe");
        }

        return sfView::NONE;
    }

    public function executeDownloadGuide()
    {
        $c = new Criteria();
        $c->add(MlmFileDownloadPeer::FILE_TYPE, "GUIDE_".$this->getRequestParameter('a'));
        $c->add(MlmFileDownloadPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $c->addDescendingOrderByColumn(MlmFileDownloadPeer::CREATED_ON);
        $mlmFileDownloadDB = MlmFileDownloadPeer::doSelectOne($c);

        if ($mlmFileDownloadDB) {
            $fileName = str_replace(' ', '_', $mlmFileDownloadDB->getFileName());

            $response = $this->getResponse();
            $response->clearHttpHeaders();
            $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
            $response->setContentType($mlmFileDownloadDB->getContentType());
            $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
            $response->setHttpHeader('Content-Disposition','attachment; filename='.$fileName, TRUE);
            $response->sendHttpHeaders();

            readfile(sfConfig::get('sf_upload_dir')."/guide/".$mlmFileDownloadDB->getFileName());
        }

        return sfView::NONE;
    }

    public function executeDownloadFundManagementReport()
    {
        $fileName = $this->getRequestParameter('p');

        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
        $response->setContentType("application/pdf");
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition','attachment; filename=cmis_fund_manager_report_'.$fileName.".pdf", TRUE);
        $response->sendHttpHeaders();

        readfile(sfConfig::get('sf_upload_dir')."/fund_manage_report/fund_manage_report_".$fileName.".pdf");

        return sfView::NONE;
    }

    public function executeDownloadFundManagementReport2()
    {
        $c = new Criteria();
        $c->add(MlmFileDownloadPeer::FILE_TYPE, "FUND_MANAGEMENT_REPORT");
        $c->add(MlmFileDownloadPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $c->addDescendingOrderByColumn(MlmFileDownloadPeer::CREATED_ON);
        $mlmFileDownloadDB = MlmFileDownloadPeer::doSelectOne($c);

        if ($mlmFileDownloadDB) {
            $fileName = str_replace(' ', '_', $mlmFileDownloadDB->getFileName());

            $response = $this->getResponse();
            $response->clearHttpHeaders();
            $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
            $response->setContentType($mlmFileDownloadDB->getContentType());
            $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
            $response->setHttpHeader('Content-Disposition','attachment; filename='.$fileName, TRUE);
            $response->sendHttpHeaders();

            readfile(sfConfig::get('sf_upload_dir')."/fundManagement/".$mlmFileDownloadDB->getFileName());
        }

        return sfView::NONE;
    }

    public function executeDownloadGuide_BAK()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/pdf');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
//        $response->setHttpHeader('Content-Disposition','attachment; filename=TAI_Weekly_Report_030612.pdf', TRUE);
//        $response->setHttpHeader('Content-Disposition','attachment; filename=TAI_Daily_Report_050612.pdf', TRUE);
//        $response->setHttpHeader('Content-Disposition','attachment; filename=TAI_Daily_Report_060612.pdf', TRUE);
//        $response->setHttpHeader('Content-Disposition','attachment; filename=TAI_Daily_Report_070612.pdf', TRUE);
//        $response->setHttpHeader('Content-Disposition','attachment; filename=TAI_Daily_Report_080612.pdf', TRUE);
//        $response->setHttpHeader('Content-Disposition','attachment; filename=TAI_Weekly_Report_090612.pdf', TRUE);
        $response->setHttpHeader('Content-Disposition','attachment; filename=TAI_Weekly_Report_160612.pdf', TRUE);
//        $response->setHttpHeader('Content-Disposition','attachment; filename=TAI_Daily_Report_120612.pdf', TRUE);
//        $response->setHttpHeader('Content-Disposition','attachment; filename=TAI_Daily_Report_130612.pdf', TRUE);
//        $response->setHttpHeader('Content-Disposition','attachment; filename=TAI_Daily_Report_150612.pdf', TRUE);
        $response->sendHttpHeaders();
//        readfile(sfConfig::get('sf_upload_dir')."/guide/TAI_Weekly_Report_030612.pdf");
//        readfile(sfConfig::get('sf_upload_dir')."/guide/TAI_Daily_Report_050612.pdf");
//        readfile(sfConfig::get('sf_upload_dir')."/guide/TAI_Daily_Report_060612.pdf");
//        readfile(sfConfig::get('sf_upload_dir')."/guide/TAI_Daily_Report_070612.pdf");
//        readfile(sfConfig::get('sf_upload_dir')."/guide/TAI_Daily_Report_080612.pdf");
//        readfile(sfConfig::get('sf_upload_dir')."/guide/TAI_Weekly_Report_090612.pdf");
        readfile(sfConfig::get('sf_upload_dir')."/guide/TAI_Weekly_Report_160612.pdf");
//        readfile(sfConfig::get('sf_upload_dir')."/guide/TAI_Daily_Report_120612.pdf");
//        readfile(sfConfig::get('sf_upload_dir')."/guide/TAI_Daily_Report_130612.pdf");
//        readfile(sfConfig::get('sf_upload_dir')."/guide/TAI_Daily_Report_150612.pdf");

        return sfView::NONE;
    }

    public function executeNric()
    {
        $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));

        if ($distDB) {
            $fileName = $distDB->getFileNric();

            $response = $this->getResponse();
            $response->clearHttpHeaders();
            $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
            $response->setContentType('application/pdf');
            $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
            $response->setHttpHeader('Content-Disposition','attachment; filename='.$fileName, TRUE);
            $response->sendHttpHeaders();

            readfile(sfConfig::get('sf_upload_dir')."/nric/".$fileName);
        }

        return sfView::NONE;
    }
    public function executeProofOfResidence()
    {
        $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));

        if ($distDB) {
            $fileName = $distDB->getFileProofOfResidence();

            $response = $this->getResponse();
            $response->clearHttpHeaders();
            $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
            $response->setContentType('application/pdf');
            $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
            $response->setHttpHeader('Content-Disposition','attachment; filename='.$fileName, TRUE);
            $response->sendHttpHeaders();

            readfile(sfConfig::get('sf_upload_dir')."/proof_of_residence/".$fileName);
        }

        return sfView::NONE;
    }
    public function executeBankPassBook()
    {
        $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));

        if ($distDB) {
            $fileName = $distDB->getFileBankPassBook();

            $response = $this->getResponse();
            $response->clearHttpHeaders();
            $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
            $response->setContentType('application/pdf');
            $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
            $response->setHttpHeader('Content-Disposition','attachment; filename='.$fileName, TRUE);
            $response->sendHttpHeaders();

            readfile(sfConfig::get('sf_upload_dir')."/bank_pass_book/".$fileName);
        }

        return sfView::NONE;
    }
}
