<?php
namespace Crud\Custom\NovumSvb\Rbb\Field\Base;

use Crud\Custom\NovumSvb\Rbb\CrudFieldIterator;
use Crud\Generic\Field\GenericMoney;
use Crud\IEditableField;
use Crud\IFilterableField;

/**
 * Base class that represents the 'bedrag' crud field from the 'rbb' table.
 * This class is auto generated and should not be modified.
 */
abstract class Bedrag extends GenericMoney implements IFilterableField, IEditableField
{
	protected $sFieldName = 'bedrag';
	protected $sFieldLabel = 'Bedrag';
	protected $sIcon = 'money';
	protected $sPlaceHolder = '';
	protected $sGetter = 'getBedrag';
	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Rbb';


	public function isUniqueKey(): bool
	{
		return false;
	}
}
