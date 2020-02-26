<?php
/**
 * @author Jan Ruda <ruda at retailys.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsProductOptions extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getList()
    {
        $options['resource'] = 'product_options';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->product_options->product_option);
    }
    
    public function getById($id)
    {
        $options['resource'] = 'product_options';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->product_option);
    }
}
