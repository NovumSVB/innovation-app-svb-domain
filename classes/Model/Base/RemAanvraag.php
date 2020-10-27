<?php

namespace Model\Custom\NovumSvb\Base;

use \DateTime;
use \Exception;
use \PDO;
use Model\Custom\NovumSvb\Persoon as ChildPersoon;
use Model\Custom\NovumSvb\PersoonQuery as ChildPersoonQuery;
use Model\Custom\NovumSvb\RemAanvraag as ChildRemAanvraag;
use Model\Custom\NovumSvb\RemAanvraagQuery as ChildRemAanvraagQuery;
use Model\Custom\NovumSvb\Map\RemAanvraagTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'rem_aanvraag' table.
 *
 *
 *
 * @package    propel.generator.Model.Custom.NovumSvb.Base
 */
abstract class RemAanvraag implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Model\\Custom\\NovumSvb\\Map\\RemAanvraagTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the persoon_id field.
     *
     * @var        int
     */
    protected $persoon_id;

    /**
     * The value for the geboorte_datum field.
     *
     * @var        DateTime
     */
    protected $geboorte_datum;

    /**
     * The value for the geboorte_land field.
     *
     * @var        string
     */
    protected $geboorte_land;

    /**
     * The value for the immigratie_datum field.
     *
     * @var        DateTime
     */
    protected $immigratie_datum;

    /**
     * The value for the heeft_nl_paspoort field.
     *
     * @var        boolean
     */
    protected $heeft_nl_paspoort;

    /**
     * The value for the emigratie_land field.
     *
     * @var        string
     */
    protected $emigratie_land;

    /**
     * The value for the emigratie_verblijfsvergunning field.
     *
     * @var        boolean
     */
    protected $emigratie_verblijfsvergunning;

    /**
     * The value for the partner_emigratie_verblijfsvergunning field.
     *
     * @var        boolean
     */
    protected $partner_emigratie_verblijfsvergunning;

    /**
     * The value for the ontvangt_ww field.
     *
     * @var        boolean
     */
    protected $ontvangt_ww;

    /**
     * The value for the ontvangt_bijstand field.
     *
     * @var        boolean
     */
    protected $ontvangt_bijstand;

    /**
     * The value for the ontvangt_wao field.
     *
     * @var        boolean
     */
    protected $ontvangt_wao;

    /**
     * The value for the ontvangt_wia field.
     *
     * @var        boolean
     */
    protected $ontvangt_wia;

    /**
     * The value for the ontvangt_aow field.
     *
     * @var        boolean
     */
    protected $ontvangt_aow;

    /**
     * The value for the ontvangt_wamil field.
     *
     * @var        boolean
     */
    protected $ontvangt_wamil;

    /**
     * The value for the ontvangt_iaoz field.
     *
     * @var        boolean
     */
    protected $ontvangt_iaoz;

    /**
     * The value for the ontvangt_iaow field.
     *
     * @var        boolean
     */
    protected $ontvangt_iaow;

    /**
     * The value for the ontvangt_iow field.
     *
     * @var        boolean
     */
    protected $ontvangt_iow;

    /**
     * The value for the start_ww field.
     *
     * @var        DateTime
     */
    protected $start_ww;

    /**
     * The value for the bezwaar_of_beroep_uitkeringsinstantie field.
     *
     * @var        boolean
     */
    protected $bezwaar_of_beroep_uitkeringsinstantie;

    /**
     * The value for the burgerlijke_staat_id field.
     *
     * @var        int
     */
    protected $burgerlijke_staat_id;

    /**
     * The value for the samenwonend field.
     *
     * @var        boolean
     */
    protected $samenwonend;

    /**
     * The value for the partner_remigratie field.
     *
     * @var        boolean
     */
    protected $partner_remigratie;

    /**
     * The value for the partner_ww_start field.
     *
     * @var        DateTime
     */
    protected $partner_ww_start;

    /**
     * The value for the schulden_bij_cjib field.
     *
     * @var        boolean
     */
    protected $schulden_bij_cjib;

    /**
     * The value for the schulden_bij_belastingdienst field.
     *
     * @var        boolean
     */
    protected $schulden_bij_belastingdienst;

    /**
     * The value for the partner_schulden_bij_cjib field.
     *
     * @var        boolean
     */
    protected $partner_schulden_bij_cjib;

    /**
     * The value for the partner_schulden_bij_belastingdienst field.
     *
     * @var        boolean
     */
    protected $partner_schulden_bij_belastingdienst;

    /**
     * The value for the voorlopige_hechtenis field.
     *
     * @var        boolean
     */
    protected $voorlopige_hechtenis;

    /**
     * The value for the partner_voorlopige_hechtenis field.
     *
     * @var        boolean
     */
    protected $partner_voorlopige_hechtenis;

    /**
     * The value for the bsn field.
     *
     * @var        string
     */
    protected $bsn;

    /**
     * The value for the partner_bsn field.
     *
     * @var        string
     */
    protected $partner_bsn;

    /**
     * The value for the voornaam field.
     *
     * @var        string
     */
    protected $voornaam;

    /**
     * The value for the achternaam field.
     *
     * @var        string
     */
    protected $achternaam;

    /**
     * The value for the partner_voornaam field.
     *
     * @var        string
     */
    protected $partner_voornaam;

    /**
     * The value for the partner_achternaam field.
     *
     * @var        string
     */
    protected $partner_achternaam;

    /**
     * The value for the partner_geboorte_datum field.
     *
     * @var        DateTime
     */
    protected $partner_geboorte_datum;

    /**
     * The value for the partner_zelfde_adres field.
     *
     * @var        boolean
     */
    protected $partner_zelfde_adres;

    /**
     * The value for the provincie_id field.
     *
     * @var        int
     */
    protected $provincie_id;

    /**
     * The value for the gemeente_id field.
     *
     * @var        int
     */
    protected $gemeente_id;

    /**
     * The value for the straat field.
     *
     * @var        string
     */
    protected $straat;

    /**
     * The value for the huisnummer field.
     *
     * @var        string
     */
    protected $huisnummer;

    /**
     * The value for the postcode field.
     *
     * @var        string
     */
    protected $postcode;

    /**
     * The value for the partner_provincie_id field.
     *
     * @var        int
     */
    protected $partner_provincie_id;

    /**
     * The value for the partner_gemeente_id field.
     *
     * @var        int
     */
    protected $partner_gemeente_id;

    /**
     * The value for the partner_straat field.
     *
     * @var        string
     */
    protected $partner_straat;

    /**
     * The value for the partner_huisnummer field.
     *
     * @var        string
     */
    protected $partner_huisnummer;

    /**
     * The value for the partner_postcode field.
     *
     * @var        string
     */
    protected $partner_postcode;

    /**
     * The value for the partner_ontvangt_ww field.
     *
     * @var        boolean
     */
    protected $partner_ontvangt_ww;

    /**
     * The value for the partner_ontvangt_bijstand field.
     *
     * @var        boolean
     */
    protected $partner_ontvangt_bijstand;

    /**
     * The value for the partner_ontvangt_wao field.
     *
     * @var        boolean
     */
    protected $partner_ontvangt_wao;

    /**
     * The value for the partner_ontvangt_wia field.
     *
     * @var        boolean
     */
    protected $partner_ontvangt_wia;

    /**
     * The value for the partner_ontvangt_aow field.
     *
     * @var        boolean
     */
    protected $partner_ontvangt_aow;

    /**
     * The value for the partner_ontvangt_wamil field.
     *
     * @var        boolean
     */
    protected $partner_ontvangt_wamil;

    /**
     * The value for the partner_ontvangt_iaoz field.
     *
     * @var        boolean
     */
    protected $partner_ontvangt_iaoz;

    /**
     * The value for the partner_ontvangt_iaow field.
     *
     * @var        boolean
     */
    protected $partner_ontvangt_iaow;

    /**
     * The value for the partner_ontvangt_iow field.
     *
     * @var        boolean
     */
    protected $partner_ontvangt_iow;

    /**
     * The value for the heeft_kinderen_jonger_dan_18 field.
     *
     * @var        boolean
     */
    protected $heeft_kinderen_jonger_dan_18;

    /**
     * The value for the aantal_kinderen_jonger_dan_18 field.
     *
     * @var        int
     */
    protected $aantal_kinderen_jonger_dan_18;

    /**
     * The value for the kinderen_zelfde_adres field.
     *
     * @var        boolean
     */
    protected $kinderen_zelfde_adres;

    /**
     * The value for the toekomstig_adres field.
     *
     * @var        string
     */
    protected $toekomstig_adres;

    /**
     * The value for the post_ontvangen_toekomstig_adres field.
     *
     * @var        boolean
     */
    protected $post_ontvangen_toekomstig_adres;

    /**
     * The value for the heeft_bankrekening_emigratieland field.
     *
     * @var        boolean
     */
    protected $heeft_bankrekening_emigratieland;

    /**
     * The value for the gegevens_naar_waarheid_ingevuld field.
     *
     * @var        boolean
     */
    protected $gegevens_naar_waarheid_ingevuld;

    /**
     * The value for the bedrag field.
     *
     * @var        string
     */
    protected $bedrag;

    /**
     * The value for the created_at field.
     *
     * @var        DateTime
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     *
     * @var        DateTime
     */
    protected $updated_at;

    /**
     * @var        ChildPersoon
     */
    protected $aPersoon;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Model\Custom\NovumSvb\Base\RemAanvraag object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>RemAanvraag</code> instance.  If
     * <code>obj</code> is an instance of <code>RemAanvraag</code>, delegates to
     * <code>equals(RemAanvraag)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return void
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [persoon_id] column value.
     *
     * @return int
     */
    public function getPersoonId()
    {
        return $this->persoon_id;
    }

    /**
     * Get the [optionally formatted] temporal [geboorte_datum] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getGeboorteDatum($format = null)
    {
        if ($format === null) {
            return $this->geboorte_datum;
        } else {
            return $this->geboorte_datum instanceof \DateTimeInterface ? $this->geboorte_datum->format($format) : null;
        }
    }

    /**
     * Get the [geboorte_land] column value.
     *
     * @return string
     */
    public function getGeboorteLand()
    {
        return $this->geboorte_land;
    }

    /**
     * Get the [optionally formatted] temporal [immigratie_datum] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getImmigratieDatum($format = null)
    {
        if ($format === null) {
            return $this->immigratie_datum;
        } else {
            return $this->immigratie_datum instanceof \DateTimeInterface ? $this->immigratie_datum->format($format) : null;
        }
    }

    /**
     * Get the [heeft_nl_paspoort] column value.
     *
     * @return boolean
     */
    public function getHeeftNlPaspoort()
    {
        return $this->heeft_nl_paspoort;
    }

    /**
     * Get the [heeft_nl_paspoort] column value.
     *
     * @return boolean
     */
    public function isHeeftNlPaspoort()
    {
        return $this->getHeeftNlPaspoort();
    }

    /**
     * Get the [emigratie_land] column value.
     *
     * @return string
     */
    public function getEmigratieLand()
    {
        return $this->emigratie_land;
    }

    /**
     * Get the [emigratie_verblijfsvergunning] column value.
     *
     * @return boolean
     */
    public function getEmigratieVerblijfsvergunning()
    {
        return $this->emigratie_verblijfsvergunning;
    }

    /**
     * Get the [emigratie_verblijfsvergunning] column value.
     *
     * @return boolean
     */
    public function isEmigratieVerblijfsvergunning()
    {
        return $this->getEmigratieVerblijfsvergunning();
    }

    /**
     * Get the [partner_emigratie_verblijfsvergunning] column value.
     *
     * @return boolean
     */
    public function getPartnerEmigratieVerblijfsvergunning()
    {
        return $this->partner_emigratie_verblijfsvergunning;
    }

    /**
     * Get the [partner_emigratie_verblijfsvergunning] column value.
     *
     * @return boolean
     */
    public function isPartnerEmigratieVerblijfsvergunning()
    {
        return $this->getPartnerEmigratieVerblijfsvergunning();
    }

    /**
     * Get the [ontvangt_ww] column value.
     *
     * @return boolean
     */
    public function getOntvangtWw()
    {
        return $this->ontvangt_ww;
    }

    /**
     * Get the [ontvangt_ww] column value.
     *
     * @return boolean
     */
    public function isOntvangtWw()
    {
        return $this->getOntvangtWw();
    }

    /**
     * Get the [ontvangt_bijstand] column value.
     *
     * @return boolean
     */
    public function getOntvangtBijstand()
    {
        return $this->ontvangt_bijstand;
    }

    /**
     * Get the [ontvangt_bijstand] column value.
     *
     * @return boolean
     */
    public function isOntvangtBijstand()
    {
        return $this->getOntvangtBijstand();
    }

    /**
     * Get the [ontvangt_wao] column value.
     *
     * @return boolean
     */
    public function getOntvangtWao()
    {
        return $this->ontvangt_wao;
    }

    /**
     * Get the [ontvangt_wao] column value.
     *
     * @return boolean
     */
    public function isOntvangtWao()
    {
        return $this->getOntvangtWao();
    }

    /**
     * Get the [ontvangt_wia] column value.
     *
     * @return boolean
     */
    public function getOntvangtWia()
    {
        return $this->ontvangt_wia;
    }

    /**
     * Get the [ontvangt_wia] column value.
     *
     * @return boolean
     */
    public function isOntvangtWia()
    {
        return $this->getOntvangtWia();
    }

    /**
     * Get the [ontvangt_aow] column value.
     *
     * @return boolean
     */
    public function getOntvangtAow()
    {
        return $this->ontvangt_aow;
    }

    /**
     * Get the [ontvangt_aow] column value.
     *
     * @return boolean
     */
    public function isOntvangtAow()
    {
        return $this->getOntvangtAow();
    }

    /**
     * Get the [ontvangt_wamil] column value.
     *
     * @return boolean
     */
    public function getOntvangtWamil()
    {
        return $this->ontvangt_wamil;
    }

    /**
     * Get the [ontvangt_wamil] column value.
     *
     * @return boolean
     */
    public function isOntvangtWamil()
    {
        return $this->getOntvangtWamil();
    }

    /**
     * Get the [ontvangt_iaoz] column value.
     *
     * @return boolean
     */
    public function getOntvangtIaoz()
    {
        return $this->ontvangt_iaoz;
    }

    /**
     * Get the [ontvangt_iaoz] column value.
     *
     * @return boolean
     */
    public function isOntvangtIaoz()
    {
        return $this->getOntvangtIaoz();
    }

    /**
     * Get the [ontvangt_iaow] column value.
     *
     * @return boolean
     */
    public function getOntvangtIaow()
    {
        return $this->ontvangt_iaow;
    }

    /**
     * Get the [ontvangt_iaow] column value.
     *
     * @return boolean
     */
    public function isOntvangtIaow()
    {
        return $this->getOntvangtIaow();
    }

    /**
     * Get the [ontvangt_iow] column value.
     *
     * @return boolean
     */
    public function getOntvangtIow()
    {
        return $this->ontvangt_iow;
    }

    /**
     * Get the [ontvangt_iow] column value.
     *
     * @return boolean
     */
    public function isOntvangtIow()
    {
        return $this->getOntvangtIow();
    }

    /**
     * Get the [optionally formatted] temporal [start_ww] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getStartWw($format = null)
    {
        if ($format === null) {
            return $this->start_ww;
        } else {
            return $this->start_ww instanceof \DateTimeInterface ? $this->start_ww->format($format) : null;
        }
    }

    /**
     * Get the [bezwaar_of_beroep_uitkeringsinstantie] column value.
     *
     * @return boolean
     */
    public function getBezwaarOfBeroepUitkeringsinstantie()
    {
        return $this->bezwaar_of_beroep_uitkeringsinstantie;
    }

    /**
     * Get the [bezwaar_of_beroep_uitkeringsinstantie] column value.
     *
     * @return boolean
     */
    public function isBezwaarOfBeroepUitkeringsinstantie()
    {
        return $this->getBezwaarOfBeroepUitkeringsinstantie();
    }

    /**
     * Get the [burgerlijke_staat_id] column value.
     *
     * @return int
     */
    public function getBurgerlijkeStaatId()
    {
        return $this->burgerlijke_staat_id;
    }

    /**
     * Get the [samenwonend] column value.
     *
     * @return boolean
     */
    public function getSamenwonend()
    {
        return $this->samenwonend;
    }

    /**
     * Get the [samenwonend] column value.
     *
     * @return boolean
     */
    public function isSamenwonend()
    {
        return $this->getSamenwonend();
    }

    /**
     * Get the [partner_remigratie] column value.
     *
     * @return boolean
     */
    public function getPartnerRemigratie()
    {
        return $this->partner_remigratie;
    }

    /**
     * Get the [partner_remigratie] column value.
     *
     * @return boolean
     */
    public function isPartnerRemigratie()
    {
        return $this->getPartnerRemigratie();
    }

    /**
     * Get the [optionally formatted] temporal [partner_ww_start] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPartnerWwStart($format = null)
    {
        if ($format === null) {
            return $this->partner_ww_start;
        } else {
            return $this->partner_ww_start instanceof \DateTimeInterface ? $this->partner_ww_start->format($format) : null;
        }
    }

    /**
     * Get the [schulden_bij_cjib] column value.
     *
     * @return boolean
     */
    public function getSchuldenBijCjib()
    {
        return $this->schulden_bij_cjib;
    }

    /**
     * Get the [schulden_bij_cjib] column value.
     *
     * @return boolean
     */
    public function isSchuldenBijCjib()
    {
        return $this->getSchuldenBijCjib();
    }

    /**
     * Get the [schulden_bij_belastingdienst] column value.
     *
     * @return boolean
     */
    public function getSchuldenBijBelastingdienst()
    {
        return $this->schulden_bij_belastingdienst;
    }

    /**
     * Get the [schulden_bij_belastingdienst] column value.
     *
     * @return boolean
     */
    public function isSchuldenBijBelastingdienst()
    {
        return $this->getSchuldenBijBelastingdienst();
    }

    /**
     * Get the [partner_schulden_bij_cjib] column value.
     *
     * @return boolean
     */
    public function getPartnerSchuldenBijCjib()
    {
        return $this->partner_schulden_bij_cjib;
    }

    /**
     * Get the [partner_schulden_bij_cjib] column value.
     *
     * @return boolean
     */
    public function isPartnerSchuldenBijCjib()
    {
        return $this->getPartnerSchuldenBijCjib();
    }

    /**
     * Get the [partner_schulden_bij_belastingdienst] column value.
     *
     * @return boolean
     */
    public function getPartnerSchuldenBijBelastingdienst()
    {
        return $this->partner_schulden_bij_belastingdienst;
    }

    /**
     * Get the [partner_schulden_bij_belastingdienst] column value.
     *
     * @return boolean
     */
    public function isPartnerSchuldenBijBelastingdienst()
    {
        return $this->getPartnerSchuldenBijBelastingdienst();
    }

    /**
     * Get the [voorlopige_hechtenis] column value.
     *
     * @return boolean
     */
    public function getVoorlopigeHechtenis()
    {
        return $this->voorlopige_hechtenis;
    }

    /**
     * Get the [voorlopige_hechtenis] column value.
     *
     * @return boolean
     */
    public function isVoorlopigeHechtenis()
    {
        return $this->getVoorlopigeHechtenis();
    }

    /**
     * Get the [partner_voorlopige_hechtenis] column value.
     *
     * @return boolean
     */
    public function getPartnerVoorlopigeHechtenis()
    {
        return $this->partner_voorlopige_hechtenis;
    }

    /**
     * Get the [partner_voorlopige_hechtenis] column value.
     *
     * @return boolean
     */
    public function isPartnerVoorlopigeHechtenis()
    {
        return $this->getPartnerVoorlopigeHechtenis();
    }

    /**
     * Get the [bsn] column value.
     *
     * @return string
     */
    public function getBsn()
    {
        return $this->bsn;
    }

    /**
     * Get the [partner_bsn] column value.
     *
     * @return string
     */
    public function getPartnerBsn()
    {
        return $this->partner_bsn;
    }

    /**
     * Get the [voornaam] column value.
     *
     * @return string
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * Get the [achternaam] column value.
     *
     * @return string
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    /**
     * Get the [partner_voornaam] column value.
     *
     * @return string
     */
    public function getPartnerVoornaam()
    {
        return $this->partner_voornaam;
    }

    /**
     * Get the [partner_achternaam] column value.
     *
     * @return string
     */
    public function getPartnerAchternaam()
    {
        return $this->partner_achternaam;
    }

    /**
     * Get the [optionally formatted] temporal [partner_geboorte_datum] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPartnerGeboorteDatum($format = null)
    {
        if ($format === null) {
            return $this->partner_geboorte_datum;
        } else {
            return $this->partner_geboorte_datum instanceof \DateTimeInterface ? $this->partner_geboorte_datum->format($format) : null;
        }
    }

    /**
     * Get the [partner_zelfde_adres] column value.
     *
     * @return boolean
     */
    public function getPartnerZelfdeAdres()
    {
        return $this->partner_zelfde_adres;
    }

    /**
     * Get the [partner_zelfde_adres] column value.
     *
     * @return boolean
     */
    public function isPartnerZelfdeAdres()
    {
        return $this->getPartnerZelfdeAdres();
    }

    /**
     * Get the [provincie_id] column value.
     *
     * @return int
     */
    public function getProvincieId()
    {
        return $this->provincie_id;
    }

    /**
     * Get the [gemeente_id] column value.
     *
     * @return int
     */
    public function getGemeenteId()
    {
        return $this->gemeente_id;
    }

    /**
     * Get the [straat] column value.
     *
     * @return string
     */
    public function getStraat()
    {
        return $this->straat;
    }

    /**
     * Get the [huisnummer] column value.
     *
     * @return string
     */
    public function getHuisnummer()
    {
        return $this->huisnummer;
    }

    /**
     * Get the [postcode] column value.
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Get the [partner_provincie_id] column value.
     *
     * @return int
     */
    public function getPartnerProvincieId()
    {
        return $this->partner_provincie_id;
    }

    /**
     * Get the [partner_gemeente_id] column value.
     *
     * @return int
     */
    public function getPartnerGemeenteId()
    {
        return $this->partner_gemeente_id;
    }

    /**
     * Get the [partner_straat] column value.
     *
     * @return string
     */
    public function getPartnerStraat()
    {
        return $this->partner_straat;
    }

    /**
     * Get the [partner_huisnummer] column value.
     *
     * @return string
     */
    public function getPartnerHuisnummer()
    {
        return $this->partner_huisnummer;
    }

    /**
     * Get the [partner_postcode] column value.
     *
     * @return string
     */
    public function getPartnerPostcode()
    {
        return $this->partner_postcode;
    }

    /**
     * Get the [partner_ontvangt_ww] column value.
     *
     * @return boolean
     */
    public function getPartnerOntvangtWw()
    {
        return $this->partner_ontvangt_ww;
    }

    /**
     * Get the [partner_ontvangt_ww] column value.
     *
     * @return boolean
     */
    public function isPartnerOntvangtWw()
    {
        return $this->getPartnerOntvangtWw();
    }

    /**
     * Get the [partner_ontvangt_bijstand] column value.
     *
     * @return boolean
     */
    public function getPartnerOntvangtBijstand()
    {
        return $this->partner_ontvangt_bijstand;
    }

    /**
     * Get the [partner_ontvangt_bijstand] column value.
     *
     * @return boolean
     */
    public function isPartnerOntvangtBijstand()
    {
        return $this->getPartnerOntvangtBijstand();
    }

    /**
     * Get the [partner_ontvangt_wao] column value.
     *
     * @return boolean
     */
    public function getPartnerOntvangtWao()
    {
        return $this->partner_ontvangt_wao;
    }

    /**
     * Get the [partner_ontvangt_wao] column value.
     *
     * @return boolean
     */
    public function isPartnerOntvangtWao()
    {
        return $this->getPartnerOntvangtWao();
    }

    /**
     * Get the [partner_ontvangt_wia] column value.
     *
     * @return boolean
     */
    public function getPartnerOntvangtWia()
    {
        return $this->partner_ontvangt_wia;
    }

    /**
     * Get the [partner_ontvangt_wia] column value.
     *
     * @return boolean
     */
    public function isPartnerOntvangtWia()
    {
        return $this->getPartnerOntvangtWia();
    }

    /**
     * Get the [partner_ontvangt_aow] column value.
     *
     * @return boolean
     */
    public function getPartnerOntvangtAow()
    {
        return $this->partner_ontvangt_aow;
    }

    /**
     * Get the [partner_ontvangt_aow] column value.
     *
     * @return boolean
     */
    public function isPartnerOntvangtAow()
    {
        return $this->getPartnerOntvangtAow();
    }

    /**
     * Get the [partner_ontvangt_wamil] column value.
     *
     * @return boolean
     */
    public function getPartnerOntvangtWamil()
    {
        return $this->partner_ontvangt_wamil;
    }

    /**
     * Get the [partner_ontvangt_wamil] column value.
     *
     * @return boolean
     */
    public function isPartnerOntvangtWamil()
    {
        return $this->getPartnerOntvangtWamil();
    }

    /**
     * Get the [partner_ontvangt_iaoz] column value.
     *
     * @return boolean
     */
    public function getPartnerOntvangtIaoz()
    {
        return $this->partner_ontvangt_iaoz;
    }

    /**
     * Get the [partner_ontvangt_iaoz] column value.
     *
     * @return boolean
     */
    public function isPartnerOntvangtIaoz()
    {
        return $this->getPartnerOntvangtIaoz();
    }

    /**
     * Get the [partner_ontvangt_iaow] column value.
     *
     * @return boolean
     */
    public function getPartnerOntvangtIaow()
    {
        return $this->partner_ontvangt_iaow;
    }

    /**
     * Get the [partner_ontvangt_iaow] column value.
     *
     * @return boolean
     */
    public function isPartnerOntvangtIaow()
    {
        return $this->getPartnerOntvangtIaow();
    }

    /**
     * Get the [partner_ontvangt_iow] column value.
     *
     * @return boolean
     */
    public function getPartnerOntvangtIow()
    {
        return $this->partner_ontvangt_iow;
    }

    /**
     * Get the [partner_ontvangt_iow] column value.
     *
     * @return boolean
     */
    public function isPartnerOntvangtIow()
    {
        return $this->getPartnerOntvangtIow();
    }

    /**
     * Get the [heeft_kinderen_jonger_dan_18] column value.
     *
     * @return boolean
     */
    public function getHeeftKinderenJongerDan18()
    {
        return $this->heeft_kinderen_jonger_dan_18;
    }

    /**
     * Get the [heeft_kinderen_jonger_dan_18] column value.
     *
     * @return boolean
     */
    public function isHeeftKinderenJongerDan18()
    {
        return $this->getHeeftKinderenJongerDan18();
    }

    /**
     * Get the [aantal_kinderen_jonger_dan_18] column value.
     *
     * @return int
     */
    public function getAantalKinderenJongerDan18()
    {
        return $this->aantal_kinderen_jonger_dan_18;
    }

    /**
     * Get the [kinderen_zelfde_adres] column value.
     *
     * @return boolean
     */
    public function getKinderenZelfdeAdres()
    {
        return $this->kinderen_zelfde_adres;
    }

    /**
     * Get the [kinderen_zelfde_adres] column value.
     *
     * @return boolean
     */
    public function isKinderenZelfdeAdres()
    {
        return $this->getKinderenZelfdeAdres();
    }

    /**
     * Get the [toekomstig_adres] column value.
     *
     * @return string
     */
    public function getToekomstigAdres()
    {
        return $this->toekomstig_adres;
    }

    /**
     * Get the [post_ontvangen_toekomstig_adres] column value.
     *
     * @return boolean
     */
    public function getPostOntvangenToekomstigAdres()
    {
        return $this->post_ontvangen_toekomstig_adres;
    }

    /**
     * Get the [post_ontvangen_toekomstig_adres] column value.
     *
     * @return boolean
     */
    public function isPostOntvangenToekomstigAdres()
    {
        return $this->getPostOntvangenToekomstigAdres();
    }

    /**
     * Get the [heeft_bankrekening_emigratieland] column value.
     *
     * @return boolean
     */
    public function getHeeftBankrekeningEmigratieland()
    {
        return $this->heeft_bankrekening_emigratieland;
    }

    /**
     * Get the [heeft_bankrekening_emigratieland] column value.
     *
     * @return boolean
     */
    public function isHeeftBankrekeningEmigratieland()
    {
        return $this->getHeeftBankrekeningEmigratieland();
    }

    /**
     * Get the [gegevens_naar_waarheid_ingevuld] column value.
     *
     * @return boolean
     */
    public function getGegevensNaarWaarheidIngevuld()
    {
        return $this->gegevens_naar_waarheid_ingevuld;
    }

    /**
     * Get the [gegevens_naar_waarheid_ingevuld] column value.
     *
     * @return boolean
     */
    public function isGegevensNaarWaarheidIngevuld()
    {
        return $this->getGegevensNaarWaarheidIngevuld();
    }

    /**
     * Get the [bedrag] column value.
     *
     * @return string
     */
    public function getBedrag()
    {
        return $this->bedrag;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = null)
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTimeInterface ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = null)
    {
        if ($format === null) {
            return $this->updated_at;
        } else {
            return $this->updated_at instanceof \DateTimeInterface ? $this->updated_at->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [persoon_id] column.
     *
     * @param int $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPersoonId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->persoon_id !== $v) {
            $this->persoon_id = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PERSOON_ID] = true;
        }

        if ($this->aPersoon !== null && $this->aPersoon->getId() !== $v) {
            $this->aPersoon = null;
        }

        return $this;
    } // setPersoonId()

    /**
     * Sets the value of [geboorte_datum] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setGeboorteDatum($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->geboorte_datum !== null || $dt !== null) {
            if ($this->geboorte_datum === null || $dt === null || $dt->format("Y-m-d") !== $this->geboorte_datum->format("Y-m-d")) {
                $this->geboorte_datum = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RemAanvraagTableMap::COL_GEBOORTE_DATUM] = true;
            }
        } // if either are not null

        return $this;
    } // setGeboorteDatum()

    /**
     * Set the value of [geboorte_land] column.
     *
     * @param string|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setGeboorteLand($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->geboorte_land !== $v) {
            $this->geboorte_land = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_GEBOORTE_LAND] = true;
        }

        return $this;
    } // setGeboorteLand()

    /**
     * Sets the value of [immigratie_datum] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setImmigratieDatum($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->immigratie_datum !== null || $dt !== null) {
            if ($this->immigratie_datum === null || $dt === null || $dt->format("Y-m-d") !== $this->immigratie_datum->format("Y-m-d")) {
                $this->immigratie_datum = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RemAanvraagTableMap::COL_IMMIGRATIE_DATUM] = true;
            }
        } // if either are not null

        return $this;
    } // setImmigratieDatum()

    /**
     * Sets the value of the [heeft_nl_paspoort] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setHeeftNlPaspoort($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->heeft_nl_paspoort !== $v) {
            $this->heeft_nl_paspoort = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_HEEFT_NL_PASPOORT] = true;
        }

        return $this;
    } // setHeeftNlPaspoort()

    /**
     * Set the value of [emigratie_land] column.
     *
     * @param string|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setEmigratieLand($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->emigratie_land !== $v) {
            $this->emigratie_land = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_EMIGRATIE_LAND] = true;
        }

        return $this;
    } // setEmigratieLand()

    /**
     * Sets the value of the [emigratie_verblijfsvergunning] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setEmigratieVerblijfsvergunning($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->emigratie_verblijfsvergunning !== $v) {
            $this->emigratie_verblijfsvergunning = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING] = true;
        }

        return $this;
    } // setEmigratieVerblijfsvergunning()

    /**
     * Sets the value of the [partner_emigratie_verblijfsvergunning] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerEmigratieVerblijfsvergunning($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_emigratie_verblijfsvergunning !== $v) {
            $this->partner_emigratie_verblijfsvergunning = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING] = true;
        }

        return $this;
    } // setPartnerEmigratieVerblijfsvergunning()

    /**
     * Sets the value of the [ontvangt_ww] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setOntvangtWw($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ontvangt_ww !== $v) {
            $this->ontvangt_ww = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ONTVANGT_WW] = true;
        }

        return $this;
    } // setOntvangtWw()

    /**
     * Sets the value of the [ontvangt_bijstand] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setOntvangtBijstand($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ontvangt_bijstand !== $v) {
            $this->ontvangt_bijstand = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ONTVANGT_BIJSTAND] = true;
        }

        return $this;
    } // setOntvangtBijstand()

    /**
     * Sets the value of the [ontvangt_wao] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setOntvangtWao($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ontvangt_wao !== $v) {
            $this->ontvangt_wao = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ONTVANGT_WAO] = true;
        }

        return $this;
    } // setOntvangtWao()

    /**
     * Sets the value of the [ontvangt_wia] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setOntvangtWia($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ontvangt_wia !== $v) {
            $this->ontvangt_wia = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ONTVANGT_WIA] = true;
        }

        return $this;
    } // setOntvangtWia()

    /**
     * Sets the value of the [ontvangt_aow] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setOntvangtAow($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ontvangt_aow !== $v) {
            $this->ontvangt_aow = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ONTVANGT_AOW] = true;
        }

        return $this;
    } // setOntvangtAow()

    /**
     * Sets the value of the [ontvangt_wamil] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setOntvangtWamil($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ontvangt_wamil !== $v) {
            $this->ontvangt_wamil = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ONTVANGT_WAMIL] = true;
        }

        return $this;
    } // setOntvangtWamil()

    /**
     * Sets the value of the [ontvangt_iaoz] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setOntvangtIaoz($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ontvangt_iaoz !== $v) {
            $this->ontvangt_iaoz = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ONTVANGT_IAOZ] = true;
        }

        return $this;
    } // setOntvangtIaoz()

    /**
     * Sets the value of the [ontvangt_iaow] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setOntvangtIaow($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ontvangt_iaow !== $v) {
            $this->ontvangt_iaow = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ONTVANGT_IAOW] = true;
        }

        return $this;
    } // setOntvangtIaow()

    /**
     * Sets the value of the [ontvangt_iow] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setOntvangtIow($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ontvangt_iow !== $v) {
            $this->ontvangt_iow = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ONTVANGT_IOW] = true;
        }

        return $this;
    } // setOntvangtIow()

    /**
     * Sets the value of [start_ww] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setStartWw($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->start_ww !== null || $dt !== null) {
            if ($this->start_ww === null || $dt === null || $dt->format("Y-m-d") !== $this->start_ww->format("Y-m-d")) {
                $this->start_ww = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RemAanvraagTableMap::COL_START_WW] = true;
            }
        } // if either are not null

        return $this;
    } // setStartWw()

    /**
     * Sets the value of the [bezwaar_of_beroep_uitkeringsinstantie] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setBezwaarOfBeroepUitkeringsinstantie($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->bezwaar_of_beroep_uitkeringsinstantie !== $v) {
            $this->bezwaar_of_beroep_uitkeringsinstantie = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_BEZWAAR_OF_BEROEP_UITKERINGSINSTANTIE] = true;
        }

        return $this;
    } // setBezwaarOfBeroepUitkeringsinstantie()

    /**
     * Set the value of [burgerlijke_staat_id] column.
     *
     * @param int|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setBurgerlijkeStaatId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->burgerlijke_staat_id !== $v) {
            $this->burgerlijke_staat_id = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_BURGERLIJKE_STAAT_ID] = true;
        }

        return $this;
    } // setBurgerlijkeStaatId()

    /**
     * Sets the value of the [samenwonend] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setSamenwonend($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->samenwonend !== $v) {
            $this->samenwonend = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_SAMENWONEND] = true;
        }

        return $this;
    } // setSamenwonend()

    /**
     * Sets the value of the [partner_remigratie] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerRemigratie($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_remigratie !== $v) {
            $this->partner_remigratie = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_REMIGRATIE] = true;
        }

        return $this;
    } // setPartnerRemigratie()

    /**
     * Sets the value of [partner_ww_start] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerWwStart($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->partner_ww_start !== null || $dt !== null) {
            if ($this->partner_ww_start === null || $dt === null || $dt->format("Y-m-d") !== $this->partner_ww_start->format("Y-m-d")) {
                $this->partner_ww_start = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_WW_START] = true;
            }
        } // if either are not null

        return $this;
    } // setPartnerWwStart()

    /**
     * Sets the value of the [schulden_bij_cjib] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setSchuldenBijCjib($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->schulden_bij_cjib !== $v) {
            $this->schulden_bij_cjib = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_SCHULDEN_BIJ_CJIB] = true;
        }

        return $this;
    } // setSchuldenBijCjib()

    /**
     * Sets the value of the [schulden_bij_belastingdienst] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setSchuldenBijBelastingdienst($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->schulden_bij_belastingdienst !== $v) {
            $this->schulden_bij_belastingdienst = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_SCHULDEN_BIJ_BELASTINGDIENST] = true;
        }

        return $this;
    } // setSchuldenBijBelastingdienst()

    /**
     * Sets the value of the [partner_schulden_bij_cjib] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerSchuldenBijCjib($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_schulden_bij_cjib !== $v) {
            $this->partner_schulden_bij_cjib = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_CJIB] = true;
        }

        return $this;
    } // setPartnerSchuldenBijCjib()

    /**
     * Sets the value of the [partner_schulden_bij_belastingdienst] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerSchuldenBijBelastingdienst($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_schulden_bij_belastingdienst !== $v) {
            $this->partner_schulden_bij_belastingdienst = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_BELASTINGDIENST] = true;
        }

        return $this;
    } // setPartnerSchuldenBijBelastingdienst()

    /**
     * Sets the value of the [voorlopige_hechtenis] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setVoorlopigeHechtenis($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->voorlopige_hechtenis !== $v) {
            $this->voorlopige_hechtenis = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_VOORLOPIGE_HECHTENIS] = true;
        }

        return $this;
    } // setVoorlopigeHechtenis()

    /**
     * Sets the value of the [partner_voorlopige_hechtenis] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerVoorlopigeHechtenis($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_voorlopige_hechtenis !== $v) {
            $this->partner_voorlopige_hechtenis = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_VOORLOPIGE_HECHTENIS] = true;
        }

        return $this;
    } // setPartnerVoorlopigeHechtenis()

    /**
     * Set the value of [bsn] column.
     *
     * @param string $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setBsn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bsn !== $v) {
            $this->bsn = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_BSN] = true;
        }

        return $this;
    } // setBsn()

    /**
     * Set the value of [partner_bsn] column.
     *
     * @param string $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerBsn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->partner_bsn !== $v) {
            $this->partner_bsn = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_BSN] = true;
        }

        return $this;
    } // setPartnerBsn()

    /**
     * Set the value of [voornaam] column.
     *
     * @param string $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setVoornaam($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->voornaam !== $v) {
            $this->voornaam = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_VOORNAAM] = true;
        }

        return $this;
    } // setVoornaam()

    /**
     * Set the value of [achternaam] column.
     *
     * @param string $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setAchternaam($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->achternaam !== $v) {
            $this->achternaam = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_ACHTERNAAM] = true;
        }

        return $this;
    } // setAchternaam()

    /**
     * Set the value of [partner_voornaam] column.
     *
     * @param string $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerVoornaam($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->partner_voornaam !== $v) {
            $this->partner_voornaam = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_VOORNAAM] = true;
        }

        return $this;
    } // setPartnerVoornaam()

    /**
     * Set the value of [partner_achternaam] column.
     *
     * @param string $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerAchternaam($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->partner_achternaam !== $v) {
            $this->partner_achternaam = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ACHTERNAAM] = true;
        }

        return $this;
    } // setPartnerAchternaam()

    /**
     * Sets the value of [partner_geboorte_datum] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerGeboorteDatum($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->partner_geboorte_datum !== null || $dt !== null) {
            if ($this->partner_geboorte_datum === null || $dt === null || $dt->format("Y-m-d") !== $this->partner_geboorte_datum->format("Y-m-d")) {
                $this->partner_geboorte_datum = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_GEBOORTE_DATUM] = true;
            }
        } // if either are not null

        return $this;
    } // setPartnerGeboorteDatum()

    /**
     * Sets the value of the [partner_zelfde_adres] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerZelfdeAdres($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_zelfde_adres !== $v) {
            $this->partner_zelfde_adres = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ZELFDE_ADRES] = true;
        }

        return $this;
    } // setPartnerZelfdeAdres()

    /**
     * Set the value of [provincie_id] column.
     *
     * @param int $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setProvincieId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->provincie_id !== $v) {
            $this->provincie_id = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PROVINCIE_ID] = true;
        }

        return $this;
    } // setProvincieId()

    /**
     * Set the value of [gemeente_id] column.
     *
     * @param int $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setGemeenteId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->gemeente_id !== $v) {
            $this->gemeente_id = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_GEMEENTE_ID] = true;
        }

        return $this;
    } // setGemeenteId()

    /**
     * Set the value of [straat] column.
     *
     * @param string|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setStraat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->straat !== $v) {
            $this->straat = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_STRAAT] = true;
        }

        return $this;
    } // setStraat()

    /**
     * Set the value of [huisnummer] column.
     *
     * @param string|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setHuisnummer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->huisnummer !== $v) {
            $this->huisnummer = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_HUISNUMMER] = true;
        }

        return $this;
    } // setHuisnummer()

    /**
     * Set the value of [postcode] column.
     *
     * @param string|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPostcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->postcode !== $v) {
            $this->postcode = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_POSTCODE] = true;
        }

        return $this;
    } // setPostcode()

    /**
     * Set the value of [partner_provincie_id] column.
     *
     * @param int $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerProvincieId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->partner_provincie_id !== $v) {
            $this->partner_provincie_id = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_PROVINCIE_ID] = true;
        }

        return $this;
    } // setPartnerProvincieId()

    /**
     * Set the value of [partner_gemeente_id] column.
     *
     * @param int $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerGemeenteId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->partner_gemeente_id !== $v) {
            $this->partner_gemeente_id = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_GEMEENTE_ID] = true;
        }

        return $this;
    } // setPartnerGemeenteId()

    /**
     * Set the value of [partner_straat] column.
     *
     * @param string|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerStraat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->partner_straat !== $v) {
            $this->partner_straat = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_STRAAT] = true;
        }

        return $this;
    } // setPartnerStraat()

    /**
     * Set the value of [partner_huisnummer] column.
     *
     * @param string|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerHuisnummer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->partner_huisnummer !== $v) {
            $this->partner_huisnummer = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_HUISNUMMER] = true;
        }

        return $this;
    } // setPartnerHuisnummer()

    /**
     * Set the value of [partner_postcode] column.
     *
     * @param string|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerPostcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->partner_postcode !== $v) {
            $this->partner_postcode = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_POSTCODE] = true;
        }

        return $this;
    } // setPartnerPostcode()

    /**
     * Sets the value of the [partner_ontvangt_ww] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerOntvangtWw($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_ontvangt_ww !== $v) {
            $this->partner_ontvangt_ww = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WW] = true;
        }

        return $this;
    } // setPartnerOntvangtWw()

    /**
     * Sets the value of the [partner_ontvangt_bijstand] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerOntvangtBijstand($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_ontvangt_bijstand !== $v) {
            $this->partner_ontvangt_bijstand = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ONTVANGT_BIJSTAND] = true;
        }

        return $this;
    } // setPartnerOntvangtBijstand()

    /**
     * Sets the value of the [partner_ontvangt_wao] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerOntvangtWao($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_ontvangt_wao !== $v) {
            $this->partner_ontvangt_wao = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAO] = true;
        }

        return $this;
    } // setPartnerOntvangtWao()

    /**
     * Sets the value of the [partner_ontvangt_wia] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerOntvangtWia($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_ontvangt_wia !== $v) {
            $this->partner_ontvangt_wia = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WIA] = true;
        }

        return $this;
    } // setPartnerOntvangtWia()

    /**
     * Sets the value of the [partner_ontvangt_aow] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerOntvangtAow($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_ontvangt_aow !== $v) {
            $this->partner_ontvangt_aow = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ONTVANGT_AOW] = true;
        }

        return $this;
    } // setPartnerOntvangtAow()

    /**
     * Sets the value of the [partner_ontvangt_wamil] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerOntvangtWamil($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_ontvangt_wamil !== $v) {
            $this->partner_ontvangt_wamil = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAMIL] = true;
        }

        return $this;
    } // setPartnerOntvangtWamil()

    /**
     * Sets the value of the [partner_ontvangt_iaoz] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerOntvangtIaoz($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_ontvangt_iaoz !== $v) {
            $this->partner_ontvangt_iaoz = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOZ] = true;
        }

        return $this;
    } // setPartnerOntvangtIaoz()

    /**
     * Sets the value of the [partner_ontvangt_iaow] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerOntvangtIaow($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_ontvangt_iaow !== $v) {
            $this->partner_ontvangt_iaow = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOW] = true;
        }

        return $this;
    } // setPartnerOntvangtIaow()

    /**
     * Sets the value of the [partner_ontvangt_iow] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPartnerOntvangtIow($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->partner_ontvangt_iow !== $v) {
            $this->partner_ontvangt_iow = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IOW] = true;
        }

        return $this;
    } // setPartnerOntvangtIow()

    /**
     * Sets the value of the [heeft_kinderen_jonger_dan_18] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setHeeftKinderenJongerDan18($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->heeft_kinderen_jonger_dan_18 !== $v) {
            $this->heeft_kinderen_jonger_dan_18 = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_HEEFT_KINDEREN_JONGER_DAN_18] = true;
        }

        return $this;
    } // setHeeftKinderenJongerDan18()

    /**
     * Set the value of [aantal_kinderen_jonger_dan_18] column.
     *
     * @param int|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setAantalKinderenJongerDan18($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->aantal_kinderen_jonger_dan_18 !== $v) {
            $this->aantal_kinderen_jonger_dan_18 = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_AANTAL_KINDEREN_JONGER_DAN_18] = true;
        }

        return $this;
    } // setAantalKinderenJongerDan18()

    /**
     * Sets the value of the [kinderen_zelfde_adres] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setKinderenZelfdeAdres($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->kinderen_zelfde_adres !== $v) {
            $this->kinderen_zelfde_adres = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_KINDEREN_ZELFDE_ADRES] = true;
        }

        return $this;
    } // setKinderenZelfdeAdres()

    /**
     * Set the value of [toekomstig_adres] column.
     *
     * @param string|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setToekomstigAdres($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->toekomstig_adres !== $v) {
            $this->toekomstig_adres = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_TOEKOMSTIG_ADRES] = true;
        }

        return $this;
    } // setToekomstigAdres()

    /**
     * Sets the value of the [post_ontvangen_toekomstig_adres] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setPostOntvangenToekomstigAdres($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->post_ontvangen_toekomstig_adres !== $v) {
            $this->post_ontvangen_toekomstig_adres = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_POST_ONTVANGEN_TOEKOMSTIG_ADRES] = true;
        }

        return $this;
    } // setPostOntvangenToekomstigAdres()

    /**
     * Sets the value of the [heeft_bankrekening_emigratieland] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setHeeftBankrekeningEmigratieland($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->heeft_bankrekening_emigratieland !== $v) {
            $this->heeft_bankrekening_emigratieland = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_HEEFT_BANKREKENING_EMIGRATIELAND] = true;
        }

        return $this;
    } // setHeeftBankrekeningEmigratieland()

    /**
     * Sets the value of the [gegevens_naar_waarheid_ingevuld] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setGegevensNaarWaarheidIngevuld($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->gegevens_naar_waarheid_ingevuld !== $v) {
            $this->gegevens_naar_waarheid_ingevuld = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_GEGEVENS_NAAR_WAARHEID_INGEVULD] = true;
        }

        return $this;
    } // setGegevensNaarWaarheidIngevuld()

    /**
     * Set the value of [bedrag] column.
     *
     * @param string|null $v New value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setBedrag($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bedrag !== $v) {
            $this->bedrag = $v;
            $this->modifiedColumns[RemAanvraagTableMap::COL_BEDRAG] = true;
        }

        return $this;
    } // setBedrag()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RemAanvraagTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->updated_at->format("Y-m-d H:i:s.u")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RemAanvraagTableMap::COL_UPDATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdatedAt()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : RemAanvraagTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : RemAanvraagTableMap::translateFieldName('PersoonId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->persoon_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : RemAanvraagTableMap::translateFieldName('GeboorteDatum', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->geboorte_datum = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : RemAanvraagTableMap::translateFieldName('GeboorteLand', TableMap::TYPE_PHPNAME, $indexType)];
            $this->geboorte_land = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : RemAanvraagTableMap::translateFieldName('ImmigratieDatum', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->immigratie_datum = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : RemAanvraagTableMap::translateFieldName('HeeftNlPaspoort', TableMap::TYPE_PHPNAME, $indexType)];
            $this->heeft_nl_paspoort = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : RemAanvraagTableMap::translateFieldName('EmigratieLand', TableMap::TYPE_PHPNAME, $indexType)];
            $this->emigratie_land = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : RemAanvraagTableMap::translateFieldName('EmigratieVerblijfsvergunning', TableMap::TYPE_PHPNAME, $indexType)];
            $this->emigratie_verblijfsvergunning = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerEmigratieVerblijfsvergunning', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_emigratie_verblijfsvergunning = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : RemAanvraagTableMap::translateFieldName('OntvangtWw', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ontvangt_ww = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : RemAanvraagTableMap::translateFieldName('OntvangtBijstand', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ontvangt_bijstand = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : RemAanvraagTableMap::translateFieldName('OntvangtWao', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ontvangt_wao = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : RemAanvraagTableMap::translateFieldName('OntvangtWia', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ontvangt_wia = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : RemAanvraagTableMap::translateFieldName('OntvangtAow', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ontvangt_aow = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : RemAanvraagTableMap::translateFieldName('OntvangtWamil', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ontvangt_wamil = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : RemAanvraagTableMap::translateFieldName('OntvangtIaoz', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ontvangt_iaoz = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : RemAanvraagTableMap::translateFieldName('OntvangtIaow', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ontvangt_iaow = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : RemAanvraagTableMap::translateFieldName('OntvangtIow', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ontvangt_iow = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : RemAanvraagTableMap::translateFieldName('StartWw', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->start_ww = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : RemAanvraagTableMap::translateFieldName('BezwaarOfBeroepUitkeringsinstantie', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bezwaar_of_beroep_uitkeringsinstantie = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : RemAanvraagTableMap::translateFieldName('BurgerlijkeStaatId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->burgerlijke_staat_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : RemAanvraagTableMap::translateFieldName('Samenwonend', TableMap::TYPE_PHPNAME, $indexType)];
            $this->samenwonend = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerRemigratie', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_remigratie = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerWwStart', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->partner_ww_start = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : RemAanvraagTableMap::translateFieldName('SchuldenBijCjib', TableMap::TYPE_PHPNAME, $indexType)];
            $this->schulden_bij_cjib = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : RemAanvraagTableMap::translateFieldName('SchuldenBijBelastingdienst', TableMap::TYPE_PHPNAME, $indexType)];
            $this->schulden_bij_belastingdienst = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerSchuldenBijCjib', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_schulden_bij_cjib = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerSchuldenBijBelastingdienst', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_schulden_bij_belastingdienst = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : RemAanvraagTableMap::translateFieldName('VoorlopigeHechtenis', TableMap::TYPE_PHPNAME, $indexType)];
            $this->voorlopige_hechtenis = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerVoorlopigeHechtenis', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_voorlopige_hechtenis = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : RemAanvraagTableMap::translateFieldName('Bsn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bsn = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerBsn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_bsn = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : RemAanvraagTableMap::translateFieldName('Voornaam', TableMap::TYPE_PHPNAME, $indexType)];
            $this->voornaam = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : RemAanvraagTableMap::translateFieldName('Achternaam', TableMap::TYPE_PHPNAME, $indexType)];
            $this->achternaam = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerVoornaam', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_voornaam = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerAchternaam', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_achternaam = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerGeboorteDatum', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->partner_geboorte_datum = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerZelfdeAdres', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_zelfde_adres = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : RemAanvraagTableMap::translateFieldName('ProvincieId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->provincie_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : RemAanvraagTableMap::translateFieldName('GemeenteId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->gemeente_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : RemAanvraagTableMap::translateFieldName('Straat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->straat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : RemAanvraagTableMap::translateFieldName('Huisnummer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->huisnummer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : RemAanvraagTableMap::translateFieldName('Postcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->postcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerProvincieId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_provincie_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerGemeenteId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_gemeente_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerStraat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_straat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerHuisnummer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_huisnummer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerPostcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_postcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerOntvangtWw', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_ontvangt_ww = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerOntvangtBijstand', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_ontvangt_bijstand = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerOntvangtWao', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_ontvangt_wao = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerOntvangtWia', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_ontvangt_wia = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerOntvangtAow', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_ontvangt_aow = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerOntvangtWamil', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_ontvangt_wamil = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerOntvangtIaoz', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_ontvangt_iaoz = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerOntvangtIaow', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_ontvangt_iaow = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : RemAanvraagTableMap::translateFieldName('PartnerOntvangtIow', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_ontvangt_iow = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : RemAanvraagTableMap::translateFieldName('HeeftKinderenJongerDan18', TableMap::TYPE_PHPNAME, $indexType)];
            $this->heeft_kinderen_jonger_dan_18 = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 58 + $startcol : RemAanvraagTableMap::translateFieldName('AantalKinderenJongerDan18', TableMap::TYPE_PHPNAME, $indexType)];
            $this->aantal_kinderen_jonger_dan_18 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 59 + $startcol : RemAanvraagTableMap::translateFieldName('KinderenZelfdeAdres', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kinderen_zelfde_adres = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 60 + $startcol : RemAanvraagTableMap::translateFieldName('ToekomstigAdres', TableMap::TYPE_PHPNAME, $indexType)];
            $this->toekomstig_adres = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 61 + $startcol : RemAanvraagTableMap::translateFieldName('PostOntvangenToekomstigAdres', TableMap::TYPE_PHPNAME, $indexType)];
            $this->post_ontvangen_toekomstig_adres = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 62 + $startcol : RemAanvraagTableMap::translateFieldName('HeeftBankrekeningEmigratieland', TableMap::TYPE_PHPNAME, $indexType)];
            $this->heeft_bankrekening_emigratieland = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 63 + $startcol : RemAanvraagTableMap::translateFieldName('GegevensNaarWaarheidIngevuld', TableMap::TYPE_PHPNAME, $indexType)];
            $this->gegevens_naar_waarheid_ingevuld = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 64 + $startcol : RemAanvraagTableMap::translateFieldName('Bedrag', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bedrag = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 65 + $startcol : RemAanvraagTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 66 + $startcol : RemAanvraagTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 67; // 67 = RemAanvraagTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Model\\Custom\\NovumSvb\\RemAanvraag'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aPersoon !== null && $this->persoon_id !== $this->aPersoon->getId()) {
            $this->aPersoon = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RemAanvraagTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildRemAanvraagQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPersoon = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see RemAanvraag::setDeleted()
     * @see RemAanvraag::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(RemAanvraagTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildRemAanvraagQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(RemAanvraagTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                $time = time();
                $highPrecision = \Propel\Runtime\Util\PropelDateTime::createHighPrecision();
                if (!$this->isColumnModified(RemAanvraagTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt($highPrecision);
                }
                if (!$this->isColumnModified(RemAanvraagTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt($highPrecision);
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(RemAanvraagTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(\Propel\Runtime\Util\PropelDateTime::createHighPrecision());
                }
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                RemAanvraagTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPersoon !== null) {
                if ($this->aPersoon->isModified() || $this->aPersoon->isNew()) {
                    $affectedRows += $this->aPersoon->save($con);
                }
                $this->setPersoon($this->aPersoon);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[RemAanvraagTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RemAanvraagTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PERSOON_ID)) {
            $modifiedColumns[':p' . $index++]  = 'persoon_id';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_GEBOORTE_DATUM)) {
            $modifiedColumns[':p' . $index++]  = 'geboorte_datum';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_GEBOORTE_LAND)) {
            $modifiedColumns[':p' . $index++]  = 'geboorte_land';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_IMMIGRATIE_DATUM)) {
            $modifiedColumns[':p' . $index++]  = 'immigratie_datum';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_HEEFT_NL_PASPOORT)) {
            $modifiedColumns[':p' . $index++]  = 'heeft_nl_paspoort';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_EMIGRATIE_LAND)) {
            $modifiedColumns[':p' . $index++]  = 'emigratie_land';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING)) {
            $modifiedColumns[':p' . $index++]  = 'emigratie_verblijfsvergunning';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING)) {
            $modifiedColumns[':p' . $index++]  = 'partner_emigratie_verblijfsvergunning';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_WW)) {
            $modifiedColumns[':p' . $index++]  = 'ontvangt_ww';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_BIJSTAND)) {
            $modifiedColumns[':p' . $index++]  = 'ontvangt_bijstand';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_WAO)) {
            $modifiedColumns[':p' . $index++]  = 'ontvangt_wao';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_WIA)) {
            $modifiedColumns[':p' . $index++]  = 'ontvangt_wia';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_AOW)) {
            $modifiedColumns[':p' . $index++]  = 'ontvangt_aow';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_WAMIL)) {
            $modifiedColumns[':p' . $index++]  = 'ontvangt_wamil';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_IAOZ)) {
            $modifiedColumns[':p' . $index++]  = 'ontvangt_iaoz';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_IAOW)) {
            $modifiedColumns[':p' . $index++]  = 'ontvangt_iaow';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_IOW)) {
            $modifiedColumns[':p' . $index++]  = 'ontvangt_iow';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_START_WW)) {
            $modifiedColumns[':p' . $index++]  = 'start_ww';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_BEZWAAR_OF_BEROEP_UITKERINGSINSTANTIE)) {
            $modifiedColumns[':p' . $index++]  = 'bezwaar_of_beroep_uitkeringsinstantie';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_BURGERLIJKE_STAAT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'burgerlijke_staat_id';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_SAMENWONEND)) {
            $modifiedColumns[':p' . $index++]  = 'samenwonend';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_REMIGRATIE)) {
            $modifiedColumns[':p' . $index++]  = 'partner_remigratie';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_WW_START)) {
            $modifiedColumns[':p' . $index++]  = 'partner_ww_start';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_SCHULDEN_BIJ_CJIB)) {
            $modifiedColumns[':p' . $index++]  = 'schulden_bij_cjib';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_SCHULDEN_BIJ_BELASTINGDIENST)) {
            $modifiedColumns[':p' . $index++]  = 'schulden_bij_belastingdienst';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_CJIB)) {
            $modifiedColumns[':p' . $index++]  = 'partner_schulden_bij_cjib';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_BELASTINGDIENST)) {
            $modifiedColumns[':p' . $index++]  = 'partner_schulden_bij_belastingdienst';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_VOORLOPIGE_HECHTENIS)) {
            $modifiedColumns[':p' . $index++]  = 'voorlopige_hechtenis';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_VOORLOPIGE_HECHTENIS)) {
            $modifiedColumns[':p' . $index++]  = 'partner_voorlopige_hechtenis';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_BSN)) {
            $modifiedColumns[':p' . $index++]  = 'bsn';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_BSN)) {
            $modifiedColumns[':p' . $index++]  = 'partner_bsn';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_VOORNAAM)) {
            $modifiedColumns[':p' . $index++]  = 'voornaam';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ACHTERNAAM)) {
            $modifiedColumns[':p' . $index++]  = 'achternaam';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_VOORNAAM)) {
            $modifiedColumns[':p' . $index++]  = 'partner_voornaam';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ACHTERNAAM)) {
            $modifiedColumns[':p' . $index++]  = 'partner_achternaam';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_GEBOORTE_DATUM)) {
            $modifiedColumns[':p' . $index++]  = 'partner_geboorte_datum';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ZELFDE_ADRES)) {
            $modifiedColumns[':p' . $index++]  = 'partner_zelfde_adres';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PROVINCIE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'provincie_id';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_GEMEENTE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'gemeente_id';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_STRAAT)) {
            $modifiedColumns[':p' . $index++]  = 'straat';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_HUISNUMMER)) {
            $modifiedColumns[':p' . $index++]  = 'huisnummer';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_POSTCODE)) {
            $modifiedColumns[':p' . $index++]  = 'postcode';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_PROVINCIE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'partner_provincie_id';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_GEMEENTE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'partner_gemeente_id';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_STRAAT)) {
            $modifiedColumns[':p' . $index++]  = 'partner_straat';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_HUISNUMMER)) {
            $modifiedColumns[':p' . $index++]  = 'partner_huisnummer';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_POSTCODE)) {
            $modifiedColumns[':p' . $index++]  = 'partner_postcode';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WW)) {
            $modifiedColumns[':p' . $index++]  = 'partner_ontvangt_ww';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_BIJSTAND)) {
            $modifiedColumns[':p' . $index++]  = 'partner_ontvangt_bijstand';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAO)) {
            $modifiedColumns[':p' . $index++]  = 'partner_ontvangt_wao';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WIA)) {
            $modifiedColumns[':p' . $index++]  = 'partner_ontvangt_wia';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_AOW)) {
            $modifiedColumns[':p' . $index++]  = 'partner_ontvangt_aow';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAMIL)) {
            $modifiedColumns[':p' . $index++]  = 'partner_ontvangt_wamil';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOZ)) {
            $modifiedColumns[':p' . $index++]  = 'partner_ontvangt_iaoz';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOW)) {
            $modifiedColumns[':p' . $index++]  = 'partner_ontvangt_iaow';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IOW)) {
            $modifiedColumns[':p' . $index++]  = 'partner_ontvangt_iow';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_HEEFT_KINDEREN_JONGER_DAN_18)) {
            $modifiedColumns[':p' . $index++]  = 'heeft_kinderen_jonger_dan_18';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_AANTAL_KINDEREN_JONGER_DAN_18)) {
            $modifiedColumns[':p' . $index++]  = 'aantal_kinderen_jonger_dan_18';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_KINDEREN_ZELFDE_ADRES)) {
            $modifiedColumns[':p' . $index++]  = 'kinderen_zelfde_adres';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_TOEKOMSTIG_ADRES)) {
            $modifiedColumns[':p' . $index++]  = 'toekomstig_adres';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_POST_ONTVANGEN_TOEKOMSTIG_ADRES)) {
            $modifiedColumns[':p' . $index++]  = 'post_ontvangen_toekomstig_adres';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_HEEFT_BANKREKENING_EMIGRATIELAND)) {
            $modifiedColumns[':p' . $index++]  = 'heeft_bankrekening_emigratieland';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_GEGEVENS_NAAR_WAARHEID_INGEVULD)) {
            $modifiedColumns[':p' . $index++]  = 'gegevens_naar_waarheid_ingevuld';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_BEDRAG)) {
            $modifiedColumns[':p' . $index++]  = 'bedrag';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO rem_aanvraag (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'persoon_id':
                        $stmt->bindValue($identifier, $this->persoon_id, PDO::PARAM_INT);
                        break;
                    case 'geboorte_datum':
                        $stmt->bindValue($identifier, $this->geboorte_datum ? $this->geboorte_datum->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'geboorte_land':
                        $stmt->bindValue($identifier, $this->geboorte_land, PDO::PARAM_STR);
                        break;
                    case 'immigratie_datum':
                        $stmt->bindValue($identifier, $this->immigratie_datum ? $this->immigratie_datum->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'heeft_nl_paspoort':
                        $stmt->bindValue($identifier, (int) $this->heeft_nl_paspoort, PDO::PARAM_INT);
                        break;
                    case 'emigratie_land':
                        $stmt->bindValue($identifier, $this->emigratie_land, PDO::PARAM_STR);
                        break;
                    case 'emigratie_verblijfsvergunning':
                        $stmt->bindValue($identifier, (int) $this->emigratie_verblijfsvergunning, PDO::PARAM_INT);
                        break;
                    case 'partner_emigratie_verblijfsvergunning':
                        $stmt->bindValue($identifier, (int) $this->partner_emigratie_verblijfsvergunning, PDO::PARAM_INT);
                        break;
                    case 'ontvangt_ww':
                        $stmt->bindValue($identifier, (int) $this->ontvangt_ww, PDO::PARAM_INT);
                        break;
                    case 'ontvangt_bijstand':
                        $stmt->bindValue($identifier, (int) $this->ontvangt_bijstand, PDO::PARAM_INT);
                        break;
                    case 'ontvangt_wao':
                        $stmt->bindValue($identifier, (int) $this->ontvangt_wao, PDO::PARAM_INT);
                        break;
                    case 'ontvangt_wia':
                        $stmt->bindValue($identifier, (int) $this->ontvangt_wia, PDO::PARAM_INT);
                        break;
                    case 'ontvangt_aow':
                        $stmt->bindValue($identifier, (int) $this->ontvangt_aow, PDO::PARAM_INT);
                        break;
                    case 'ontvangt_wamil':
                        $stmt->bindValue($identifier, (int) $this->ontvangt_wamil, PDO::PARAM_INT);
                        break;
                    case 'ontvangt_iaoz':
                        $stmt->bindValue($identifier, (int) $this->ontvangt_iaoz, PDO::PARAM_INT);
                        break;
                    case 'ontvangt_iaow':
                        $stmt->bindValue($identifier, (int) $this->ontvangt_iaow, PDO::PARAM_INT);
                        break;
                    case 'ontvangt_iow':
                        $stmt->bindValue($identifier, (int) $this->ontvangt_iow, PDO::PARAM_INT);
                        break;
                    case 'start_ww':
                        $stmt->bindValue($identifier, $this->start_ww ? $this->start_ww->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'bezwaar_of_beroep_uitkeringsinstantie':
                        $stmt->bindValue($identifier, (int) $this->bezwaar_of_beroep_uitkeringsinstantie, PDO::PARAM_INT);
                        break;
                    case 'burgerlijke_staat_id':
                        $stmt->bindValue($identifier, $this->burgerlijke_staat_id, PDO::PARAM_INT);
                        break;
                    case 'samenwonend':
                        $stmt->bindValue($identifier, (int) $this->samenwonend, PDO::PARAM_INT);
                        break;
                    case 'partner_remigratie':
                        $stmt->bindValue($identifier, (int) $this->partner_remigratie, PDO::PARAM_INT);
                        break;
                    case 'partner_ww_start':
                        $stmt->bindValue($identifier, $this->partner_ww_start ? $this->partner_ww_start->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'schulden_bij_cjib':
                        $stmt->bindValue($identifier, (int) $this->schulden_bij_cjib, PDO::PARAM_INT);
                        break;
                    case 'schulden_bij_belastingdienst':
                        $stmt->bindValue($identifier, (int) $this->schulden_bij_belastingdienst, PDO::PARAM_INT);
                        break;
                    case 'partner_schulden_bij_cjib':
                        $stmt->bindValue($identifier, (int) $this->partner_schulden_bij_cjib, PDO::PARAM_INT);
                        break;
                    case 'partner_schulden_bij_belastingdienst':
                        $stmt->bindValue($identifier, (int) $this->partner_schulden_bij_belastingdienst, PDO::PARAM_INT);
                        break;
                    case 'voorlopige_hechtenis':
                        $stmt->bindValue($identifier, (int) $this->voorlopige_hechtenis, PDO::PARAM_INT);
                        break;
                    case 'partner_voorlopige_hechtenis':
                        $stmt->bindValue($identifier, (int) $this->partner_voorlopige_hechtenis, PDO::PARAM_INT);
                        break;
                    case 'bsn':
                        $stmt->bindValue($identifier, $this->bsn, PDO::PARAM_STR);
                        break;
                    case 'partner_bsn':
                        $stmt->bindValue($identifier, $this->partner_bsn, PDO::PARAM_STR);
                        break;
                    case 'voornaam':
                        $stmt->bindValue($identifier, $this->voornaam, PDO::PARAM_STR);
                        break;
                    case 'achternaam':
                        $stmt->bindValue($identifier, $this->achternaam, PDO::PARAM_STR);
                        break;
                    case 'partner_voornaam':
                        $stmt->bindValue($identifier, $this->partner_voornaam, PDO::PARAM_STR);
                        break;
                    case 'partner_achternaam':
                        $stmt->bindValue($identifier, $this->partner_achternaam, PDO::PARAM_STR);
                        break;
                    case 'partner_geboorte_datum':
                        $stmt->bindValue($identifier, $this->partner_geboorte_datum ? $this->partner_geboorte_datum->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'partner_zelfde_adres':
                        $stmt->bindValue($identifier, (int) $this->partner_zelfde_adres, PDO::PARAM_INT);
                        break;
                    case 'provincie_id':
                        $stmt->bindValue($identifier, $this->provincie_id, PDO::PARAM_INT);
                        break;
                    case 'gemeente_id':
                        $stmt->bindValue($identifier, $this->gemeente_id, PDO::PARAM_INT);
                        break;
                    case 'straat':
                        $stmt->bindValue($identifier, $this->straat, PDO::PARAM_STR);
                        break;
                    case 'huisnummer':
                        $stmt->bindValue($identifier, $this->huisnummer, PDO::PARAM_STR);
                        break;
                    case 'postcode':
                        $stmt->bindValue($identifier, $this->postcode, PDO::PARAM_STR);
                        break;
                    case 'partner_provincie_id':
                        $stmt->bindValue($identifier, $this->partner_provincie_id, PDO::PARAM_INT);
                        break;
                    case 'partner_gemeente_id':
                        $stmt->bindValue($identifier, $this->partner_gemeente_id, PDO::PARAM_INT);
                        break;
                    case 'partner_straat':
                        $stmt->bindValue($identifier, $this->partner_straat, PDO::PARAM_STR);
                        break;
                    case 'partner_huisnummer':
                        $stmt->bindValue($identifier, $this->partner_huisnummer, PDO::PARAM_STR);
                        break;
                    case 'partner_postcode':
                        $stmt->bindValue($identifier, $this->partner_postcode, PDO::PARAM_STR);
                        break;
                    case 'partner_ontvangt_ww':
                        $stmt->bindValue($identifier, (int) $this->partner_ontvangt_ww, PDO::PARAM_INT);
                        break;
                    case 'partner_ontvangt_bijstand':
                        $stmt->bindValue($identifier, (int) $this->partner_ontvangt_bijstand, PDO::PARAM_INT);
                        break;
                    case 'partner_ontvangt_wao':
                        $stmt->bindValue($identifier, (int) $this->partner_ontvangt_wao, PDO::PARAM_INT);
                        break;
                    case 'partner_ontvangt_wia':
                        $stmt->bindValue($identifier, (int) $this->partner_ontvangt_wia, PDO::PARAM_INT);
                        break;
                    case 'partner_ontvangt_aow':
                        $stmt->bindValue($identifier, (int) $this->partner_ontvangt_aow, PDO::PARAM_INT);
                        break;
                    case 'partner_ontvangt_wamil':
                        $stmt->bindValue($identifier, (int) $this->partner_ontvangt_wamil, PDO::PARAM_INT);
                        break;
                    case 'partner_ontvangt_iaoz':
                        $stmt->bindValue($identifier, (int) $this->partner_ontvangt_iaoz, PDO::PARAM_INT);
                        break;
                    case 'partner_ontvangt_iaow':
                        $stmt->bindValue($identifier, (int) $this->partner_ontvangt_iaow, PDO::PARAM_INT);
                        break;
                    case 'partner_ontvangt_iow':
                        $stmt->bindValue($identifier, (int) $this->partner_ontvangt_iow, PDO::PARAM_INT);
                        break;
                    case 'heeft_kinderen_jonger_dan_18':
                        $stmt->bindValue($identifier, (int) $this->heeft_kinderen_jonger_dan_18, PDO::PARAM_INT);
                        break;
                    case 'aantal_kinderen_jonger_dan_18':
                        $stmt->bindValue($identifier, $this->aantal_kinderen_jonger_dan_18, PDO::PARAM_INT);
                        break;
                    case 'kinderen_zelfde_adres':
                        $stmt->bindValue($identifier, (int) $this->kinderen_zelfde_adres, PDO::PARAM_INT);
                        break;
                    case 'toekomstig_adres':
                        $stmt->bindValue($identifier, $this->toekomstig_adres, PDO::PARAM_STR);
                        break;
                    case 'post_ontvangen_toekomstig_adres':
                        $stmt->bindValue($identifier, (int) $this->post_ontvangen_toekomstig_adres, PDO::PARAM_INT);
                        break;
                    case 'heeft_bankrekening_emigratieland':
                        $stmt->bindValue($identifier, (int) $this->heeft_bankrekening_emigratieland, PDO::PARAM_INT);
                        break;
                    case 'gegevens_naar_waarheid_ingevuld':
                        $stmt->bindValue($identifier, (int) $this->gegevens_naar_waarheid_ingevuld, PDO::PARAM_INT);
                        break;
                    case 'bedrag':
                        $stmt->bindValue($identifier, $this->bedrag, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = RemAanvraagTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getPersoonId();
                break;
            case 2:
                return $this->getGeboorteDatum();
                break;
            case 3:
                return $this->getGeboorteLand();
                break;
            case 4:
                return $this->getImmigratieDatum();
                break;
            case 5:
                return $this->getHeeftNlPaspoort();
                break;
            case 6:
                return $this->getEmigratieLand();
                break;
            case 7:
                return $this->getEmigratieVerblijfsvergunning();
                break;
            case 8:
                return $this->getPartnerEmigratieVerblijfsvergunning();
                break;
            case 9:
                return $this->getOntvangtWw();
                break;
            case 10:
                return $this->getOntvangtBijstand();
                break;
            case 11:
                return $this->getOntvangtWao();
                break;
            case 12:
                return $this->getOntvangtWia();
                break;
            case 13:
                return $this->getOntvangtAow();
                break;
            case 14:
                return $this->getOntvangtWamil();
                break;
            case 15:
                return $this->getOntvangtIaoz();
                break;
            case 16:
                return $this->getOntvangtIaow();
                break;
            case 17:
                return $this->getOntvangtIow();
                break;
            case 18:
                return $this->getStartWw();
                break;
            case 19:
                return $this->getBezwaarOfBeroepUitkeringsinstantie();
                break;
            case 20:
                return $this->getBurgerlijkeStaatId();
                break;
            case 21:
                return $this->getSamenwonend();
                break;
            case 22:
                return $this->getPartnerRemigratie();
                break;
            case 23:
                return $this->getPartnerWwStart();
                break;
            case 24:
                return $this->getSchuldenBijCjib();
                break;
            case 25:
                return $this->getSchuldenBijBelastingdienst();
                break;
            case 26:
                return $this->getPartnerSchuldenBijCjib();
                break;
            case 27:
                return $this->getPartnerSchuldenBijBelastingdienst();
                break;
            case 28:
                return $this->getVoorlopigeHechtenis();
                break;
            case 29:
                return $this->getPartnerVoorlopigeHechtenis();
                break;
            case 30:
                return $this->getBsn();
                break;
            case 31:
                return $this->getPartnerBsn();
                break;
            case 32:
                return $this->getVoornaam();
                break;
            case 33:
                return $this->getAchternaam();
                break;
            case 34:
                return $this->getPartnerVoornaam();
                break;
            case 35:
                return $this->getPartnerAchternaam();
                break;
            case 36:
                return $this->getPartnerGeboorteDatum();
                break;
            case 37:
                return $this->getPartnerZelfdeAdres();
                break;
            case 38:
                return $this->getProvincieId();
                break;
            case 39:
                return $this->getGemeenteId();
                break;
            case 40:
                return $this->getStraat();
                break;
            case 41:
                return $this->getHuisnummer();
                break;
            case 42:
                return $this->getPostcode();
                break;
            case 43:
                return $this->getPartnerProvincieId();
                break;
            case 44:
                return $this->getPartnerGemeenteId();
                break;
            case 45:
                return $this->getPartnerStraat();
                break;
            case 46:
                return $this->getPartnerHuisnummer();
                break;
            case 47:
                return $this->getPartnerPostcode();
                break;
            case 48:
                return $this->getPartnerOntvangtWw();
                break;
            case 49:
                return $this->getPartnerOntvangtBijstand();
                break;
            case 50:
                return $this->getPartnerOntvangtWao();
                break;
            case 51:
                return $this->getPartnerOntvangtWia();
                break;
            case 52:
                return $this->getPartnerOntvangtAow();
                break;
            case 53:
                return $this->getPartnerOntvangtWamil();
                break;
            case 54:
                return $this->getPartnerOntvangtIaoz();
                break;
            case 55:
                return $this->getPartnerOntvangtIaow();
                break;
            case 56:
                return $this->getPartnerOntvangtIow();
                break;
            case 57:
                return $this->getHeeftKinderenJongerDan18();
                break;
            case 58:
                return $this->getAantalKinderenJongerDan18();
                break;
            case 59:
                return $this->getKinderenZelfdeAdres();
                break;
            case 60:
                return $this->getToekomstigAdres();
                break;
            case 61:
                return $this->getPostOntvangenToekomstigAdres();
                break;
            case 62:
                return $this->getHeeftBankrekeningEmigratieland();
                break;
            case 63:
                return $this->getGegevensNaarWaarheidIngevuld();
                break;
            case 64:
                return $this->getBedrag();
                break;
            case 65:
                return $this->getCreatedAt();
                break;
            case 66:
                return $this->getUpdatedAt();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['RemAanvraag'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RemAanvraag'][$this->hashCode()] = true;
        $keys = RemAanvraagTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getPersoonId(),
            $keys[2] => $this->getGeboorteDatum(),
            $keys[3] => $this->getGeboorteLand(),
            $keys[4] => $this->getImmigratieDatum(),
            $keys[5] => $this->getHeeftNlPaspoort(),
            $keys[6] => $this->getEmigratieLand(),
            $keys[7] => $this->getEmigratieVerblijfsvergunning(),
            $keys[8] => $this->getPartnerEmigratieVerblijfsvergunning(),
            $keys[9] => $this->getOntvangtWw(),
            $keys[10] => $this->getOntvangtBijstand(),
            $keys[11] => $this->getOntvangtWao(),
            $keys[12] => $this->getOntvangtWia(),
            $keys[13] => $this->getOntvangtAow(),
            $keys[14] => $this->getOntvangtWamil(),
            $keys[15] => $this->getOntvangtIaoz(),
            $keys[16] => $this->getOntvangtIaow(),
            $keys[17] => $this->getOntvangtIow(),
            $keys[18] => $this->getStartWw(),
            $keys[19] => $this->getBezwaarOfBeroepUitkeringsinstantie(),
            $keys[20] => $this->getBurgerlijkeStaatId(),
            $keys[21] => $this->getSamenwonend(),
            $keys[22] => $this->getPartnerRemigratie(),
            $keys[23] => $this->getPartnerWwStart(),
            $keys[24] => $this->getSchuldenBijCjib(),
            $keys[25] => $this->getSchuldenBijBelastingdienst(),
            $keys[26] => $this->getPartnerSchuldenBijCjib(),
            $keys[27] => $this->getPartnerSchuldenBijBelastingdienst(),
            $keys[28] => $this->getVoorlopigeHechtenis(),
            $keys[29] => $this->getPartnerVoorlopigeHechtenis(),
            $keys[30] => $this->getBsn(),
            $keys[31] => $this->getPartnerBsn(),
            $keys[32] => $this->getVoornaam(),
            $keys[33] => $this->getAchternaam(),
            $keys[34] => $this->getPartnerVoornaam(),
            $keys[35] => $this->getPartnerAchternaam(),
            $keys[36] => $this->getPartnerGeboorteDatum(),
            $keys[37] => $this->getPartnerZelfdeAdres(),
            $keys[38] => $this->getProvincieId(),
            $keys[39] => $this->getGemeenteId(),
            $keys[40] => $this->getStraat(),
            $keys[41] => $this->getHuisnummer(),
            $keys[42] => $this->getPostcode(),
            $keys[43] => $this->getPartnerProvincieId(),
            $keys[44] => $this->getPartnerGemeenteId(),
            $keys[45] => $this->getPartnerStraat(),
            $keys[46] => $this->getPartnerHuisnummer(),
            $keys[47] => $this->getPartnerPostcode(),
            $keys[48] => $this->getPartnerOntvangtWw(),
            $keys[49] => $this->getPartnerOntvangtBijstand(),
            $keys[50] => $this->getPartnerOntvangtWao(),
            $keys[51] => $this->getPartnerOntvangtWia(),
            $keys[52] => $this->getPartnerOntvangtAow(),
            $keys[53] => $this->getPartnerOntvangtWamil(),
            $keys[54] => $this->getPartnerOntvangtIaoz(),
            $keys[55] => $this->getPartnerOntvangtIaow(),
            $keys[56] => $this->getPartnerOntvangtIow(),
            $keys[57] => $this->getHeeftKinderenJongerDan18(),
            $keys[58] => $this->getAantalKinderenJongerDan18(),
            $keys[59] => $this->getKinderenZelfdeAdres(),
            $keys[60] => $this->getToekomstigAdres(),
            $keys[61] => $this->getPostOntvangenToekomstigAdres(),
            $keys[62] => $this->getHeeftBankrekeningEmigratieland(),
            $keys[63] => $this->getGegevensNaarWaarheidIngevuld(),
            $keys[64] => $this->getBedrag(),
            $keys[65] => $this->getCreatedAt(),
            $keys[66] => $this->getUpdatedAt(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        if ($result[$keys[18]] instanceof \DateTimeInterface) {
            $result[$keys[18]] = $result[$keys[18]]->format('c');
        }

        if ($result[$keys[23]] instanceof \DateTimeInterface) {
            $result[$keys[23]] = $result[$keys[23]]->format('c');
        }

        if ($result[$keys[36]] instanceof \DateTimeInterface) {
            $result[$keys[36]] = $result[$keys[36]]->format('c');
        }

        if ($result[$keys[65]] instanceof \DateTimeInterface) {
            $result[$keys[65]] = $result[$keys[65]]->format('c');
        }

        if ($result[$keys[66]] instanceof \DateTimeInterface) {
            $result[$keys[66]] = $result[$keys[66]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aPersoon) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'persoon';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'persoon';
                        break;
                    default:
                        $key = 'Persoon';
                }

                $result[$key] = $this->aPersoon->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = RemAanvraagTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setPersoonId($value);
                break;
            case 2:
                $this->setGeboorteDatum($value);
                break;
            case 3:
                $this->setGeboorteLand($value);
                break;
            case 4:
                $this->setImmigratieDatum($value);
                break;
            case 5:
                $this->setHeeftNlPaspoort($value);
                break;
            case 6:
                $this->setEmigratieLand($value);
                break;
            case 7:
                $this->setEmigratieVerblijfsvergunning($value);
                break;
            case 8:
                $this->setPartnerEmigratieVerblijfsvergunning($value);
                break;
            case 9:
                $this->setOntvangtWw($value);
                break;
            case 10:
                $this->setOntvangtBijstand($value);
                break;
            case 11:
                $this->setOntvangtWao($value);
                break;
            case 12:
                $this->setOntvangtWia($value);
                break;
            case 13:
                $this->setOntvangtAow($value);
                break;
            case 14:
                $this->setOntvangtWamil($value);
                break;
            case 15:
                $this->setOntvangtIaoz($value);
                break;
            case 16:
                $this->setOntvangtIaow($value);
                break;
            case 17:
                $this->setOntvangtIow($value);
                break;
            case 18:
                $this->setStartWw($value);
                break;
            case 19:
                $this->setBezwaarOfBeroepUitkeringsinstantie($value);
                break;
            case 20:
                $this->setBurgerlijkeStaatId($value);
                break;
            case 21:
                $this->setSamenwonend($value);
                break;
            case 22:
                $this->setPartnerRemigratie($value);
                break;
            case 23:
                $this->setPartnerWwStart($value);
                break;
            case 24:
                $this->setSchuldenBijCjib($value);
                break;
            case 25:
                $this->setSchuldenBijBelastingdienst($value);
                break;
            case 26:
                $this->setPartnerSchuldenBijCjib($value);
                break;
            case 27:
                $this->setPartnerSchuldenBijBelastingdienst($value);
                break;
            case 28:
                $this->setVoorlopigeHechtenis($value);
                break;
            case 29:
                $this->setPartnerVoorlopigeHechtenis($value);
                break;
            case 30:
                $this->setBsn($value);
                break;
            case 31:
                $this->setPartnerBsn($value);
                break;
            case 32:
                $this->setVoornaam($value);
                break;
            case 33:
                $this->setAchternaam($value);
                break;
            case 34:
                $this->setPartnerVoornaam($value);
                break;
            case 35:
                $this->setPartnerAchternaam($value);
                break;
            case 36:
                $this->setPartnerGeboorteDatum($value);
                break;
            case 37:
                $this->setPartnerZelfdeAdres($value);
                break;
            case 38:
                $this->setProvincieId($value);
                break;
            case 39:
                $this->setGemeenteId($value);
                break;
            case 40:
                $this->setStraat($value);
                break;
            case 41:
                $this->setHuisnummer($value);
                break;
            case 42:
                $this->setPostcode($value);
                break;
            case 43:
                $this->setPartnerProvincieId($value);
                break;
            case 44:
                $this->setPartnerGemeenteId($value);
                break;
            case 45:
                $this->setPartnerStraat($value);
                break;
            case 46:
                $this->setPartnerHuisnummer($value);
                break;
            case 47:
                $this->setPartnerPostcode($value);
                break;
            case 48:
                $this->setPartnerOntvangtWw($value);
                break;
            case 49:
                $this->setPartnerOntvangtBijstand($value);
                break;
            case 50:
                $this->setPartnerOntvangtWao($value);
                break;
            case 51:
                $this->setPartnerOntvangtWia($value);
                break;
            case 52:
                $this->setPartnerOntvangtAow($value);
                break;
            case 53:
                $this->setPartnerOntvangtWamil($value);
                break;
            case 54:
                $this->setPartnerOntvangtIaoz($value);
                break;
            case 55:
                $this->setPartnerOntvangtIaow($value);
                break;
            case 56:
                $this->setPartnerOntvangtIow($value);
                break;
            case 57:
                $this->setHeeftKinderenJongerDan18($value);
                break;
            case 58:
                $this->setAantalKinderenJongerDan18($value);
                break;
            case 59:
                $this->setKinderenZelfdeAdres($value);
                break;
            case 60:
                $this->setToekomstigAdres($value);
                break;
            case 61:
                $this->setPostOntvangenToekomstigAdres($value);
                break;
            case 62:
                $this->setHeeftBankrekeningEmigratieland($value);
                break;
            case 63:
                $this->setGegevensNaarWaarheidIngevuld($value);
                break;
            case 64:
                $this->setBedrag($value);
                break;
            case 65:
                $this->setCreatedAt($value);
                break;
            case 66:
                $this->setUpdatedAt($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = RemAanvraagTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setPersoonId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setGeboorteDatum($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setGeboorteLand($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setImmigratieDatum($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setHeeftNlPaspoort($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEmigratieLand($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setEmigratieVerblijfsvergunning($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPartnerEmigratieVerblijfsvergunning($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setOntvangtWw($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setOntvangtBijstand($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setOntvangtWao($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setOntvangtWia($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setOntvangtAow($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setOntvangtWamil($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setOntvangtIaoz($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setOntvangtIaow($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setOntvangtIow($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setStartWw($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setBezwaarOfBeroepUitkeringsinstantie($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setBurgerlijkeStaatId($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setSamenwonend($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setPartnerRemigratie($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setPartnerWwStart($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setSchuldenBijCjib($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setSchuldenBijBelastingdienst($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setPartnerSchuldenBijCjib($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setPartnerSchuldenBijBelastingdienst($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setVoorlopigeHechtenis($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setPartnerVoorlopigeHechtenis($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setBsn($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setPartnerBsn($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setVoornaam($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setAchternaam($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setPartnerVoornaam($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setPartnerAchternaam($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setPartnerGeboorteDatum($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setPartnerZelfdeAdres($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setProvincieId($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setGemeenteId($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setStraat($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setHuisnummer($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setPostcode($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setPartnerProvincieId($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setPartnerGemeenteId($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setPartnerStraat($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setPartnerHuisnummer($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setPartnerPostcode($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setPartnerOntvangtWw($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setPartnerOntvangtBijstand($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setPartnerOntvangtWao($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setPartnerOntvangtWia($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setPartnerOntvangtAow($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setPartnerOntvangtWamil($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setPartnerOntvangtIaoz($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setPartnerOntvangtIaow($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setPartnerOntvangtIow($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setHeeftKinderenJongerDan18($arr[$keys[57]]);
        }
        if (array_key_exists($keys[58], $arr)) {
            $this->setAantalKinderenJongerDan18($arr[$keys[58]]);
        }
        if (array_key_exists($keys[59], $arr)) {
            $this->setKinderenZelfdeAdres($arr[$keys[59]]);
        }
        if (array_key_exists($keys[60], $arr)) {
            $this->setToekomstigAdres($arr[$keys[60]]);
        }
        if (array_key_exists($keys[61], $arr)) {
            $this->setPostOntvangenToekomstigAdres($arr[$keys[61]]);
        }
        if (array_key_exists($keys[62], $arr)) {
            $this->setHeeftBankrekeningEmigratieland($arr[$keys[62]]);
        }
        if (array_key_exists($keys[63], $arr)) {
            $this->setGegevensNaarWaarheidIngevuld($arr[$keys[63]]);
        }
        if (array_key_exists($keys[64], $arr)) {
            $this->setBedrag($arr[$keys[64]]);
        }
        if (array_key_exists($keys[65], $arr)) {
            $this->setCreatedAt($arr[$keys[65]]);
        }
        if (array_key_exists($keys[66], $arr)) {
            $this->setUpdatedAt($arr[$keys[66]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RemAanvraagTableMap::DATABASE_NAME);

        if ($this->isColumnModified(RemAanvraagTableMap::COL_ID)) {
            $criteria->add(RemAanvraagTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PERSOON_ID)) {
            $criteria->add(RemAanvraagTableMap::COL_PERSOON_ID, $this->persoon_id);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_GEBOORTE_DATUM)) {
            $criteria->add(RemAanvraagTableMap::COL_GEBOORTE_DATUM, $this->geboorte_datum);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_GEBOORTE_LAND)) {
            $criteria->add(RemAanvraagTableMap::COL_GEBOORTE_LAND, $this->geboorte_land);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_IMMIGRATIE_DATUM)) {
            $criteria->add(RemAanvraagTableMap::COL_IMMIGRATIE_DATUM, $this->immigratie_datum);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_HEEFT_NL_PASPOORT)) {
            $criteria->add(RemAanvraagTableMap::COL_HEEFT_NL_PASPOORT, $this->heeft_nl_paspoort);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_EMIGRATIE_LAND)) {
            $criteria->add(RemAanvraagTableMap::COL_EMIGRATIE_LAND, $this->emigratie_land);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING)) {
            $criteria->add(RemAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING, $this->emigratie_verblijfsvergunning);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING, $this->partner_emigratie_verblijfsvergunning);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_WW)) {
            $criteria->add(RemAanvraagTableMap::COL_ONTVANGT_WW, $this->ontvangt_ww);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_BIJSTAND)) {
            $criteria->add(RemAanvraagTableMap::COL_ONTVANGT_BIJSTAND, $this->ontvangt_bijstand);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_WAO)) {
            $criteria->add(RemAanvraagTableMap::COL_ONTVANGT_WAO, $this->ontvangt_wao);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_WIA)) {
            $criteria->add(RemAanvraagTableMap::COL_ONTVANGT_WIA, $this->ontvangt_wia);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_AOW)) {
            $criteria->add(RemAanvraagTableMap::COL_ONTVANGT_AOW, $this->ontvangt_aow);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_WAMIL)) {
            $criteria->add(RemAanvraagTableMap::COL_ONTVANGT_WAMIL, $this->ontvangt_wamil);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_IAOZ)) {
            $criteria->add(RemAanvraagTableMap::COL_ONTVANGT_IAOZ, $this->ontvangt_iaoz);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_IAOW)) {
            $criteria->add(RemAanvraagTableMap::COL_ONTVANGT_IAOW, $this->ontvangt_iaow);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ONTVANGT_IOW)) {
            $criteria->add(RemAanvraagTableMap::COL_ONTVANGT_IOW, $this->ontvangt_iow);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_START_WW)) {
            $criteria->add(RemAanvraagTableMap::COL_START_WW, $this->start_ww);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_BEZWAAR_OF_BEROEP_UITKERINGSINSTANTIE)) {
            $criteria->add(RemAanvraagTableMap::COL_BEZWAAR_OF_BEROEP_UITKERINGSINSTANTIE, $this->bezwaar_of_beroep_uitkeringsinstantie);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_BURGERLIJKE_STAAT_ID)) {
            $criteria->add(RemAanvraagTableMap::COL_BURGERLIJKE_STAAT_ID, $this->burgerlijke_staat_id);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_SAMENWONEND)) {
            $criteria->add(RemAanvraagTableMap::COL_SAMENWONEND, $this->samenwonend);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_REMIGRATIE)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_REMIGRATIE, $this->partner_remigratie);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_WW_START)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_WW_START, $this->partner_ww_start);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_SCHULDEN_BIJ_CJIB)) {
            $criteria->add(RemAanvraagTableMap::COL_SCHULDEN_BIJ_CJIB, $this->schulden_bij_cjib);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_SCHULDEN_BIJ_BELASTINGDIENST)) {
            $criteria->add(RemAanvraagTableMap::COL_SCHULDEN_BIJ_BELASTINGDIENST, $this->schulden_bij_belastingdienst);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_CJIB)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_CJIB, $this->partner_schulden_bij_cjib);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_BELASTINGDIENST)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_SCHULDEN_BIJ_BELASTINGDIENST, $this->partner_schulden_bij_belastingdienst);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_VOORLOPIGE_HECHTENIS)) {
            $criteria->add(RemAanvraagTableMap::COL_VOORLOPIGE_HECHTENIS, $this->voorlopige_hechtenis);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_VOORLOPIGE_HECHTENIS)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_VOORLOPIGE_HECHTENIS, $this->partner_voorlopige_hechtenis);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_BSN)) {
            $criteria->add(RemAanvraagTableMap::COL_BSN, $this->bsn);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_BSN)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_BSN, $this->partner_bsn);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_VOORNAAM)) {
            $criteria->add(RemAanvraagTableMap::COL_VOORNAAM, $this->voornaam);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_ACHTERNAAM)) {
            $criteria->add(RemAanvraagTableMap::COL_ACHTERNAAM, $this->achternaam);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_VOORNAAM)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_VOORNAAM, $this->partner_voornaam);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ACHTERNAAM)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ACHTERNAAM, $this->partner_achternaam);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_GEBOORTE_DATUM)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_GEBOORTE_DATUM, $this->partner_geboorte_datum);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ZELFDE_ADRES)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ZELFDE_ADRES, $this->partner_zelfde_adres);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PROVINCIE_ID)) {
            $criteria->add(RemAanvraagTableMap::COL_PROVINCIE_ID, $this->provincie_id);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_GEMEENTE_ID)) {
            $criteria->add(RemAanvraagTableMap::COL_GEMEENTE_ID, $this->gemeente_id);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_STRAAT)) {
            $criteria->add(RemAanvraagTableMap::COL_STRAAT, $this->straat);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_HUISNUMMER)) {
            $criteria->add(RemAanvraagTableMap::COL_HUISNUMMER, $this->huisnummer);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_POSTCODE)) {
            $criteria->add(RemAanvraagTableMap::COL_POSTCODE, $this->postcode);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_PROVINCIE_ID)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_PROVINCIE_ID, $this->partner_provincie_id);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_GEMEENTE_ID)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_GEMEENTE_ID, $this->partner_gemeente_id);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_STRAAT)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_STRAAT, $this->partner_straat);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_HUISNUMMER)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_HUISNUMMER, $this->partner_huisnummer);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_POSTCODE)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_POSTCODE, $this->partner_postcode);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WW)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WW, $this->partner_ontvangt_ww);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_BIJSTAND)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_BIJSTAND, $this->partner_ontvangt_bijstand);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAO)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAO, $this->partner_ontvangt_wao);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WIA)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WIA, $this->partner_ontvangt_wia);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_AOW)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_AOW, $this->partner_ontvangt_aow);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAMIL)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_WAMIL, $this->partner_ontvangt_wamil);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOZ)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOZ, $this->partner_ontvangt_iaoz);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOW)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IAOW, $this->partner_ontvangt_iaow);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IOW)) {
            $criteria->add(RemAanvraagTableMap::COL_PARTNER_ONTVANGT_IOW, $this->partner_ontvangt_iow);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_HEEFT_KINDEREN_JONGER_DAN_18)) {
            $criteria->add(RemAanvraagTableMap::COL_HEEFT_KINDEREN_JONGER_DAN_18, $this->heeft_kinderen_jonger_dan_18);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_AANTAL_KINDEREN_JONGER_DAN_18)) {
            $criteria->add(RemAanvraagTableMap::COL_AANTAL_KINDEREN_JONGER_DAN_18, $this->aantal_kinderen_jonger_dan_18);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_KINDEREN_ZELFDE_ADRES)) {
            $criteria->add(RemAanvraagTableMap::COL_KINDEREN_ZELFDE_ADRES, $this->kinderen_zelfde_adres);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_TOEKOMSTIG_ADRES)) {
            $criteria->add(RemAanvraagTableMap::COL_TOEKOMSTIG_ADRES, $this->toekomstig_adres);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_POST_ONTVANGEN_TOEKOMSTIG_ADRES)) {
            $criteria->add(RemAanvraagTableMap::COL_POST_ONTVANGEN_TOEKOMSTIG_ADRES, $this->post_ontvangen_toekomstig_adres);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_HEEFT_BANKREKENING_EMIGRATIELAND)) {
            $criteria->add(RemAanvraagTableMap::COL_HEEFT_BANKREKENING_EMIGRATIELAND, $this->heeft_bankrekening_emigratieland);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_GEGEVENS_NAAR_WAARHEID_INGEVULD)) {
            $criteria->add(RemAanvraagTableMap::COL_GEGEVENS_NAAR_WAARHEID_INGEVULD, $this->gegevens_naar_waarheid_ingevuld);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_BEDRAG)) {
            $criteria->add(RemAanvraagTableMap::COL_BEDRAG, $this->bedrag);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_CREATED_AT)) {
            $criteria->add(RemAanvraagTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(RemAanvraagTableMap::COL_UPDATED_AT)) {
            $criteria->add(RemAanvraagTableMap::COL_UPDATED_AT, $this->updated_at);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildRemAanvraagQuery::create();
        $criteria->add(RemAanvraagTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Model\Custom\NovumSvb\RemAanvraag (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPersoonId($this->getPersoonId());
        $copyObj->setGeboorteDatum($this->getGeboorteDatum());
        $copyObj->setGeboorteLand($this->getGeboorteLand());
        $copyObj->setImmigratieDatum($this->getImmigratieDatum());
        $copyObj->setHeeftNlPaspoort($this->getHeeftNlPaspoort());
        $copyObj->setEmigratieLand($this->getEmigratieLand());
        $copyObj->setEmigratieVerblijfsvergunning($this->getEmigratieVerblijfsvergunning());
        $copyObj->setPartnerEmigratieVerblijfsvergunning($this->getPartnerEmigratieVerblijfsvergunning());
        $copyObj->setOntvangtWw($this->getOntvangtWw());
        $copyObj->setOntvangtBijstand($this->getOntvangtBijstand());
        $copyObj->setOntvangtWao($this->getOntvangtWao());
        $copyObj->setOntvangtWia($this->getOntvangtWia());
        $copyObj->setOntvangtAow($this->getOntvangtAow());
        $copyObj->setOntvangtWamil($this->getOntvangtWamil());
        $copyObj->setOntvangtIaoz($this->getOntvangtIaoz());
        $copyObj->setOntvangtIaow($this->getOntvangtIaow());
        $copyObj->setOntvangtIow($this->getOntvangtIow());
        $copyObj->setStartWw($this->getStartWw());
        $copyObj->setBezwaarOfBeroepUitkeringsinstantie($this->getBezwaarOfBeroepUitkeringsinstantie());
        $copyObj->setBurgerlijkeStaatId($this->getBurgerlijkeStaatId());
        $copyObj->setSamenwonend($this->getSamenwonend());
        $copyObj->setPartnerRemigratie($this->getPartnerRemigratie());
        $copyObj->setPartnerWwStart($this->getPartnerWwStart());
        $copyObj->setSchuldenBijCjib($this->getSchuldenBijCjib());
        $copyObj->setSchuldenBijBelastingdienst($this->getSchuldenBijBelastingdienst());
        $copyObj->setPartnerSchuldenBijCjib($this->getPartnerSchuldenBijCjib());
        $copyObj->setPartnerSchuldenBijBelastingdienst($this->getPartnerSchuldenBijBelastingdienst());
        $copyObj->setVoorlopigeHechtenis($this->getVoorlopigeHechtenis());
        $copyObj->setPartnerVoorlopigeHechtenis($this->getPartnerVoorlopigeHechtenis());
        $copyObj->setBsn($this->getBsn());
        $copyObj->setPartnerBsn($this->getPartnerBsn());
        $copyObj->setVoornaam($this->getVoornaam());
        $copyObj->setAchternaam($this->getAchternaam());
        $copyObj->setPartnerVoornaam($this->getPartnerVoornaam());
        $copyObj->setPartnerAchternaam($this->getPartnerAchternaam());
        $copyObj->setPartnerGeboorteDatum($this->getPartnerGeboorteDatum());
        $copyObj->setPartnerZelfdeAdres($this->getPartnerZelfdeAdres());
        $copyObj->setProvincieId($this->getProvincieId());
        $copyObj->setGemeenteId($this->getGemeenteId());
        $copyObj->setStraat($this->getStraat());
        $copyObj->setHuisnummer($this->getHuisnummer());
        $copyObj->setPostcode($this->getPostcode());
        $copyObj->setPartnerProvincieId($this->getPartnerProvincieId());
        $copyObj->setPartnerGemeenteId($this->getPartnerGemeenteId());
        $copyObj->setPartnerStraat($this->getPartnerStraat());
        $copyObj->setPartnerHuisnummer($this->getPartnerHuisnummer());
        $copyObj->setPartnerPostcode($this->getPartnerPostcode());
        $copyObj->setPartnerOntvangtWw($this->getPartnerOntvangtWw());
        $copyObj->setPartnerOntvangtBijstand($this->getPartnerOntvangtBijstand());
        $copyObj->setPartnerOntvangtWao($this->getPartnerOntvangtWao());
        $copyObj->setPartnerOntvangtWia($this->getPartnerOntvangtWia());
        $copyObj->setPartnerOntvangtAow($this->getPartnerOntvangtAow());
        $copyObj->setPartnerOntvangtWamil($this->getPartnerOntvangtWamil());
        $copyObj->setPartnerOntvangtIaoz($this->getPartnerOntvangtIaoz());
        $copyObj->setPartnerOntvangtIaow($this->getPartnerOntvangtIaow());
        $copyObj->setPartnerOntvangtIow($this->getPartnerOntvangtIow());
        $copyObj->setHeeftKinderenJongerDan18($this->getHeeftKinderenJongerDan18());
        $copyObj->setAantalKinderenJongerDan18($this->getAantalKinderenJongerDan18());
        $copyObj->setKinderenZelfdeAdres($this->getKinderenZelfdeAdres());
        $copyObj->setToekomstigAdres($this->getToekomstigAdres());
        $copyObj->setPostOntvangenToekomstigAdres($this->getPostOntvangenToekomstigAdres());
        $copyObj->setHeeftBankrekeningEmigratieland($this->getHeeftBankrekeningEmigratieland());
        $copyObj->setGegevensNaarWaarheidIngevuld($this->getGegevensNaarWaarheidIngevuld());
        $copyObj->setBedrag($this->getBedrag());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Model\Custom\NovumSvb\RemAanvraag Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildPersoon object.
     *
     * @param  ChildPersoon $v
     * @return $this|\Model\Custom\NovumSvb\RemAanvraag The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersoon(ChildPersoon $v = null)
    {
        if ($v === null) {
            $this->setPersoonId(NULL);
        } else {
            $this->setPersoonId($v->getId());
        }

        $this->aPersoon = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPersoon object, it will not be re-added.
        if ($v !== null) {
            $v->addRemAanvraag($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildPersoon object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildPersoon The associated ChildPersoon object.
     * @throws PropelException
     */
    public function getPersoon(ConnectionInterface $con = null)
    {
        if ($this->aPersoon === null && ($this->persoon_id != 0)) {
            $this->aPersoon = ChildPersoonQuery::create()->findPk($this->persoon_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersoon->addRemAanvraags($this);
             */
        }

        return $this->aPersoon;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aPersoon) {
            $this->aPersoon->removeRemAanvraag($this);
        }
        $this->id = null;
        $this->persoon_id = null;
        $this->geboorte_datum = null;
        $this->geboorte_land = null;
        $this->immigratie_datum = null;
        $this->heeft_nl_paspoort = null;
        $this->emigratie_land = null;
        $this->emigratie_verblijfsvergunning = null;
        $this->partner_emigratie_verblijfsvergunning = null;
        $this->ontvangt_ww = null;
        $this->ontvangt_bijstand = null;
        $this->ontvangt_wao = null;
        $this->ontvangt_wia = null;
        $this->ontvangt_aow = null;
        $this->ontvangt_wamil = null;
        $this->ontvangt_iaoz = null;
        $this->ontvangt_iaow = null;
        $this->ontvangt_iow = null;
        $this->start_ww = null;
        $this->bezwaar_of_beroep_uitkeringsinstantie = null;
        $this->burgerlijke_staat_id = null;
        $this->samenwonend = null;
        $this->partner_remigratie = null;
        $this->partner_ww_start = null;
        $this->schulden_bij_cjib = null;
        $this->schulden_bij_belastingdienst = null;
        $this->partner_schulden_bij_cjib = null;
        $this->partner_schulden_bij_belastingdienst = null;
        $this->voorlopige_hechtenis = null;
        $this->partner_voorlopige_hechtenis = null;
        $this->bsn = null;
        $this->partner_bsn = null;
        $this->voornaam = null;
        $this->achternaam = null;
        $this->partner_voornaam = null;
        $this->partner_achternaam = null;
        $this->partner_geboorte_datum = null;
        $this->partner_zelfde_adres = null;
        $this->provincie_id = null;
        $this->gemeente_id = null;
        $this->straat = null;
        $this->huisnummer = null;
        $this->postcode = null;
        $this->partner_provincie_id = null;
        $this->partner_gemeente_id = null;
        $this->partner_straat = null;
        $this->partner_huisnummer = null;
        $this->partner_postcode = null;
        $this->partner_ontvangt_ww = null;
        $this->partner_ontvangt_bijstand = null;
        $this->partner_ontvangt_wao = null;
        $this->partner_ontvangt_wia = null;
        $this->partner_ontvangt_aow = null;
        $this->partner_ontvangt_wamil = null;
        $this->partner_ontvangt_iaoz = null;
        $this->partner_ontvangt_iaow = null;
        $this->partner_ontvangt_iow = null;
        $this->heeft_kinderen_jonger_dan_18 = null;
        $this->aantal_kinderen_jonger_dan_18 = null;
        $this->kinderen_zelfde_adres = null;
        $this->toekomstig_adres = null;
        $this->post_ontvangen_toekomstig_adres = null;
        $this->heeft_bankrekening_emigratieland = null;
        $this->gegevens_naar_waarheid_ingevuld = null;
        $this->bedrag = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

        $this->aPersoon = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RemAanvraagTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildRemAanvraag The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[RemAanvraagTableMap::COL_UPDATED_AT] = true;

        return $this;
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
            }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
