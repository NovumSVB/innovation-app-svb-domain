<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_regeling_belastingdienst' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerRegelingBelastingdienst extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_regeling_belastingdienst';

	protected $sFieldLabel = 'Heeft uw partner een betalingsregeling afgesproken voor zijn of haar schuld bij de Belastingdienst?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerRegelingBelastingdienst';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';
}
