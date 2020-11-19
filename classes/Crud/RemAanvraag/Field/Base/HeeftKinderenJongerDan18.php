<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'heeft_kinderen_jonger_dan_18' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class HeeftKinderenJongerDan18 extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'heeft_kinderen_jonger_dan_18';
	protected $sFieldLabel = 'Heeft u kinderen die jonger dan 18 jaar zijn?';
	protected $sIcon = 'check';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getHeeftKinderenJongerDan18';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
