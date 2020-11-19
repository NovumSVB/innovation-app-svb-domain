<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Base;

use Core\Utils;
use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Map\RemAanvraagTableMap;
use Model\Custom\NovumSvb\RemAanvraag;
use Model\Custom\NovumSvb\RemAanvraagQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify RemAanvraag instead if you need to override or add functionality.
 */
abstract class CrudRemAanvraagManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return RemAanvraagQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\RemAanvraagTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de remigratiewet.";
	}


	public function getEntityTitle(): string
	{
		return "RemAanvraag";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/aanvragen/rem_aanvraag/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/aanvragen/rem_aanvraag/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Remigratiewet toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Remigratiewet aanpassen";
	}


	public function getDefaultOverviewFields(bool $bAddNs = false): array
	{
		$aOverviewColumns = ['PersoonId', 'GeboorteDatum', 'GeboorteLand', 'ImmigratieDatum', 'HeeftNlPaspoort', 'EmigratieLand', 'EmigratieVerblijfsvergunning', 'PartnerEmigratieVerblijfsvergunning', 'OntvangtWw', 'OntvangtBijstand', 'OntvangtWao', 'OntvangtWia', 'OntvangtAow', 'OntvangtWamil', 'OntvangtIaoz', 'OntvangtIaow', 'OntvangtIow', 'StartWw', 'BezwaarOfBeroepUitkeringsinstantie', 'BurgerlijkeStaatId', 'Samenwonend', 'PartnerRemigratie', 'PartnerWwStart', 'SchuldenBijCjib', 'SchuldenBijBelastingdienst', 'PartnerSchuldenBijCjib', 'PartnerSchuldenBijBelastingdienst', 'VoorlopigeHechtenis', 'PartnerVoorlopigeHechtenis', 'Bsn', 'PartnerBsn', 'Voornaam', 'Achternaam', 'PartnerVoornaam', 'PartnerAchternaam', 'PartnerGeboorteDatum', 'PartnerZelfdeAdres', 'ProvincieId', 'GemeenteId', 'Straat', 'Huisnummer', 'Postcode', 'PartnerProvincieId', 'PartnerGemeenteId', 'PartnerStraat', 'PartnerHuisnummer', 'PartnerPostcode', 'PartnerOntvangtWw', 'PartnerOntvangtBijstand', 'PartnerOntvangtWao', 'PartnerOntvangtWia', 'PartnerOntvangtAow', 'PartnerOntvangtWamil', 'PartnerOntvangtIaoz', 'PartnerOntvangtIaow', 'PartnerOntvangtIow', 'HeeftKinderenJongerDan18', 'AantalKinderenJongerDan18', 'KinderenZelfdeAdres', 'ToekomstigAdres', 'PostOntvangenToekomstigAdres', 'HeeftBankrekeningEmigratieland', 'GegevensNaarWaarheidIngevuld', 'Bedrag', 'Delete', 'Edit'];
		if($bAddNs){
		   array_walk($aOverviewColumns, function(&$item) {
		      $item = Utils::makeNamespace($this, $item);
		   });
		}
		return $aOverviewColumns;
	}


	public function getDefaultEditFields(bool $bAddNs = false): array
	{
		$aOverviewColumns = ['PersoonId', 'GeboorteDatum', 'GeboorteLand', 'ImmigratieDatum', 'HeeftNlPaspoort', 'EmigratieLand', 'EmigratieVerblijfsvergunning', 'PartnerEmigratieVerblijfsvergunning', 'OntvangtWw', 'OntvangtBijstand', 'OntvangtWao', 'OntvangtWia', 'OntvangtAow', 'OntvangtWamil', 'OntvangtIaoz', 'OntvangtIaow', 'OntvangtIow', 'StartWw', 'BezwaarOfBeroepUitkeringsinstantie', 'BurgerlijkeStaatId', 'Samenwonend', 'PartnerRemigratie', 'PartnerWwStart', 'SchuldenBijCjib', 'SchuldenBijBelastingdienst', 'PartnerSchuldenBijCjib', 'PartnerSchuldenBijBelastingdienst', 'VoorlopigeHechtenis', 'PartnerVoorlopigeHechtenis', 'Bsn', 'PartnerBsn', 'Voornaam', 'Achternaam', 'PartnerVoornaam', 'PartnerAchternaam', 'PartnerGeboorteDatum', 'PartnerZelfdeAdres', 'ProvincieId', 'GemeenteId', 'Straat', 'Huisnummer', 'Postcode', 'PartnerProvincieId', 'PartnerGemeenteId', 'PartnerStraat', 'PartnerHuisnummer', 'PartnerPostcode', 'PartnerOntvangtWw', 'PartnerOntvangtBijstand', 'PartnerOntvangtWao', 'PartnerOntvangtWia', 'PartnerOntvangtAow', 'PartnerOntvangtWamil', 'PartnerOntvangtIaoz', 'PartnerOntvangtIaow', 'PartnerOntvangtIow', 'HeeftKinderenJongerDan18', 'AantalKinderenJongerDan18', 'KinderenZelfdeAdres', 'ToekomstigAdres', 'PostOntvangenToekomstigAdres', 'HeeftBankrekeningEmigratieland', 'GegevensNaarWaarheidIngevuld', 'Bedrag', 'Delete', 'Edit'];
		if($bAddNs){
		   array_walk($aOverviewColumns, function(&$item) {
		       $item = Utils::makeNamespace($this, $item);
		   });
		}
		return $aOverviewColumns;
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return RemAanvraag
	 */
	public function getModel(array $aData = null): RemAanvraag
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oRemAanvraagQuery = RemAanvraagQuery::create();
		     $oRemAanvraag = $oRemAanvraagQuery->findOneById($aData['id']);
		     if (!$oRemAanvraag instanceof RemAanvraag) {
		         throw new LogicException("RemAanvraag should be an instance of RemAanvraag but got something else." . __METHOD__);
		     }
		     $oRemAanvraag = $this->fillVo($aData, $oRemAanvraag);
		}
		else {
		     $oRemAanvraag = new RemAanvraag();
		     if (!empty($aData)) {
		         $oRemAanvraag = $this->fillVo($aData, $oRemAanvraag);
		     }
		}
		return $oRemAanvraag;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return RemAanvraag
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): RemAanvraag
	{
		$oRemAanvraag = $this->getModel($aData);


		 if(!empty($oRemAanvraag))
		 {
		     $oRemAanvraag = $this->fillVo($aData, $oRemAanvraag);
		     $oRemAanvraag->save();
		 }
		return $oRemAanvraag;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param RemAanvraag $oModel
	 * @return RemAanvraag
	 */
	protected function fillVo(array $aData, RemAanvraag $oModel): RemAanvraag
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['geboorte_datum']) ? $oModel->setGeboorteDatum($aData['geboorte_datum']) : null;
		isset($aData['geboorte_land']) ? $oModel->setGeboorteLand($aData['geboorte_land']) : null;
		isset($aData['immigratie_datum']) ? $oModel->setImmigratieDatum($aData['immigratie_datum']) : null;
		isset($aData['heeft_nl_paspoort']) ? $oModel->setHeeftNlPaspoort($aData['heeft_nl_paspoort']) : null;
		isset($aData['emigratie_land']) ? $oModel->setEmigratieLand($aData['emigratie_land']) : null;
		isset($aData['emigratie_verblijfsvergunning']) ? $oModel->setEmigratieVerblijfsvergunning($aData['emigratie_verblijfsvergunning']) : null;
		isset($aData['partner_emigratie_verblijfsvergunning']) ? $oModel->setPartnerEmigratieVerblijfsvergunning($aData['partner_emigratie_verblijfsvergunning']) : null;
		isset($aData['ontvangt_ww']) ? $oModel->setOntvangtWw($aData['ontvangt_ww']) : null;
		isset($aData['ontvangt_bijstand']) ? $oModel->setOntvangtBijstand($aData['ontvangt_bijstand']) : null;
		isset($aData['ontvangt_wao']) ? $oModel->setOntvangtWao($aData['ontvangt_wao']) : null;
		isset($aData['ontvangt_wia']) ? $oModel->setOntvangtWia($aData['ontvangt_wia']) : null;
		isset($aData['ontvangt_aow']) ? $oModel->setOntvangtAow($aData['ontvangt_aow']) : null;
		isset($aData['ontvangt_wamil']) ? $oModel->setOntvangtWamil($aData['ontvangt_wamil']) : null;
		isset($aData['ontvangt_iaoz']) ? $oModel->setOntvangtIaoz($aData['ontvangt_iaoz']) : null;
		isset($aData['ontvangt_iaow']) ? $oModel->setOntvangtIaow($aData['ontvangt_iaow']) : null;
		isset($aData['ontvangt_iow']) ? $oModel->setOntvangtIow($aData['ontvangt_iow']) : null;
		isset($aData['start_ww']) ? $oModel->setStartWw($aData['start_ww']) : null;
		isset($aData['bezwaar_of_beroep_uitkeringsinstantie']) ? $oModel->setBezwaarOfBeroepUitkeringsinstantie($aData['bezwaar_of_beroep_uitkeringsinstantie']) : null;
		isset($aData['burgerlijke_staat_id']) ? $oModel->setBurgerlijkeStaatId($aData['burgerlijke_staat_id']) : null;
		isset($aData['samenwonend']) ? $oModel->setSamenwonend($aData['samenwonend']) : null;
		isset($aData['partner_remigratie']) ? $oModel->setPartnerRemigratie($aData['partner_remigratie']) : null;
		isset($aData['partner_ww_start']) ? $oModel->setPartnerWwStart($aData['partner_ww_start']) : null;
		isset($aData['schulden_bij_cjib']) ? $oModel->setSchuldenBijCjib($aData['schulden_bij_cjib']) : null;
		isset($aData['schulden_bij_belastingdienst']) ? $oModel->setSchuldenBijBelastingdienst($aData['schulden_bij_belastingdienst']) : null;
		isset($aData['partner_schulden_bij_cjib']) ? $oModel->setPartnerSchuldenBijCjib($aData['partner_schulden_bij_cjib']) : null;
		isset($aData['partner_schulden_bij_belastingdienst']) ? $oModel->setPartnerSchuldenBijBelastingdienst($aData['partner_schulden_bij_belastingdienst']) : null;
		isset($aData['voorlopige_hechtenis']) ? $oModel->setVoorlopigeHechtenis($aData['voorlopige_hechtenis']) : null;
		isset($aData['partner_voorlopige_hechtenis']) ? $oModel->setPartnerVoorlopigeHechtenis($aData['partner_voorlopige_hechtenis']) : null;
		isset($aData['bsn']) ? $oModel->setBsn($aData['bsn']) : null;
		isset($aData['partner_bsn']) ? $oModel->setPartnerBsn($aData['partner_bsn']) : null;
		isset($aData['voornaam']) ? $oModel->setVoornaam($aData['voornaam']) : null;
		isset($aData['achternaam']) ? $oModel->setAchternaam($aData['achternaam']) : null;
		isset($aData['partner_voornaam']) ? $oModel->setPartnerVoornaam($aData['partner_voornaam']) : null;
		isset($aData['partner_achternaam']) ? $oModel->setPartnerAchternaam($aData['partner_achternaam']) : null;
		isset($aData['partner_geboorte_datum']) ? $oModel->setPartnerGeboorteDatum($aData['partner_geboorte_datum']) : null;
		isset($aData['partner_zelfde_adres']) ? $oModel->setPartnerZelfdeAdres($aData['partner_zelfde_adres']) : null;
		isset($aData['provincie_id']) ? $oModel->setProvincieId($aData['provincie_id']) : null;
		isset($aData['gemeente_id']) ? $oModel->setGemeenteId($aData['gemeente_id']) : null;
		isset($aData['straat']) ? $oModel->setStraat($aData['straat']) : null;
		isset($aData['huisnummer']) ? $oModel->setHuisnummer($aData['huisnummer']) : null;
		isset($aData['postcode']) ? $oModel->setPostcode($aData['postcode']) : null;
		isset($aData['partner_provincie_id']) ? $oModel->setPartnerProvincieId($aData['partner_provincie_id']) : null;
		isset($aData['partner_gemeente_id']) ? $oModel->setPartnerGemeenteId($aData['partner_gemeente_id']) : null;
		isset($aData['partner_straat']) ? $oModel->setPartnerStraat($aData['partner_straat']) : null;
		isset($aData['partner_huisnummer']) ? $oModel->setPartnerHuisnummer($aData['partner_huisnummer']) : null;
		isset($aData['partner_postcode']) ? $oModel->setPartnerPostcode($aData['partner_postcode']) : null;
		isset($aData['partner_ontvangt_ww']) ? $oModel->setPartnerOntvangtWw($aData['partner_ontvangt_ww']) : null;
		isset($aData['partner_ontvangt_bijstand']) ? $oModel->setPartnerOntvangtBijstand($aData['partner_ontvangt_bijstand']) : null;
		isset($aData['partner_ontvangt_wao']) ? $oModel->setPartnerOntvangtWao($aData['partner_ontvangt_wao']) : null;
		isset($aData['partner_ontvangt_wia']) ? $oModel->setPartnerOntvangtWia($aData['partner_ontvangt_wia']) : null;
		isset($aData['partner_ontvangt_aow']) ? $oModel->setPartnerOntvangtAow($aData['partner_ontvangt_aow']) : null;
		isset($aData['partner_ontvangt_wamil']) ? $oModel->setPartnerOntvangtWamil($aData['partner_ontvangt_wamil']) : null;
		isset($aData['partner_ontvangt_iaoz']) ? $oModel->setPartnerOntvangtIaoz($aData['partner_ontvangt_iaoz']) : null;
		isset($aData['partner_ontvangt_iaow']) ? $oModel->setPartnerOntvangtIaow($aData['partner_ontvangt_iaow']) : null;
		isset($aData['partner_ontvangt_iow']) ? $oModel->setPartnerOntvangtIow($aData['partner_ontvangt_iow']) : null;
		isset($aData['heeft_kinderen_jonger_dan_18']) ? $oModel->setHeeftKinderenJongerDan18($aData['heeft_kinderen_jonger_dan_18']) : null;
		isset($aData['aantal_kinderen_jonger_dan_18']) ? $oModel->setAantalKinderenJongerDan18($aData['aantal_kinderen_jonger_dan_18']) : null;
		isset($aData['kinderen_zelfde_adres']) ? $oModel->setKinderenZelfdeAdres($aData['kinderen_zelfde_adres']) : null;
		isset($aData['toekomstig_adres']) ? $oModel->setToekomstigAdres($aData['toekomstig_adres']) : null;
		isset($aData['post_ontvangen_toekomstig_adres']) ? $oModel->setPostOntvangenToekomstigAdres($aData['post_ontvangen_toekomstig_adres']) : null;
		isset($aData['heeft_bankrekening_emigratieland']) ? $oModel->setHeeftBankrekeningEmigratieland($aData['heeft_bankrekening_emigratieland']) : null;
		isset($aData['gegevens_naar_waarheid_ingevuld']) ? $oModel->setGegevensNaarWaarheidIngevuld($aData['gegevens_naar_waarheid_ingevuld']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
