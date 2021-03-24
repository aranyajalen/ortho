<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Ortho\Featuredproduct\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Setup\EavSetup;

/**
 * Class InstallData
 */
class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * Install new Swatch entity
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        /**
         * Install eav entity types to the eav/entity_type table
         */
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'ortho_featuredproduct',
            [
				'group'             => 'General',
				'type'              => 'int',
				'backend'           => '',
				'frontend'          => '',
				'label'             => 'Featured product',
				'input'             => 'boolean',
				'class'             => '',
				'source' 			=> 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
            	'global' 			=> \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
				'visible'           => true,
				'required'          => false,
				'user_defined'      => true,
				'default'           => '0',
				'searchable'        => false,
				'filterable'        => false,
				'comparable'        => false,
				'visible_on_front'  => false,
				'unique'            => false,
				'apply_to'          => 'simple,configurable,virtual,bundle,downloadable'
            ]
        );
    }
}
