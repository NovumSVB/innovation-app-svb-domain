<?php
namespace Crud\Custom\NovumSvb\Grondslag\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Crud\IRequiredField;
use Model\Custom\NovumSvb\WetQuery;

/**
 * Base class that represents the 'wet_id' crud field from the 'grondslag' table.
 * This class is auto generated and should not be modified.
 */
abstract class WetId extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField, IRequiredField
{
	protected $sFieldName = 'wet_id';

	protected $sFieldLabel = 'Wet';

	protected $sIcon = 'user';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getWetId';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Grondslag';


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = \Model\Custom\NovumSvb\WetQuery::create()->orderBytitel()->find();
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows, "gettitel", $mSelectedItem, "getId");
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return \Model\Custom\NovumSvb\WetQuery::create()->findOneById($iItemId)->gettitel();
		}
		return null;
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


		if(!isset($aPostedData['wet_id']) || empty($aPostedData['wet_id']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Wet" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
