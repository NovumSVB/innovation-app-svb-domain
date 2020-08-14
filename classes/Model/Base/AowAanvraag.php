<?php

namespace Model\Custom\NovumSvb\Base;

use \DateTime;
use \Exception;
use \PDO;
use Model\Custom\NovumSvb\AowAanvraagQuery as ChildAowAanvraagQuery;
use Model\Custom\NovumSvb\Map\AowAanvraagTableMap;
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
 * Base class that represents a row from the 'aow_aanvraag' table.
 *
 *
 *
 * @package    propel.generator.Model.Custom.NovumSvb.Base
 */
abstract class AowAanvraag implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Model\\Custom\\NovumSvb\\Map\\AowAanvraagTableMap';


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
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Model\Custom\NovumSvb\Base\AowAanvraag object.
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
     * Compares this with another <code>AowAanvraag</code> instance.  If
     * <code>obj</code> is an instance of <code>AowAanvraag</code>, delegates to
     * <code>equals(AowAanvraag)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AowAanvraag The current object, for fluid interface
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
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
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
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getGeboorteDatum($format = NULL)
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
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getImmigratieDatum($format = NULL)
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AowAanvraagTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [persoon_id] column.
     *
     * @param int $v new value
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag The current object (for fluent API support)
     */
    public function setPersoonId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->persoon_id !== $v) {
            $this->persoon_id = $v;
            $this->modifiedColumns[AowAanvraagTableMap::COL_PERSOON_ID] = true;
        }

        return $this;
    } // setPersoonId()

    /**
     * Sets the value of [geboorte_datum] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag The current object (for fluent API support)
     */
    public function setGeboorteDatum($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->geboorte_datum !== null || $dt !== null) {
            if ($this->geboorte_datum === null || $dt === null || $dt->format("Y-m-d") !== $this->geboorte_datum->format("Y-m-d")) {
                $this->geboorte_datum = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AowAanvraagTableMap::COL_GEBOORTE_DATUM] = true;
            }
        } // if either are not null

        return $this;
    } // setGeboorteDatum()

    /**
     * Set the value of [geboorte_land] column.
     *
     * @param string $v new value
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag The current object (for fluent API support)
     */
    public function setGeboorteLand($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->geboorte_land !== $v) {
            $this->geboorte_land = $v;
            $this->modifiedColumns[AowAanvraagTableMap::COL_GEBOORTE_LAND] = true;
        }

        return $this;
    } // setGeboorteLand()

    /**
     * Sets the value of [immigratie_datum] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag The current object (for fluent API support)
     */
    public function setImmigratieDatum($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->immigratie_datum !== null || $dt !== null) {
            if ($this->immigratie_datum === null || $dt === null || $dt->format("Y-m-d") !== $this->immigratie_datum->format("Y-m-d")) {
                $this->immigratie_datum = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AowAanvraagTableMap::COL_IMMIGRATIE_DATUM] = true;
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
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag The current object (for fluent API support)
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
            $this->modifiedColumns[AowAanvraagTableMap::COL_HEEFT_NL_PASPOORT] = true;
        }

        return $this;
    } // setHeeftNlPaspoort()

    /**
     * Set the value of [emigratie_land] column.
     *
     * @param string $v new value
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag The current object (for fluent API support)
     */
    public function setEmigratieLand($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->emigratie_land !== $v) {
            $this->emigratie_land = $v;
            $this->modifiedColumns[AowAanvraagTableMap::COL_EMIGRATIE_LAND] = true;
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
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag The current object (for fluent API support)
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
            $this->modifiedColumns[AowAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING] = true;
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
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag The current object (for fluent API support)
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
            $this->modifiedColumns[AowAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING] = true;
        }

        return $this;
    } // setPartnerEmigratieVerblijfsvergunning()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AowAanvraagTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AowAanvraagTableMap::translateFieldName('PersoonId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->persoon_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AowAanvraagTableMap::translateFieldName('GeboorteDatum', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->geboorte_datum = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AowAanvraagTableMap::translateFieldName('GeboorteLand', TableMap::TYPE_PHPNAME, $indexType)];
            $this->geboorte_land = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AowAanvraagTableMap::translateFieldName('ImmigratieDatum', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->immigratie_datum = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AowAanvraagTableMap::translateFieldName('HeeftNlPaspoort', TableMap::TYPE_PHPNAME, $indexType)];
            $this->heeft_nl_paspoort = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AowAanvraagTableMap::translateFieldName('EmigratieLand', TableMap::TYPE_PHPNAME, $indexType)];
            $this->emigratie_land = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AowAanvraagTableMap::translateFieldName('EmigratieVerblijfsvergunning', TableMap::TYPE_PHPNAME, $indexType)];
            $this->emigratie_verblijfsvergunning = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AowAanvraagTableMap::translateFieldName('PartnerEmigratieVerblijfsvergunning', TableMap::TYPE_PHPNAME, $indexType)];
            $this->partner_emigratie_verblijfsvergunning = (null !== $col) ? (boolean) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = AowAanvraagTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Model\\Custom\\NovumSvb\\AowAanvraag'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AowAanvraagTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAowAanvraagQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see AowAanvraag::setDeleted()
     * @see AowAanvraag::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AowAanvraagTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAowAanvraagQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AowAanvraagTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                AowAanvraagTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AowAanvraagTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AowAanvraagTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AowAanvraagTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_PERSOON_ID)) {
            $modifiedColumns[':p' . $index++]  = 'persoon_id';
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_GEBOORTE_DATUM)) {
            $modifiedColumns[':p' . $index++]  = 'geboorte_datum';
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_GEBOORTE_LAND)) {
            $modifiedColumns[':p' . $index++]  = 'geboorte_land';
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_IMMIGRATIE_DATUM)) {
            $modifiedColumns[':p' . $index++]  = 'immigratie_datum';
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_HEEFT_NL_PASPOORT)) {
            $modifiedColumns[':p' . $index++]  = 'heeft_nl_paspoort';
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_EMIGRATIE_LAND)) {
            $modifiedColumns[':p' . $index++]  = 'emigratie_land';
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING)) {
            $modifiedColumns[':p' . $index++]  = 'emigratie_verblijfsvergunning';
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING)) {
            $modifiedColumns[':p' . $index++]  = 'partner_emigratie_verblijfsvergunning';
        }

        $sql = sprintf(
            'INSERT INTO aow_aanvraag (%s) VALUES (%s)',
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
        $pos = AowAanvraagTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['AowAanvraag'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AowAanvraag'][$this->hashCode()] = true;
        $keys = AowAanvraagTableMap::getFieldNames($keyType);
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
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AowAanvraagTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag
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
        $keys = AowAanvraagTableMap::getFieldNames($keyType);

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
     * @return $this|\Model\Custom\NovumSvb\AowAanvraag The current object, for fluid interface
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
        $criteria = new Criteria(AowAanvraagTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AowAanvraagTableMap::COL_ID)) {
            $criteria->add(AowAanvraagTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_PERSOON_ID)) {
            $criteria->add(AowAanvraagTableMap::COL_PERSOON_ID, $this->persoon_id);
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_GEBOORTE_DATUM)) {
            $criteria->add(AowAanvraagTableMap::COL_GEBOORTE_DATUM, $this->geboorte_datum);
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_GEBOORTE_LAND)) {
            $criteria->add(AowAanvraagTableMap::COL_GEBOORTE_LAND, $this->geboorte_land);
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_IMMIGRATIE_DATUM)) {
            $criteria->add(AowAanvraagTableMap::COL_IMMIGRATIE_DATUM, $this->immigratie_datum);
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_HEEFT_NL_PASPOORT)) {
            $criteria->add(AowAanvraagTableMap::COL_HEEFT_NL_PASPOORT, $this->heeft_nl_paspoort);
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_EMIGRATIE_LAND)) {
            $criteria->add(AowAanvraagTableMap::COL_EMIGRATIE_LAND, $this->emigratie_land);
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING)) {
            $criteria->add(AowAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING, $this->emigratie_verblijfsvergunning);
        }
        if ($this->isColumnModified(AowAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING)) {
            $criteria->add(AowAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING, $this->partner_emigratie_verblijfsvergunning);
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
        $criteria = ChildAowAanvraagQuery::create();
        $criteria->add(AowAanvraagTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Model\Custom\NovumSvb\AowAanvraag (or compatible) type.
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
     * @return \Model\Custom\NovumSvb\AowAanvraag Clone of current object.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->persoon_id = null;
        $this->geboorte_datum = null;
        $this->geboorte_land = null;
        $this->immigratie_datum = null;
        $this->heeft_nl_paspoort = null;
        $this->emigratie_land = null;
        $this->emigratie_verblijfsvergunning = null;
        $this->partner_emigratie_verblijfsvergunning = null;
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

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AowAanvraagTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
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
