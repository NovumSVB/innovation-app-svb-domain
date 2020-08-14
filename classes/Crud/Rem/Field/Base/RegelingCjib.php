<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'regeling_cjib' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class RegelingCjib extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'regeling_cjib';

	protected $sFieldLabel = 'Heeft u een betalingsregeling afgesproken voor uw schuld bij het CJIB?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getRegelingCjib';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
