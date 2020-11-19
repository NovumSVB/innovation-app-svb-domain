<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'ontvangt_wamil' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class OntvangtWamil extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'ontvangt_wamil';
	protected $sFieldLabel = 'Ontvangt u een Wamil uitkering?';
	protected $sIcon = 'check';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getOntvangtWamil';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
