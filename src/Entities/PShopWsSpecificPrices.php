<?php
/**
 * @author Jan Ruda <ruda at retailys.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsSpecificPrices extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getList()
    {
        $options['resource'] = 'specific_prices';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->specific_prices->specific_price);
    }
    
    public function getById($id)
    {
        $options['resource'] = 'specific_prices';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->specific_price);
    }

    public function getByIdProduct($idProduct)
    {
        $options['resource'] = 'specific_prices';
        $options['filter[id_product]'] = $idProduct;
        $options['display'] = 'full';
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($object->specific_prices->specific_price);
    }

    public function getByIdProductAttribute($idProductAttribute)
    {
        $options['resource'] = 'specific_prices';
        $options['filter[id_product_attribute]'] = $idProductAttribute;
        $options['display'] = 'full';
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($object->specific_prices->specific_price);
    }

    public function getByIdProductAndIdProductAttribute($idProduct, $idProductAttribute)
    {
        $options['resource'] = 'specific_prices';
        $options['filter[id_product]'] = $idProduct;
        $options['filter[id_product_attribute]'] = $idProductAttribute;
        $options['display'] = 'full';
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($object->specific_prices->specific_price);
    }
}
