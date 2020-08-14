<?php
namespace Crud\Custom\NovumSvb\Databron\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'documentation' crud field from the 'databron' table.
 * This class is auto generated and should not be modified.
 */
abstract class Documentation extends GenericString implements IFilterableField, IEditableField
{
	protected $sFieldName = 'documentation';

	protected $sFieldLabel = 'Documentatie url';

	protected $sIcon = 'globe';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getDocumentation';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Databron';
}
