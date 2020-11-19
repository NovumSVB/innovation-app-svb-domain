<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericBsn;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'partner_bsn' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerBsn extends GenericBsn implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'partner_bsn';
	protected $sFieldLabel = 'Wat is het burgerservicenummer (BSN) van uw partner?';
	protected $sIcon = 'user';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getPartnerBsn';
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


		if(!isset($aPostedData['partner_bsn']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Wat is het burgerservicenummer (BSN) van uw partner?" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
