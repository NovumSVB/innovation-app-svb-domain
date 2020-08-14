<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'gegevens_naar_waarheid_ingevuld' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class GegevensNaarWaarheidIngevuld extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'gegevens_naar_waarheid_ingevuld';

	protected $sFieldLabel = 'Ik heb mijn gegevens naar waarheid ingevuld.  + handtekening';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getGegevensNaarWaarheidIngevuld';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
