<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_remigratie' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerRemigratie extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_remigratie';
	protected $sFieldLabel = 'Remigreert uw partner mee?';
	protected $sIcon = 'group';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getPartnerRemigratie';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
