<?php
namespace Crud\Custom\NovumSvb\Anw\Base;

use Crud\Custom\NovumSvb\Anw\ICrudCollectionField as BaseCollectionField;
use Crud\FieldCollection;
use Crud\ICrudFieldIterator;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Crud\Custom\NovumSvb\Anw\CrudFieldIterator instead if you need to override or add functionality.
 */
abstract class CrudFieldIterator extends FieldCollection implements ICrudFieldIterator
{
	/**
	 * $param BaseCollectionField[] $aFields
	 */
	public function __construct(array $aFields = null)
	{
		parent::__construct($aFields);
	}


	public function add(BaseCollectionField $oField = null)
	{
		parent::add($oField);
	}


	public function current(): BaseCollectionField
	{
		return parent::current();
	}
}
