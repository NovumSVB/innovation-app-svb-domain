<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'post_ontvangen_toekomstig_adres' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PostOntvangenToekomstigAdres extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'post_ontvangen_toekomstig_adres';
	protected $sFieldLabel = 'Wilt u daar post ontvangen?';
	protected $sIcon = 'edit';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getPostOntvangenToekomstigAdres';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
