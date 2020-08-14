<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_emigratie_verblijfsvergunning' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerEmigratieVerblijfsvergunning extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_emigratie_verblijfsvergunning';

	protected $sFieldLabel = 'Heeft uw partner een verblijfsvergunning van het land waar u naar toe emigreert?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerEmigratieVerblijfsvergunning';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
