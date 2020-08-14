<?php
namespace Crud\Custom\NovumSvb\Grondslag\Field;

use Core\Utils;
use Crud\Custom\NovumSvb\Grondslag\Field\Base\DatabronId as BaseDatabronId;
use Model\Custom\NovumSvb\Databron;
use Model\Custom\NovumSvb\DatabronQuery;

/**
 * Skeleton subclass for representing databron_id field from the grondslag table .
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
final class DatabronId extends BaseDatabronId
{

    public function getLookups($mSelectedItem = null)
    {
        $aAllRows = DatabronQuery::create()->orderBytitel()->find();

        foreach($aAllRows as $oObject)
        {
            if(!$oObject instanceof Databron)
            {
                continue;
            }
            $sSelected = '';
            if ($mSelectedItem == $oObject->getId()) {
                $sSelected = 'selected';
            }
            $aDropdownOptions[] = [
                'id' => $oObject->getId(),
                'extra' => $oObject->getCode(),
                'selected' => $sSelected,
                'label' => $oObject->getTitel()
            ];
        }

        return $aDropdownOptions;
    }


}
