<?php
/**
 * @author Jan Ruda <ruda at retailys.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsShopGroups extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getList()
    {
        $options['resource'] = 'shop_groups';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->shop_groups->shop_group);
    }

    public function getById($id)
    {
        $options['resource'] = 'shop_groups';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->shop_group);
    }
}
