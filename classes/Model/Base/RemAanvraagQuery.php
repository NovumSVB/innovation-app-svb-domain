<?php

namespace Model\Custom\NovumSvb\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumSvb\RemAanvraag as ChildRemAanvraag;
use Model\Custom\NovumSvb\RemAanvraagQuery as ChildRemAanvraagQuery;
use Model\Custom\NovumSvb\Map\RemAanvraagTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'rem_aanvraag' table.
 *
 *
 *
 * @method     ChildRemAanvraagQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildRemAanvraagQuery orderByPersoonId($order = Criteria::ASC) Order by the persoon_id column
 * @method     ChildRemAanvraagQuery orderByGeboorteDatum($order = Criteria::ASC) Order by the geboorte_datum column
 * @method     ChildRemAanvraagQuery orderByGeboorteLand($order = Criteria::ASC) Order by the geboorte_land column
 * @method     ChildRemAanvraagQuery orderByImmigratieDatum($order = Criteria::ASC) Order by the immigratie_datum column
 * @method     ChildRemAanvraagQuery orderByHeeftNlPaspoort($order = Criteria::ASC) Order by the heeft_nl_paspoort column
 * @method     ChildRemAanvraagQuery orderByEmigratieLand($order = Criteria::ASC) Order by the emigratie_land column
 * @method     ChildRemAanvraagQuery orderByEmigratieVerblijfsvergunning($order = Criteria::ASC) Order by the emigratie_verblijfsvergunning column
 * @method     ChildRemAanvraagQuery orderByPartnerEmigratieVerblijfsvergunning($order = Criteria::ASC) Order by the partner_emigratie_verblijfsvergunning column
 * @method     ChildRemAanvraagQuery orderByOntvangtWw($order = Criteria::ASC) Order by the ontvangt_ww column
 * @method     ChildRemAanvraagQuery orderByOntvangtBijstand($order = Criteria::ASC) Order by the ontvangt_bijstand column
 * @method     ChildRemAanvraagQuery orderByOntvangtWao($order = Criteria::ASC) Order by the ontvangt_wao column
 * @method     ChildRemAanvraagQuery orderByOntvangtWia($order = Criteria::ASC) Order by the ontvangt_wia column
 * @method     ChildRemAanvraagQuery orderByOntvangtAow($order = Criteria::ASC) Order by the ontvangt_aow column
 * @method     ChildRemAanvraagQuery orderByOntvangtWamil($order = Criteria::ASC) Order by the ontvangt_wamil column
 * @method     ChildRemAanvraagQuery orderByOntvangtIaoz($order = Criteria::ASC) Order by the ontvangt_iaoz column
 * @method     ChildRemAanvraagQuery orderByOntvangtIaow($order = Criteria::ASC) Order by the ontvangt_iaow column
 * @method     ChildRemAanvraagQuery orderByOntvangtIow($order = Criteria::ASC) Order by the ontvangt_iow column
 * @method     ChildRemAanvraagQuery orderByStartWw($order = Criteria::ASC) Order by the start_ww column
 * @method     ChildRemAanvraagQuery orderByBezwaarOfBeroepUitkeringsinstantie($order = Criteria::ASC) Order by the bezwaar_of_beroep_uitkeringsinstantie column
 * @method     ChildRemAanvraagQuery orderByBurgerlijkeStaatId($order = Criteria::ASC) Order by the burgerlijke_staat_id column
 * @method     ChildRemAanvraagQuery orderBySamenwonend($order = Criteria::ASC) Order by the samenwonend column
 * @method     ChildRemAanvraagQuery orderByPartnerRemigratie($order = Criteria::ASC) Order by the partner_remigratie column
 * @method     ChildRemAanvraagQuery orderByPartnerWwStart($order = Criteria::ASC) Order by the partner_ww_start column
 * @method     ChildRemAanvraagQuery orderBySchuldenBijCjib($order = Criteria::ASC) Order by the schulden_bij_cjib column
 * @method     ChildRemAanvraagQuery orderBySchuldenBijBelastingdienst($order = Criteria::ASC) Order by the schulden_bij_belastingdienst column
 * @method     ChildRemAanvraagQuery orderByPartnerSchuldenBijCjib($order = Criteria::ASC) Order by the partner_schulden_bij_cjib column
 * @method     ChildRemAanvraagQuery orderByPartnerSchuldenBijBelastingdienst($order = Criteria::ASC) Order by the partner_schulden_bij_belastingdienst column
 * @method     ChildRemAanvraagQuery orderByVoorlopigeHechtenis($order = Criteria::ASC) Order by the voorlopige_hechtenis column
 * @method     ChildRemAanvraagQuery orderByPartnerVoorlopigeHechtenis($order = Criteria::ASC) Order by the partner_voorlopige_hechtenis column
 * @method     ChildRemAanvraagQuery orderByBsn($order = Criteria::ASC) Order by the bsn column
 * @method     ChildRemAanvraagQuery orderByPartnerBsn($order = Criteria::ASC) Order by the partner_bsn column
 * @method     ChildRemAanvraagQuery orderByVoornaam($order = Criteria::ASC) Order by the voornaam column
 * @method     ChildRemAanvraagQuery orderByAchternaam($order = Criteria::ASC) Order by the achternaam column
 * @method     ChildRemAanvraagQuery orderByPartnerVoornaam($order = Criteria::ASC) Order by the partner_voornaam column
 * @method     ChildRemAanvraagQuery orderByPartnerAchternaam($order = Criteria::ASC) Order by the partner_achternaam column
 * @method     ChildRemAanvraagQuery orderByPartnerGeboorteDatum($order = Criteria::ASC) Order by the partner_geboorte_datum column
 * @method     ChildRemAanvraagQuery orderByPartnerZelfdeAdres($order = Criteria::ASC) Order by the partner_zelfde_adres column
 * @method     ChildRemAanvraagQuery orderByProvincieId($order = Criteria::ASC) Order by the provincie_id column
 * @method     ChildRemAanvraagQuery orderByGemeenteId($order = Criteria::ASC) Order by the gemeente_id column
 * @method     ChildRemAanvraagQuery orderByStraat($order = Criteria::ASC) Order by the straat column
 * @method     ChildRemAanvraagQuery orderByHuisnummer($order = Criteria::ASC) Order by the huisnummer column
 * @method     ChildRemAanvraagQuery orderByPostcode($order = Criteria::ASC) Order by the postcode column
 * @method     ChildRemAanvraagQuery orderByPartnerProvincieId($order = Criteria::ASC) Order by the partner_provincie_id column
 * @method     ChildRemAanvraagQuery orderByPartnerGemeenteId($order = Criteria::ASC) Order by the partner_gemeente_id column
 * @method     ChildRemAanvraagQuery orderByPartnerStraat($order = Criteria::ASC) Order by the partner_straat column
 * @method     ChildRemAanvraagQuery orderByPartnerHuisnummer($order = Criteria::ASC) Order by the partner_huisnummer column
 * @method     ChildRemAanvraagQuery orderByPartnerPostcode($order = Criteria::ASC) Order by the partner_postcode column
 * @method     ChildRemAanvraagQuery orderByPartnerOntvangtWw($order = Criteria::ASC) Order by the partner_ontvangt_ww column
 * @method     ChildRemAanvraagQuery orderByPartnerOntvangtBijstand($order = Criteria::ASC) Order by the partner_ontvangt_bijstand column
 * @method     ChildRemAanvraagQuery orderByPartnerOntvangtWao($order = Criteria::ASC) Order by the partner_ontvangt_wao column
 * @method     ChildRemAanvraagQuery orderByPartnerOntvangtWia($order = Criteria::ASC) Order by the partner_ontvangt_wia column
 * @method     ChildRemAanvraagQuery orderByPartnerOntvangtAow($order = Criteria::ASC) Order by the partner_ontvangt_aow column
 * @method     ChildRemAanvraagQuery orderByPartnerOntvangtWamil($order = Criteria::ASC) Order by the partner_ontvangt_wamil column
 * @method     ChildRemAanvraagQuery orderByPartnerOntvangtIaoz($order = Criteria::ASC) Order by the partner_ontvangt_iaoz column
 * @method     ChildRemAanvraagQuery orderByPartnerOntvangtIaow($order = Criteria::ASC) Order by the partner_ontvangt_iaow column
 * @method     ChildRemAanvraagQuery orderByPartnerOntvangtIow($order = Criteria::ASC) Order by the partner_ontvangt_iow column
 * @method     ChildRemAanvraagQuery orderByHeeftKinderenJongerDan18($order = Criteria::ASC) Order by the heeft_kinderen_jonger_dan_18 column
 * @method     ChildRemAanvraagQuery orderByAantalKinderenJongerDan18($order = Criteria::ASC) Order by the aantal_kinderen_jonger_dan_18 column
 * @method     ChildRemAanvraagQuery orderByKinderenZelfdeAdres($order = Criteria::ASC) Order by the kinderen_zelfde_adres column
 * @method     ChildRemAanvraagQuery orderByToekomstigAdres($order = Criteria::ASC) Order by the toekomstig_adres column
 * @method     ChildRemAanvraagQuery orderByPostOntvangenToekomstigAdres($order = Criteria::ASC) Order by the post_ontvangen_toekomstig_adres column
 * @method     ChildRemAanvraagQuery orderByHeeftBankrekeningEmigratieland($order = Criteria::ASC) Order by the heeft_bankrekening_emigratieland column
 * @method     ChildRemAanvraagQuery orderByGegevensNaarWaarheidIngevuld($order = Criteria::ASC) Order by the gegevens_naar_waarheid_ingevuld column
 * @method     ChildRemAanvraagQuery orderByBedrag($order = Criteria::ASC) Order by the bedrag column
 * @method     ChildRemAanvraagQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildRemAanvraagQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildRemAanvraagQuery groupById() Group by the id column
 * @method     ChildRemAanvraagQuery groupByPersoonId() Group by the persoon_id column
 * @method     ChildRemAanvraagQuery groupByGeboorteDatum() Group by the geboorte_datum column
 * @method     ChildRemAanvraagQuery groupByGeboorteLand() Group by the geboorte_land column
 * @method     ChildRemAanvraagQuery groupByImmigratieDatum() Group by the immigratie_datum column
 * @method     ChildRemAanvraagQuery groupByHeeftNlPaspoort() Group by the heeft_nl_paspoort column
 * @method     ChildRemAanvraagQuery groupByEmigratieLand() Group by the emigratie_land column
 * @method     ChildRemAanvraagQuery groupByEmigratieVerblijfsvergunning() Group by the emigratie_verblijfsvergunning column
 * @method     ChildRemAanvraagQuery groupByPartnerEmigratieVerblijfsvergunning() Group by the partner_emigratie_verblijfsvergunning column
 * @method     ChildRemAanvraagQuery groupByOntvangtWw() Group by the ontvangt_ww column
 * @method     ChildRemAanvraagQuery groupByOntvangtBijstand() Group by the ontvangt_bijstand column
 * @method     ChildRemAanvraagQuery groupByOntvangtWao() Group by the ontvangt_wao column
 * @method     ChildRemAanvraagQuery groupByOntvangtWia() Group by the ontvangt_wia column
 * @method     ChildRemAanvraagQuery groupByOntvangtAow() Group by the ontvangt_aow column
 * @method     ChildRemAanvraagQuery groupByOntvangtWamil() Group by the ontvangt_wamil column
 * @method     ChildRemAanvraagQuery groupByOntvangtIaoz() Group by the ontvangt_iaoz column
 * @method     ChildRemAanvraagQuery groupByOntvangtIaow() Group by the ontvangt_iaow column
 * @method     ChildRemAanvraagQuery groupByOntvangtIow() Group by the ontvangt_iow column
 * @method     ChildRemAanvraagQuery groupByStartWw() Group by the start_ww column
 * @method     ChildRemAanvraagQuery groupByBezwaarOfBeroepUitkeringsinstantie() Group by the bezwaar_of_beroep_uitkeringsinstantie column
 * @method     ChildRemAanvraagQuery groupByBurgerlijkeStaatId() Group by the burgerlijke_staat_id column
 * @method     ChildRemAanvraagQuery groupBySamenwonend() Group by the samenwonend column
 * @method     ChildRemAanvraagQuery groupByPartnerRemigratie() Group by the partner_remigratie column
 * @method     ChildRemAanvraagQuery groupByPartnerWwStart() Group by the partner_ww_start column
 * @method     ChildRemAanvraagQuery groupBySchuldenBijCjib() Group by the schulden_bij_cjib column
 * @method     ChildRemAanvraagQuery groupBySchuldenBijBelastingdienst() Group by the schulden_bij_belastingdienst column
 * @method     ChildRemAanvraagQuery groupByPartnerSchuldenBijCjib() Group by the partner_schulden_bij_cjib column
 * @method     ChildRemAanvraagQuery groupByPartnerSchuldenBijBelastingdienst() Group by the partner_schulden_bij_belastingdienst column
 * @method     ChildRemAanvraagQuery groupByVoorlopigeHechtenis() Group by the voorlopige_hechtenis column
 * @method     ChildRemAanvraagQuery groupByPartnerVoorlopigeHechtenis() Group by the partner_voorlopige_hechtenis column
 * @method     ChildRemAanvraagQuery groupByBsn() Group by the bsn column
 * @method     ChildRemAanvraagQuery groupByPartnerBsn() Group by the partner_bsn column
 * @method     ChildRemAanvraagQuery groupByVoornaam() Group by the voornaam column
 * @method     ChildRemAanvraagQuery groupByAchternaam() Group by the achternaam column
 * @method     ChildRemAanvraagQuery groupByPartnerVoornaam() Group by the partner_voornaam column
 * @method     ChildRemAanvraagQuery groupByPartnerAchternaam() Group by the partner_achternaam column
 * @method     ChildRemAanvraagQuery groupByPartnerGeboorteDatum() Group by the partner_geboorte_datum column
 * @method     ChildRemAanvraagQuery groupByPartnerZelfdeAdres() Group by the partner_zelfde_adres column
 * @method     ChildRemAanvraagQuery groupByProvincieId() Group by the provincie_id column
 * @method     ChildRemAanvraagQuery groupByGemeenteId() Group by the gemeente_id column
 * @method     ChildRemAanvraagQuery groupByStraat() Group by the straat column
 * @method     ChildRemAanvraagQuery groupByHuisnummer() Group by the huisnummer column
 * @method     ChildRemAanvraagQuery groupByPostcode() Group by the postcode column
 * @method     ChildRemAanvraagQuery groupByPartnerProvincieId() Group by the partner_provincie_id column
 * @method     ChildRemAanvraagQuery groupByPartnerGemeenteId() Group by the partner_gemeente_id column
 * @method     ChildRemAanvraagQuery groupByPartnerStraat() Group by the partner_straat column
 * @method     ChildRemAanvraagQuery groupByPartnerHuisnummer() Group by the partner_huisnummer column
 * @method     ChildRemAanvraagQuery groupByPartnerPostcode() Group by the partner_postcode column
 * @method     ChildRemAanvraagQuery groupByPartnerOntvangtWw() Group by the partner_ontvangt_ww column
 * @method     ChildRemAanvraagQuery groupByPartnerOntvangtBijstand() Group by the partner_ontvangt_bijstand column
 * @method     ChildRemAanvraagQuery groupByPartnerOntvangtWao() Group by the partner_ontvangt_wao column
 * @method     ChildRemAanvraagQuery groupByPartnerOntvangtWia() Group by the partner_ontvangt_wia column
 * @method     ChildRemAanvraagQuery groupByPartnerOntvangtAow() Group by the partner_ontvangt_aow column
 * @method     ChildRemAanvraagQuery groupByPartnerOntvangtWamil() Group by the partner_ontvangt_wamil column
 * @method     ChildRemAanvraagQuery groupByPartnerOntvangtIaoz() Group by the partner_ontvangt_iaoz column
 * @method     ChildRemAanvraagQuery groupByPartnerOntvangtIaow() Group by the partner_ontvangt_iaow column
 * @method     ChildRemAanvraagQuery groupByPartnerOntvangtIow() Group by the partner_ontvangt_iow column
 * @method     ChildRemAanvraagQuery groupByHeeftKinderenJongerDan18() Group by the heeft_kinderen_jonger_dan_18 column
 * @method     ChildRemAanvraagQuery groupByAantalKinderenJongerDan18() Group by the aantal_kinderen_jonger_dan_18 column
 * @method     ChildRemAanvraagQuery groupByKinderenZelfdeAdres() Group by the kinderen_zelfde_adres column
 * @method     ChildRemAanvraagQuery groupByToekomstigAdres() Group by the toekomstig_adres column
 * @method     ChildRemAanvraagQuery groupByPostOntvangenToekomstigAdres() Group by the post_ontvangen_toekomstig_adres column
 * @method     ChildRemAanvraagQuery groupByHeeftBankrekeningEmigratieland() Group by the heeft_bankrekening_emigratieland column
 * @method     ChildRemAanvraagQuery groupByGegevensNaarWaarheidIngevuld() Group by the gegevens_naar_waarheid_ingevuld column
 * @method     ChildRemAanvraagQuery groupByBedrag() Group by the bedrag column
 * @method     ChildRemAanvraagQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildRemAanvraagQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildRemAanvraagQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRemAanvraagQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRemAanvraagQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRemAanvraagQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRemAanvraagQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRemAanvraagQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRemAanvraagQuery leftJoinPersoon($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persoon relation
 * @method     ChildRemAanvraagQuery rightJoinPersoon($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persoon relation
 * @method     ChildRemAanvraagQuery innerJoinPersoon($relationAlias = null) Adds a INNER JOIN clause to the query using the Persoon relation
 *
 * @method     ChildRemAanvraagQuery joinWithPersoon($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persoon relation
 *
 * @method     ChildRemAanvraagQuery leftJoinWithPersoon() Adds a LEFT JOIN clause and with to the query using the Persoon relation
 * @method     ChildRemAanvraagQuery rightJoinWithPersoon() Adds a RIGHT JOIN clause and with to the query using the Persoon relation
 * @method     ChildRemAanvraagQuery innerJoinWithPersoon() Adds a INNER JOIN clause and with to the query using the Persoon relation
 *
 * @method     \Model\Custom\NovumSvb\PersoonQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRemAanvraag findOne(ConnectionInterface $con = null) Return the first ChildRemAanvraag matching the query
 * @method     ChildRemAanvraag findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRemAanvraag matching the query, or a new ChildRemAanvraag object populated from the query conditions when no match is found
 *
 * @method     ChildRemAanvraag findOneById(int $id) Return the first ChildRemAanvraag filtered by the id column
 * @method     ChildRemAanvraag findOneByPersoonId(int $persoon_id) Return the first ChildRemAanvraag filtered by the persoon_id column
 * @method     ChildRemAanvraag findOneByGeboorteDatum(string $geboorte_datum) Return the first ChildRemAanvraag filtered by the geboorte_datum column
 * @method     ChildRemAanvraag findOneByGeboorteLand(string $geboorte_land) Return the first ChildRemAanvraag filtered by the geboorte_land column
 * @method     ChildRemAanvraag findOneByImmigratieDatum(string $immigratie_datum) Return the first ChildRemAanvraag filtered by the immigratie_datum column
 * @method     ChildRemAanvraag findOneByHeeftNlPaspoort(boolean $heeft_nl_paspoort) Return the first ChildRemAanvraag filtered by the heeft_nl_paspoort column
 * @method     ChildRemAanvraag findOneByEmigratieLand(string $emigratie_land) Return the first ChildRemAanvraag filtered by the emigratie_land column
 * @method     ChildRemAanvraag findOneByEmigratieVerblijfsvergunning(boolean $emigratie_verblijfsvergunning) Return the first ChildRemAanvraag filtered by the emigratie_verblijfsvergunning column
 * @method     ChildRemAanvraag findOneByPartnerEmigratieVerblijfsvergunning(boolean $partner_emigratie_verblijfsvergunning) Return the first ChildRemAanvraag filtered by the partner_emigratie_verblijfsvergunning column
 * @method     ChildRemAanvraag findOneByOntvangtWw(boolean $ontvangt_ww) Return the first ChildRemAanvraag filtered by the ontvangt_ww column
 * @method     ChildRemAanvraag findOneByOntvangtBijstand(boolean $ontvangt_bijstand) Return the first ChildRemAanvraag filtered by the ontvangt_bijstand column
 * @method     ChildRemAanvraag findOneByOntvangtWao(boolean $ontvangt_wao) Return the first ChildRemAanvraag filtered by the ontvangt_wao column
 * @method     ChildRemAanvraag findOneByOntvangtWia(boolean $ontvangt_wia) Return the first ChildRemAanvraag filtered by the ontvangt_wia column
 * @method     ChildRemAanvraag findOneByOntvangtAow(boolean $ontvangt_aow) Return the first ChildRemAanvraag filtered by the ontvangt_aow column
 * @method     ChildRemAanvraag findOneByOntvangtWamil(boolean $ontvangt_wamil) Return the first ChildRemAanvraag filtered by the ontvangt_wamil column
 * @method     ChildRemAanvraag findOneByOntvangtIaoz(boolean $ontvangt_iaoz) Return the first ChildRemAanvraag filtered by the ontvangt_iaoz column
 * @method     ChildRemAanvraag findOneByOntvangtIaow(boolean $ontvangt_iaow) Return the first ChildRemAanvraag filtered by the ontvangt_iaow column
 * @method     ChildRemAanvraag findOneByOntvangtIow(boolean $ontvangt_iow) Return the first ChildRemAanvraag filtered by the ontvangt_iow column
 * @method     ChildRemAanvraag findOneByStartWw(string $start_ww) Return the first ChildRemAanvraag filtered by the start_ww column
 * @method     ChildRemAanvraag findOneByBezwaarOfBeroepUitkeringsinstantie(boolean $bezwaar_of_beroep_uitkeringsinstantie) Return the first ChildRemAanvraag filtered by the bezwaar_of_beroep_uitkeringsinstantie column
 * @method     ChildRemAanvraag findOneByBurgerlijkeStaatId(int $burgerlijke_staat_id) Return the first ChildRemAanvraag filtered by the burgerlijke_staat_id column
 * @method     ChildRemAanvraag findOneBySamenwonend(boolean $samenwonend) Return the first ChildRemAanvraag filtered by the samenwonend column
 * @method     ChildRemAanvraag findOneByPartnerRemigratie(boolean $partner_remigratie) Return the first ChildRemAanvraag filtered by the partner_remigratie column
 * @method     ChildRemAanvraag findOneByPartnerWwStart(string $partner_ww_start) Return the first ChildRemAanvraag filtered by the partner_ww_start column
 * @method     ChildRemAanvraag findOneBySchuldenBijCjib(boolean $schulden_bij_cjib) Return the first ChildRemAanvraag filtered by the schulden_bij_cjib column
 * @method     ChildRemAanvraag findOneBySchuldenBijBelastingdienst(boolean $schulden_bij_belastingdienst) Return the first ChildRemAanvraag filtered by the schulden_bij_belastingdienst column
 * @method     ChildRemAanvraag findOneByPartnerSchuldenBijCjib(boolean $partner_schulden_bij_cjib) Return the first ChildRemAanvraag filtered by the partner_schulden_bij_cjib column
 * @method     ChildRemAanvraag findOneByPartnerSchuldenBijBelastingdienst(boolean $partner_schulden_bij_belastingdienst) Return the first ChildRemAanvraag filtered by the partner_schulden_bij_belastingdienst column
 * @method     ChildRemAanvraag findOneByVoorlopigeHechtenis(boolean $voorlopige_hechtenis) Return the first ChildRemAanvraag filtered by the voorlopige_hechtenis column
 * @method     ChildRemAanvraag findOneByPartnerVoorlopigeHechtenis(boolean $partner_voorlopige_hechtenis) Return the first ChildRemAanvraag filtered by the partner_voorlopige_hechtenis column
 * @method     ChildRemAanvraag findOneByBsn(string $bsn) Return the first ChildRemAanvraag filtered by the bsn column
 * @method     ChildRemAanvraag findOneByPartnerBsn(string $partner_bsn) Return the first ChildRemAanvraag filtered by the partner_bsn column
 * @method     ChildRemAanvraag findOneByVoornaam(string $voornaam) Return the first ChildRemAanvraag filtered by the voornaam column
 * @method     ChildRemAanvraag findOneByAchternaam(string $achternaam) Return the first ChildRemAanvraag filtered by the achternaam column
 * @method     ChildRemAanvraag findOneByPartnerVoornaam(string $partner_voornaam) Return the first ChildRemAanvraag filtered by the partner_voornaam column
 * @method     ChildRemAanvraag findOneByPartnerAchternaam(string $partner_achternaam) Return the first ChildRemAanvraag filtered by the partner_achternaam column
 * @method     ChildRemAanvraag findOneByPartnerGeboorteDatum(string $partner_geboorte_datum) Return the first ChildRemAanvraag filtered by the partner_geboorte_datum column
 * @method     ChildRemAanvraag findOneByPartnerZelfdeAdres(boolean $partner_zelfde_adres) Return the first ChildRemAanvraag filtered by the partner_zelfde_adres column
 * @method     ChildRemAanvraag findOneByProvincieId(int $provincie_id) Return the first ChildRemAanvraag filtered by the provincie_id column
 * @method     ChildRemAanvraag findOneByGemeenteId(int $gemeente_id) Return the first ChildRemAanvraag filtered by the gemeente_id column
 * @method     ChildRemAanvraag findOneByStraat(string $straat) Return the first ChildRemAanvraag filtered by the straat column
 * @method     ChildRemAanvraag findOneByHuisnummer(string $huisnummer) Return the first ChildRemAanvraag filtered by the huisnummer column
 * @method     ChildRemAanvraag findOneByPostcode(string $postcode) Return the first ChildRemAanvraag filtered by the postcode column
 * @method     ChildRemAanvraag findOneByPartnerProvincieId(int $partner_provincie_id) Return the first ChildRemAanvraag filtered by the partner_provincie_id column
 * @method     ChildRemAanvraag findOneByPartnerGemeenteId(int $partner_gemeente_id) Return the first ChildRemAanvraag filtered by the partner_gemeente_id column
 * @method     ChildRemAanvraag findOneByPartnerStraat(string $partner_straat) Return the first ChildRemAanvraag filtered by the partner_straat column
 * @method     ChildRemAanvraag findOneByPartnerHuisnummer(string $partner_huisnummer) Return the first ChildRemAanvraag filtered by the partner_huisnummer column
 * @method     ChildRemAanvraag findOneByPartnerPostcode(string $partner_postcode) Return the first ChildRemAanvraag filtered by the partner_postcode column
 * @method     ChildRemAanvraag findOneByPartnerOntvangtWw(boolean $partner_ontvangt_ww) Return the first ChildRemAanvraag filtered by the partner_ontvangt_ww column
 * @method     ChildRemAanvraag findOneByPartnerOntvangtBijstand(boolean $partner_ontvangt_bijstand) Return the first ChildRemAanvraag filtered by the partner_ontvangt_bijstand column
 * @method     ChildRemAanvraag findOneByPartnerOntvangtWao(boolean $partner_ontvangt_wao) Return the first ChildRemAanvraag filtered by the partner_ontvangt_wao column
 * @method     ChildRemAanvraag findOneByPartnerOntvangtWia(boolean $partner_ontvangt_wia) Return the first ChildRemAanvraag filtered by the partner_ontvangt_wia column
 * @method     ChildRemAanvraag findOneByPartnerOntvangtAow(boolean $partner_ontvangt_aow) Return the first ChildRemAanvraag filtered by the partner_ontvangt_aow column
 * @method     ChildRemAanvraag findOneByPartnerOntvangtWamil(boolean $partner_ontvangt_wamil) Return the first ChildRemAanvraag filtered by the partner_ontvangt_wamil column
 * @method     ChildRemAanvraag findOneByPartnerOntvangtIaoz(boolean $partner_ontvangt_iaoz) Return the first ChildRemAanvraag filtered by the partner_ontvangt_iaoz column
 * @method     ChildRemAanvraag findOneByPartnerOntvangtIaow(boolean $partner_ontvangt_iaow) Return the first ChildRemAanvraag filtered by the partner_ontvangt_iaow column
 * @method     ChildRemAanvraag findOneByPartnerOntvangtIow(boolean $partner_ontvangt_iow) Return the first ChildRemAanvraag filtered by the partner_ontvangt_iow column
 * @method     ChildRemAanvraag findOneByHeeftKinderenJongerDan18(boolean $heeft_kinderen_jonger_dan_18) Return the first ChildRemAanvraag filtered by the heeft_kinderen_jonger_dan_18 column
 * @method     ChildRemAanvraag findOneByAantalKinderenJongerDan18(int $aantal_kinderen_jonger_dan_18) Return the first ChildRemAanvraag filtered by the aantal_kinderen_jonger_dan_18 column
 * @method     ChildRemAanvraag findOneByKinderenZelfdeAdres(boolean $kinderen_zelfde_adres) Return the first ChildRemAanvraag filtered by the kinderen_zelfde_adres column
 * @method     ChildRemAanvraag findOneByToekomstigAdres(string $toekomstig_adres) Return the first ChildRemAanvraag filtered by the toekomstig_adres column
 * @method     ChildRemAanvraag findOneByPostOntvangenToekomstigAdres(boolean $post_ontvangen_toekomstig_adres) Return the first ChildRemAanvraag filtered by the post_ontvangen_toekomstig_adres column
 * @method     ChildRemAanvraag findOneByHeeftBankrekeningEmigratieland(boolean $heeft_bankrekening_emigratieland) Return the first ChildRemAanvraag filtered by the heeft_bankrekening_emigratieland column
 * @method     ChildRemAanvraag findOneByGegevensNaarWaarheidIngevuld(boolean $gegevens_naar_waarheid_ingevuld) Return the first ChildRemAanvraag filtered by the gegevens_naar_waarheid_ingevuld column
 * @method     ChildRemAanvraag findOneByBedrag(string $bedrag) Return the first ChildRemAanvraag filtered by the bedrag column
 * @method     ChildRemAanvraag findOneByCreatedAt(string $created_at) Return the first ChildRemAanvraag filtered by the created_at column
 * @method     ChildRemAanvraag findOneByUpdatedAt(string $updated_at) Return the first ChildRemAanvraag filtered by the updated_at column *

 * @method     ChildRemAanvraag requirePk($key, ConnectionInterface $con = null) Return the ChildRemAanvraag by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOne(ConnectionInterface $con = null) Return the first ChildRemAanvraag matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRemAanvraag requireOneById(int $id) Return the first ChildRemAanvraag filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPersoonId(int $persoon_id) Return the first ChildRemAanvraag filtered by the persoon_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByGeboorteDatum(string $geboorte_datum) Return the first ChildRemAanvraag filtered by the geboorte_datum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByGeboorteLand(string $geboorte_land) Return the first ChildRemAanvraag filtered by the geboorte_land column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByImmigratieDatum(string $immigratie_datum) Return the first ChildRemAanvraag filtered by the immigratie_datum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByHeeftNlPaspoort(boolean $heeft_nl_paspoort) Return the first ChildRemAanvraag filtered by the heeft_nl_paspoort column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByEmigratieLand(string $emigratie_land) Return the first ChildRemAanvraag filtered by the emigratie_land column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByEmigratieVerblijfsvergunning(boolean $emigratie_verblijfsvergunning) Return the first ChildRemAanvraag filtered by the emigratie_verblijfsvergunning column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerEmigratieVerblijfsvergunning(boolean $partner_emigratie_verblijfsvergunning) Return the first ChildRemAanvraag filtered by the partner_emigratie_verblijfsvergunning column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByOntvangtWw(boolean $ontvangt_ww) Return the first ChildRemAanvraag filtered by the ontvangt_ww column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByOntvangtBijstand(boolean $ontvangt_bijstand) Return the first ChildRemAanvraag filtered by the ontvangt_bijstand column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByOntvangtWao(boolean $ontvangt_wao) Return the first ChildRemAanvraag filtered by the ontvangt_wao column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByOntvangtWia(boolean $ontvangt_wia) Return the first ChildRemAanvraag filtered by the ontvangt_wia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByOntvangtAow(boolean $ontvangt_aow) Return the first ChildRemAanvraag filtered by the ontvangt_aow column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByOntvangtWamil(boolean $ontvangt_wamil) Return the first ChildRemAanvraag filtered by the ontvangt_wamil column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByOntvangtIaoz(boolean $ontvangt_iaoz) Return the first ChildRemAanvraag filtered by the ontvangt_iaoz column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByOntvangtIaow(boolean $ontvangt_iaow) Return the first ChildRemAanvraag filtered by the ontvangt_iaow column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByOntvangtIow(boolean $ontvangt_iow) Return the first ChildRemAanvraag filtered by the ontvangt_iow column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByStartWw(string $start_ww) Return the first ChildRemAanvraag filtered by the start_ww column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByBezwaarOfBeroepUitkeringsinstantie(boolean $bezwaar_of_beroep_uitkeringsinstantie) Return the first ChildRemAanvraag filtered by the bezwaar_of_beroep_uitkeringsinstantie column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByBurgerlijkeStaatId(int $burgerlijke_staat_id) Return the first ChildRemAanvraag filtered by the burgerlijke_staat_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneBySamenwonend(boolean $samenwonend) Return the first ChildRemAanvraag filtered by the samenwonend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerRemigratie(boolean $partner_remigratie) Return the first ChildRemAanvraag filtered by the partner_remigratie column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerWwStart(string $partner_ww_start) Return the first ChildRemAanvraag filtered by the partner_ww_start column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneBySchuldenBijCjib(boolean $schulden_bij_cjib) Return the first ChildRemAanvraag filtered by the schulden_bij_cjib column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneBySchuldenBijBelastingdienst(boolean $schulden_bij_belastingdienst) Return the first ChildRemAanvraag filtered by the schulden_bij_belastingdienst column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerSchuldenBijCjib(boolean $partner_schulden_bij_cjib) Return the first ChildRemAanvraag filtered by the partner_schulden_bij_cjib column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerSchuldenBijBelastingdienst(boolean $partner_schulden_bij_belastingdienst) Return the first ChildRemAanvraag filtered by the partner_schulden_bij_belastingdienst column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByVoorlopigeHechtenis(boolean $voorlopige_hechtenis) Return the first ChildRemAanvraag filtered by the voorlopige_hechtenis column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerVoorlopigeHechtenis(boolean $partner_voorlopige_hechtenis) Return the first ChildRemAanvraag filtered by the partner_voorlopige_hechtenis column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByBsn(string $bsn) Return the first ChildRemAanvraag filtered by the bsn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerBsn(string $partner_bsn) Return the first ChildRemAanvraag filtered by the partner_bsn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByVoornaam(string $voornaam) Return the first ChildRemAanvraag filtered by the voornaam column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByAchternaam(string $achternaam) Return the first ChildRemAanvraag filtered by the achternaam column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerVoornaam(string $partner_voornaam) Return the first ChildRemAanvraag filtered by the partner_voornaam column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerAchternaam(string $partner_achternaam) Return the first ChildRemAanvraag filtered by the partner_achternaam column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerGeboorteDatum(string $partner_geboorte_datum) Return the first ChildRemAanvraag filtered by the partner_geboorte_datum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerZelfdeAdres(boolean $partner_zelfde_adres) Return the first ChildRemAanvraag filtered by the partner_zelfde_adres column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByProvincieId(int $provincie_id) Return the first ChildRemAanvraag filtered by the provincie_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByGemeenteId(int $gemeente_id) Return the first ChildRemAanvraag filtered by the gemeente_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByStraat(string $straat) Return the first ChildRemAanvraag filtered by the straat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByHuisnummer(string $huisnummer) Return the first ChildRemAanvraag filtered by the huisnummer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPostcode(string $postcode) Return the first ChildRemAanvraag filtered by the postcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerProvincieId(int $partner_provincie_id) Return the first ChildRemAanvraag filtered by the partner_provincie_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerGemeenteId(int $partner_gemeente_id) Return the first ChildRemAanvraag filtered by the partner_gemeente_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerStraat(string $partner_straat) Return the first ChildRemAanvraag filtered by the partner_straat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerHuisnummer(string $partner_huisnummer) Return the first ChildRemAanvraag filtered by the partner_huisnummer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerPostcode(string $partner_postcode) Return the first ChildRemAanvraag filtered by the partner_postcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerOntvangtWw(boolean $partner_ontvangt_ww) Return the first ChildRemAanvraag filtered by the partner_ontvangt_ww column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerOntvangtBijstand(boolean $partner_ontvangt_bijstand) Return the first ChildRemAanvraag filtered by the partner_ontvangt_bijstand column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerOntvangtWao(boolean $partner_ontvangt_wao) Return the first ChildRemAanvraag filtered by the partner_ontvangt_wao column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerOntvangtWia(boolean $partner_ontvangt_wia) Return the first ChildRemAanvraag filtered by the partner_ontvangt_wia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerOntvangtAow(boolean $partner_ontvangt_aow) Return the first ChildRemAanvraag filtered by the partner_ontvangt_aow column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerOntvangtWamil(boolean $partner_ontvangt_wamil) Return the first ChildRemAanvraag filtered by the partner_ontvangt_wamil column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerOntvangtIaoz(boolean $partner_ontvangt_iaoz) Return the first ChildRemAanvraag filtered by the partner_ontvangt_iaoz column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerOntvangtIaow(boolean $partner_ontvangt_iaow) Return the first ChildRemAanvraag filtered by the partner_ontvangt_iaow column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPartnerOntvangtIow(boolean $partner_ontvangt_iow) Return the first ChildRemAanvraag filtered by the partner_ontvangt_iow column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByHeeftKinderenJongerDan18(boolean $heeft_kinderen_jonger_dan_18) Return the first ChildRemAanvraag filtered by the heeft_kinderen_jonger_dan_18 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByAantalKinderenJongerDan18(int $aantal_kinderen_jonger_dan_18) Return the first ChildRemAanvraag filtered by the aantal_kinderen_jonger_dan_18 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByKinderenZelfdeAdres(boolean $kinderen_zelfde_adres) Return the first ChildRemAanvraag filtered by the kinderen_zelfde_adres column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByToekomstigAdres(string $toekomstig_adres) Return the first ChildRemAanvraag filtered by the toekomstig_adres column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByPostOntvangenToekomstigAdres(boolean $post_ontvangen_toekomstig_adres) Return the first ChildRemAanvraag filtered by the post_ontvangen_toekomstig_adres column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByHeeftBankrekeningEmigratieland(boolean $heeft_bankrekening_emigratieland) Return the first ChildRemAanvraag filtered by the heeft_bankrekening_emigratieland column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByGegevensNaarWaarheidIngevuld(boolean $gegevens_naar_waarheid_ingevuld) Return the first ChildRemAanvraag filtered by the gegevens_naar_waarheid_ingevuld column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByBedrag(string $bedrag) Return the first ChildRemAanvraag filtered by the bedrag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByCreatedAt(string $created_at) Return the first ChildRemAanvraag filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRemAanvraag requireOneByUpdatedAt(string $updated_at) Return the first ChildRemAanvraag filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRemAanvraag[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRemAanvraag objects based on current ModelCriteria
 * @method     ChildRemAanvraag[]|ObjectCollection findById(int $id) Return ChildRemAanvraag objects filtered by the id column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPersoonId(int $persoon_id) Return ChildRemAanvraag objects filtered by the persoon_id column
 * @method     ChildRemAanvraag[]|ObjectCollection findByGeboorteDatum(string $geboorte_datum) Return ChildRemAanvraag objects filtered by the geboorte_datum column
 * @method     ChildRemAanvraag[]|ObjectCollection findByGeboorteLand(string $geboorte_land) Return ChildRemAanvraag objects filtered by the geboorte_land column
 * @method     ChildRemAanvraag[]|ObjectCollection findByImmigratieDatum(string $immigratie_datum) Return ChildRemAanvraag objects filtered by the immigratie_datum column
 * @method     ChildRemAanvraag[]|ObjectCollection findByHeeftNlPaspoort(boolean $heeft_nl_paspoort) Return ChildRemAanvraag objects filtered by the heeft_nl_paspoort column
 * @method     ChildRemAanvraag[]|ObjectCollection findByEmigratieLand(string $emigratie_land) Return ChildRemAanvraag objects filtered by the emigratie_land column
 * @method     ChildRemAanvraag[]|ObjectCollection findByEmigratieVerblijfsvergunning(boolean $emigratie_verblijfsvergunning) Return ChildRemAanvraag objects filtered by the emigratie_verblijfsvergunning column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerEmigratieVerblijfsvergunning(boolean $partner_emigratie_verblijfsvergunning) Return ChildRemAanvraag objects filtered by the partner_emigratie_verblijfsvergunning column
 * @method     ChildRemAanvraag[]|ObjectCollection findByOntvangtWw(boolean $ontvangt_ww) Return ChildRemAanvraag objects filtered by the ontvangt_ww column
 * @method     ChildRemAanvraag[]|ObjectCollection findByOntvangtBijstand(boolean $ontvangt_bijstand) Return ChildRemAanvraag objects filtered by the ontvangt_bijstand column
 * @method     ChildRemAanvraag[]|ObjectCollection findByOntvangtWao(boolean $ontvangt_wao) Return ChildRemAanvraag objects filtered by the ontvangt_wao column
 * @method     ChildRemAanvraag[]|ObjectCollection findByOntvangtWia(boolean $ontvangt_wia) Return ChildRemAanvraag objects filtered by the ontvangt_wia column
 * @method     ChildRemAanvraag[]|ObjectCollection findByOntvangtAow(boolean $ontvangt_aow) Return ChildRemAanvraag objects filtered by the ontvangt_aow column
 * @method     ChildRemAanvraag[]|ObjectCollection findByOntvangtWamil(boolean $ontvangt_wamil) Return ChildRemAanvraag objects filtered by the ontvangt_wamil column
 * @method     ChildRemAanvraag[]|ObjectCollection findByOntvangtIaoz(boolean $ontvangt_iaoz) Return ChildRemAanvraag objects filtered by the ontvangt_iaoz column
 * @method     ChildRemAanvraag[]|ObjectCollection findByOntvangtIaow(boolean $ontvangt_iaow) Return ChildRemAanvraag objects filtered by the ontvangt_iaow column
 * @method     ChildRemAanvraag[]|ObjectCollection findByOntvangtIow(boolean $ontvangt_iow) Return ChildRemAanvraag objects filtered by the ontvangt_iow column
 * @method     ChildRemAanvraag[]|ObjectCollection findByStartWw(string $start_ww) Return ChildRemAanvraag objects filtered by the start_ww column
 * @method     ChildRemAanvraag[]|ObjectCollection findByBezwaarOfBeroepUitkeringsinstantie(boolean $bezwaar_of_beroep_uitkeringsinstantie) Return ChildRemAanvraag objects filtered by the bezwaar_of_beroep_uitkeringsinstantie column
 * @method     ChildRemAanvraag[]|ObjectCollection findByBurgerlijkeStaatId(int $burgerlijke_staat_id) Return ChildRemAanvraag objects filtered by the burgerlijke_staat_id column
 * @method     ChildRemAanvraag[]|ObjectCollection findBySamenwonend(boolean $samenwonend) Return ChildRemAanvraag objects filtered by the samenwonend column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerRemigratie(boolean $partner_remigratie) Return ChildRemAanvraag objects filtered by the partner_remigratie column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerWwStart(string $partner_ww_start) Return ChildRemAanvraag objects filtered by the partner_ww_start column
 * @method     ChildRemAanvraag[]|ObjectCollection findBySchuldenBijCjib(boolean $schulden_bij_cjib) Return ChildRemAanvraag objects filtered by the schulden_bij_cjib column
 * @method     ChildRemAanvraag[]|ObjectCollection findBySchuldenBijBelastingdienst(boolean $schulden_bij_belastingdienst) Return ChildRemAanvraag objects filtered by the schulden_bij_belastingdienst column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerSchuldenBijCjib(boolean $partner_schulden_bij_cjib) Return ChildRemAanvraag objects filtered by the partner_schulden_bij_cjib column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerSchuldenBijBelastingdienst(boolean $partner_schulden_bij_belastingdienst) Return ChildRemAanvraag objects filtered by the partner_schulden_bij_belastingdienst column
 * @method     ChildRemAanvraag[]|ObjectCollection findByVoorlopigeHechtenis(boolean $voorlopige_hechtenis) Return ChildRemAanvraag objects filtered by the voorlopige_hechtenis column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerVoorlopigeHechtenis(boolean $partner_voorlopige_hechtenis) Return ChildRemAanvraag objects filtered by the partner_voorlopige_hechtenis column
 * @method     ChildRemAanvraag[]|ObjectCollection findByBsn(string $bsn) Return ChildRemAanvraag objects filtered by the bsn column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerBsn(string $partner_bsn) Return ChildRemAanvraag objects filtered by the partner_bsn column
 * @method     ChildRemAanvraag[]|ObjectCollection findByVoornaam(string $voornaam) Return ChildRemAanvraag objects filtered by the voornaam column
 * @method     ChildRemAanvraag[]|ObjectCollection findByAchternaam(string $achternaam) Return ChildRemAanvraag objects filtered by the achternaam column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerVoornaam(string $partner_voornaam) Return ChildRemAanvraag objects filtered by the partner_voornaam column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerAchternaam(string $partner_achternaam) Return ChildRemAanvraag objects filtered by the partner_achternaam column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerGeboorteDatum(string $partner_geboorte_datum) Return ChildRemAanvraag objects filtered by the partner_geboorte_datum column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerZelfdeAdres(boolean $partner_zelfde_adres) Return ChildRemAanvraag objects filtered by the partner_zelfde_adres column
 * @method     ChildRemAanvraag[]|ObjectCollection findByProvincieId(int $provincie_id) Return ChildRemAanvraag objects filtered by the provincie_id column
 * @method     ChildRemAanvraag[]|ObjectCollection findByGemeenteId(int $gemeente_id) Return ChildRemAanvraag objects filtered by the gemeente_id column
 * @method     ChildRemAanvraag[]|ObjectCollection findByStraat(string $straat) Return ChildRemAanvraag objects filtered by the straat column
 * @method     ChildRemAanvraag[]|ObjectCollection findByHuisnummer(string $huisnummer) Return ChildRemAanvraag objects filtered by the huisnummer column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPostcode(string $postcode) Return ChildRemAanvraag objects filtered by the postcode column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerProvincieId(int $partner_provincie_id) Return ChildRemAanvraag objects filtered by the partner_provincie_id column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerGemeenteId(int $partner_gemeente_id) Return ChildRemAanvraag objects filtered by the partner_gemeente_id column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerStraat(string $partner_straat) Return ChildRemAanvraag objects filtered by the partner_straat column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerHuisnummer(string $partner_huisnummer) Return ChildRemAanvraag objects filtered by the partner_huisnummer column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerPostcode(string $partner_postcode) Return ChildRemAanvraag objects filtered by the partner_postcode column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerOntvangtWw(boolean $partner_ontvangt_ww) Return ChildRemAanvraag objects filtered by the partner_ontvangt_ww column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerOntvangtBijstand(boolean $partner_ontvangt_bijstand) Return ChildRemAanvraag objects filtered by the partner_ontvangt_bijstand column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerOntvangtWao(boolean $partner_ontvangt_wao) Return ChildRemAanvraag objects filtered by the partner_ontvangt_wao column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerOntvangtWia(boolean $partner_ontvangt_wia) Return ChildRemAanvraag objects filtered by the partner_ontvangt_wia column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerOntvangtAow(boolean $partner_ontvangt_aow) Return ChildRemAanvraag objects filtered by the partner_ontvangt_aow column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerOntvangtWamil(boolean $partner_ontvangt_wamil) Return ChildRemAanvraag objects filtered by the partner_ontvangt_wamil column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerOntvangtIaoz(boolean $partner_ontvangt_iaoz) Return ChildRemAanvraag objects filtered by the partner_ontvangt_iaoz column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerOntvangtIaow(boolean $partner_ontvangt_iaow) Return ChildRemAanvraag objects filtered by the partner_ontvangt_iaow column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPartnerOntvangtIow(boolean $partner_ontvangt_iow) Return ChildRemAanvraag objects filtered by the partner_ontvangt_iow column
 * @method     ChildRemAanvraag[]|ObjectCollection findByHeeftKinderenJongerDan18(boolean $heeft_kinderen_jonger_dan_18) Return ChildRemAanvraag objects filtered by the heeft_kinderen_jonger_dan_18 column
 * @method     ChildRemAanvraag[]|ObjectCollection findByAantalKinderenJongerDan18(int $aantal_kinderen_jonger_dan_18) Return ChildRemAanvraag objects filtered by the aantal_kinderen_jonger_dan_18 column
 * @method     ChildRemAanvraag[]|ObjectCollection findByKinderenZelfdeAdres(boolean $kinderen_zelfde_adres) Return ChildRemAanvraag objects filtered by the kinderen_zelfde_adres column
 * @method     ChildRemAanvraag[]|ObjectCollection findByToekomstigAdres(string $toekomstig_adres) Return ChildRemAanvraag objects filtered by the toekomstig_adres column
 * @method     ChildRemAanvraag[]|ObjectCollection findByPostOntvangenToekomstigAdres(boolean $post_ontvangen_toekomstig_adres) Return ChildRemAanvraag objects filtered by the post_ontvangen_toekomstig_adres column
 * @method     ChildRemAanvraag[]|ObjectCollection findByHeeftBankrekeningEmigratieland(boolean $heeft_bankrekening_emigratieland) Return ChildRemAanvraag objects filtered by the heeft_bankrekening_emigratieland column
 * @method     ChildRemAanvraag[]|ObjectCollection findByGegevensNaarWaarheidIngevuld(boolean $gegevens_naar_waarheid_ingevuld) Return ChildRemAanvraag objects filtered by the gegevens_naar_waarheid_ingevuld column
 * @method     ChildRemAanvraag[]|ObjectCollection findByBedrag(string $bedrag) Return ChildRemAanvraag objects filtered by the bedrag column
 * @method     ChildRemAanvraag[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildRemAanvraag objects filtered by the created_at column
 * @method     ChildRemAanvraag[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildRemAanvraag objects filtered by the updated_at column
 * @method     ChildRemAanvraag[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RemAanvraagQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumSvb\Base\RemAanvraagQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumSvb\\RemAanvraag', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRemAanvraagQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRemAanvraagQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRemAanvraagQuery) {
            return $criteria;
        }
        $query = new ChildRemAanvraagQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildRemAanvraag|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RemAanvraagTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = RemAanvraagTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRemAanvraag A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, persoon_id, geboorte_datum, geboorte_land, immigratie_datum, heeft_nl_paspoort, emigratie_land, emigratie_verblijfsvergunning, partner_emigratie_verblijfsvergunning, ontvangt_ww, ontvangt_bijstand, ontvangt_wao, ontvangt_wia, ontvangt_aow, ontvangt_wamil, ontvangt_iaoz, ontvangt_iaow, ontvangt_iow, start_ww, bezwaar_of_beroep_uitkeringsinstantie, burgerlijke_staat_id, samenwonend, partner_remigratie, partner_ww_start, schulden_bij_cjib, schulden_bij_belastingdienst, partner_schulden_bij_cjib, partner_schulden_bij_belastingdienst, voorlopige_hechtenis, partner_voorlopige_hechtenis, bsn, partner_bsn, voornaam, achternaam, partner_voornaam, partner_achternaam, partner_geboorte_datum, partner_zelfde_adres, provincie_id, gemeente_id, straat, huisnummer, postcode, partner_provincie_id, partner_gemeente_id, partner_straat, partner_huisnummer, partner_postcode, partner_ontvangt_ww, partner_ontvangt_bijstand, partner_ontvangt_wao, partner_ontvangt_wia, partner_ontvangt_aow, partner_ontvangt_wamil, partner_ontvangt_iaoz, partner_ontvangt_iaow, partner_ontvangt_iow, heeft_kinderen_jonger_dan_18, aantal_kinderen_jonger_dan_18, kinderen_zelfde_adres, toekomstig_adres, post_ontvangen_toekomstig_adres, heeft_bankrekening_emigratieland, gegevens_naar_waarheid_ingevuld, bedrag, created_at, updated_at FROM rem_aanvraag WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildRemAanvraag $obj */
            $obj = new ChildRemAanvraag();
            $obj->hydrate($row);
            RemAanvraagTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildRemAanvraag|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the persoon_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersoonId(1234); // WHERE persoon_id = 1234
     * $query->filterByPersoonId(array(12, 34)); // WHERE persoon_id IN (12, 34)
     * $query->filterByPersoonId(array('min' => 12)); // WHERE persoon_id > 12
     * </code>
     *
     * @see       filterByPersoon()
     *
     * @param     mixed $persoonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPersoonId($persoonId = null, $comparison = null)
    {
        if (is_array($persoonId)) {
            $useMinMax = false;
            if (isset($persoonId['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PERSOON_ID, $persoonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persoonId['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PERSOON_ID, $persoonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PERSOON_ID, $persoonId, $comparison);
    }

    /**
     * Filter the query on the geboorte_datum column
     *
     * Example usage:
     * <code>
     * $query->filterByGeboorteDatum('2011-03-14'); // WHERE geboorte_datum = '2011-03-14'
     * $query->filterByGeboorteDatum('now'); // WHERE geboorte_datum = '2011-03-14'
     * $query->filterByGeboorteDatum(array('max' => 'yesterday')); // WHERE geboorte_datum > '2011-03-13'
     * </code>
     *
     * @param     mixed $geboorteDatum The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByGeboorteDatum($geboorteDatum = null, $comparison = null)
    {
        if (is_array($geboorteDatum)) {
            $useMinMax = false;
            if (isset($geboorteDatum['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_GEBOORTE_DATUM, $geboorteDatum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geboorteDatum['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_GEBOORTE_DATUM, $geboorteDatum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_GEBOORTE_DATUM, $geboorteDatum, $comparison);
    }

    /**
     * Filter the query on the geboorte_land column
     *
     * Example usage:
     * <code>
     * $query->filterByGeboorteLand('fooValue');   // WHERE geboorte_land = 'fooValue'
     * $query->filterByGeboorteLand('%fooValue%', Criteria::LIKE); // WHERE geboorte_land LIKE '%fooValue%'
     * </code>
     *
     * @param     string $geboorteLand The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByGeboorteLand($geboorteLand = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($geboorteLand)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_GEBOORTE_LAND, $geboorteLand, $comparison);
    }

    /**
     * Filter the query on the immigratie_datum column
     *
     * Example usage:
     * <code>
     * $query->filterByImmigratieDatum('2011-03-14'); // WHERE immigratie_datum = '2011-03-14'
     * $query->filterByImmigratieDatum('now'); // WHERE immigratie_datum = '2011-03-14'
     * $query->filterByImmigratieDatum(array('max' => 'yesterday')); // WHERE immigratie_datum > '2011-03-13'
     * </code>
     *
     * @param     mixed $immigratieDatum The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByImmigratieDatum($immigratieDatum = null, $comparison = null)
    {
        if (is_array($immigratieDatum)) {
            $useMinMax = false;
            if (isset($immigratieDatum['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_IMMIGRATIE_DATUM, $immigratieDatum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($immigratieDatum['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_IMMIGRATIE_DATUM, $immigratieDatum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_IMMIGRATIE_DATUM, $immigratieDatum, $comparison);
    }

    /**
     * Filter the query on the heeft_nl_paspoort column
     *
     * Example usage:
     * <code>
     * $query->filterByHeeftNlPaspoort(true); // WHERE heeft_nl_paspoort = true
     * $query->filterByHeeftNlPaspoort('yes'); // WHERE heeft_nl_paspoort = true
     * </code>
     *
     * @param     boolean|string $heeftNlPaspoort The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByHeeftNlPaspoort($heeftNlPaspoort = null, $comparison = null)
    {
        if (is_string($heeftNlPaspoort)) {
            $heeftNlPaspoort = in_array(strtolower($heeftNlPaspoort), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_HEEFT_NL_PASPOORT, $heeftNlPaspoort, $comparison);
    }

    /**
     * Filter the query on the emigratie_land column
     *
     * Example usage:
     * <code>
     * $query->filterByEmigratieLand('fooValue');   // WHERE emigratie_land = 'fooValue'
     * $query->filterByEmigratieLand('%fooValue%', Criteria::LIKE); // WHERE emigratie_land LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emigratieLand The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByEmigratieLand($emigratieLand = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emigratieLand)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_EMIGRATIE_LAND, $emigratieLand, $comparison);
    }

    /**
     * Filter the query on the emigratie_verblijfsvergunning column
     *
     * Example usage:
     * <code>
     * $query->filterByEmigratieVerblijfsvergunning(true); // WHERE emigratie_verblijfsvergunning = true
     * $query->filterByEmigratieVerblijfsvergunning('yes'); // WHERE emigratie_verblijfsvergunning = true
     * </code>
     *
     * @param     boolean|string $emigratieVerblijfsvergunning The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByEmigratieVerblijfsvergunning($emigratieVerblijfsvergunning = null, $comparison = null)
    {
        if (is_string($emigratieVerblijfsvergunning)) {
            $emigratieVerblijfsvergunning = in_array(strtolower($emigratieVerblijfsvergunning), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING, $emigratieVerblijfsvergunning, $comparison);
    }

    /**
     * Filter the query on the partner_emigratie_verblijfsvergunning column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerEmigratieVerblijfsvergunning(true); // WHERE partner_emigratie_verblijfsvergunning = true
     * $query->filterByPartnerEmigratieVerblijfsvergunning('yes'); // WHERE partner_emigratie_verblijfsvergunning = true
     * </code>
     *
     * @param     boolean|string $partnerEmigratieVerblijfsvergunning The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerEmigratieVerblijfsvergunning($partnerEmigratieVerblijfsvergunning = null, $comparison = null)
    {
        if (is_string($partnerEmigratieVerblijfsvergunning)) {
            $partnerEmigratieVerblijfsvergunning = in_array(strtolower($partnerEmigratieVerblijfsvergunning), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING, $partnerEmigratieVerblijfsvergunning, $comparison);
    }

    /**
     * Filter the query on the ontvangt_ww column
     *
     * Example usage:
     * <code>
     * $query->filterByOntvangtWw(true); // WHERE ontvangt_ww = true
     * $query->filterByOntvangtWw('yes'); // WHERE ontvangt_ww = true
     * </code>
     *
     * @param     boolean|string $ontvangtWw The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByOntvangtWw($ontvangtWw = null, $comparison = null)
    {
        if (is_string($ontvangtWw)) {
            $ontvangtWw = in_array(strtolower($ontvangtWw), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ONTVANGT_WW, $ontvangtWw, $comparison);
    }

    /**
     * Filter the query on the ontvangt_bijstand column
     *
     * Example usage:
     * <code>
     * $query->filterByOntvangtBijstand(true); // WHERE ontvangt_bijstand = true
     * $query->filterByOntvangtBijstand('yes'); // WHERE ontvangt_bijstand = true
     * </code>
     *
     * @param     boolean|string $ontvangtBijstand The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByOntvangtBijstand($ontvangtBijstand = null, $comparison = null)
    {
        if (is_string($ontvangtBijstand)) {
            $ontvangtBijstand = in_array(strtolower($ontvangtBijstand), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ONTVANGT_BIJSTAND, $ontvangtBijstand, $comparison);
    }

    /**
     * Filter the query on the ontvangt_wao column
     *
     * Example usage:
     * <code>
     * $query->filterByOntvangtWao(true); // WHERE ontvangt_wao = true
     * $query->filterByOntvangtWao('yes'); // WHERE ontvangt_wao = true
     * </code>
     *
     * @param     boolean|string $ontvangtWao The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByOntvangtWao($ontvangtWao = null, $comparison = null)
    {
        if (is_string($ontvangtWao)) {
            $ontvangtWao = in_array(strtolower($ontvangtWao), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ONTVANGT_WAO, $ontvangtWao, $comparison);
    }

    /**
     * Filter the query on the ontvangt_wia column
     *
     * Example usage:
     * <code>
     * $query->filterByOntvangtWia(true); // WHERE ontvangt_wia = true
     * $query->filterByOntvangtWia('yes'); // WHERE ontvangt_wia = true
     * </code>
     *
     * @param     boolean|string $ontvangtWia The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByOntvangtWia($ontvangtWia = null, $comparison = null)
    {
        if (is_string($ontvangtWia)) {
            $ontvangtWia = in_array(strtolower($ontvangtWia), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ONTVANGT_WIA, $ontvangtWia, $comparison);
    }

    /**
     * Filter the query on the ontvangt_aow column
     *
     * Example usage:
     * <code>
     * $query->filterByOntvangtAow(true); // WHERE ontvangt_aow = true
     * $query->filterByOntvangtAow('yes'); // WHERE ontvangt_aow = true
     * </code>
     *
     * @param     boolean|string $ontvangtAow The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByOntvangtAow($ontvangtAow = null, $comparison = null)
    {
        if (is_string($ontvangtAow)) {
            $ontvangtAow = in_array(strtolower($ontvangtAow), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ONTVANGT_AOW, $ontvangtAow, $comparison);
    }

    /**
     * Filter the query on the ontvangt_wamil column
     *
     * Example usage:
     * <code>
     * $query->filterByOntvangtWamil(true); // WHERE ontvangt_wamil = true
     * $query->filterByOntvangtWamil('yes'); // WHERE ontvangt_wamil = true
     * </code>
     *
     * @param     boolean|string $ontvangtWamil The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByOntvangtWamil($ontvangtWamil = null, $comparison = null)
    {
        if (is_string($ontvangtWamil)) {
            $ontvangtWamil = in_array(strtolower($ontvangtWamil), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ONTVANGT_WAMIL, $ontvangtWamil, $comparison);
    }

    /**
     * Filter the query on the ontvangt_iaoz column
     *
     * Example usage:
     * <code>
     * $query->filterByOntvangtIaoz(true); // WHERE ontvangt_iaoz = true
     * $query->filterByOntvangtIaoz('yes'); // WHERE ontvangt_iaoz = true
     * </code>
     *
     * @param     boolean|string $ontvangtIaoz The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByOntvangtIaoz($ontvangtIaoz = null, $comparison = null)
    {
        if (is_string($ontvangtIaoz)) {
            $ontvangtIaoz = in_array(strtolower($ontvangtIaoz), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ONTVANGT_IAOZ, $ontvangtIaoz, $comparison);
    }

    /**
     * Filter the query on the ontvangt_iaow column
     *
     * Example usage:
     * <code>
     * $query->filterByOntvangtIaow(true); // WHERE ontvangt_iaow = true
     * $query->filterByOntvangtIaow('yes'); // WHERE ontvangt_iaow = true
     * </code>
     *
     * @param     boolean|string $ontvangtIaow The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByOntvangtIaow($ontvangtIaow = null, $comparison = null)
    {
        if (is_string($ontvangtIaow)) {
            $ontvangtIaow = in_array(strtolower($ontvangtIaow), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ONTVANGT_IAOW, $ontvangtIaow, $comparison);
    }

    /**
     * Filter the query on the ontvangt_iow column
     *
     * Example usage:
     * <code>
     * $query->filterByOntvangtIow(true); // WHERE ontvangt_iow = true
     * $query->filterByOntvangtIow('yes'); // WHERE ontvangt_iow = true
     * </code>
     *
     * @param     boolean|string $ontvangtIow The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByOntvangtIow($ontvangtIow = null, $comparison = null)
    {
        if (is_string($ontvangtIow)) {
            $ontvangtIow = in_array(strtolower($ontvangtIow), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ONTVANGT_IOW, $ontvangtIow, $comparison);
    }

    /**
     * Filter the query on the start_ww column
     *
     * Example usage:
     * <code>
     * $query->filterByStartWw('2011-03-14'); // WHERE start_ww = '2011-03-14'
     * $query->filterByStartWw('now'); // WHERE start_ww = '2011-03-14'
     * $query->filterByStartWw(array('max' => 'yesterday')); // WHERE start_ww > '2011-03-13'
     * </code>
     *
     * @param     mixed $startWw The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByStartWw($startWw = null, $comparison = null)
    {
        if (is_array($startWw)) {
            $useMinMax = false;
            if (isset($startWw['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_START_WW, $startWw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startWw['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_START_WW, $startWw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_START_WW, $startWw, $comparison);
    }

    /**
     * Filter the query on the bezwaar_of_beroep_uitkeringsinstantie column
     *
     * Example usage:
     * <code>
     * $query->filterByBezwaarOfBeroepUitkeringsinstantie(true); // WHERE bezwaar_of_beroep_uitkeringsinstantie = true
     * $query->filterByBezwaarOfBeroepUitkeringsinstantie('yes'); // WHERE bezwaar_of_beroep_uitkeringsinstantie = true
     * </code>
     *
     * @param     boolean|string $bezwaarOfBeroepUitkeringsinstantie The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByBezwaarOfBeroepUitkeringsinstantie($bezwaarOfBeroepUitkeringsinstantie = null, $comparison = null)
    {
        if (is_string($bezwaarOfBeroepUitkeringsinstantie)) {
            $bezwaarOfBeroepUitkeringsinstantie = in_array(strtolower($bezwaarOfBeroepUitkeringsinstantie), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_BEZWAAR_OF_BEROEP_UITKERINGSINSTANTIE, $bezwaarOfBeroepUitkeringsinstantie, $comparison);
    }

    /**
     * Filter the query on the burgerlijke_staat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBurgerlijkeStaatId(1234); // WHERE burgerlijke_staat_id = 1234
     * $query->filterByBurgerlijkeStaatId(array(12, 34)); // WHERE burgerlijke_staat_id IN (12, 34)
     * $query->filterByBurgerlijkeStaatId(array('min' => 12)); // WHERE burgerlijke_staat_id > 12
     * </code>
     *
     * @param     mixed $burgerlijkeStaatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByBurgerlijkeStaatId($burgerlijkeStaatId = null, $comparison = null)
    {
        if (is_array($burgerlijkeStaatId)) {
            $useMinMax = false;
            if (isset($burgerlijkeStaatId['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_BURGERLIJKE_STAAT_ID, $burgerlijkeStaatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($burgerlijkeStaatId['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_BURGERLIJKE_STAAT_ID, $burgerlijkeStaatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_BURGERLIJKE_STAAT_ID, $burgerlijkeStaatId, $comparison);
    }

    /**
     * Filter the query on the samenwonend column
     *
     * Example usage:
     * <code>
     * $query->filterBySamenwonend(true); // WHERE samenwonend = true
     * $query->filterBySamenwonend('yes'); // WHERE samenwonend = true
     * </code>
     *
     * @param     boolean|string $samenwonend The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterBySamenwonend($samenwonend = null, $comparison = null)
    {
        if (is_string($samenwonend)) {
            $samenwonend = in_array(strtolower($samenwonend), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_SAMENWONEND, $samenwonend, $comparison);
    }

    /**
     * Filter the query on the partner_remigratie column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerRemigratie(true); // WHERE partner_remigratie = true
     * $query->filterByPartnerRemigratie('yes'); // WHERE partner_remigratie = true
     * </code>
     *
     * @param     boolean|string $partnerRemigratie The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerRemigratie($partnerRemigratie = null, $comparison = null)
    {
        if (is_string($partnerRemigratie)) {
            $partnerRemigratie = in_array(strtolower($partnerRemigratie), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_REMIGRATIE, $partnerRemigratie, $comparison);
    }

    /**
     * Filter the query on the partner_ww_start column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerWwStart('2011-03-14'); // WHERE partner_ww_start = '2011-03-14'
     * $query->filterByPartnerWwStart('now'); // WHERE partner_ww_start = '2011-03-14'
     * $query->filterByPartnerWwStart(array('max' => 'yesterday')); // WHERE partner_ww_start > '2011-03-13'
     * </code>
     *
     * @param     mixed $partnerWwStart The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerWwStart($partnerWwStart = null, $comparison = null)
    {
        if (is_array($partnerWwStart)) {
            $useMinMax = false;
            if (isset($partnerWwStart['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_WW_START, $partnerWwStart['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($partnerWwStart['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_WW_START, $partnerWwStart['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_WW_START, $partnerWwStart, $comparison);
    }

    /**
     * Filter the query on the schulden_bij_cjib column
     *
     * Example usage:
     * <code>
     * $query->filterBySchuldenBijCjib(true); // WHERE schulden_bij_cjib = true
     * $query->filterBySchuldenBijCjib('yes'); // WHERE schulden_bij_cjib = true
     * </code>
     *
     * @param     boolean|string $schuldenBijCjib The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterBySchuldenBijCjib($schuldenBijCjib = null, $comparison = null)
    {
        if (is_string($schuldenBijCjib)) {
            $schuldenBijCjib = in_array(strtolower($schuldenBijCjib), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_SCHULDEN_BIJ_CJIB, $schuldenBijCjib, $comparison);
    }

    /**
     * Filter the query on the schulden_bij_belastingdienst column
     *
     * Example usage:
     * <code>
     * $query->filterBySchuldenBijBelastingdienst(true); // WHERE schulden_bij_belastingdienst = true
     * $query->filterBySchuldenBijBelastingdienst('yes'); // WHERE schulden_bij_belastingdienst = true
     * </code>
     *
     * @param     boolean|string $schuldenBijBelastingdienst The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterBySchuldenBijBelastingdienst($schuldenBijBelastingdienst = null, $comparison = null)
    {
        if (is_string($schuldenBijBelastingdienst)) {
            $schuldenBijBelastingdienst = in_array(strtolower($schuldenBijBelastingdienst), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_SCHULDEN_BIJ_BELASTINGDIENST, $schuldenBijBelastingdienst, $comparison);
    }

    /**
     * Filter the query on the partner_schulden_bij_cjib column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerSchuldenBijCjib(true); // WHERE partner_schulden_bij_cjib = true
     * $query->filterByPartnerSchuldenBijCjib('yes'); // WHERE partner_schulden_bij_cjib = true
     * </code>
     *
     * @param     boolean|string $partnerSchuldenBijCjib The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerSchuldenBijCjib($partnerSchuldenBijCjib = null, $comparison = null)
    {
        if (is_string($partnerSchuldenBijCjib)) {
            $partnerSchuldenBijCjib = in_array(strtolower($partnerSchuldenBijCjib), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_CJIB, $partnerSchuldenBijCjib, $comparison);
    }

    /**
     * Filter the query on the partner_schulden_bij_belastingdienst column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerSchuldenBijBelastingdienst(true); // WHERE partner_schulden_bij_belastingdienst = true
     * $query->filterByPartnerSchuldenBijBelastingdienst('yes'); // WHERE partner_schulden_bij_belastingdienst = true
     * </code>
     *
     * @param     boolean|string $partnerSchuldenBijBelastingdienst The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerSchuldenBijBelastingdienst($partnerSchuldenBijBelastingdienst = null, $comparison = null)
    {
        if (is_string($partnerSchuldenBijBelastingdienst)) {
            $partnerSchuldenBijBelastingdienst = in_array(strtolower($partnerSchuldenBijBelastingdienst), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_BELASTINGDIENST, $partnerSchuldenBijBelastingdienst, $comparison);
    }

    /**
     * Filter the query on the voorlopige_hechtenis column
     *
     * Example usage:
     * <code>
     * $query->filterByVoorlopigeHechtenis(true); // WHERE voorlopige_hechtenis = true
     * $query->filterByVoorlopigeHechtenis('yes'); // WHERE voorlopige_hechtenis = true
     * </code>
     *
     * @param     boolean|string $voorlopigeHechtenis The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByVoorlopigeHechtenis($voorlopigeHechtenis = null, $comparison = null)
    {
        if (is_string($voorlopigeHechtenis)) {
            $voorlopigeHechtenis = in_array(strtolower($voorlopigeHechtenis), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_VOORLOPIGE_HECHTENIS, $voorlopigeHechtenis, $comparison);
    }

    /**
     * Filter the query on the partner_voorlopige_hechtenis column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerVoorlopigeHechtenis(true); // WHERE partner_voorlopige_hechtenis = true
     * $query->filterByPartnerVoorlopigeHechtenis('yes'); // WHERE partner_voorlopige_hechtenis = true
     * </code>
     *
     * @param     boolean|string $partnerVoorlopigeHechtenis The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerVoorlopigeHechtenis($partnerVoorlopigeHechtenis = null, $comparison = null)
    {
        if (is_string($partnerVoorlopigeHechtenis)) {
            $partnerVoorlopigeHechtenis = in_array(strtolower($partnerVoorlopigeHechtenis), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_VOORLOPIGE_HECHTENIS, $partnerVoorlopigeHechtenis, $comparison);
    }

    /**
     * Filter the query on the bsn column
     *
     * Example usage:
     * <code>
     * $query->filterByBsn('fooValue');   // WHERE bsn = 'fooValue'
     * $query->filterByBsn('%fooValue%', Criteria::LIKE); // WHERE bsn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bsn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByBsn($bsn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bsn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_BSN, $bsn, $comparison);
    }

    /**
     * Filter the query on the partner_bsn column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerBsn('fooValue');   // WHERE partner_bsn = 'fooValue'
     * $query->filterByPartnerBsn('%fooValue%', Criteria::LIKE); // WHERE partner_bsn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $partnerBsn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerBsn($partnerBsn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($partnerBsn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_BSN, $partnerBsn, $comparison);
    }

    /**
     * Filter the query on the voornaam column
     *
     * Example usage:
     * <code>
     * $query->filterByVoornaam('fooValue');   // WHERE voornaam = 'fooValue'
     * $query->filterByVoornaam('%fooValue%', Criteria::LIKE); // WHERE voornaam LIKE '%fooValue%'
     * </code>
     *
     * @param     string $voornaam The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByVoornaam($voornaam = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($voornaam)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_VOORNAAM, $voornaam, $comparison);
    }

    /**
     * Filter the query on the achternaam column
     *
     * Example usage:
     * <code>
     * $query->filterByAchternaam('fooValue');   // WHERE achternaam = 'fooValue'
     * $query->filterByAchternaam('%fooValue%', Criteria::LIKE); // WHERE achternaam LIKE '%fooValue%'
     * </code>
     *
     * @param     string $achternaam The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByAchternaam($achternaam = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($achternaam)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_ACHTERNAAM, $achternaam, $comparison);
    }

    /**
     * Filter the query on the partner_voornaam column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerVoornaam('fooValue');   // WHERE partner_voornaam = 'fooValue'
     * $query->filterByPartnerVoornaam('%fooValue%', Criteria::LIKE); // WHERE partner_voornaam LIKE '%fooValue%'
     * </code>
     *
     * @param     string $partnerVoornaam The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerVoornaam($partnerVoornaam = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($partnerVoornaam)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_VOORNAAM, $partnerVoornaam, $comparison);
    }

    /**
     * Filter the query on the partner_achternaam column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerAchternaam('fooValue');   // WHERE partner_achternaam = 'fooValue'
     * $query->filterByPartnerAchternaam('%fooValue%', Criteria::LIKE); // WHERE partner_achternaam LIKE '%fooValue%'
     * </code>
     *
     * @param     string $partnerAchternaam The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerAchternaam($partnerAchternaam = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($partnerAchternaam)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ACHTERNAAM, $partnerAchternaam, $comparison);
    }

    /**
     * Filter the query on the partner_geboorte_datum column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerGeboorteDatum('2011-03-14'); // WHERE partner_geboorte_datum = '2011-03-14'
     * $query->filterByPartnerGeboorteDatum('now'); // WHERE partner_geboorte_datum = '2011-03-14'
     * $query->filterByPartnerGeboorteDatum(array('max' => 'yesterday')); // WHERE partner_geboorte_datum > '2011-03-13'
     * </code>
     *
     * @param     mixed $partnerGeboorteDatum The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerGeboorteDatum($partnerGeboorteDatum = null, $comparison = null)
    {
        if (is_array($partnerGeboorteDatum)) {
            $useMinMax = false;
            if (isset($partnerGeboorteDatum['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_GEBOORTE_DATUM, $partnerGeboorteDatum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($partnerGeboorteDatum['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_GEBOORTE_DATUM, $partnerGeboorteDatum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_GEBOORTE_DATUM, $partnerGeboorteDatum, $comparison);
    }

    /**
     * Filter the query on the partner_zelfde_adres column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerZelfdeAdres(true); // WHERE partner_zelfde_adres = true
     * $query->filterByPartnerZelfdeAdres('yes'); // WHERE partner_zelfde_adres = true
     * </code>
     *
     * @param     boolean|string $partnerZelfdeAdres The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerZelfdeAdres($partnerZelfdeAdres = null, $comparison = null)
    {
        if (is_string($partnerZelfdeAdres)) {
            $partnerZelfdeAdres = in_array(strtolower($partnerZelfdeAdres), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ZELFDE_ADRES, $partnerZelfdeAdres, $comparison);
    }

    /**
     * Filter the query on the provincie_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProvincieId(1234); // WHERE provincie_id = 1234
     * $query->filterByProvincieId(array(12, 34)); // WHERE provincie_id IN (12, 34)
     * $query->filterByProvincieId(array('min' => 12)); // WHERE provincie_id > 12
     * </code>
     *
     * @param     mixed $provincieId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByProvincieId($provincieId = null, $comparison = null)
    {
        if (is_array($provincieId)) {
            $useMinMax = false;
            if (isset($provincieId['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PROVINCIE_ID, $provincieId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provincieId['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PROVINCIE_ID, $provincieId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PROVINCIE_ID, $provincieId, $comparison);
    }

    /**
     * Filter the query on the gemeente_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGemeenteId(1234); // WHERE gemeente_id = 1234
     * $query->filterByGemeenteId(array(12, 34)); // WHERE gemeente_id IN (12, 34)
     * $query->filterByGemeenteId(array('min' => 12)); // WHERE gemeente_id > 12
     * </code>
     *
     * @param     mixed $gemeenteId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByGemeenteId($gemeenteId = null, $comparison = null)
    {
        if (is_array($gemeenteId)) {
            $useMinMax = false;
            if (isset($gemeenteId['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_GEMEENTE_ID, $gemeenteId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gemeenteId['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_GEMEENTE_ID, $gemeenteId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_GEMEENTE_ID, $gemeenteId, $comparison);
    }

    /**
     * Filter the query on the straat column
     *
     * Example usage:
     * <code>
     * $query->filterByStraat('fooValue');   // WHERE straat = 'fooValue'
     * $query->filterByStraat('%fooValue%', Criteria::LIKE); // WHERE straat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $straat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByStraat($straat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($straat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_STRAAT, $straat, $comparison);
    }

    /**
     * Filter the query on the huisnummer column
     *
     * Example usage:
     * <code>
     * $query->filterByHuisnummer('fooValue');   // WHERE huisnummer = 'fooValue'
     * $query->filterByHuisnummer('%fooValue%', Criteria::LIKE); // WHERE huisnummer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $huisnummer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByHuisnummer($huisnummer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($huisnummer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_HUISNUMMER, $huisnummer, $comparison);
    }

    /**
     * Filter the query on the postcode column
     *
     * Example usage:
     * <code>
     * $query->filterByPostcode('fooValue');   // WHERE postcode = 'fooValue'
     * $query->filterByPostcode('%fooValue%', Criteria::LIKE); // WHERE postcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $postcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPostcode($postcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($postcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_POSTCODE, $postcode, $comparison);
    }

    /**
     * Filter the query on the partner_provincie_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerProvincieId(1234); // WHERE partner_provincie_id = 1234
     * $query->filterByPartnerProvincieId(array(12, 34)); // WHERE partner_provincie_id IN (12, 34)
     * $query->filterByPartnerProvincieId(array('min' => 12)); // WHERE partner_provincie_id > 12
     * </code>
     *
     * @param     mixed $partnerProvincieId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerProvincieId($partnerProvincieId = null, $comparison = null)
    {
        if (is_array($partnerProvincieId)) {
            $useMinMax = false;
            if (isset($partnerProvincieId['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_PROVINCIE_ID, $partnerProvincieId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($partnerProvincieId['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_PROVINCIE_ID, $partnerProvincieId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_PROVINCIE_ID, $partnerProvincieId, $comparison);
    }

    /**
     * Filter the query on the partner_gemeente_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerGemeenteId(1234); // WHERE partner_gemeente_id = 1234
     * $query->filterByPartnerGemeenteId(array(12, 34)); // WHERE partner_gemeente_id IN (12, 34)
     * $query->filterByPartnerGemeenteId(array('min' => 12)); // WHERE partner_gemeente_id > 12
     * </code>
     *
     * @param     mixed $partnerGemeenteId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerGemeenteId($partnerGemeenteId = null, $comparison = null)
    {
        if (is_array($partnerGemeenteId)) {
            $useMinMax = false;
            if (isset($partnerGemeenteId['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_GEMEENTE_ID, $partnerGemeenteId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($partnerGemeenteId['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_GEMEENTE_ID, $partnerGemeenteId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_GEMEENTE_ID, $partnerGemeenteId, $comparison);
    }

    /**
     * Filter the query on the partner_straat column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerStraat('fooValue');   // WHERE partner_straat = 'fooValue'
     * $query->filterByPartnerStraat('%fooValue%', Criteria::LIKE); // WHERE partner_straat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $partnerStraat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerStraat($partnerStraat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($partnerStraat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_STRAAT, $partnerStraat, $comparison);
    }

    /**
     * Filter the query on the partner_huisnummer column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerHuisnummer('fooValue');   // WHERE partner_huisnummer = 'fooValue'
     * $query->filterByPartnerHuisnummer('%fooValue%', Criteria::LIKE); // WHERE partner_huisnummer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $partnerHuisnummer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerHuisnummer($partnerHuisnummer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($partnerHuisnummer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_HUISNUMMER, $partnerHuisnummer, $comparison);
    }

    /**
     * Filter the query on the partner_postcode column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerPostcode('fooValue');   // WHERE partner_postcode = 'fooValue'
     * $query->filterByPartnerPostcode('%fooValue%', Criteria::LIKE); // WHERE partner_postcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $partnerPostcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerPostcode($partnerPostcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($partnerPostcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_POSTCODE, $partnerPostcode, $comparison);
    }

    /**
     * Filter the query on the partner_ontvangt_ww column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerOntvangtWw(true); // WHERE partner_ontvangt_ww = true
     * $query->filterByPartnerOntvangtWw('yes'); // WHERE partner_ontvangt_ww = true
     * </code>
     *
     * @param     boolean|string $partnerOntvangtWw The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerOntvangtWw($partnerOntvangtWw = null, $comparison = null)
    {
        if (is_string($partnerOntvangtWw)) {
            $partnerOntvangtWw = in_array(strtolower($partnerOntvangtWw), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WW, $partnerOntvangtWw, $comparison);
    }

    /**
     * Filter the query on the partner_ontvangt_bijstand column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerOntvangtBijstand(true); // WHERE partner_ontvangt_bijstand = true
     * $query->filterByPartnerOntvangtBijstand('yes'); // WHERE partner_ontvangt_bijstand = true
     * </code>
     *
     * @param     boolean|string $partnerOntvangtBijstand The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerOntvangtBijstand($partnerOntvangtBijstand = null, $comparison = null)
    {
        if (is_string($partnerOntvangtBijstand)) {
            $partnerOntvangtBijstand = in_array(strtolower($partnerOntvangtBijstand), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_BIJSTAND, $partnerOntvangtBijstand, $comparison);
    }

    /**
     * Filter the query on the partner_ontvangt_wao column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerOntvangtWao(true); // WHERE partner_ontvangt_wao = true
     * $query->filterByPartnerOntvangtWao('yes'); // WHERE partner_ontvangt_wao = true
     * </code>
     *
     * @param     boolean|string $partnerOntvangtWao The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerOntvangtWao($partnerOntvangtWao = null, $comparison = null)
    {
        if (is_string($partnerOntvangtWao)) {
            $partnerOntvangtWao = in_array(strtolower($partnerOntvangtWao), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAO, $partnerOntvangtWao, $comparison);
    }

    /**
     * Filter the query on the partner_ontvangt_wia column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerOntvangtWia(true); // WHERE partner_ontvangt_wia = true
     * $query->filterByPartnerOntvangtWia('yes'); // WHERE partner_ontvangt_wia = true
     * </code>
     *
     * @param     boolean|string $partnerOntvangtWia The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerOntvangtWia($partnerOntvangtWia = null, $comparison = null)
    {
        if (is_string($partnerOntvangtWia)) {
            $partnerOntvangtWia = in_array(strtolower($partnerOntvangtWia), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WIA, $partnerOntvangtWia, $comparison);
    }

    /**
     * Filter the query on the partner_ontvangt_aow column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerOntvangtAow(true); // WHERE partner_ontvangt_aow = true
     * $query->filterByPartnerOntvangtAow('yes'); // WHERE partner_ontvangt_aow = true
     * </code>
     *
     * @param     boolean|string $partnerOntvangtAow The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerOntvangtAow($partnerOntvangtAow = null, $comparison = null)
    {
        if (is_string($partnerOntvangtAow)) {
            $partnerOntvangtAow = in_array(strtolower($partnerOntvangtAow), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_AOW, $partnerOntvangtAow, $comparison);
    }

    /**
     * Filter the query on the partner_ontvangt_wamil column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerOntvangtWamil(true); // WHERE partner_ontvangt_wamil = true
     * $query->filterByPartnerOntvangtWamil('yes'); // WHERE partner_ontvangt_wamil = true
     * </code>
     *
     * @param     boolean|string $partnerOntvangtWamil The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerOntvangtWamil($partnerOntvangtWamil = null, $comparison = null)
    {
        if (is_string($partnerOntvangtWamil)) {
            $partnerOntvangtWamil = in_array(strtolower($partnerOntvangtWamil), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAMIL, $partnerOntvangtWamil, $comparison);
    }

    /**
     * Filter the query on the partner_ontvangt_iaoz column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerOntvangtIaoz(true); // WHERE partner_ontvangt_iaoz = true
     * $query->filterByPartnerOntvangtIaoz('yes'); // WHERE partner_ontvangt_iaoz = true
     * </code>
     *
     * @param     boolean|string $partnerOntvangtIaoz The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerOntvangtIaoz($partnerOntvangtIaoz = null, $comparison = null)
    {
        if (is_string($partnerOntvangtIaoz)) {
            $partnerOntvangtIaoz = in_array(strtolower($partnerOntvangtIaoz), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOZ, $partnerOntvangtIaoz, $comparison);
    }

    /**
     * Filter the query on the partner_ontvangt_iaow column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerOntvangtIaow(true); // WHERE partner_ontvangt_iaow = true
     * $query->filterByPartnerOntvangtIaow('yes'); // WHERE partner_ontvangt_iaow = true
     * </code>
     *
     * @param     boolean|string $partnerOntvangtIaow The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerOntvangtIaow($partnerOntvangtIaow = null, $comparison = null)
    {
        if (is_string($partnerOntvangtIaow)) {
            $partnerOntvangtIaow = in_array(strtolower($partnerOntvangtIaow), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOW, $partnerOntvangtIaow, $comparison);
    }

    /**
     * Filter the query on the partner_ontvangt_iow column
     *
     * Example usage:
     * <code>
     * $query->filterByPartnerOntvangtIow(true); // WHERE partner_ontvangt_iow = true
     * $query->filterByPartnerOntvangtIow('yes'); // WHERE partner_ontvangt_iow = true
     * </code>
     *
     * @param     boolean|string $partnerOntvangtIow The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerOntvangtIow($partnerOntvangtIow = null, $comparison = null)
    {
        if (is_string($partnerOntvangtIow)) {
            $partnerOntvangtIow = in_array(strtolower($partnerOntvangtIow), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IOW, $partnerOntvangtIow, $comparison);
    }

    /**
     * Filter the query on the heeft_kinderen_jonger_dan_18 column
     *
     * Example usage:
     * <code>
     * $query->filterByHeeftKinderenJongerDan18(true); // WHERE heeft_kinderen_jonger_dan_18 = true
     * $query->filterByHeeftKinderenJongerDan18('yes'); // WHERE heeft_kinderen_jonger_dan_18 = true
     * </code>
     *
     * @param     boolean|string $heeftKinderenJongerDan18 The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByHeeftKinderenJongerDan18($heeftKinderenJongerDan18 = null, $comparison = null)
    {
        if (is_string($heeftKinderenJongerDan18)) {
            $heeftKinderenJongerDan18 = in_array(strtolower($heeftKinderenJongerDan18), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_HEEFT_KINDEREN_JONGER_DAN_18, $heeftKinderenJongerDan18, $comparison);
    }

    /**
     * Filter the query on the aantal_kinderen_jonger_dan_18 column
     *
     * Example usage:
     * <code>
     * $query->filterByAantalKinderenJongerDan18(1234); // WHERE aantal_kinderen_jonger_dan_18 = 1234
     * $query->filterByAantalKinderenJongerDan18(array(12, 34)); // WHERE aantal_kinderen_jonger_dan_18 IN (12, 34)
     * $query->filterByAantalKinderenJongerDan18(array('min' => 12)); // WHERE aantal_kinderen_jonger_dan_18 > 12
     * </code>
     *
     * @param     mixed $aantalKinderenJongerDan18 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByAantalKinderenJongerDan18($aantalKinderenJongerDan18 = null, $comparison = null)
    {
        if (is_array($aantalKinderenJongerDan18)) {
            $useMinMax = false;
            if (isset($aantalKinderenJongerDan18['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_AANTAL_KINDEREN_JONGER_DAN_18, $aantalKinderenJongerDan18['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aantalKinderenJongerDan18['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_AANTAL_KINDEREN_JONGER_DAN_18, $aantalKinderenJongerDan18['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_AANTAL_KINDEREN_JONGER_DAN_18, $aantalKinderenJongerDan18, $comparison);
    }

    /**
     * Filter the query on the kinderen_zelfde_adres column
     *
     * Example usage:
     * <code>
     * $query->filterByKinderenZelfdeAdres(true); // WHERE kinderen_zelfde_adres = true
     * $query->filterByKinderenZelfdeAdres('yes'); // WHERE kinderen_zelfde_adres = true
     * </code>
     *
     * @param     boolean|string $kinderenZelfdeAdres The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByKinderenZelfdeAdres($kinderenZelfdeAdres = null, $comparison = null)
    {
        if (is_string($kinderenZelfdeAdres)) {
            $kinderenZelfdeAdres = in_array(strtolower($kinderenZelfdeAdres), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_KINDEREN_ZELFDE_ADRES, $kinderenZelfdeAdres, $comparison);
    }

    /**
     * Filter the query on the toekomstig_adres column
     *
     * Example usage:
     * <code>
     * $query->filterByToekomstigAdres('fooValue');   // WHERE toekomstig_adres = 'fooValue'
     * $query->filterByToekomstigAdres('%fooValue%', Criteria::LIKE); // WHERE toekomstig_adres LIKE '%fooValue%'
     * </code>
     *
     * @param     string $toekomstigAdres The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByToekomstigAdres($toekomstigAdres = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($toekomstigAdres)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_TOEKOMSTIG_ADRES, $toekomstigAdres, $comparison);
    }

    /**
     * Filter the query on the post_ontvangen_toekomstig_adres column
     *
     * Example usage:
     * <code>
     * $query->filterByPostOntvangenToekomstigAdres(true); // WHERE post_ontvangen_toekomstig_adres = true
     * $query->filterByPostOntvangenToekomstigAdres('yes'); // WHERE post_ontvangen_toekomstig_adres = true
     * </code>
     *
     * @param     boolean|string $postOntvangenToekomstigAdres The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPostOntvangenToekomstigAdres($postOntvangenToekomstigAdres = null, $comparison = null)
    {
        if (is_string($postOntvangenToekomstigAdres)) {
            $postOntvangenToekomstigAdres = in_array(strtolower($postOntvangenToekomstigAdres), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_POST_ONTVANGEN_TOEKOMSTIG_ADRES, $postOntvangenToekomstigAdres, $comparison);
    }

    /**
     * Filter the query on the heeft_bankrekening_emigratieland column
     *
     * Example usage:
     * <code>
     * $query->filterByHeeftBankrekeningEmigratieland(true); // WHERE heeft_bankrekening_emigratieland = true
     * $query->filterByHeeftBankrekeningEmigratieland('yes'); // WHERE heeft_bankrekening_emigratieland = true
     * </code>
     *
     * @param     boolean|string $heeftBankrekeningEmigratieland The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByHeeftBankrekeningEmigratieland($heeftBankrekeningEmigratieland = null, $comparison = null)
    {
        if (is_string($heeftBankrekeningEmigratieland)) {
            $heeftBankrekeningEmigratieland = in_array(strtolower($heeftBankrekeningEmigratieland), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_HEEFT_BANKREKENING_EMIGRATIELAND, $heeftBankrekeningEmigratieland, $comparison);
    }

    /**
     * Filter the query on the gegevens_naar_waarheid_ingevuld column
     *
     * Example usage:
     * <code>
     * $query->filterByGegevensNaarWaarheidIngevuld(true); // WHERE gegevens_naar_waarheid_ingevuld = true
     * $query->filterByGegevensNaarWaarheidIngevuld('yes'); // WHERE gegevens_naar_waarheid_ingevuld = true
     * </code>
     *
     * @param     boolean|string $gegevensNaarWaarheidIngevuld The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByGegevensNaarWaarheidIngevuld($gegevensNaarWaarheidIngevuld = null, $comparison = null)
    {
        if (is_string($gegevensNaarWaarheidIngevuld)) {
            $gegevensNaarWaarheidIngevuld = in_array(strtolower($gegevensNaarWaarheidIngevuld), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_GEGEVENS_NAAR_WAARHEID_INGEVULD, $gegevensNaarWaarheidIngevuld, $comparison);
    }

    /**
     * Filter the query on the bedrag column
     *
     * Example usage:
     * <code>
     * $query->filterByBedrag(1234); // WHERE bedrag = 1234
     * $query->filterByBedrag(array(12, 34)); // WHERE bedrag IN (12, 34)
     * $query->filterByBedrag(array('min' => 12)); // WHERE bedrag > 12
     * </code>
     *
     * @param     mixed $bedrag The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByBedrag($bedrag = null, $comparison = null)
    {
        if (is_array($bedrag)) {
            $useMinMax = false;
            if (isset($bedrag['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_BEDRAG, $bedrag['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bedrag['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_BEDRAG, $bedrag['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_BEDRAG, $bedrag, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(RemAanvraagTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RemAanvraagTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Persoon object
     *
     * @param \Model\Custom\NovumSvb\Persoon|ObjectCollection $persoon The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function filterByPersoon($persoon, $comparison = null)
    {
        if ($persoon instanceof \Model\Custom\NovumSvb\Persoon) {
            return $this
                ->addUsingAlias(RemAanvraagTableMap::COL_PERSOON_ID, $persoon->getId(), $comparison);
        } elseif ($persoon instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RemAanvraagTableMap::COL_PERSOON_ID, $persoon->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersoon() only accepts arguments of type \Model\Custom\NovumSvb\Persoon or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Persoon relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function joinPersoon($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Persoon');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Persoon');
        }

        return $this;
    }

    /**
     * Use the Persoon relation Persoon object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\PersoonQuery A secondary query class using the current class as primary query
     */
    public function usePersoonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersoon($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Persoon', '\Model\Custom\NovumSvb\PersoonQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRemAanvraag $remAanvraag Object to remove from the list of results
     *
     * @return $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function prune($remAanvraag = null)
    {
        if ($remAanvraag) {
            $this->addUsingAlias(RemAanvraagTableMap::COL_ID, $remAanvraag->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the rem_aanvraag table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RemAanvraagTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RemAanvraagTableMap::clearInstancePool();
            RemAanvraagTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RemAanvraagTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RemAanvraagTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RemAanvraagTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RemAanvraagTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(RemAanvraagTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(RemAanvraagTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(RemAanvraagTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(RemAanvraagTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(RemAanvraagTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildRemAanvraagQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(RemAanvraagTableMap::COL_CREATED_AT);
    }

} // RemAanvraagQuery
