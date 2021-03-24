<?php

/**
 * Edit By Darshan Shah
 * @category     Ortho
 * @package     Ortho Bestseller Products
 * @author       Ortho Team <contact@orthoinfotech.com>
 */
namespace Ortho\Bestsellerproduct\Block;
use Magento\Customer\Model\Context as CustomerContext;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Framework\Url\Helper\Data as urlHelper;


class Listhome  extends \Magento\Catalog\Block\Product\AbstractProduct implements \Magento\Framework\DataObject\IdentityInterface
{
    
     /**
     * Default value for products count that will be shown
     */
    const DEFAULT_PRODUCTS_COUNT = 10;

	

    /**
     * Products count
     *
     * @var int
     */
    protected $_productsCount;

    /**
     * @var \Magento\Framework\App\Http\Context
     */
    protected $httpContext;

    /**
     * Catalog product visibility
     *
     * @var \Magento\Catalog\Model\Product\Visibility
     */
    protected $_catalogProductVisibility;
	//protected $_scopeConfig;
    
	
	/**
     * Product collection factory
     *
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;
	
	/**
     * @var \Magento\Framework\Data\Helper\PostHelper
     */
    protected $_postDataHelper;
	
	protected $abstrcthelper;
	
	
	/**
     * @var \Magento\Framework\Url\Helper\Data
     */
    //protected $urlHelper;
	
	
    /**
     * @param Context $context
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility
     * @param \Magento\Framework\App\Http\Context $httpContext
     * @param array $data
     */
     public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
		\Magento\Sales\Model\ResourceModel\Report\Bestsellers\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility,
	//	\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\App\Http\Context $httpContext,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
		 $this->_collectionFactory = $collectionFactory;
        $this->_catalogProductVisibility = $catalogProductVisibility;
        $this->httpContext = $httpContext;
	//	$this->_scopeConfig = $scopeConfig;
        parent::__construct(
            $context,
            $data
        );
    }
    
    /**
     * Prepare and return product collection
     *
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection|Object|\Magento\Framework\Data\Collection
     */
    public function _getProductCollection()
    {
	
        $collection = $this->_collectionFactory->create()->setModel(
            'Magento\Catalog\Model\Product'
        );

        return $collection;
    }


	public function getBestsellerProductCollection()
    {
		//$status = $this->_scopeConfig->getValue('bestseller_settings/general/isenable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
      	//if($status == 0){
		//return '';
		//}else{
		
	    return $this->_getProductCollection();
		//}
    }
	

    /**
     * Prepare collection with new products
     *
     * @return \Magento\Framework\View\Element\AbstractBlock
     */
    protected function _beforeToHtml()
    {
	
	
        //$this->setProductCollection($this->_getProductCollection());
        //return parent::_beforeToHtml();
    }

	public function getMode() {
        return 'grid';
    }

    /**
     * Set how much product should be displayed at once.
     *
     * @param int $count
     * @return $this
     */
    public function setProductsCount($count)
    {
        $this->_productsCount = $count;
        return $this;
    }

    /**
     * Get how much products should be displayed at once.
     *
     * @return int
     */
    public function getProductsCount()
    {
		$totalproduct = $this->_scopeConfig->getValue('bestseller_settings/general/limit', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if($totalproduct > 0){
			$this->_productsCount = $totalproduct;
		}else{
			if (null === $this->_productsCount) {
				$this->_productsCount = self::DEFAULT_PRODUCTS_COUNT;
			}
		}
		// echo $this->_productsCount;
        return $this->_productsCount;
    }

	public function getAddToCartPostParams(\Magento\Catalog\Model\Product $product) {
        $url = $this->getAddToCartUrl($product);
		return [
            'action' => $url,
            'data' => [
                'product' => $product->getEntityId(),
                \Magento\Framework\App\ActionInterface::PARAM_NAME_URL_ENCODED =>
              	strtr(base64_encode($url), '+/=', '-_,'),
            ]
        ];
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\Magento\Catalog\Model\Product::CACHE_TAG];
    }
}


