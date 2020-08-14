<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;

/**
 * Base class that represents the 'geboorte_land' crud field from the 'rem_aanvraag' table.
 * This class is auto generated and should not be modified.
 */
abstract class GeboorteLand extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField
{
	protected $sFieldName = 'geboorte_land';

	protected $sFieldLabel = 'In welk land bent u geboren?';

	protected $sIcon = 'map-marker';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getGeboorteLand';

	protected $sFqModelClassname = '\Model\Custom\NovumSvb\RemAanvraag';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function getLookups($mSelectedItem = null)
	{
		$sUrl = "https://api.gemeente.demo.novum.nu/v2/rest/land/";
		$sJsonRows = file_get_contents($sUrl);
		$aAllRows = json_decode($sJsonRows, true);
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows["results"], "", $mSelectedItem);
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		$sUrl = "https://api.gemeente.demo.novum.nu/v2/rest/land/" . $iItemId;
		$sJsonRows = file_get_contents($sUrl);
		$aLookup = json_decode($sJsonRows, true);
		return $aLookup;
	}


	public function getDataType(): string
	{
		return 'lookup';
	}
}
