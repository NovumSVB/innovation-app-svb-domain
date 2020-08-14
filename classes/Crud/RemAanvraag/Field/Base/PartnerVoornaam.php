<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'partner_voornaam' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerVoornaam extends GenericString implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'partner_voornaam';

	protected $sFieldLabel = 'Voornaam partner';

	protected $sIcon = 'tag';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerVoornaam';

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


		if(!isset($aPostedData['partner_voornaam']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Voornaam partner" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
