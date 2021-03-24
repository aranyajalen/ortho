<?php

/**
 * Edit By Darshan Shah
 * @category     Ortho
 * @package     Ortho Featured Products
 * @author       Ortho Team <contact@orthoinfotech.com>
 */
namespace Ortho\Featuredproduct\Block;
use Magento\Customer\Model\Context as CustomerContext;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Framework\Url\Helper\Data as urlHelper;


class Sidebar  extends \Magento\Catalog\Block\Product\AbstractProduct implements \Magento\Framework\DataObject\IdentityInterface
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
        \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility,
        \Magento\Framework\App\Http\Context $httpContext,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_catalogProductVisibility = $catalogProductVisibility;
        $this->httpContext = $httpContext;
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
    protected function _getProductCollection()
    {
       
		$productlimit = $this->getProductsCount();
        /** @var $collection \Magento\Catalog\Model\ResourceModel\Product\Collection */
        $collection = $this->_productCollectionFactory->create();
        $collection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());

        $collection = $this->_addProductAttributesAndPrices(
            $collection
        )->addStoreFilter()->addAttributeToFilter('ortho_featuredproduct', 1, 'left')->addAttributeToSort(
            'news_from_date',
            'desc'
        );
		$collection->getSelect()
                ->order('rand()')
                ->limit($productlimit);
				
        return $collection;
    }


	public function getFeaturedProductCollection()
    {
		//$status = $this->_scopeConfig->getValue('featured_settings/general/isenable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
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
		$totalproduct = $this->_scopeConfig->getValue('featured_settings/general/sidebarlimit', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
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


