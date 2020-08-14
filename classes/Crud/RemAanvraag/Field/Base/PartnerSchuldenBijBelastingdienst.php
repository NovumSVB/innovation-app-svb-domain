<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

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

	protected $sFieldLabel = 'Heeft uw partner momenteel schulden bij de de Belastingdienst waarvoor geen betalingsregeling voor is getroffen?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerSchuldenBijBelastingdienst';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
