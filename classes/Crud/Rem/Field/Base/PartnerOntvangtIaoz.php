<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_ontvangt_iaoz' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerOntvangtIaoz extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_ontvangt_iaoz';

	protected $sFieldLabel = 'Ontvangt u een IAOZ uitkering?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerOntvangtIaoz';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
