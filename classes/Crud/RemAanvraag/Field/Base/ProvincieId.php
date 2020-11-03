<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'provincie_id' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class ProvincieId extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField, IRequiredField
{
	protected $sFieldName = 'provincie_id';
	protected $sFieldLabel = 'Provincie';
	protected $sIcon = 'map-marker';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getProvincieId';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function getLookups($mSelectedItem = null)
	{
		$sUrl = "http://api.gemeente.demo.novum.nu/v2/rest/provincie/";
		$sJsonRows = file_get_contents($sUrl);
		$aAllRows = json_decode($sJsonRows, true);
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows["results"], "", $mSelectedItem);
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		$sUrl = "http://api.gemeente.demo.novum.nu/v2/rest/provincie/" . $iItemId;
		$sJsonRows = file_get_contents($sUrl);
		$aLookup = json_decode($sJsonRows, true);
		return $aLookup;
	}


	public function getDataType(): string
	{
		return 'lookup';
	}


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['provincie_id']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Provincie" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
