<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericDate;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_ww_start' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerWwStart extends GenericDate implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_ww_start';

	protected $sFieldLabel = 'Vanaf wanneer krijgt uw partner WW?';

	protected $sIcon = 'calendar';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerWwStart';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
