<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericBsn;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'bsn' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class Bsn extends GenericBsn implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'bsn';

	protected $sFieldLabel = 'Wat is uw burgerservicenummer (BSN)';

	protected $sIcon = 'user';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getBsn';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['bsn']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Wat is uw burgerservicenummer (BSN)" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
