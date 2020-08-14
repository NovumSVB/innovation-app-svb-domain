<?php
namespace Crud\Custom\NovumSvb\Formulier\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Crud\IRequiredField;
use Model\Setting\CrudManager\CrudEditorQuery;

/**
 * Base class that represents the 'crud_editor_id' crud field from the 'formulieren' table.
 * This class is auto generated and should not be modified.
 */
abstract class CrudEditorId extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField, IRequiredField
{
	protected $sFieldName = 'crud_editor_id';

	protected $sFieldLabel = 'Formulier definitie';

	protected $sIcon = 'edit';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getCrudEditorId';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Formulier';


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = \Model\Setting\CrudManager\CrudEditorQuery::create()->orderByname()->find();
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows, "getname", $mSelectedItem, "getId");
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return \Model\Setting\CrudManager\CrudEditorQuery::create()->findOneById($iItemId)->getname();
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


		if(!isset($aPostedData['crud_editor_id']) || empty($aPostedData['crud_editor_id']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Formulier definitie" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
