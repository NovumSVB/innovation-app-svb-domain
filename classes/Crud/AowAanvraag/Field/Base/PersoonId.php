<?php
namespace Crud\Custom\NovumSvb\AowAanvraag\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Crud\IRequiredField;
use Model\Custom\NovumSvb\PersoonQuery;

/**
 * Base class that represents the 'persoon_id' crud field from the 'aow_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PersoonId extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField, IRequiredField
{
	protected $sFieldName = 'persoon_id';

	protected $sFieldLabel = 'Persoon';

	protected $sIcon = 'user';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPersoonId';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\AowAanvraag';


	public function getDataType(): string
	{
		return 'lookup';
	}


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = PersoonQuery::create()->orderBybsn()->find();
		$aOptions = Utils::makeSelectOptions($aAllRows, "getbsn", $mSelectedItem);
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return PersoonQuery::create()->findOneById($iItemId)->getbsn();
		}
		return null;
	}


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['persoon_id']) || empty($aPostedData['persoon_id']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Persoon" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
