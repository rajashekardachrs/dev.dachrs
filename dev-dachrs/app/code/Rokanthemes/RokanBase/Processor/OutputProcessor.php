<?php
namespace Rokanthemes\RokanBase\Processor;

use Magento\Framework\App\Request\Http as Request;
use Magento\Framework\App\View\Deployment\Version\StorageInterface;
use Rokanthemes\RokanBase\Api\Processor\OutputProcessorInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class OutputProcessor implements OutputProcessorInterface
{

    /**
     * @var Request
     */
    private $request;

    /**
     * @var string
     */
    private $deploymentVersion;
	
	/**
     * @var string
     */
    private $_urlInterface;
	
	/**
     * @var string
     */
	protected $_assetRepo;
	

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Request $request,
		\Magento\Framework\App\ProductMetadataInterface $productMetadata,
		\Magento\Framework\UrlInterface $urlInterface,    
		\Magento\Framework\View\Asset\Repository $assetRepo,
        StorageInterface $storage
    )
    {
		$this->scopeConfig = $scopeConfig;
        $this->request           = $request;
		$this->productMetadata = $productMetadata;
        $this->deploymentVersion = $storage->load();
		$this->_assetRepo = $assetRepo;
		$this->_urlInterface = $urlInterface;
    }

    /**
     * {@inheritdoc}
     */
    public function process($content)
    {
        if ($this->request->isAjax() || strpos($content, '{"') === 0) {
            return $content;
        }
		$getMagentoVersion = str_replace(".","",$this->productMetadata->getVersion());
		if($getMagentoVersion >= 243){
			return $content;
		}
		if (!preg_match_all('/<body([^>]*?)id=(\"|\'|)(.*?)(\"|\'| )(.*?)>/is', $content, $bodys)) {
			$content = str_replace('<body', '<body id="html-body"', $content);
		}
        return $content;
    }
}
