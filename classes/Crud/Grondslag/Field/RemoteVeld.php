<?php
namespace Crud\Custom\NovumSvb\Grondslag\Field;

use Crud\Custom\NovumSvb\Grondslag\Field\Base\RemoteVeld as BaseRemoteVeld;
use Model\Custom\NovumSvb\DatabronQuery;

/**
 * Skeleton subclass for representing remote_veld field from the grondslag table .
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
final class RemoteVeld extends BaseRemoteVeld
{

    function getVisibleValue($iItemId)
    {
        $aLookups = $this->getLookups($iItemId);

        foreach($aLookups as $aItem)
        {
            if($aItem['selected'] == 'selected')
            {
                return $aItem['label'];
            }
        }
        return null;
    }

    function getLookups($mSelectedItem = null)
    {
        $oDatabronQuery = DatabronQuery::create();
        $aDataBronnen = $oDatabronQuery->find();
        $aLookups = [
            [
            'id' => null,
            'selected' => (empty($mSelectedItem)) ? 'selected' : null,
            'extra' => 'empty_item',
            'style' => 'display:block',
            'label' => 'Kies eerst een bron database'
            ]
        ];

        foreach($aDataBronnen as $oDataBron)
        {
            $sJson = file_get_contents($oDataBron->getUrl() . '/openapi.json');
            $aJson = json_decode($sJson, true);

            foreach($aJson['components']['schemas'] as $sEndpointName => $aFields)
            {
                if(isset($aFields['properties']) && !empty($aFields['properties']))
                {
                    foreach($aFields['properties'] as $sFieldName => $aField)
                    {
                        $sId = $sEndpointName . '.' . $sFieldName;
                        $aLookups[] =  [
                            'id' => $sId,
                            'style' => 'display:none',
                            'selected' => ($sId == $mSelectedItem) ? 'selected' : null,
                            'extra' => $oDataBron->getCode(),
                            'label' => $oDataBron->getCode() . ' - ' . $sId . '(' . $aField['title'] . ')'
                        ];
                    }
                }
            }
        }
        return $aLookups;
    }
}
