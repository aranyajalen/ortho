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
use Magento\Framework\Url\Helper\Data;
//use Ortho\Featuredproduct\Helper\Data;



class Featuredlist  extends \Magento\Catalog\Block\Product\AbstractProduct implements \Magento\Framework\DataObject\IdentityInterface
{
    
     /**
     * Default value for products count that will be shown
     */
    const DEFAULT_PRODUCTS_COUNT = 10;
 	protected $_featuredproductCollection = null;
    /**
     * Products count
     *
     * @var int
     */
    protected $_productsCount;
	protected $_defaultToolbarBlock = 'Magento\Catalog\Block\Product\ProductList\Toolbar';
    /**
     * @var \Magento\Framework\App\Http\Context
     */
    protected $httpContext;
	protected $_scopeConfig;
    /**
     * Catalog product visibility
     *
     * @var \Magento\Catalog\Model\Product\Visibility
     */
	 
	 /**
     * @var \Magento\Framework\Url\Helper\Data
     */
    	protected $urlHelper;
	
    
	 
    protected $_catalogProductVisibility;

    /**
     * Product collection factory
     *
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

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
		\Magento\Cms\Model\PageFactory $pageFactory,
     //   \Magento\Framework\View\Page\Config $pageConfig,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_catalogProductVisibility = $catalogProductVisibility;
        $this->httpContext = $httpContext;
		$this->_pageFactory = $pageFactory;
      //  $this->pageConfig = $pageConfig;
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
    
	protected function _prepareLayout()
    {
        $page = $this->getPage();
        $meta_title=$this->_scopeConfig->getValue('featured_settings/featured_metadata/meta_title', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		$meta_keyword=$this->_scopeConfig->getValue('featured_settings/featured_metadata/meta_keyword', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		$meta_desc=$this->_scopeConfig->getValue('featured_settings/featured_metadata/meta_description', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
  //      $this->pageConfig->getTitle()->set($meta_title);
	//	$this->pageConfig->setKeywords($meta_keyword);
  // 		$this->pageConfig->setDescription($meta_desc);
        return parent::_prepareLayout();
		
    }
	
	
	
	protected function _getProductCollection()
    {
     
        $collection = $this->_productCollectionFactory->create();
        $collection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());

        $collection = $this->_addProductAttributesAndPrices(
            $collection
        )->addStoreFilter()->addAttributeToFilter('ortho_featuredproduct', 1, 'left');

		
		
        

        return $collection;
    }

	
	  /**
     * Retrieve loaded category collection
     *
     * @return AbstractCollection
     */
    public function getLoadedProductCollection()
    {
        return $this->_getProductCollection();
    }

    /**
     * Retrieve current view mode
     *
     * @return string
     */
    public function getMode()
    {
		//echo $this->getChildBlock('toolbar')->getCurrentMode();
        return $this->getChildBlock('toolbar')->getCurrentMode();
    }
	
	/**
     * Need use as _prepareLayout - but problem in declaring collection from
     * another block (was problem with search result)
     * @return $this
     */
    protected function _beforeToHtml()
    {
        $toolbar = $this->getToolbarBlock();
		
        // called prepare sortable parameters
        $collection = $this->_getProductCollection();

        // use sortable parameters
		
        $orders = $this->getAvailableOrders();
		//echo 'order:'.$orders;
        if ($orders) {
            $toolbar->setAvailableOrders($orders);
        }
        $sort = $this->getSortBy();
        if ($sort) {
            $toolbar->setDefaultOrder($sort);
        }
        $dir = $this->getDefaultDirection();
        if ($dir) {
            $toolbar->setDefaultDirection($dir);
        }
        $modes = $this->getModes();
        if ($modes) {
            $toolbar->setModes($modes);
        }

        // set collection to toolbar and apply sort
        $toolbar->setCollection($collection);

        $this->setChild('toolbar', $toolbar);
        $this->_eventManager->dispatch(
            'catalog_block_product_list_collection',
            ['collection' => $this->_getProductCollection()]
        );
		

        $this->_getProductCollection()->load();

        return parent::_beforeToHtml();
    }

    /**
     * Retrieve Toolbar block
     *
     * @return \Magento\Catalog\Block\Product\ProductList\Toolbar
     */
    public function getToolbarBlock()
    {
        $blockName = $this->getToolbarBlockName();
		//echo $blockName;
        if ($blockName) {
            $block = $this->getLayout()->getBlock($blockName);
            if ($block) {
                return $block;
            }
        }
        $block = $this->getLayout()->createBlock($this->_defaultToolbarBlock, uniqid(microtime()));
        return $block;
    }

    /**
     * Retrieve additional blocks html
     *
     * @return string
     */
    public function getAdditionalHtml()
    {
        return $this->getChildHtml('additional');
    }

    /**
     * Retrieve list toolbar HTML
     *
     * @return string
     */
    public function getToolbarHtml()
    {
        return $this->getChildHtml('toolbar');
    }

    /**
     * @param AbstractCollection $collection
     * @return $this
     */
    public function setCollection($collection)
    {
        $this->_productCollection = $collection;
        return $this;
    }

    /**
     * @param array|string|integer|\Magento\Framework\App\Config\Element $code
     * @return $this
     */
	
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


