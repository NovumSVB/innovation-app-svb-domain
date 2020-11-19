<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'voorlopige_hechtenis' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class VoorlopigeHechtenis extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'voorlopige_hechtenis';
	protected $sFieldLabel = 'Zit u in de gevangenis of voorlopige hechtenis?';
	protected $sIcon = 'check';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getVoorlopigeHechtenis';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
