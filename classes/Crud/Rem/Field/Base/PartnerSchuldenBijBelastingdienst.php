<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_schulden_bij_belastingdienst' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerSchuldenBijBelastingdienst extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_schulden_bij_belastingdienst';

	protected $sFieldLabel = 'Heeft uw partner schulden bij de Belastingdienst?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerSchuldenBijBelastingdienst';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
