<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'samenwonend' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class Samenwonend extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'samenwonend';
	protected $sFieldLabel = 'Woont u samen in Nederland?';
	protected $sIcon = 'group';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getSamenwonend';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
