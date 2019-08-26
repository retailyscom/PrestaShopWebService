<?php
/**
 * @author Jan Ruda <ruda at retailys.com>
 */

namespace PshopWs\Entities;

use PshopWs\Services\ServiceSimpleXmlToArray;

class PShopWsTaxRules extends PShopWs
{
    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
    }

    public function getList()
    {
        $options['resource'] = 'tax_rules';
        $options['display'] = 'full';
        $objects = $this->get($options);

        return ServiceSimpleXmlToArray::takeMultiple($objects->tax_rules->tax_rule);
    }

    public function getById($id)
    {
        $options['resource'] = 'tax_rules';
        $options['id'] = $id;
        $object = $this->get($options);

        return ServiceSimpleXmlToArray::take($object->tax_rule);
    }
}
