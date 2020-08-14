<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'ontvangt_ww' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class OntvangtWw extends GenericBoolean implements IFilterableField, IEditableField
{
	protected $sFieldName = 'ontvangt_ww';

	protected $sFieldLabel = 'Ontvangt u een ww uitkering?';

	protected $sIcon = 'check';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getOntvangtWw';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
