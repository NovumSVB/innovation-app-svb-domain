<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'kinderen_zelfde_adres' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class KinderenZelfdeAdres extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'kinderen_zelfde_adres';

	protected $sFieldLabel = 'Zijn uw kinderen ingeschreven op hetzelfde adres?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getKinderenZelfdeAdres';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
