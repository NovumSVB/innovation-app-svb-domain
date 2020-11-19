<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericDate;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'start_ww' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class StartWw extends GenericDate implements IFilterableField, IEditableField
{
	protected $sFieldName = 'start_ww';
	protected $sFieldLabel = 'Vanaf wanneer krijgt u WW?';
	protected $sIcon = 'calendar';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getStartWw';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
