<?php

namespace Model\Custom\NovumSvb\Map;

use Model\Custom\NovumSvb\RemAanvraag;
use Model\Custom\NovumSvb\RemAanvraagQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'rem_aanvraag' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RemAanvraagTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Custom.NovumSvb.Map.RemAanvraagTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'hurah';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'rem_aanvraag';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Custom\\NovumSvb\\RemAanvraag';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Custom.NovumSvb.RemAanvraag';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 67;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 67;

    /**
     * the column name for the id field
     */
    const COL_ID = 'rem_aanvraag.id';

    /**
     * the column name for the persoon_id field
     */
    const COL_PERSOON_ID = 'rem_aanvraag.persoon_id';

    /**
     * the column name for the geboorte_datum field
     */
    const COL_GEBOORTE_DATUM = 'rem_aanvraag.geboorte_datum';

    /**
     * the column name for the geboorte_land field
     */
    const COL_GEBOORTE_LAND = 'rem_aanvraag.geboorte_land';

    /**
     * the column name for the immigratie_datum field
     */
    const COL_IMMIGRATIE_DATUM = 'rem_aanvraag.immigratie_datum';

    /**
     * the column name for the heeft_nl_paspoort field
     */
    const COL_HEEFT_NL_PASPOORT = 'rem_aanvraag.heeft_nl_paspoort';

    /**
     * the column name for the emigratie_land field
     */
    const COL_EMIGRATIE_LAND = 'rem_aanvraag.emigratie_land';

    /**
     * the column name for the emigratie_verblijfsvergunning field
     */
    const COL_EMIGRATIE_VERBLIJFSVERGUNNING = 'rem_aanvraag.emigratie_verblijfsvergunning';

    /**
     * the column name for the partner_emigratie_verblijfsvergunning field
     */
    const COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING = 'rem_aanvraag.partner_emigratie_verblijfsvergunning';

    /**
     * the column name for the ontvangt_ww field
     */
    const COL_ONTVANGT_WW = 'rem_aanvraag.ontvangt_ww';

    /**
     * the column name for the ontvangt_bijstand field
     */
    const COL_ONTVANGT_BIJSTAND = 'rem_aanvraag.ontvangt_bijstand';

    /**
     * the column name for the ontvangt_wao field
     */
    const COL_ONTVANGT_WAO = 'rem_aanvraag.ontvangt_wao';

    /**
     * the column name for the ontvangt_wia field
     */
    const COL_ONTVANGT_WIA = 'rem_aanvraag.ontvangt_wia';

    /**
     * the column name for the ontvangt_aow field
     */
    const COL_ONTVANGT_AOW = 'rem_aanvraag.ontvangt_aow';

    /**
     * the column name for the ontvangt_wamil field
     */
    const COL_ONTVANGT_WAMIL = 'rem_aanvraag.ontvangt_wamil';

    /**
     * the column name for the ontvangt_iaoz field
     */
    const COL_ONTVANGT_IAOZ = 'rem_aanvraag.ontvangt_iaoz';

    /**
     * the column name for the ontvangt_iaow field
     */
    const COL_ONTVANGT_IAOW = 'rem_aanvraag.ontvangt_iaow';

    /**
     * the column name for the ontvangt_iow field
     */
    const COL_ONTVANGT_IOW = 'rem_aanvraag.ontvangt_iow';

    /**
     * the column name for the start_ww field
     */
    const COL_START_WW = 'rem_aanvraag.start_ww';

    /**
     * the column name for the bezwaar_of_beroep_uitkeringsinstantie field
     */
    const COL_BEZWAAR_OF_BEROEP_UITKERINGSINSTANTIE = 'rem_aanvraag.bezwaar_of_beroep_uitkeringsinstantie';

    /**
     * the column name for the burgerlijke_staat_id field
     */
    const COL_BURGERLIJKE_STAAT_ID = 'rem_aanvraag.burgerlijke_staat_id';

    /**
     * the column name for the samenwonend field
     */
    const COL_SAMENWONEND = 'rem_aanvraag.samenwonend';

    /**
     * the column name for the partner_remigratie field
     */
    const COL_PARTNER_REMIGRATIE = 'rem_aanvraag.partner_remigratie';

    /**
     * the column name for the partner_ww_start field
     */
    const COL_PARTNER_WW_START = 'rem_aanvraag.partner_ww_start';

    /**
     * the column name for the schulden_bij_cjib field
     */
    const COL_SCHULDEN_BIJ_CJIB = 'rem_aanvraag.schulden_bij_cjib';

    /**
     * the column name for the schulden_bij_belastingdienst field
     */
    const COL_SCHULDEN_BIJ_BELASTINGDIENST = 'rem_aanvraag.schulden_bij_belastingdienst';

    /**
     * the column name for the partner_schulden_bij_cjib field
     */
    const COL_PARTNER_SCHULDEN_BIJ_CJIB = 'rem_aanvraag.partner_schulden_bij_cjib';

    /**
     * the column name for the partner_schulden_bij_belastingdienst field
     */
    const COL_PARTNER_SCHULDEN_BIJ_BELASTINGDIENST = 'rem_aanvraag.partner_schulden_bij_belastingdienst';

    /**
     * the column name for the voorlopige_hechtenis field
     */
    const COL_VOORLOPIGE_HECHTENIS = 'rem_aanvraag.voorlopige_hechtenis';

    /**
     * the column name for the partner_voorlopige_hechtenis field
     */
    const COL_PARTNER_VOORLOPIGE_HECHTENIS = 'rem_aanvraag.partner_voorlopige_hechtenis';

    /**
     * the column name for the bsn field
     */
    const COL_BSN = 'rem_aanvraag.bsn';

    /**
     * the column name for the partner_bsn field
     */
    const COL_PARTNER_BSN = 'rem_aanvraag.partner_bsn';

    /**
     * the column name for the voornaam field
     */
    const COL_VOORNAAM = 'rem_aanvraag.voornaam';

    /**
     * the column name for the achternaam field
     */
    const COL_ACHTERNAAM = 'rem_aanvraag.achternaam';

    /**
     * the column name for the partner_voornaam field
     */
    const COL_PARTNER_VOORNAAM = 'rem_aanvraag.partner_voornaam';

    /**
     * the column name for the partner_achternaam field
     */
    const COL_PARTNER_ACHTERNAAM = 'rem_aanvraag.partner_achternaam';

    /**
     * the column name for the partner_geboorte_datum field
     */
    const COL_PARTNER_GEBOORTE_DATUM = 'rem_aanvraag.partner_geboorte_datum';

    /**
     * the column name for the partner_zelfde_adres field
     */
    const COL_PARTNER_ZELFDE_ADRES = 'rem_aanvraag.partner_zelfde_adres';

    /**
     * the column name for the provincie_id field
     */
    const COL_PROVINCIE_ID = 'rem_aanvraag.provincie_id';

    /**
     * the column name for the gemeente_id field
     */
    const COL_GEMEENTE_ID = 'rem_aanvraag.gemeente_id';

    /**
     * the column name for the straat field
     */
    const COL_STRAAT = 'rem_aanvraag.straat';

    /**
     * the column name for the huisnummer field
     */
    const COL_HUISNUMMER = 'rem_aanvraag.huisnummer';

    /**
     * the column name for the postcode field
     */
    const COL_POSTCODE = 'rem_aanvraag.postcode';

    /**
     * the column name for the partner_provincie_id field
     */
    const COL_PARTNER_PROVINCIE_ID = 'rem_aanvraag.partner_provincie_id';

    /**
     * the column name for the partner_gemeente_id field
     */
    const COL_PARTNER_GEMEENTE_ID = 'rem_aanvraag.partner_gemeente_id';

    /**
     * the column name for the partner_straat field
     */
    const COL_PARTNER_STRAAT = 'rem_aanvraag.partner_straat';

    /**
     * the column name for the partner_huisnummer field
     */
    const COL_PARTNER_HUISNUMMER = 'rem_aanvraag.partner_huisnummer';

    /**
     * the column name for the partner_postcode field
     */
    const COL_PARTNER_POSTCODE = 'rem_aanvraag.partner_postcode';

    /**
     * the column name for the partner_ontvangt_ww field
     */
    const COL_PARTNER_ONTVANGT_WW = 'rem_aanvraag.partner_ontvangt_ww';

    /**
     * the column name for the partner_ontvangt_bijstand field
     */
    const COL_PARTNER_ONTVANGT_BIJSTAND = 'rem_aanvraag.partner_ontvangt_bijstand';

    /**
     * the column name for the partner_ontvangt_wao field
     */
    const COL_PARTNER_ONTVANGT_WAO = 'rem_aanvraag.partner_ontvangt_wao';

    /**
     * the column name for the partner_ontvangt_wia field
     */
    const COL_PARTNER_ONTVANGT_WIA = 'rem_aanvraag.partner_ontvangt_wia';

    /**
     * the column name for the partner_ontvangt_aow field
     */
    const COL_PARTNER_ONTVANGT_AOW = 'rem_aanvraag.partner_ontvangt_aow';

    /**
     * the column name for the partner_ontvangt_wamil field
     */
    const COL_PARTNER_ONTVANGT_WAMIL = 'rem_aanvraag.partner_ontvangt_wamil';

    /**
     * the column name for the partner_ontvangt_iaoz field
     */
    const COL_PARTNER_ONTVANGT_IAOZ = 'rem_aanvraag.partner_ontvangt_iaoz';

    /**
     * the column name for the partner_ontvangt_iaow field
     */
    const COL_PARTNER_ONTVANGT_IAOW = 'rem_aanvraag.partner_ontvangt_iaow';

    /**
     * the column name for the partner_ontvangt_iow field
     */
    const COL_PARTNER_ONTVANGT_IOW = 'rem_aanvraag.partner_ontvangt_iow';

    /**
     * the column name for the heeft_kinderen_jonger_dan_18 field
     */
    const COL_HEEFT_KINDEREN_JONGER_DAN_18 = 'rem_aanvraag.heeft_kinderen_jonger_dan_18';

    /**
     * the column name for the aantal_kinderen_jonger_dan_18 field
     */
    const COL_AANTAL_KINDEREN_JONGER_DAN_18 = 'rem_aanvraag.aantal_kinderen_jonger_dan_18';

    /**
     * the column name for the kinderen_zelfde_adres field
     */
    const COL_KINDEREN_ZELFDE_ADRES = 'rem_aanvraag.kinderen_zelfde_adres';

    /**
     * the column name for the toekomstig_adres field
     */
    const COL_TOEKOMSTIG_ADRES = 'rem_aanvraag.toekomstig_adres';

    /**
     * the column name for the post_ontvangen_toekomstig_adres field
     */
    const COL_POST_ONTVANGEN_TOEKOMSTIG_ADRES = 'rem_aanvraag.post_ontvangen_toekomstig_adres';

    /**
     * the column name for the heeft_bankrekening_emigratieland field
     */
    const COL_HEEFT_BANKREKENING_EMIGRATIELAND = 'rem_aanvraag.heeft_bankrekening_emigratieland';

    /**
     * the column name for the gegevens_naar_waarheid_ingevuld field
     */
    const COL_GEGEVENS_NAAR_WAARHEID_INGEVULD = 'rem_aanvraag.gegevens_naar_waarheid_ingevuld';

    /**
     * the column name for the bedrag field
     */
    const COL_BEDRAG = 'rem_aanvraag.bedrag';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'rem_aanvraag.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'rem_aanvraag.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'PersoonId', 'GeboorteDatum', 'GeboorteLand', 'ImmigratieDatum', 'HeeftNlPaspoort', 'EmigratieLand', 'EmigratieVerblijfsvergunning', 'PartnerEmigratieVerblijfsvergunning', 'OntvangtWw', 'OntvangtBijstand', 'OntvangtWao', 'OntvangtWia', 'OntvangtAow', 'OntvangtWamil', 'OntvangtIaoz', 'OntvangtIaow', 'OntvangtIow', 'StartWw', 'BezwaarOfBeroepUitkeringsinstantie', 'BurgerlijkeStaatId', 'Samenwonend', 'PartnerRemigratie', 'PartnerWwStart', 'SchuldenBijCjib', 'SchuldenBijBelastingdienst', 'PartnerSchuldenBijCjib', 'PartnerSchuldenBijBelastingdienst', 'VoorlopigeHechtenis', 'PartnerVoorlopigeHechtenis', 'Bsn', 'PartnerBsn', 'Voornaam', 'Achternaam', 'PartnerVoornaam', 'PartnerAchternaam', 'PartnerGeboorteDatum', 'PartnerZelfdeAdres', 'ProvincieId', 'GemeenteId', 'Straat', 'Huisnummer', 'Postcode', 'PartnerProvincieId', 'PartnerGemeenteId', 'PartnerStraat', 'PartnerHuisnummer', 'PartnerPostcode', 'PartnerOntvangtWw', 'PartnerOntvangtBijstand', 'PartnerOntvangtWao', 'PartnerOntvangtWia', 'PartnerOntvangtAow', 'PartnerOntvangtWamil', 'PartnerOntvangtIaoz', 'PartnerOntvangtIaow', 'PartnerOntvangtIow', 'HeeftKinderenJongerDan18', 'AantalKinderenJongerDan18', 'KinderenZelfdeAdres', 'ToekomstigAdres', 'PostOntvangenToekomstigAdres', 'HeeftBankrekeningEmigratieland', 'GegevensNaarWaarheidIngevuld', 'Bedrag', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'persoonId', 'geboorteDatum', 'geboorteLand', 'immigratieDatum', 'heeftNlPaspoort', 'emigratieLand', 'emigratieVerblijfsvergunning', 'partnerEmigratieVerblijfsvergunning', 'ontvangtWw', 'ontvangtBijstand', 'ontvangtWao', 'ontvangtWia', 'ontvangtAow', 'ontvangtWamil', 'ontvangtIaoz', 'ontvangtIaow', 'ontvangtIow', 'startWw', 'bezwaarOfBeroepUitkeringsinstantie', 'burgerlijkeStaatId', 'samenwonend', 'partnerRemigratie', 'partnerWwStart', 'schuldenBijCjib', 'schuldenBijBelastingdienst', 'partnerSchuldenBijCjib', 'partnerSchuldenBijBelastingdienst', 'voorlopigeHechtenis', 'partnerVoorlopigeHechtenis', 'bsn', 'partnerBsn', 'voornaam', 'achternaam', 'partnerVoornaam', 'partnerAchternaam', 'partnerGeboorteDatum', 'partnerZelfdeAdres', 'provincieId', 'gemeenteId', 'straat', 'huisnummer', 'postcode', 'partnerProvincieId', 'partnerGemeenteId', 'partnerStraat', 'partnerHuisnummer', 'partnerPostcode', 'partnerOntvangtWw', 'partnerOntvangtBijstand', 'partnerOntvangtWao', 'partnerOntvangtWia', 'partnerOntvangtAow', 'partnerOntvangtWamil', 'partnerOntvangtIaoz', 'partnerOntvangtIaow', 'partnerOntvangtIow', 'heeftKinderenJongerDan18', 'aantalKinderenJongerDan18', 'kinderenZelfdeAdres', 'toekomstigAdres', 'postOntvangenToekomstigAdres', 'heeftBankrekeningEmigratieland', 'gegevensNaarWaarheidIngevuld', 'bedrag', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(RemAanvraagTableMap::COL_ID, RemAanvraagTableMap::COL_PERSOON_ID, RemAanvraagTableMap::COL_GEBOORTE_DATUM, RemAanvraagTableMap::COL_GEBOORTE_LAND, RemAanvraagTableMap::COL_IMMIGRATIE_DATUM, RemAanvraagTableMap::COL_HEEFT_NL_PASPOORT, RemAanvraagTableMap::COL_EMIGRATIE_LAND, RemAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING, RemAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING, RemAanvraagTableMap::COL_ONTVANGT_WW, RemAanvraagTableMap::COL_ONTVANGT_BIJSTAND, RemAanvraagTableMap::COL_ONTVANGT_WAO, RemAanvraagTableMap::COL_ONTVANGT_WIA, RemAanvraagTableMap::COL_ONTVANGT_AOW, RemAanvraagTableMap::COL_ONTVANGT_WAMIL, RemAanvraagTableMap::COL_ONTVANGT_IAOZ, RemAanvraagTableMap::COL_ONTVANGT_IAOW, RemAanvraagTableMap::COL_ONTVANGT_IOW, RemAanvraagTableMap::COL_START_WW, RemAanvraagTableMap::COL_BEZWAAR_OF_BEROEP_UITKERINGSINSTANTIE, RemAanvraagTableMap::COL_BURGERLIJKE_STAAT_ID, RemAanvraagTableMap::COL_SAMENWONEND, RemAanvraagTableMap::COL_PARTNER_REMIGRATIE, RemAanvraagTableMap::COL_PARTNER_WW_START, RemAanvraagTableMap::COL_SCHULDEN_BIJ_CJIB, RemAanvraagTableMap::COL_SCHULDEN_BIJ_BELASTINGDIENST, RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_CJIB, RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_BELASTINGDIENST, RemAanvraagTableMap::COL_VOORLOPIGE_HECHTENIS, RemAanvraagTableMap::COL_PARTNER_VOORLOPIGE_HECHTENIS, RemAanvraagTableMap::COL_BSN, RemAanvraagTableMap::COL_PARTNER_BSN, RemAanvraagTableMap::COL_VOORNAAM, RemAanvraagTableMap::COL_ACHTERNAAM, RemAanvraagTableMap::COL_PARTNER_VOORNAAM, RemAanvraagTableMap::COL_PARTNER_ACHTERNAAM, RemAanvraagTableMap::COL_PARTNER_GEBOORTE_DATUM, RemAanvraagTableMap::COL_PARTNER_ZELFDE_ADRES, RemAanvraagTableMap::COL_PROVINCIE_ID, RemAanvraagTableMap::COL_GEMEENTE_ID, RemAanvraagTableMap::COL_STRAAT, RemAanvraagTableMap::COL_HUISNUMMER, RemAanvraagTableMap::COL_POSTCODE, RemAanvraagTableMap::COL_PARTNER_PROVINCIE_ID, RemAanvraagTableMap::COL_PARTNER_GEMEENTE_ID, RemAanvraagTableMap::COL_PARTNER_STRAAT, RemAanvraagTableMap::COL_PARTNER_HUISNUMMER, RemAanvraagTableMap::COL_PARTNER_POSTCODE, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WW, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_BIJSTAND, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAO, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WIA, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_AOW, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAMIL, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOZ, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOW, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IOW, RemAanvraagTableMap::COL_HEEFT_KINDEREN_JONGER_DAN_18, RemAanvraagTableMap::COL_AANTAL_KINDEREN_JONGER_DAN_18, RemAanvraagTableMap::COL_KINDEREN_ZELFDE_ADRES, RemAanvraagTableMap::COL_TOEKOMSTIG_ADRES, RemAanvraagTableMap::COL_POST_ONTVANGEN_TOEKOMSTIG_ADRES, RemAanvraagTableMap::COL_HEEFT_BANKREKENING_EMIGRATIELAND, RemAanvraagTableMap::COL_GEGEVENS_NAAR_WAARHEID_INGEVULD, RemAanvraagTableMap::COL_BEDRAG, RemAanvraagTableMap::COL_CREATED_AT, RemAanvraagTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'persoon_id', 'geboorte_datum', 'geboorte_land', 'immigratie_datum', 'heeft_nl_paspoort', 'emigratie_land', 'emigratie_verblijfsvergunning', 'partner_emigratie_verblijfsvergunning', 'ontvangt_ww', 'ontvangt_bijstand', 'ontvangt_wao', 'ontvangt_wia', 'ontvangt_aow', 'ontvangt_wamil', 'ontvangt_iaoz', 'ontvangt_iaow', 'ontvangt_iow', 'start_ww', 'bezwaar_of_beroep_uitkeringsinstantie', 'burgerlijke_staat_id', 'samenwonend', 'partner_remigratie', 'partner_ww_start', 'schulden_bij_cjib', 'schulden_bij_belastingdienst', 'partner_schulden_bij_cjib', 'partner_schulden_bij_belastingdienst', 'voorlopige_hechtenis', 'partner_voorlopige_hechtenis', 'bsn', 'partner_bsn', 'voornaam', 'achternaam', 'partner_voornaam', 'partner_achternaam', 'partner_geboorte_datum', 'partner_zelfde_adres', 'provincie_id', 'gemeente_id', 'straat', 'huisnummer', 'postcode', 'partner_provincie_id', 'partner_gemeente_id', 'partner_straat', 'partner_huisnummer', 'partner_postcode', 'partner_ontvangt_ww', 'partner_ontvangt_bijstand', 'partner_ontvangt_wao', 'partner_ontvangt_wia', 'partner_ontvangt_aow', 'partner_ontvangt_wamil', 'partner_ontvangt_iaoz', 'partner_ontvangt_iaow', 'partner_ontvangt_iow', 'heeft_kinderen_jonger_dan_18', 'aantal_kinderen_jonger_dan_18', 'kinderen_zelfde_adres', 'toekomstig_adres', 'post_ontvangen_toekomstig_adres', 'heeft_bankrekening_emigratieland', 'gegevens_naar_waarheid_ingevuld', 'bedrag', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'PersoonId' => 1, 'GeboorteDatum' => 2, 'GeboorteLand' => 3, 'ImmigratieDatum' => 4, 'HeeftNlPaspoort' => 5, 'EmigratieLand' => 6, 'EmigratieVerblijfsvergunning' => 7, 'PartnerEmigratieVerblijfsvergunning' => 8, 'OntvangtWw' => 9, 'OntvangtBijstand' => 10, 'OntvangtWao' => 11, 'OntvangtWia' => 12, 'OntvangtAow' => 13, 'OntvangtWamil' => 14, 'OntvangtIaoz' => 15, 'OntvangtIaow' => 16, 'OntvangtIow' => 17, 'StartWw' => 18, 'BezwaarOfBeroepUitkeringsinstantie' => 19, 'BurgerlijkeStaatId' => 20, 'Samenwonend' => 21, 'PartnerRemigratie' => 22, 'PartnerWwStart' => 23, 'SchuldenBijCjib' => 24, 'SchuldenBijBelastingdienst' => 25, 'PartnerSchuldenBijCjib' => 26, 'PartnerSchuldenBijBelastingdienst' => 27, 'VoorlopigeHechtenis' => 28, 'PartnerVoorlopigeHechtenis' => 29, 'Bsn' => 30, 'PartnerBsn' => 31, 'Voornaam' => 32, 'Achternaam' => 33, 'PartnerVoornaam' => 34, 'PartnerAchternaam' => 35, 'PartnerGeboorteDatum' => 36, 'PartnerZelfdeAdres' => 37, 'ProvincieId' => 38, 'GemeenteId' => 39, 'Straat' => 40, 'Huisnummer' => 41, 'Postcode' => 42, 'PartnerProvincieId' => 43, 'PartnerGemeenteId' => 44, 'PartnerStraat' => 45, 'PartnerHuisnummer' => 46, 'PartnerPostcode' => 47, 'PartnerOntvangtWw' => 48, 'PartnerOntvangtBijstand' => 49, 'PartnerOntvangtWao' => 50, 'PartnerOntvangtWia' => 51, 'PartnerOntvangtAow' => 52, 'PartnerOntvangtWamil' => 53, 'PartnerOntvangtIaoz' => 54, 'PartnerOntvangtIaow' => 55, 'PartnerOntvangtIow' => 56, 'HeeftKinderenJongerDan18' => 57, 'AantalKinderenJongerDan18' => 58, 'KinderenZelfdeAdres' => 59, 'ToekomstigAdres' => 60, 'PostOntvangenToekomstigAdres' => 61, 'HeeftBankrekeningEmigratieland' => 62, 'GegevensNaarWaarheidIngevuld' => 63, 'Bedrag' => 64, 'CreatedAt' => 65, 'UpdatedAt' => 66, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'persoonId' => 1, 'geboorteDatum' => 2, 'geboorteLand' => 3, 'immigratieDatum' => 4, 'heeftNlPaspoort' => 5, 'emigratieLand' => 6, 'emigratieVerblijfsvergunning' => 7, 'partnerEmigratieVerblijfsvergunning' => 8, 'ontvangtWw' => 9, 'ontvangtBijstand' => 10, 'ontvangtWao' => 11, 'ontvangtWia' => 12, 'ontvangtAow' => 13, 'ontvangtWamil' => 14, 'ontvangtIaoz' => 15, 'ontvangtIaow' => 16, 'ontvangtIow' => 17, 'startWw' => 18, 'bezwaarOfBeroepUitkeringsinstantie' => 19, 'burgerlijkeStaatId' => 20, 'samenwonend' => 21, 'partnerRemigratie' => 22, 'partnerWwStart' => 23, 'schuldenBijCjib' => 24, 'schuldenBijBelastingdienst' => 25, 'partnerSchuldenBijCjib' => 26, 'partnerSchuldenBijBelastingdienst' => 27, 'voorlopigeHechtenis' => 28, 'partnerVoorlopigeHechtenis' => 29, 'bsn' => 30, 'partnerBsn' => 31, 'voornaam' => 32, 'achternaam' => 33, 'partnerVoornaam' => 34, 'partnerAchternaam' => 35, 'partnerGeboorteDatum' => 36, 'partnerZelfdeAdres' => 37, 'provincieId' => 38, 'gemeenteId' => 39, 'straat' => 40, 'huisnummer' => 41, 'postcode' => 42, 'partnerProvincieId' => 43, 'partnerGemeenteId' => 44, 'partnerStraat' => 45, 'partnerHuisnummer' => 46, 'partnerPostcode' => 47, 'partnerOntvangtWw' => 48, 'partnerOntvangtBijstand' => 49, 'partnerOntvangtWao' => 50, 'partnerOntvangtWia' => 51, 'partnerOntvangtAow' => 52, 'partnerOntvangtWamil' => 53, 'partnerOntvangtIaoz' => 54, 'partnerOntvangtIaow' => 55, 'partnerOntvangtIow' => 56, 'heeftKinderenJongerDan18' => 57, 'aantalKinderenJongerDan18' => 58, 'kinderenZelfdeAdres' => 59, 'toekomstigAdres' => 60, 'postOntvangenToekomstigAdres' => 61, 'heeftBankrekeningEmigratieland' => 62, 'gegevensNaarWaarheidIngevuld' => 63, 'bedrag' => 64, 'createdAt' => 65, 'updatedAt' => 66, ),
        self::TYPE_COLNAME       => array(RemAanvraagTableMap::COL_ID => 0, RemAanvraagTableMap::COL_PERSOON_ID => 1, RemAanvraagTableMap::COL_GEBOORTE_DATUM => 2, RemAanvraagTableMap::COL_GEBOORTE_LAND => 3, RemAanvraagTableMap::COL_IMMIGRATIE_DATUM => 4, RemAanvraagTableMap::COL_HEEFT_NL_PASPOORT => 5, RemAanvraagTableMap::COL_EMIGRATIE_LAND => 6, RemAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING => 7, RemAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING => 8, RemAanvraagTableMap::COL_ONTVANGT_WW => 9, RemAanvraagTableMap::COL_ONTVANGT_BIJSTAND => 10, RemAanvraagTableMap::COL_ONTVANGT_WAO => 11, RemAanvraagTableMap::COL_ONTVANGT_WIA => 12, RemAanvraagTableMap::COL_ONTVANGT_AOW => 13, RemAanvraagTableMap::COL_ONTVANGT_WAMIL => 14, RemAanvraagTableMap::COL_ONTVANGT_IAOZ => 15, RemAanvraagTableMap::COL_ONTVANGT_IAOW => 16, RemAanvraagTableMap::COL_ONTVANGT_IOW => 17, RemAanvraagTableMap::COL_START_WW => 18, RemAanvraagTableMap::COL_BEZWAAR_OF_BEROEP_UITKERINGSINSTANTIE => 19, RemAanvraagTableMap::COL_BURGERLIJKE_STAAT_ID => 20, RemAanvraagTableMap::COL_SAMENWONEND => 21, RemAanvraagTableMap::COL_PARTNER_REMIGRATIE => 22, RemAanvraagTableMap::COL_PARTNER_WW_START => 23, RemAanvraagTableMap::COL_SCHULDEN_BIJ_CJIB => 24, RemAanvraagTableMap::COL_SCHULDEN_BIJ_BELASTINGDIENST => 25, RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_CJIB => 26, RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_BELASTINGDIENST => 27, RemAanvraagTableMap::COL_VOORLOPIGE_HECHTENIS => 28, RemAanvraagTableMap::COL_PARTNER_VOORLOPIGE_HECHTENIS => 29, RemAanvraagTableMap::COL_BSN => 30, RemAanvraagTableMap::COL_PARTNER_BSN => 31, RemAanvraagTableMap::COL_VOORNAAM => 32, RemAanvraagTableMap::COL_ACHTERNAAM => 33, RemAanvraagTableMap::COL_PARTNER_VOORNAAM => 34, RemAanvraagTableMap::COL_PARTNER_ACHTERNAAM => 35, RemAanvraagTableMap::COL_PARTNER_GEBOORTE_DATUM => 36, RemAanvraagTableMap::COL_PARTNER_ZELFDE_ADRES => 37, RemAanvraagTableMap::COL_PROVINCIE_ID => 38, RemAanvraagTableMap::COL_GEMEENTE_ID => 39, RemAanvraagTableMap::COL_STRAAT => 40, RemAanvraagTableMap::COL_HUISNUMMER => 41, RemAanvraagTableMap::COL_POSTCODE => 42, RemAanvraagTableMap::COL_PARTNER_PROVINCIE_ID => 43, RemAanvraagTableMap::COL_PARTNER_GEMEENTE_ID => 44, RemAanvraagTableMap::COL_PARTNER_STRAAT => 45, RemAanvraagTableMap::COL_PARTNER_HUISNUMMER => 46, RemAanvraagTableMap::COL_PARTNER_POSTCODE => 47, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WW => 48, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_BIJSTAND => 49, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAO => 50, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WIA => 51, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_AOW => 52, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAMIL => 53, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOZ => 54, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOW => 55, RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IOW => 56, RemAanvraagTableMap::COL_HEEFT_KINDEREN_JONGER_DAN_18 => 57, RemAanvraagTableMap::COL_AANTAL_KINDEREN_JONGER_DAN_18 => 58, RemAanvraagTableMap::COL_KINDEREN_ZELFDE_ADRES => 59, RemAanvraagTableMap::COL_TOEKOMSTIG_ADRES => 60, RemAanvraagTableMap::COL_POST_ONTVANGEN_TOEKOMSTIG_ADRES => 61, RemAanvraagTableMap::COL_HEEFT_BANKREKENING_EMIGRATIELAND => 62, RemAanvraagTableMap::COL_GEGEVENS_NAAR_WAARHEID_INGEVULD => 63, RemAanvraagTableMap::COL_BEDRAG => 64, RemAanvraagTableMap::COL_CREATED_AT => 65, RemAanvraagTableMap::COL_UPDATED_AT => 66, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'persoon_id' => 1, 'geboorte_datum' => 2, 'geboorte_land' => 3, 'immigratie_datum' => 4, 'heeft_nl_paspoort' => 5, 'emigratie_land' => 6, 'emigratie_verblijfsvergunning' => 7, 'partner_emigratie_verblijfsvergunning' => 8, 'ontvangt_ww' => 9, 'ontvangt_bijstand' => 10, 'ontvangt_wao' => 11, 'ontvangt_wia' => 12, 'ontvangt_aow' => 13, 'ontvangt_wamil' => 14, 'ontvangt_iaoz' => 15, 'ontvangt_iaow' => 16, 'ontvangt_iow' => 17, 'start_ww' => 18, 'bezwaar_of_beroep_uitkeringsinstantie' => 19, 'burgerlijke_staat_id' => 20, 'samenwonend' => 21, 'partner_remigratie' => 22, 'partner_ww_start' => 23, 'schulden_bij_cjib' => 24, 'schulden_bij_belastingdienst' => 25, 'partner_schulden_bij_cjib' => 26, 'partner_schulden_bij_belastingdienst' => 27, 'voorlopige_hechtenis' => 28, 'partner_voorlopige_hechtenis' => 29, 'bsn' => 30, 'partner_bsn' => 31, 'voornaam' => 32, 'achternaam' => 33, 'partner_voornaam' => 34, 'partner_achternaam' => 35, 'partner_geboorte_datum' => 36, 'partner_zelfde_adres' => 37, 'provincie_id' => 38, 'gemeente_id' => 39, 'straat' => 40, 'huisnummer' => 41, 'postcode' => 42, 'partner_provincie_id' => 43, 'partner_gemeente_id' => 44, 'partner_straat' => 45, 'partner_huisnummer' => 46, 'partner_postcode' => 47, 'partner_ontvangt_ww' => 48, 'partner_ontvangt_bijstand' => 49, 'partner_ontvangt_wao' => 50, 'partner_ontvangt_wia' => 51, 'partner_ontvangt_aow' => 52, 'partner_ontvangt_wamil' => 53, 'partner_ontvangt_iaoz' => 54, 'partner_ontvangt_iaow' => 55, 'partner_ontvangt_iow' => 56, 'heeft_kinderen_jonger_dan_18' => 57, 'aantal_kinderen_jonger_dan_18' => 58, 'kinderen_zelfde_adres' => 59, 'toekomstig_adres' => 60, 'post_ontvangen_toekomstig_adres' => 61, 'heeft_bankrekening_emigratieland' => 62, 'gegevens_naar_waarheid_ingevuld' => 63, 'bedrag' => 64, 'created_at' => 65, 'updated_at' => 66, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('rem_aanvraag');
        $this->setPhpName('RemAanvraag');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Custom\\NovumSvb\\RemAanvraag');
        $this->setPackage('Model.Custom.NovumSvb');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('persoon_id', 'PersoonId', 'INTEGER', 'persoon', 'id', true, null, null);
        $this->addColumn('geboorte_datum', 'GeboorteDatum', 'DATE', false, null, null);
        $this->addColumn('geboorte_land', 'GeboorteLand', 'VARCHAR', false, 255, null);
        $this->addColumn('immigratie_datum', 'ImmigratieDatum', 'DATE', false, null, null);
        $this->addColumn('heeft_nl_paspoort', 'HeeftNlPaspoort', 'BOOLEAN', false, 1, null);
        $this->addColumn('emigratie_land', 'EmigratieLand', 'VARCHAR', false, 255, null);
        $this->addColumn('emigratie_verblijfsvergunning', 'EmigratieVerblijfsvergunning', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_emigratie_verblijfsvergunning', 'PartnerEmigratieVerblijfsvergunning', 'BOOLEAN', false, 1, null);
        $this->addColumn('ontvangt_ww', 'OntvangtWw', 'BOOLEAN', false, 1, null);
        $this->addColumn('ontvangt_bijstand', 'OntvangtBijstand', 'BOOLEAN', false, 1, null);
        $this->addColumn('ontvangt_wao', 'OntvangtWao', 'BOOLEAN', false, 1, null);
        $this->addColumn('ontvangt_wia', 'OntvangtWia', 'BOOLEAN', false, 1, null);
        $this->addColumn('ontvangt_aow', 'OntvangtAow', 'BOOLEAN', false, 1, null);
        $this->addColumn('ontvangt_wamil', 'OntvangtWamil', 'BOOLEAN', false, 1, null);
        $this->addColumn('ontvangt_iaoz', 'OntvangtIaoz', 'BOOLEAN', false, 1, null);
        $this->addColumn('ontvangt_iaow', 'OntvangtIaow', 'BOOLEAN', false, 1, null);
        $this->addColumn('ontvangt_iow', 'OntvangtIow', 'BOOLEAN', false, 1, null);
        $this->addColumn('start_ww', 'StartWw', 'DATE', false, null, null);
        $this->addColumn('bezwaar_of_beroep_uitkeringsinstantie', 'BezwaarOfBeroepUitkeringsinstantie', 'BOOLEAN', false, 1, null);
        $this->addColumn('burgerlijke_staat_id', 'BurgerlijkeStaatId', 'INTEGER', false, null, null);
        $this->addColumn('samenwonend', 'Samenwonend', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_remigratie', 'PartnerRemigratie', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_ww_start', 'PartnerWwStart', 'DATE', false, null, null);
        $this->addColumn('schulden_bij_cjib', 'SchuldenBijCjib', 'BOOLEAN', false, 1, null);
        $this->addColumn('schulden_bij_belastingdienst', 'SchuldenBijBelastingdienst', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_schulden_bij_cjib', 'PartnerSchuldenBijCjib', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_schulden_bij_belastingdienst', 'PartnerSchuldenBijBelastingdienst', 'BOOLEAN', false, 1, null);
        $this->addColumn('voorlopige_hechtenis', 'VoorlopigeHechtenis', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_voorlopige_hechtenis', 'PartnerVoorlopigeHechtenis', 'BOOLEAN', false, 1, null);
        $this->addColumn('bsn', 'Bsn', 'VARCHAR', true, 255, null);
        $this->addColumn('partner_bsn', 'PartnerBsn', 'VARCHAR', true, 255, null);
        $this->addColumn('voornaam', 'Voornaam', 'VARCHAR', true, 255, null);
        $this->addColumn('achternaam', 'Achternaam', 'VARCHAR', true, 255, null);
        $this->addColumn('partner_voornaam', 'PartnerVoornaam', 'VARCHAR', true, 255, null);
        $this->addColumn('partner_achternaam', 'PartnerAchternaam', 'VARCHAR', true, 255, null);
        $this->addColumn('partner_geboorte_datum', 'PartnerGeboorteDatum', 'DATE', false, null, null);
        $this->addColumn('partner_zelfde_adres', 'PartnerZelfdeAdres', 'BOOLEAN', false, 1, null);
        $this->addColumn('provincie_id', 'ProvincieId', 'INTEGER', true, null, null);
        $this->addColumn('gemeente_id', 'GemeenteId', 'INTEGER', true, null, null);
        $this->addColumn('straat', 'Straat', 'VARCHAR', false, 255, null);
        $this->addColumn('huisnummer', 'Huisnummer', 'VARCHAR', false, 255, null);
        $this->addColumn('postcode', 'Postcode', 'VARCHAR', false, 6, null);
        $this->addColumn('partner_provincie_id', 'PartnerProvincieId', 'INTEGER', true, null, null);
        $this->addColumn('partner_gemeente_id', 'PartnerGemeenteId', 'INTEGER', true, null, null);
        $this->addColumn('partner_straat', 'PartnerStraat', 'VARCHAR', false, 255, null);
        $this->addColumn('partner_huisnummer', 'PartnerHuisnummer', 'VARCHAR', false, 255, null);
        $this->addColumn('partner_postcode', 'PartnerPostcode', 'VARCHAR', false, 6, null);
        $this->addColumn('partner_ontvangt_ww', 'PartnerOntvangtWw', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_ontvangt_bijstand', 'PartnerOntvangtBijstand', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_ontvangt_wao', 'PartnerOntvangtWao', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_ontvangt_wia', 'PartnerOntvangtWia', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_ontvangt_aow', 'PartnerOntvangtAow', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_ontvangt_wamil', 'PartnerOntvangtWamil', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_ontvangt_iaoz', 'PartnerOntvangtIaoz', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_ontvangt_iaow', 'PartnerOntvangtIaow', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_ontvangt_iow', 'PartnerOntvangtIow', 'BOOLEAN', false, 1, null);
        $this->addColumn('heeft_kinderen_jonger_dan_18', 'HeeftKinderenJongerDan18', 'BOOLEAN', false, 1, null);
        $this->addColumn('aantal_kinderen_jonger_dan_18', 'AantalKinderenJongerDan18', 'INTEGER', false, null, null);
        $this->addColumn('kinderen_zelfde_adres', 'KinderenZelfdeAdres', 'BOOLEAN', false, 1, null);
        $this->addColumn('toekomstig_adres', 'ToekomstigAdres', 'VARCHAR', false, 255, null);
        $this->addColumn('post_ontvangen_toekomstig_adres', 'PostOntvangenToekomstigAdres', 'BOOLEAN', false, 1, null);
        $this->addColumn('heeft_bankrekening_emigratieland', 'HeeftBankrekeningEmigratieland', 'BOOLEAN', false, 1, null);
        $this->addColumn('gegevens_naar_waarheid_ingevuld', 'GegevensNaarWaarheidIngevuld', 'BOOLEAN', false, 1, null);
        $this->addColumn('bedrag', 'Bedrag', 'DECIMAL', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Persoon', '\\Model\\Custom\\NovumSvb\\Persoon', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':persoon_id',
    1 => ':id',
  ),
), 'RESTRICT', null, null, false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? RemAanvraagTableMap::CLASS_DEFAULT : RemAanvraagTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (RemAanvraag object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RemAanvraagTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RemAanvraagTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RemAanvraagTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RemAanvraagTableMap::OM_CLASS;
            /** @var RemAanvraag $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RemAanvraagTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = RemAanvraagTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RemAanvraagTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var RemAanvraag $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RemAanvraagTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ID);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PERSOON_ID);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_GEBOORTE_DATUM);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_GEBOORTE_LAND);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_IMMIGRATIE_DATUM);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_HEEFT_NL_PASPOORT);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_EMIGRATIE_LAND);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ONTVANGT_WW);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ONTVANGT_BIJSTAND);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ONTVANGT_WAO);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ONTVANGT_WIA);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ONTVANGT_AOW);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ONTVANGT_WAMIL);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ONTVANGT_IAOZ);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ONTVANGT_IAOW);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ONTVANGT_IOW);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_START_WW);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_BEZWAAR_OF_BEROEP_UITKERINGSINSTANTIE);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_BURGERLIJKE_STAAT_ID);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_SAMENWONEND);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_REMIGRATIE);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_WW_START);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_SCHULDEN_BIJ_CJIB);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_SCHULDEN_BIJ_BELASTINGDIENST);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_CJIB);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_BELASTINGDIENST);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_VOORLOPIGE_HECHTENIS);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_VOORLOPIGE_HECHTENIS);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_BSN);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_BSN);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_VOORNAAM);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_ACHTERNAAM);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_VOORNAAM);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ACHTERNAAM);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_GEBOORTE_DATUM);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ZELFDE_ADRES);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PROVINCIE_ID);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_GEMEENTE_ID);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_STRAAT);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_HUISNUMMER);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_POSTCODE);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_PROVINCIE_ID);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_GEMEENTE_ID);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_STRAAT);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_HUISNUMMER);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_POSTCODE);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WW);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_BIJSTAND);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAO);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WIA);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_AOW);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAMIL);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOZ);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOW);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IOW);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_HEEFT_KINDEREN_JONGER_DAN_18);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_AANTAL_KINDEREN_JONGER_DAN_18);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_KINDEREN_ZELFDE_ADRES);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_TOEKOMSTIG_ADRES);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_POST_ONTVANGEN_TOEKOMSTIG_ADRES);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_HEEFT_BANKREKENING_EMIGRATIELAND);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_GEGEVENS_NAAR_WAARHEID_INGEVULD);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_BEDRAG);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(RemAanvraagTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.persoon_id');
            $criteria->addSelectColumn($alias . '.geboorte_datum');
            $criteria->addSelectColumn($alias . '.geboorte_land');
            $criteria->addSelectColumn($alias . '.immigratie_datum');
            $criteria->addSelectColumn($alias . '.heeft_nl_paspoort');
            $criteria->addSelectColumn($alias . '.emigratie_land');
            $criteria->addSelectColumn($alias . '.emigratie_verblijfsvergunning');
            $criteria->addSelectColumn($alias . '.partner_emigratie_verblijfsvergunning');
            $criteria->addSelectColumn($alias . '.ontvangt_ww');
            $criteria->addSelectColumn($alias . '.ontvangt_bijstand');
            $criteria->addSelectColumn($alias . '.ontvangt_wao');
            $criteria->addSelectColumn($alias . '.ontvangt_wia');
            $criteria->addSelectColumn($alias . '.ontvangt_aow');
            $criteria->addSelectColumn($alias . '.ontvangt_wamil');
            $criteria->addSelectColumn($alias . '.ontvangt_iaoz');
            $criteria->addSelectColumn($alias . '.ontvangt_iaow');
            $criteria->addSelectColumn($alias . '.ontvangt_iow');
            $criteria->addSelectColumn($alias . '.start_ww');
            $criteria->addSelectColumn($alias . '.bezwaar_of_beroep_uitkeringsinstantie');
            $criteria->addSelectColumn($alias . '.burgerlijke_staat_id');
            $criteria->addSelectColumn($alias . '.samenwonend');
            $criteria->addSelectColumn($alias . '.partner_remigratie');
            $criteria->addSelectColumn($alias . '.partner_ww_start');
            $criteria->addSelectColumn($alias . '.schulden_bij_cjib');
            $criteria->addSelectColumn($alias . '.schulden_bij_belastingdienst');
            $criteria->addSelectColumn($alias . '.partner_schulden_bij_cjib');
            $criteria->addSelectColumn($alias . '.partner_schulden_bij_belastingdienst');
            $criteria->addSelectColumn($alias . '.voorlopige_hechtenis');
            $criteria->addSelectColumn($alias . '.partner_voorlopige_hechtenis');
            $criteria->addSelectColumn($alias . '.bsn');
            $criteria->addSelectColumn($alias . '.partner_bsn');
            $criteria->addSelectColumn($alias . '.voornaam');
            $criteria->addSelectColumn($alias . '.achternaam');
            $criteria->addSelectColumn($alias . '.partner_voornaam');
            $criteria->addSelectColumn($alias . '.partner_achternaam');
            $criteria->addSelectColumn($alias . '.partner_geboorte_datum');
            $criteria->addSelectColumn($alias . '.partner_zelfde_adres');
            $criteria->addSelectColumn($alias . '.provincie_id');
            $criteria->addSelectColumn($alias . '.gemeente_id');
            $criteria->addSelectColumn($alias . '.straat');
            $criteria->addSelectColumn($alias . '.huisnummer');
            $criteria->addSelectColumn($alias . '.postcode');
            $criteria->addSelectColumn($alias . '.partner_provincie_id');
            $criteria->addSelectColumn($alias . '.partner_gemeente_id');
            $criteria->addSelectColumn($alias . '.partner_straat');
            $criteria->addSelectColumn($alias . '.partner_huisnummer');
            $criteria->addSelectColumn($alias . '.partner_postcode');
            $criteria->addSelectColumn($alias . '.partner_ontvangt_ww');
            $criteria->addSelectColumn($alias . '.partner_ontvangt_bijstand');
            $criteria->addSelectColumn($alias . '.partner_ontvangt_wao');
            $criteria->addSelectColumn($alias . '.partner_ontvangt_wia');
            $criteria->addSelectColumn($alias . '.partner_ontvangt_aow');
            $criteria->addSelectColumn($alias . '.partner_ontvangt_wamil');
            $criteria->addSelectColumn($alias . '.partner_ontvangt_iaoz');
            $criteria->addSelectColumn($alias . '.partner_ontvangt_iaow');
            $criteria->addSelectColumn($alias . '.partner_ontvangt_iow');
            $criteria->addSelectColumn($alias . '.heeft_kinderen_jonger_dan_18');
            $criteria->addSelectColumn($alias . '.aantal_kinderen_jonger_dan_18');
            $criteria->addSelectColumn($alias . '.kinderen_zelfde_adres');
            $criteria->addSelectColumn($alias . '.toekomstig_adres');
            $criteria->addSelectColumn($alias . '.post_ontvangen_toekomstig_adres');
            $criteria->addSelectColumn($alias . '.heeft_bankrekening_emigratieland');
            $criteria->addSelectColumn($alias . '.gegevens_naar_waarheid_ingevuld');
            $criteria->addSelectColumn($alias . '.bedrag');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(RemAanvraagTableMap::DATABASE_NAME)->getTable(RemAanvraagTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RemAanvraagTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RemAanvraagTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RemAanvraagTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a RemAanvraag or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or RemAanvraag object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RemAanvraagTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Custom\NovumSvb\RemAanvraag) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RemAanvraagTableMap::DATABASE_NAME);
            $criteria->add(RemAanvraagTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = RemAanvraagQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RemAanvraagTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RemAanvraagTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the rem_aanvraag table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RemAanvraagQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a RemAanvraag or Criteria object.
     *
     * @param mixed               $criteria Criteria or RemAanvraag object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RemAanvraagTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from RemAanvraag object
        }

        if ($criteria->containsKey(RemAanvraagTableMap::COL_ID) && $criteria->keyContainsValue(RemAanvraagTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.RemAanvraagTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = RemAanvraagQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RemAanvraagTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RemAanvraagTableMap::buildTableMap();
