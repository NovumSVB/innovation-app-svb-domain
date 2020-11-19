<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericDate;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'immigratie_datum' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class ImmigratieDatum extends GenericDate implements IFilterableField, IEditableField
{
	protected $sFieldName = 'immigratie_datum';
	protected $sFieldLabel = 'Sinds wanneer woont u in Nederland?';
	protected $sIcon = 'calendar';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getImmigratieDatum';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
