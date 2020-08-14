<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'heeft_bankrekening_emigratieland' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class HeeftBankrekeningEmigratieland extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'heeft_bankrekening_emigratieland';

	protected $sFieldLabel = 'Heeft u al een bankrekening in het land waar u heen remigreert?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getHeeftBankrekeningEmigratieland';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
