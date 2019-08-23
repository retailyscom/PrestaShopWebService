<?php
/**
 * @author Jan Ruda <ruda at retailys.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsStores extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getList()
    {
        $options['resource'] = 'stores';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->stores->store);
    }

    public function getById($id)
    {
        $options['resource'] = 'stores';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->store);
    }
}
