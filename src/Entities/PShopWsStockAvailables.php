<?php
/**
 * @author Jan Ruda <ruda at retailys.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsStockAvailables extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getList()
    {
        $options['resource'] = 'stock_availables';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->stock_availables->stock_available);
    }
    
    public function getById($id)
    {
        $options['resource'] = 'stock_availables';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->stock_available);
    }

    public function getByIdProduct($idProduct)
    {
        $options['resource'] = 'stock_availables';
        $options['filter[id_product]'] = $idProduct;
        $options['display'] = 'full';
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($object->stock_availables->stock_available);
    }

    public function getByIdProductAttribute($idProductAttribute)
    {
        $options['resource'] = 'stock_availables';
        $options['filter[id_product_attribute]'] = $idProductAttribute;
        $options['display'] = 'full';
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($object->stock_availables->stock_available);
    }
}
