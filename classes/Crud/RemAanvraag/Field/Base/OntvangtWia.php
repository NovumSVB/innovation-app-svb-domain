<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'ontvangt_wia' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class OntvangtWia extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'ontvangt_wia';
	protected $sFieldLabel = 'Ontvagt u een WIA uitkering?';
	protected $sIcon = 'check';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getOntvangtWia';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
