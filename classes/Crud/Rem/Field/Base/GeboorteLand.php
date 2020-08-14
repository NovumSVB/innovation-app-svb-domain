<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'geboorte_land' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class GeboorteLand extends GenericString implements IFilterableField, IEditableField
{
	protected $sFieldName = 'geboorte_land';

	protected $sFieldLabel = 'In welk land bent u geboren?';

	protected $sIcon = 'map-marker';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getGeboorteLand';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
