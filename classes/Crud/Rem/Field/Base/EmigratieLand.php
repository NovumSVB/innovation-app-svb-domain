<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'emigratie_land' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class EmigratieLand extends GenericString implements IFilterableField, IEditableField
{
	protected $sFieldName = 'emigratie_land';

	protected $sFieldLabel = 'Naar welk land wilt u emigreren?';

	protected $sIcon = 'map-marker';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getEmigratieLand';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
