Use this code to display special product block on homepage.{{block class="Ortho\Theme\Block\Product\ListProduct" name="product" category_id="3" template="Ortho_Theme::product/list_home.phtml"}}


{{block class="Ortho\Theme\Block\Product\ListProduct" name="product" category_id="3" template="Magento_Catalog::product/list.phtml"}}




<referenceContainer name="sidebar.additional">
			<block class="Ortho\Specialproduct\Block\Listhome" name="left.banner" template="Ortho_Specialproduct::list_home.phtml" />
		</referenceContainer>