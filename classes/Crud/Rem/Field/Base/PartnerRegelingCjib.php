<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_regeling_cjib' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerRegelingCjib extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_regeling_cjib';

	protected $sFieldLabel = 'Heeft uw partner een betalingsregeling afgesproken voor zijn of haar schuld bij het CJIB?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerRegelingCjib';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
