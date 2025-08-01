<?php

namespace Orangecat\WhatsAppButton\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Request\Http;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    protected $_request;

    public function __construct(
        Http   $request,
        Context $context
    )
    {
        $this->_request = $request;
        parent::__construct($context);
    }

    public function isEnabled()
    {
        return $this->getConfig('whatsappbutton/general/enabled');
    }

    public function getConfig($key)
    {
        return $this->scopeConfig->getValue($key, ScopeInterface::SCOPE_STORE);
    }

    public function canShow()
    {
        $all = $this->getConfig('whatsappbutton/where/all');
        if ($all): return true; endif;

        $home = $this->getConfig('whatsappbutton/where/home');
        if ($home && $this->isHomePage()): return true; endif;

        $cms = $this->getConfig('whatsappbutton/where/cms');
        if ($cms && $this->isCmsPage()): return true; endif;

        $product = $this->getConfig('whatsappbutton/where/product');
        if ($product && $this->isProductPage()): return true; endif;

        $category = $this->getConfig('whatsappbutton/where/category');
        if ($category && $this->isCategoryPage()): return true; endif;

        $search = $this->getConfig('whatsappbutton/where/search');
        if ($search && $this->isSearchPage()): return true; endif;

        $contact = $this->getConfig('whatsappbutton/where/contact');
        if ($contact && $this->isContactPage()): return true; endif;

        return false;
    }

    public function isHomePage()
    {
        if ($this->_request->getFullActionName() == 'cms_index_index') {
            return true;
        }
        return false;
    }

    public function isCmsPage()
    {
        if ($this->_request->getFullActionName() == 'cms_page_view') {
            return true;
        }
        return false;
    }

    public function isProductPage()
    {
        if ($this->_request->getFullActionName() == 'catalog_product_view') {
            return true;
        }
        return false;
    }

    public function isCategoryPage()
    {
        if ($this->_request->getFullActionName() == 'catalog_category_view') {
            return true;
        }
        return false;
    }

    public function isSearchPage()
    {
        if ($this->_request->getFullActionName() == 'catalogsearch_result_index'
            || $this->_request->getFullActionName() == 'catalogsearch_advanced_index'
            || $this->_request->getFullActionName() == 'catalogsearch_advanced_result'
            || $this->_request->getFullActionName() == 'search_term_popular') {
            return true;
        }
        return false;
    }

    public function isContactPage()
    {
        if ($this->_request->getFullActionName() == 'contact_index_index') {
            return true;
        }
        return false;
    }

    function getSize()
    {
        $width = trim($this->getConfig('whatsappbutton/icon/width'));
        $height = trim($this->getConfig('whatsappbutton/icon/height'));

        return array(
            'width' => $width,
            'height' => $height
        );
    }

    function getMessage()
    {
        return trim($this->getConfig('whatsappbutton/general/message'));
    }

    function getTelephone()
    {
        return trim($this->getConfig('whatsappbutton/general/telephone'));
    }

    function getPulse()
    {
        return $this->getConfig('whatsappbutton/icon/pulse');
    }

    function getImage()
    {
        return $this->getConfig('whatsappbutton/icon/image');
    }

    function getCss()
    {
        $area = $this->getConfig('whatsappbutton/position/area');
        $xdistance = trim($this->getConfig('whatsappbutton/position/xdistance'));
        $ydistance = trim($this->getConfig('whatsappbutton/position/ydistance'));

        $style = 'style="';
        switch ($area) {
            case 'bottom-right':
                $class = 'whatsappbutton-bottom-right';
                $style .= 'right:' . $xdistance . 'px; bottom:' . $ydistance . 'px;';
                break;
            case 'bottom-left':
                $class = 'whatsappbutton-bottom-left';
                $style .= 'left:' . $xdistance . 'px; bottom:' . $ydistance . 'px;';
                break;
            case 'top-right':
                $class = 'whatsappbutton-top-right';
                $style .= 'right:' . $xdistance . 'px; top:' . $ydistance . 'px;';
                break;
            case 'top-left':
                $class = 'whatsappbutton-top-left';
                $style .= 'left:' . $xdistance . 'px; top:' . $ydistance . 'px;';
                break;
            default:
                $class = 'whatsappbutton-bottom-right';
                $style .= 'right:' . $xdistance . 'px; bottom:' . $ydistance . 'px;';
        }
        $style .= '"';

        return array(
            'class' => $class,
            'style' => $style
        );
    }
}
