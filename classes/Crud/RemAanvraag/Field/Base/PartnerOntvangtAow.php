<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_ontvangt_aow' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerOntvangtAow extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_ontvangt_aow';
	protected $sFieldLabel = 'Ontvangt uw partner een AOW uitkering?';
	protected $sIcon = 'check';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getPartnerOntvangtAow';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
