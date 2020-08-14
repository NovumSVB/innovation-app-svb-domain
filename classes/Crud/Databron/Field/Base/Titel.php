<?php
namespace Crud\Custom\NovumSvb\Databron\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'titel' crud field from the 'databron' table.
 * This class is auto generated and should not be modified.
 */
abstract class Titel extends GenericString implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'titel';

	protected $sFieldLabel = 'Titel';

	protected $sIcon = 'edit';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getTitel';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Databron';


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['titel']) || empty($aPostedData['titel']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Titel" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
