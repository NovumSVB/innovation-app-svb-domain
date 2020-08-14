<?php
namespace Crud\Custom\NovumSvb\AowAanvraag\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;

/**
 * Base class that represents the 'emigratie_land' crud field from the 'aow_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class EmigratieLand extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField
{
	protected $sFieldName = 'emigratie_land';

	protected $sFieldLabel = 'Naar welk land wilt u emigreren?';

	protected $sIcon = 'map-marker';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getEmigratieLand';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\AowAanvraag';


	public function getDataType(): string
	{
		return 'lookup';
	}


	public function getLookups($mSelectedItem = null)
	{
		$sUrl = "https://api.gemeente.demo.novum.nu/v2/rest/land/";
		$sJsonRows = file_get_contents($sUrl . "?items_pp=10000");
		$aAllRows = json_decode($sJsonRows, true);
		$aOptions = Utils::makeSelectOptions($aAllRows["results"], "naam", $mSelectedItem);
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		$sUrl = "https://api.gemeente.demo.novum.nu/v2/rest/land/" . $iItemId;
		$sJsonRows = file_get_contents($sUrl);
		$aLookup = json_decode($sJsonRows, true);
		return isset($aLookup["naam"]) ? $aLookup["naam"] : null;
	}
}
