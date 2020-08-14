<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'ontvangt_iow' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class OntvangtIow extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'ontvangt_iow';

	protected $sFieldLabel = 'Ontvangt u een IOW uitkering?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getOntvangtIow';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
