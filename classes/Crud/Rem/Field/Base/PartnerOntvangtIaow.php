<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_ontvangt_iaow' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerOntvangtIaow extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_ontvangt_iaow';

	protected $sFieldLabel = 'Ontvangt u een IAOW uitkering?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerOntvangtIaow';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
