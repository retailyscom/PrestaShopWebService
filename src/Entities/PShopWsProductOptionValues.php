<?php
/**
 * @author Jan Ruda <ruda at retailys.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsProductOptionValues extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getList()
    {
        $options['resource'] = 'product_option_values';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->product_option_values->product_option_value);
    }
    
    public function getById($id)
    {
        $options['resource'] = 'product_options';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->product_option_value);
    }

    public function getByIdAttributeGroup($idAttributeGroup)
    {
        $options['resource'] = 'product_option_values';
        $options['filter[id_attribute_group]'] = $idAttributeGroup;
        $options['display'] = 'full';
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($object->product_option_values->product_option_value);
    }
}
