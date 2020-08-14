<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_voorlopige_hechtenis' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerVoorlopigeHechtenis extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_voorlopige_hechtenis';

	protected $sFieldLabel = 'Zit uw partner in de gevangenis of voorlopige hechtenis?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerVoorlopigeHechtenis';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
