<?php
namespace Crud\Custom\NovumSvb\Rem\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_ontvangt_wia' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerOntvangtWia extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_ontvangt_wia';

	protected $sFieldLabel = 'Ontvagt u een WIA uitkering?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerOntvangtWia';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rem';
}
