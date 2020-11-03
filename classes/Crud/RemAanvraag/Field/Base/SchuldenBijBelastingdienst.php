<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'schulden_bij_belastingdienst' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class SchuldenBijBelastingdienst extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'schulden_bij_belastingdienst';
	protected $sFieldLabel = 'Heeft u momenteel schulden bij de de Belastingdienst waarvoor geen betalingsregeling voor is getroffen?';
	protected $sIcon = 'check';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getSchuldenBijBelastingdienst';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
