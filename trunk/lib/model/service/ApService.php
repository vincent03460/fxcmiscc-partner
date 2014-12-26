<?php

/**
 *
 *
 *
 * @package lib.model
 * @author r9jason
 */
class ApService
{
    public function constructAp()
    {
        $this->constructApAdmin(1000);
        $this->constructApMarketing(2000);
        $this->constructApFinance(3000);
        $this->constructApReport(4000);
        $this->constructApReadonly(5000);
    }

    public function constructApAdmin($seq)
    {
        $lists = array();
        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::MOD_ADMIN);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setMenuLabel("Admin");
        $appUserAccess->setMenuUrl("");
        $appUserAccess->setTreeLevel(1);
        $appUserAccess->setTreeStructure(AP::MOD_ADMIN);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_USER_LIST);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_ADMIN);
        $appUserAccess->setMenuLabel("User List");
        $appUserAccess->setMenuUrl("admin/userList");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_ADMIN ."|". AP::AL_USER_LIST);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_USER_ROLE);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_ADMIN);
        $appUserAccess->setMenuLabel("User Role");
        $appUserAccess->setMenuUrl("admin/userRole");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_ADMIN ."|". AP::AL_USER_ROLE);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_CHANGE_PASSWORD);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_ADMIN);
        $appUserAccess->setMenuLabel("Change Password");
        $appUserAccess->setMenuUrl("admin/changePassword");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_ADMIN ."|". AP::AL_CHANGE_PASSWORD);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_SETTING);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_ADMIN);
        $appUserAccess->setMenuLabel("Application Setting");
        $appUserAccess->setMenuUrl("admin/applicationSetting");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_ADMIN ."|". AP::AL_SETTING);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_PACKAGE);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_ADMIN);
        $appUserAccess->setMenuLabel("Package");
        $appUserAccess->setMenuUrl("admin/packageList");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_ADMIN ."|". AP::AL_PACKAGE);
        $lists[] = $appUserAccess;

        $count = 0;
        foreach ($lists as $appUserAccess) {
            $appUserAccess->setStatusCode(Globals::STATUS_ACTIVE);
            $appUserAccess->setTreeSeq($seq + (10 * $count));
            $appUserAccess->save();
            $count++;
        }
    }

    public function constructApMarketing($seq)
    {
        $lists = array();

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::MOD_MARKETING);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setMenuLabel("Marketing");
        $appUserAccess->setMenuUrl("");
        $appUserAccess->setTreeLevel(1);
        $appUserAccess->setTreeStructure(AP::MOD_MARKETING);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_DIST_LIST);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_MARKETING);
        $appUserAccess->setMenuLabel("Distributor List");
        $appUserAccess->setMenuUrl("marketing/distList");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_MARKETING ."|". AP::AL_DIST_LIST);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_SUPER_IB_LIST);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_MARKETING);
        $appUserAccess->setMenuLabel("Super IB Listing");
        $appUserAccess->setMenuUrl("marketing/superIbList");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_MARKETING ."|". AP::AL_SUPER_IB_LIST);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_SPONSOR_TREE);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_MARKETING);
        $appUserAccess->setMenuLabel("Sponsor Tree");
        $appUserAccess->setMenuUrl("marketing/sponsorTree");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_MARKETING ."|". AP::AL_SPONSOR_TREE);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_PIPS_CALCULATOR);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_MARKETING);
        $appUserAccess->setMenuLabel("Pips Upload");
        $appUserAccess->setMenuUrl("marketing/pipsUpload");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_MARKETING ."|". AP::AL_PIPS_CALCULATOR);
        $lists[] = $appUserAccess;

        $count = 0;
        foreach ($lists as $appUserAccess) {
            $appUserAccess->setStatusCode(Globals::STATUS_ACTIVE);
            $appUserAccess->setTreeSeq($seq + (10 * $count));
            $appUserAccess->save();
            $count++;
        }
    }

    public function constructApFinance($seq)
    {
        $lists = array();

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::MOD_FINANCE);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setMenuLabel("Finance");
        $appUserAccess->setMenuUrl("");
        $appUserAccess->setTreeLevel(1);
        $appUserAccess->setTreeStructure(AP::MOD_FINANCE);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_EPOINT_PURCHASE);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_FINANCE);
        $appUserAccess->setMenuLabel("e-Point Purchase");
        $appUserAccess->setMenuUrl("finance/epointPurchase");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_FINANCE ."|". AP::AL_EPOINT_PURCHASE);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_EPOINT_TRANSFER);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_FINANCE);
        $appUserAccess->setMenuLabel("e-Point Transfer");
        $appUserAccess->setMenuUrl("finance/epointTransfer");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_FINANCE ."|". AP::AL_EPOINT_TRANSFER);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_PACKAGE_PURCHASE);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_FINANCE);
        $appUserAccess->setMenuLabel("Package Purchase");
        $appUserAccess->setMenuUrl("finance/packagePurchase");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_FINANCE ."|". AP::AL_PACKAGE_PURCHASE);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_PACKAGE_UPGRADE);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_FINANCE);
        $appUserAccess->setMenuLabel("Package Upgrade History");
        $appUserAccess->setMenuUrl("finance/packageUpgradeHistory");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_FINANCE ."|". AP::AL_PACKAGE_UPGRADE);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_RELOAD_PT2_FUND);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_FINANCE);
        $appUserAccess->setMenuLabel("Reload MT4 Fund");
        $appUserAccess->setMenuUrl("finance/reloadMt4Fund");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_FINANCE ."|". AP::AL_RELOAD_PT2_FUND);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REFERRAL_BONUS);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_FINANCE);
        $appUserAccess->setMenuLabel("Referral Bonus");
        $appUserAccess->setMenuUrl("finance/referralBonus");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_FINANCE ."|". AP::AL_REFERRAL_BONUS);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_PIPS_BONUS);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_FINANCE);
        $appUserAccess->setMenuLabel("Pips Bonus");
        $appUserAccess->setMenuUrl("finance/pipsBonusDetail");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_FINANCE ."|". AP::AL_PIPS_BONUS);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_MT4_WITHDRAWAL);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_FINANCE);
        $appUserAccess->setMenuLabel("MT4 Withdrawal");
        $appUserAccess->setMenuUrl("finance/mt4Withdrawal");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_FINANCE ."|". AP::AL_MT4_WITHDRAWAL);
        $lists[] = $appUserAccess;

        $count = 0;
        foreach ($lists as $appUserAccess) {
            $appUserAccess->setStatusCode(Globals::STATUS_ACTIVE);
            $appUserAccess->setTreeSeq($seq + (10 * $count));
            $appUserAccess->save();
            $count++;
        }
    }

    public function constructApReport($seq)
    {
        $lists = array();

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::MOD_REPORT);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setMenuLabel("Report");
        $appUserAccess->setMenuUrl("");
        $appUserAccess->setTreeLevel(1);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REPORT_CONVERT_ECASH_TO_EPOINT);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_REPORT);
        $appUserAccess->setMenuLabel("Convert e-Cash To e-Point");
        $appUserAccess->setMenuUrl("report/convertEcashToEpoint");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT ."|". AP::AL_REPORT_CONVERT_ECASH_TO_EPOINT);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REPORT_EPOINT_TRANSFER);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_REPORT);
        $appUserAccess->setMenuLabel("e-Point Transfer");
        $appUserAccess->setMenuUrl("report/epointTransfer");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT ."|". AP::AL_REPORT_EPOINT_TRANSFER);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REPORT_GROUP_SALES);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_REPORT);
        $appUserAccess->setMenuLabel("Group Sales");
        $appUserAccess->setMenuUrl("report/groupSales");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT ."|". AP::AL_REPORT_GROUP_SALES);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REPORT_INDIVIDUAL_TRADER_SALES);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_REPORT);
        $appUserAccess->setMenuLabel("Individual Trader Sales");
        $appUserAccess->setMenuUrl("report/individualTraderSales");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT ."|". AP::AL_REPORT_INDIVIDUAL_TRADER_SALES);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REPORT_MT4_WITHDRAWAL);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_REPORT);
        $appUserAccess->setMenuLabel("MT4 Withdrawal");
        $appUserAccess->setMenuUrl("report/mt4Withdrawal");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT ."|". AP::AL_REPORT_MT4_WITHDRAWAL);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REPORT_REFERRAL_BONUS);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_REPORT);
        $appUserAccess->setMenuLabel("Referral Bonus");
        $appUserAccess->setMenuUrl("report/referralBonus");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT ."|". AP::AL_REPORT_REFERRAL_BONUS);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REPORT_TOTAL_MT4_RELOAD);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_REPORT);
        $appUserAccess->setMenuLabel("Total Mt4 Reload");
        $appUserAccess->setMenuUrl("report/totalMt4Reload");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT ."|". AP::AL_REPORT_TOTAL_MT4_RELOAD);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REPORT_PACKAGE_PURCHASE);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_REPORT);
        $appUserAccess->setMenuLabel("Package Purchase");
        $appUserAccess->setMenuUrl("report/packagePurchase");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT ."|". AP::AL_REPORT_PACKAGE_PURCHASE);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REPORT_PACKAGE_UPGRADE);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_REPORT);
        $appUserAccess->setMenuLabel("Package Upgrade");
        $appUserAccess->setMenuUrl("report/packageUpgrade");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT ."|". AP::AL_REPORT_PACKAGE_UPGRADE);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_REPORT_TOTAL_VOLUME_TRADED);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_REPORT);
        $appUserAccess->setMenuLabel("Total Volume Traded");
        $appUserAccess->setMenuUrl("report/totalVolumeTraded");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_REPORT ."|". AP::AL_REPORT_TOTAL_VOLUME_TRADED);
        $lists[] = $appUserAccess;

        $count = 0;
        foreach ($lists as $appUserAccess) {
            $appUserAccess->setStatusCode(Globals::STATUS_ACTIVE);
            $appUserAccess->setTreeSeq($seq + (10 * $count));
            $appUserAccess->save();
            $count++;
        }
    }

    public function constructApReadonly($seq)
    {
        $lists = array();
        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::MOD_READONLY);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setMenuLabel("Readonly");
        $appUserAccess->setMenuUrl("");
        $appUserAccess->setTreeLevel(1);
        $appUserAccess->setTreeStructure(AP::MOD_READONLY);
        $lists[] = $appUserAccess;

        $appUserAccess = new AppUserAccess();
        $appUserAccess->setAccessCode(AP::AL_READONLY);
        $appUserAccess->setIsAuthNeeded("Y");
        $appUserAccess->setIsMenu("Y");
        $appUserAccess->setParentId(AP::MOD_READONLY);
        $appUserAccess->setMenuLabel("All Module Readonly");
        $appUserAccess->setMenuUrl("");
        $appUserAccess->setTreeLevel(2);
        $appUserAccess->setTreeStructure(AP::MOD_READONLY ."|". AP::AL_READONLY);
        $lists[] = $appUserAccess;

        $count = 0;
        foreach ($lists as $appUserAccess) {
            $appUserAccess->setStatusCode(Globals::STATUS_ACTIVE);
            $appUserAccess->setTreeSeq($seq + (10 * $count));
            $appUserAccess->save();
            $count++;
        }
    }
}
