<?php
/**
 * Orange Cat
 * Copyright (C) 2018 Orange Cat
 *
 * NOTICE OF LICENSE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see http://opensource.org/licenses/gpl-3.0.html
 *
 * @category Orangecat
 * @package Orangecat_WhatsAppButton
 * @copyright Copyright (c) 2018 Orange Cat
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License,version 3 (GPL-3.0)
 * @author Oliverio Gombert <olivertar@gmail.com>
 */

namespace Orangecat\WhatsAppButton\Helper;

class Data extends \Orangecat\Base\Helper\Data
{
    public function isEnabled()
    {
        return $this->getConfig('whatsappbutton/general/enabled');
    }

    public function canShow()
    {
        $all = $this->getConfig('whatsappbutton/where/all');
        if($all): return true; endif;
        
        $home = $this->getConfig('whatsappbutton/where/home');
        if($home && $this->isHomePage()): return true; endif;
        
        $cms = $this->getConfig('whatsappbutton/where/cms');
        if($cms && $this->isCmsPage()): return true; endif;
        
        $product = $this->getConfig('whatsappbutton/where/product');
        if($product && $this->isProductPage()): return true; endif;
        
        $category = $this->getConfig('whatsappbutton/where/category');
        if($category && $this->isCategoryPage()): return true; endif;
        
        $search = $this->getConfig('whatsappbutton/where/search');
        if($search && $this->isSearchPage()): return true; endif;
        
        $contact = $this->getConfig('whatsappbutton/where/contact');
        if($contact && $this->isContactPage()): return true; endif;

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
                $style.= 'right:'.$xdistance.'px; bottom:'.$ydistance.'px;';
                break;
            case 'bottom-left':
                $class = 'whatsappbutton-bottom-left';
                $style.= 'left:'.$xdistance.'px; bottom:'.$ydistance.'px;';
                break;
            case 'top-right':
                $class = 'whatsappbutton-top-right';
                $style.= 'right:'.$xdistance.'px; top:'.$ydistance.'px;';
                break;
            case 'top-left':
                $class = 'whatsappbutton-top-left';
                $style.= 'left:'.$xdistance.'px; top:'.$ydistance.'px;';
                break;
            default:
                $class = 'whatsappbutton-bottom-right';
                $style.= 'right:'.$xdistance.'px; bottom:'.$ydistance.'px;';
        }
        $style.= '"';
        
        return array(
            'class' => $class,
            'style' => $style
        );
    }
}