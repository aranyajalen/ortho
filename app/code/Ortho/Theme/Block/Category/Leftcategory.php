<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

/**
 * Catalog breadcrumbs
 */
namespace Ortho\Theme\Block\category;


class Leftcategory extends \Magento\Framework\View\Element\Template
{
    
	/**
     * @var \Magento\Catalog\Helper\Category
     */
    protected $_categoryHelper;
	
	/**
     * @var \Magento\Catalog\Model\Indexer\Category\Flat\State
    */
    public $flatState;
	
    public $topMenu;
	
	/**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Catalog\Model\CategoryFactory $categoryFactory
	 * @param \Magento\Catalog\Helper\Category $categoryHelper
     * @param \Magento\Catalog\Helper\Category $catalogCategory
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Catalog\Model\Indexer\Category\Flat\State $flatState
     * @param array $data
     */
	
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Helper\Category $categoryHelper,
		\Magento\Theme\Block\Html\Topmenu $topMenu,
        \Magento\Catalog\Model\Indexer\Category\Flat\State $flatState
        
    ) {
        $this->_categoryHelper = $categoryHelper;
        $this->flatState = $flatState;
        $this->topMenu = $topMenu;
        parent::__construct($context);
    }
	
	/**
     * Return Category Helper For Category Url
     */ 
	public function getCategoryHelper()
    {
        return $this->_categoryHelper;
    }
	/**
	* Get Html Structure of Menu
	*/
	
	
	public function getHtml()
    {
        return $this->topMenu->getHtml();
    }
	
	
	public function getStoreCategories($sorted = false, $asCollection = false, $toLoad = true)
    {
        return $this->_categoryHelper->getStoreCategories($sorted , $asCollection, $toLoad);
    }
	
	/**
	* Get Sorted Category Collection  
	* Get Category Collection
	*/
	
	public function getChildCategories($category)
    {
           if ($this->flatState->isFlatEnabled() && $category->getUseFlatResource()) {
                $subcategories = (array)$category->getChildrenNodes();
            } else {
                $subcategories = $category->getChildren();
            }
            return $subcategories;
    }
	
}
