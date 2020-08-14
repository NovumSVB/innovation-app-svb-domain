<?php
namespace Crud\Custom\NovumSvb\Formulier\Field\Base;

use Crud\Generic\Field\GenericTextarea;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'intro_text' crud field from the 'formulieren' table.
 * This class is auto generated and should not be modified.
 */
abstract class IntroText extends GenericTextarea implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'intro_text';

	protected $sFieldLabel = 'Omschrijving';

	protected $sIcon = 'info';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getIntroText';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Formulier';


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['intro_text']) || empty($aPostedData['intro_text']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Omschrijving" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
