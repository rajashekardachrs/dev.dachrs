<?php

namespace Rokanthemes\Themeoption\Model\Config;

class Superdealsbackground extends \Magento\Config\Model\Config\Backend\Image
{
    
    const UPLOAD_DIR = 'rokanthemes/superdeals/background';

    protected function _getUploadDir()
    {
        return $this->_mediaDirectory->getAbsolutePath($this->_appendScopeInfo(self::UPLOAD_DIR));
    }

    protected function _addWhetherScopeInfo()
    {
        return true;
    }

    protected function _getAllowedExtensions()
    {
        return ['jpg', 'jpeg', 'png'];
    }
}