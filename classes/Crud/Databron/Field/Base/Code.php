<?php
namespace Crud\Custom\NovumSvb\Databron\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'code' crud field from the 'databron' table.
 * This class is auto generated and should not be modified.
 */
abstract class Code extends GenericString implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'code';

	protected $sFieldLabel = 'Code';

	protected $sIcon = 'tag';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getCode';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Databron';


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['code']) || empty($aPostedData['code']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Code" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
