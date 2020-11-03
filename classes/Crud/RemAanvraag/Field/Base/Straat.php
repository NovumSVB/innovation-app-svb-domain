<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'straat' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class Straat extends GenericString implements IFilterableField, IEditableField
{
	protected $sFieldName = 'straat';
	protected $sFieldLabel = 'Straat';
	protected $sIcon = 'home';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getStraat';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
