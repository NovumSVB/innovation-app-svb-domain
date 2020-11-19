<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_zelfde_adres' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerZelfdeAdres extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_zelfde_adres';
	protected $sFieldLabel = 'Woont uw partner op hetzelfde adres?';
	protected $sIcon = 'check';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getPartnerZelfdeAdres';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
