<?php
namespace Crud\Custom\NovumSvb\Databron\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'url' crud field from the 'databron' table.
 * This class is auto generated and should not be modified.
 */
abstract class Url extends GenericString implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'url';

	protected $sFieldLabel = 'API url';

	protected $sIcon = 'globe';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getUrl';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Databron';


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['url']) || empty($aPostedData['url']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "API url" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
