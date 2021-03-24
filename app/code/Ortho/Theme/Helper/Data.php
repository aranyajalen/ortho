<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ortho\Theme\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
/**
 * Search helper
 */
class Data extends AbstractHelper
{


    /** * @var \Magento\Framework\App\Config\ScopeConfigInterfac */
    // protected $_scopeConfig;
    
	CONST HEADER_TEXT = 'ortho_settings/general/header_text';
	CONST HEADER_TYPE = 'ortho_settings/general/header_type';
	CONST FOOTER_TYPE = 'ortho_settings/general/footer_type';
	
	CONST NEWSLETTER_ENABLE = 'ortho_settings/newsletter/isenable';
	CONST COOKIE_NAME = 'ortho_settings/newsletter/cookiename';
	CONST COOKIE_DAY = 'ortho_settings/newsletter/cookietime';
	
	CONST ADVANCEMENU_ENABLE = 'ortho_settings/advancemenu/isenable';
	CONST HOMEMENU_ENABLE = 'ortho_settings/advancemenu/ishomelinkenable';
	CONST TOPBLOCKMENU_ENABLE = 'ortho_settings/advancemenu/staticblockbefore';
	CONST BOTTOMBLOCKMENU_ENABLE = 'ortho_settings/advancemenu/staticblockafter';
	CONST CUSTOMMENU_ENABLE = 'ortho_settings/advancemenu/iscustomenable';
	CONST CUSTOMMENU_NAME = 'ortho_settings/advancemenu/custommenuname';
	CONST CUSTOMMENU_URL = 'ortho_settings/advancemenu/custommenulink';
	CONST CUSTOMMENU_ID = 'ortho_settings/advancemenu/custommenublock';
    

	CONST MAP_ENABLE = 'ortho_settings/contactpage/isenable';
	CONST MAP_POSITION = 'ortho_settings/contactpage/mapposition';
	CONST MAP_TITLE = 'ortho_settings/contactpage/maptitle';
	CONST MAP_LATITUDE = 'ortho_settings/contactpage/latitude';
	CONST MAP_LONGITUDE = 'ortho_settings/contactpage/longitude';
	CONST CONTACT_ADDRESS = 'ortho_settings/contactpage/contactaddress';


	public function __construct(
	\Magento\Framework\App\Helper\Context $context 
//	\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
	)
    {
        parent::__construct($context);
       // $this->_scopeConfig = $scopeConfig;
    }
   
   /* Get Header Text Method */
    
    public function getHeaderText()
    {
        return $this->scopeConfig->getValue(self::HEADER_TEXT,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getHeaderType()
    {
        return $this->scopeConfig->getValue(self::HEADER_TYPE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getFooterType()
    {
        return $this->scopeConfig->getValue(self::FOOTER_TYPE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	/* Get Newsletter Option Enable */
	public function getNewsletterStatus()
    {
        return $this->scopeConfig->getValue(self::NEWSLETTER_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	public function getCookieName()
    {
        return $this->scopeConfig->getValue(self::COOKIE_NAME,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	public function getCookieDay()
    {
        return $this->scopeConfig->getValue(self::COOKIE_DAY,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	/* Get Advance Menu Option */
	
	public function getAdvanceMenu()
    {
        return $this->scopeConfig->getValue(self::ADVANCEMENU_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getHomeMenuStatus()
    {
        return $this->scopeConfig->getValue(self::HOMEMENU_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getTopBlockStatus()
    {
        return $this->scopeConfig->getValue(self::TOPBLOCKMENU_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getBottomBlockStatus()
    {
        return $this->scopeConfig->getValue(self::BOTTOMBLOCKMENU_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getCustomBlockStatus()
    {
        return $this->scopeConfig->getValue(self::CUSTOMMENU_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getCustomBlockName()
    {
        return $this->scopeConfig->getValue(self::CUSTOMMENU_NAME,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getCustomBlockUrl()
    {
        return $this->scopeConfig->getValue(self::CUSTOMMENU_URL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getCustomBlockId()
    {
	
        return $this->scopeConfig->getValue(self::CUSTOMMENU_ID,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	
	
	public function getMapStatus()
    {
	
        return $this->scopeConfig->getValue(self::MAP_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	
	
	public function getMapPosition()
    {
	
        return $this->scopeConfig->getValue(self::MAP_POSITION,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getMapTitle()
    {
	
        return $this->scopeConfig->getValue(self::MAP_TITLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getMapLatitude()
    {
	
        return $this->scopeConfig->getValue(self::MAP_LATITUDE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getMapLongitude()
    {
	
        return $this->scopeConfig->getValue(self::MAP_LONGITUDE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	public function getContactAdressStatus()
    {
	
        return $this->scopeConfig->getValue(self::CONTACT_ADDRESS,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
	
	
	
	/* new and sale */
	
	public function getNewLabel($_product) {			
		$now = date("Y-m-d");
		$newsFrom= substr($_product->getData('news_from_date'),0,10);
		$newsTo=  substr($_product->getData('news_to_date'),0,10);	
		if(($now >= $newsFrom) && ($now <= $newsTo)){
			return true;
		}else{
			return false;
		}
    }

	
	public function getSaleLabel($_product) {			
		$now = date("Y-m-d");
		$specialFrom= substr($_product->getData('special_from_date'),0,10);
		$specialTo=  substr($_product->getData('special_to_date'),0,10);	
		if((($now >= $specialFrom) && ($now <= $specialTo) && ($_product->getSpecialPrice() !== null))){
			return true;
		}else{
			return false;
		}	
    }
	
	
	
}