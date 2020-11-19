<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericTextarea;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'toekomstig_adres' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class ToekomstigAdres extends GenericTextarea implements IFilterableField, IEditableField
{
	protected $sFieldName = 'toekomstig_adres';
	protected $sFieldLabel = 'Wat is uw toekomstige adres?';
	protected $sIcon = 'edit';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getToekomstigAdres';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
