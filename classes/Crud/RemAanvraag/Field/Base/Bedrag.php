<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericMoney;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'bedrag' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class Bedrag extends GenericMoney implements IFilterableField, IEditableField
{
	protected $sFieldName = 'bedrag';

	protected $sFieldLabel = 'Hoogte bedrag';

	protected $sIcon = 'money';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getBedrag';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
