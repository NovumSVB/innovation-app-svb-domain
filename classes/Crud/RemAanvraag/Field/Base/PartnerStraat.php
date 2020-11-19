<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_straat' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerStraat extends GenericString implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_straat';
	protected $sFieldLabel = 'Straat (partner)';
	protected $sIcon = 'home';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getPartnerStraat';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
