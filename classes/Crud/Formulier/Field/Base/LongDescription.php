<?php
namespace Crud\Custom\NovumSvb\Formulier\Field\Base;

use Crud\Generic\Field\GenericTextarea;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'long_description' crud field from the 'formulieren' table.
 * This class is auto generated and should not be modified.
 */
abstract class LongDescription extends GenericTextarea implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'long_description';

	protected $sFieldLabel = 'Long description';

	protected $sIcon = 'info';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getLongDescription';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Formulier';


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['long_description']) || empty($aPostedData['long_description']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Long description" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
