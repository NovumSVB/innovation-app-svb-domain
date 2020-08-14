<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'regeling_belastingdienst' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class RegelingBelastingdienst extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'regeling_belastingdienst';

	protected $sFieldLabel = 'Heeft u een betalingsregeling afgesproken voor uw schuld bij de Belastingdienst?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getRegelingBelastingdienst';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
