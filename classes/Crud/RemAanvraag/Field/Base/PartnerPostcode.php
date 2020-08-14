<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericPostcode;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'partner_postcode' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class PartnerPostcode extends GenericPostcode implements IFilterableField, IEditableField
{
	protected $sFieldName = 'partner_postcode';

	protected $sFieldLabel = 'Postcode (partner)';

	protected $sIcon = 'envelope';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPartnerPostcode';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
