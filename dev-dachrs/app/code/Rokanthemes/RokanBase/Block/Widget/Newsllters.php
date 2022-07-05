<?php
namespace Rokanthemes\RokanBase\Block\Widget;

/**
 * Super Deals List widget block
 * Class ProductsList
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
 
class Newsllters extends Template  implements BlockInterface
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->setTemplate('widget/newsllters.phtml');
    }
	
	public function getConfig($value=''){

	   $config = $this->getData($value);
	   return $config; 
	 
	}
	
	public function getCurrentTime() {
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$objDate = $objectManager->create('Magento\Framework\Stdlib\DateTime\DateTime');
		return $objDate->gmtDate('Y-m-d H:i');
	}
}
?>
