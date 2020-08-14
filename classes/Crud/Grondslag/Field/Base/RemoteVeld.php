<?php
namespace Crud\Custom\NovumSvb\Grondslag\Field\Base;

use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'remote_veld' crud field from the 'grondslag' table.
 * This class is auto generated and should not be modified.
 */
abstract class RemoteVeld extends GenericLookup implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'remote_veld';

	protected $sFieldLabel = 'Veld';

	protected $sIcon = 'info-circle';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getRemoteVeld';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\Grondslag';


	public function getDataType(): string
	{
		return 'lookup';
	}


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['remote_veld']) || empty($aPostedData['remote_veld']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Veld" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
