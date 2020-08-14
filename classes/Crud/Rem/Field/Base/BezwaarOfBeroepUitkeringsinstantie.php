<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'bezwaar_of_beroep_uitkeringsinstantie' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class BezwaarOfBeroepUitkeringsinstantie extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'bezwaar_of_beroep_uitkeringsinstantie';

	protected $sFieldLabel = 'Loopt er bezwaar of beroep tegen de uitkeringsinstantie?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getBezwaarOfBeroepUitkeringsinstantie';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
