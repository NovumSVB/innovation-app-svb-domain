<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_ontvangt_wamil' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerOntvangtWamil extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_ontvangt_wamil';

	protected $sFieldLabel = 'Ontvangt u een Wamil uitkering?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerOntvangtWamil';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
