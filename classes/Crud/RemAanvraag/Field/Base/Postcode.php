<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericPostcode;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'postcode' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class Postcode extends GenericPostcode implements IFilterableField, IEditableField
{
	protected $sFieldName = 'postcode';

	protected $sFieldLabel = 'Postcode';

	protected $sIcon = 'envelope';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPostcode';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
