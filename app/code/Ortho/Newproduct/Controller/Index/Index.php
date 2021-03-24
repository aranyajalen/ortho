<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ortho\Newproduct\Controller\Index;
use \Magento\Framework\App\Action\Action;

class Index extends \Magento\Framework\App\Action\Action
{
     /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
  

  

    public function execute() {
        $resultPage = $this->resultPageFactory->create();
        $this->_objectManager->get('Ortho\Newproduct\Helper\Data')->getBreadcrumbs($resultPage);
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
	    //return $this->resultPageFactory->create();
    }
}
