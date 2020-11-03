<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'schulden_bij_cjib' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class SchuldenBijCjib extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'schulden_bij_cjib';
	protected $sFieldLabel = 'Heeft u momenteel schulden bij het CJIB waarvoor geen betalingsregeling voor is getroffen?';
	protected $sIcon = 'check';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getSchuldenBijCjib';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
