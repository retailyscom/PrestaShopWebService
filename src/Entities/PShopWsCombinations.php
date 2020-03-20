<?php
/**
 * @author Jan Ruda <ruda at retailys.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsCombinations extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getList()
    {
        $options['resource'] = 'combinations';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->combinations->combination);
    }

    public function getById($id)
    {
        $options['resource'] = 'combinations';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->combination);
    }

    public function getByIdProduct($idAttributeGroup)
    {
        $options['resource'] = 'combinations';
        $options['filter[id_product]'] = $idAttributeGroup;
        $options['display'] = 'full';
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($object->combinations->combination);
    }
}
