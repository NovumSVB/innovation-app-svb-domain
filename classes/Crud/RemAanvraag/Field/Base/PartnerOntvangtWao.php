<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_ontvangt_wao' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerOntvangtWao extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_ontvangt_wao';

	protected $sFieldLabel = 'Ontvanngt uw partner WAO uitkering?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerOntvangtWao';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
