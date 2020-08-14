<?php
namespace Crud\Custom\NovumSvb\AowAanvraag\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;

/**
 * Base class that represents the 'geboorte_land' crud field from the 'aow_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class GeboorteLand extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField
{
	protected $sFieldName = 'geboorte_land';

	protected $sFieldLabel = 'In welk land bent u geboren?';

	protected $sIcon = 'map-marker';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getGeboorteLand';

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
