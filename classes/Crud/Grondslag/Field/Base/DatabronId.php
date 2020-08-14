<?php
namespace Crud\Custom\NovumSvb\Grondslag\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Crud\IRequiredField;
use Model\Custom\NovumSvb\DatabronQuery;

/**
 * Base class that represents the 'databron_id' crud field from the 'grondslag' table.
 * This class is auto generated and should not be modified.
 */
abstract class DatabronId extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField, IRequiredField
{
	protected $sFieldName = 'databron_id';

	protected $sFieldLabel = 'Databron';

	protected $sIcon = 'user';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getDatabronId';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Grondslag';


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = \Model\Custom\NovumSvb\DatabronQuery::create()->orderBytitel()->find();
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows, "gettitel", $mSelectedItem, "getId");
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return \Model\Custom\NovumSvb\DatabronQuery::create()->findOneById($iItemId)->gettitel();
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


		if(!isset($aPostedData['databron_id']) || empty($aPostedData['databron_id']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Databron" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
