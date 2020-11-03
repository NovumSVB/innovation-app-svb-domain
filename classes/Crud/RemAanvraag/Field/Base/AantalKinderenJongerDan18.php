<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericInteger;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'aantal_kinderen_jonger_dan_18' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class AantalKinderenJongerDan18 extends GenericInteger implements IFilterableField, IEditableField
{
	protected $sFieldName = 'aantal_kinderen_jonger_dan_18';
	protected $sFieldLabel = 'Hoeveel kinderen jonger dan 18 jaar heeft u?';
	protected $sIcon = 'check';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getAantalKinderenJongerDan18';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
