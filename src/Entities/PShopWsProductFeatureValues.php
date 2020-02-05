<?php
/**
 * @author Jan Ruda <ruda at retailys.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsProductFeatureValues extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getList()
    {
        $options['resource'] = 'product_feature_values';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->product_feature_values->product_feature_value);
    }
    
    public function getById($id)
    {
        $options['resource'] = 'product_feature_values';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->product_feature_value);
    }

    public function getByIdFeature($idFeature)
    {
        $options['resource'] = 'product_feature_values';
        $options['filter[id_feature]'] = $idFeature;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->product_feature_value);
    }
    
}
