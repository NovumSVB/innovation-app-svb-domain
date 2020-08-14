<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericDate;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'geboorte_datum' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class GeboorteDatum extends GenericDate implements IFilterableField, IEditableField
{
	protected $sFieldName = 'geboorte_datum';

	protected $sFieldLabel = 'Wat is uw geboortedatum';

	protected $sIcon = 'calendar';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getGeboorteDatum';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
