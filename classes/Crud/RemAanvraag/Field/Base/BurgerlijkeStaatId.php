<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'burgerlijke_staat_id' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class BurgerlijkeStaatId extends GenericString implements IFilterableField, IEditableField
{
	protected $sFieldName = 'burgerlijke_staat_id';

	protected $sFieldLabel = 'Wat is uw burgelijke staat?';

	protected $sIcon = 'group';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getBurgerlijkeStaatId';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
