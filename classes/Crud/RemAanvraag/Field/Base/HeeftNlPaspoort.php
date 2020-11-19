<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Custom\NovumSvb\RemAanvraag\CrudFieldIterator;
use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'heeft_nl_paspoort' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class HeeftNlPaspoort extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'heeft_nl_paspoort';
	protected $sFieldLabel = 'Heeft u een Nederlands paspoort of ID-kaart?';
	protected $sIcon = 'check';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getHeeftNlPaspoort';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
