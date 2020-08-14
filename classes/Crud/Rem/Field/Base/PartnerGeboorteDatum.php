<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericDate;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_geboorte_datum' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerGeboorteDatum extends GenericDate implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_geboorte_datum';

	protected $sFieldLabel = 'Geboortedatum van uw partner';

	protected $sIcon = 'calendar';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerGeboorteDatum';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
