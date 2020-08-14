<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'ontvangt_wao' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class OntvangtWao extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'ontvangt_wao';

	protected $sFieldLabel = 'Ontvangt u WAO uitkering?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getOntvangtWao';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
