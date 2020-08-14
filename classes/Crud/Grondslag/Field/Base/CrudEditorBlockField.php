<?php
namespace Crud\Custom\NovumSvb\Grondslag\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Model\Setting\CrudManager\CrudEditorBlockFieldQuery;

/**
 * Base class that represents the 'crud_editor_block_field' crud field from the 'grondslag' table.
 * This class is auto generated and should not be modified.
 */
abstract class CrudEditorBlockField extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField
{
	protected $sFieldName = 'crud_editor_block_field';

	protected $sFieldLabel = 'Mapping';

	protected $sIcon = 'edit';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getCrudEditorBlockField';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Grondslag';


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = \Model\Setting\CrudManager\CrudEditorBlockFieldQuery::create()->orderByfield()->find();
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows, "getfield", $mSelectedItem, "getId");
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return \Model\Setting\CrudManager\CrudEditorBlockFieldQuery::create()->findOneById($iItemId)->getfield();
		}
		return null;
	}


	public function getDataType(): string
	{
		return 'lookup';
	}
}
