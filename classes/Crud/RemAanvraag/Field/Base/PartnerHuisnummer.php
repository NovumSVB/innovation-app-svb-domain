<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_huisnummer' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerHuisnummer extends GenericString implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_huisnummer';
	protected $sFieldLabel = 'Huisnummer (partner)';
	protected $sIcon = 'home';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getPartnerHuisnummer';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
