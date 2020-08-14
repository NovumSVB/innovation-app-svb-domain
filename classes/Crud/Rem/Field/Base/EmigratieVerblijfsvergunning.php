<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'emigratie_verblijfsvergunning' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class EmigratieVerblijfsvergunning extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'emigratie_verblijfsvergunning';

	protected $sFieldLabel = 'Heeft u een verblijfsvergunning van het land waar u naar toe emigreert?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getEmigratieVerblijfsvergunning';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
