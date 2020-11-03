<?php

namespace Model\Custom\NovumSvb\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumSvb\Aio as ChildAio;
use Model\Custom\NovumSvb\AioQuery as ChildAioQuery;
use Model\Custom\NovumSvb\Akw as ChildAkw;
use Model\Custom\NovumSvb\AkwQuery as ChildAkwQuery;
use Model\Custom\NovumSvb\Anw as ChildAnw;
use Model\Custom\NovumSvb\AnwQuery as ChildAnwQuery;
use Model\Custom\NovumSvb\Aow as ChildAow;
use Model\Custom\NovumSvb\AowQuery as ChildAowQuery;
use Model\Custom\NovumSvb\Orb as ChildOrb;
use Model\Custom\NovumSvb\OrbQuery as ChildOrbQuery;
use Model\Custom\NovumSvb\Persoon as ChildPersoon;
use Model\Custom\NovumSvb\PersoonQuery as ChildPersoonQuery;
use Model\Custom\NovumSvb\Rbb as ChildRbb;
use Model\Custom\NovumSvb\RbbQuery as ChildRbbQuery;
use Model\Custom\NovumSvb\Rem as ChildRem;
use Model\Custom\NovumSvb\RemAanvraag as ChildRemAanvraag;
use Model\Custom\NovumSvb\RemAanvraagQuery as ChildRemAanvraagQuery;
use Model\Custom\NovumSvb\RemQuery as ChildRemQuery;
use Model\Custom\NovumSvb\Tas as ChildTas;
use Model\Custom\NovumSvb\TasQuery as ChildTasQuery;
use Model\Custom\NovumSvb\Tog as ChildTog;
use Model\Custom\NovumSvb\TogQuery as ChildTogQuery;
use Model\Custom\NovumSvb\Wkb as ChildWkb;
use Model\Custom\NovumSvb\WkbQuery as ChildWkbQuery;
use Model\Custom\NovumSvb\Map\AioTableMap;
use Model\Custom\NovumSvb\Map\AkwTableMap;
use Model\Custom\NovumSvb\Map\AnwTableMap;
use Model\Custom\NovumSvb\Map\AowTableMap;
use Model\Custom\NovumSvb\Map\OrbTableMap;
use Model\Custom\NovumSvb\Map\PersoonTableMap;
use Model\Custom\NovumSvb\Map\RbbTableMap;
use Model\Custom\NovumSvb\Map\RemAanvraagTableMap;
use Model\Custom\NovumSvb\Map\RemTableMap;
use Model\Custom\NovumSvb\Map\TasTableMap;
use Model\Custom\NovumSvb\Map\TogTableMap;
use Model\Custom\NovumSvb\Map\WkbTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'persoon' table.
 *
 *
 *
 * @package    propel.generator.Model.Custom.NovumSvb.Base
 */
abstract class Persoon implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Model\\Custom\\NovumSvb\\Map\\PersoonTableMap';


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
     * The value for the bsn field.
     *
     * @var        string
     */
    protected $bsn;

    /**
     * @var        ObjectCollection|ChildAow[] Collection to store aggregation of ChildAow objects.
     */
    protected $collAows;
    protected $collAowsPartial;

    /**
     * @var        ObjectCollection|ChildAio[] Collection to store aggregation of ChildAio objects.
     */
    protected $collAios;
    protected $collAiosPartial;

    /**
     * @var        ObjectCollection|ChildAkw[] Collection to store aggregation of ChildAkw objects.
     */
    protected $collAkws;
    protected $collAkwsPartial;

    /**
     * @var        ObjectCollection|ChildAnw[] Collection to store aggregation of ChildAnw objects.
     */
    protected $collAnws;
    protected $collAnwsPartial;

    /**
     * @var        ObjectCollection|ChildOrb[] Collection to store aggregation of ChildOrb objects.
     */
    protected $collOrbs;
    protected $collOrbsPartial;

    /**
     * @var        ObjectCollection|ChildRbb[] Collection to store aggregation of ChildRbb objects.
     */
    protected $collRbbs;
    protected $collRbbsPartial;

    /**
     * @var        ObjectCollection|ChildTas[] Collection to store aggregation of ChildTas objects.
     */
    protected $collTass;
    protected $collTassPartial;

    /**
     * @var        ObjectCollection|ChildRem[] Collection to store aggregation of ChildRem objects.
     */
    protected $collRems;
    protected $collRemsPartial;

    /**
     * @var        ObjectCollection|ChildRemAanvraag[] Collection to store aggregation of ChildRemAanvraag objects.
     */
    protected $collRemAanvraags;
    protected $collRemAanvraagsPartial;

    /**
     * @var        ObjectCollection|ChildTog[] Collection to store aggregation of ChildTog objects.
     */
    protected $collTogs;
    protected $collTogsPartial;

    /**
     * @var        ObjectCollection|ChildWkb[] Collection to store aggregation of ChildWkb objects.
     */
    protected $collWkbs;
    protected $collWkbsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAow[]
     */
    protected $aowsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAio[]
     */
    protected $aiosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAkw[]
     */
    protected $akwsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAnw[]
     */
    protected $anwsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildOrb[]
     */
    protected $orbsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildRbb[]
     */
    protected $rbbsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTas[]
     */
    protected $tassScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildRem[]
     */
    protected $remsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildRemAanvraag[]
     */
    protected $remAanvraagsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTog[]
     */
    protected $togsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildWkb[]
     */
    protected $wkbsScheduledForDeletion = null;

    /**
     * Initializes internal state of Model\Custom\NovumSvb\Base\Persoon object.
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
     * Compares this with another <code>Persoon</code> instance.  If
     * <code>obj</code> is an instance of <code>Persoon</code>, delegates to
     * <code>equals(Persoon)</code>.  Otherwise, returns <code>false</code>.
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
     * Get the [bsn] column value.
     *
     * @return string
     */
    public function getBsn()
    {
        return $this->bsn;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v New value
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[PersoonTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [bsn] column.
     *
     * @param string $v New value
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function setBsn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bsn !== $v) {
            $this->bsn = $v;
            $this->modifiedColumns[PersoonTableMap::COL_BSN] = true;
        }

        return $this;
    } // setBsn()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PersoonTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PersoonTableMap::translateFieldName('Bsn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bsn = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 2; // 2 = PersoonTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Model\\Custom\\NovumSvb\\Persoon'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(PersoonTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPersoonQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAows = null;

            $this->collAios = null;

            $this->collAkws = null;

            $this->collAnws = null;

            $this->collOrbs = null;

            $this->collRbbs = null;

            $this->collTass = null;

            $this->collRems = null;

            $this->collRemAanvraags = null;

            $this->collTogs = null;

            $this->collWkbs = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Persoon::setDeleted()
     * @see Persoon::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersoonTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPersoonQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PersoonTableMap::DATABASE_NAME);
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
                PersoonTableMap::addInstanceToPool($this);
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

            if ($this->aowsScheduledForDeletion !== null) {
                if (!$this->aowsScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\AowQuery::create()
                        ->filterByPrimaryKeys($this->aowsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->aowsScheduledForDeletion = null;
                }
            }

            if ($this->collAows !== null) {
                foreach ($this->collAows as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->aiosScheduledForDeletion !== null) {
                if (!$this->aiosScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\AioQuery::create()
                        ->filterByPrimaryKeys($this->aiosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->aiosScheduledForDeletion = null;
                }
            }

            if ($this->collAios !== null) {
                foreach ($this->collAios as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->akwsScheduledForDeletion !== null) {
                if (!$this->akwsScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\AkwQuery::create()
                        ->filterByPrimaryKeys($this->akwsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->akwsScheduledForDeletion = null;
                }
            }

            if ($this->collAkws !== null) {
                foreach ($this->collAkws as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->anwsScheduledForDeletion !== null) {
                if (!$this->anwsScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\AnwQuery::create()
                        ->filterByPrimaryKeys($this->anwsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->anwsScheduledForDeletion = null;
                }
            }

            if ($this->collAnws !== null) {
                foreach ($this->collAnws as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->orbsScheduledForDeletion !== null) {
                if (!$this->orbsScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\OrbQuery::create()
                        ->filterByPrimaryKeys($this->orbsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->orbsScheduledForDeletion = null;
                }
            }

            if ($this->collOrbs !== null) {
                foreach ($this->collOrbs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rbbsScheduledForDeletion !== null) {
                if (!$this->rbbsScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\RbbQuery::create()
                        ->filterByPrimaryKeys($this->rbbsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rbbsScheduledForDeletion = null;
                }
            }

            if ($this->collRbbs !== null) {
                foreach ($this->collRbbs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tassScheduledForDeletion !== null) {
                if (!$this->tassScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\TasQuery::create()
                        ->filterByPrimaryKeys($this->tassScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tassScheduledForDeletion = null;
                }
            }

            if ($this->collTass !== null) {
                foreach ($this->collTass as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->remsScheduledForDeletion !== null) {
                if (!$this->remsScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\RemQuery::create()
                        ->filterByPrimaryKeys($this->remsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->remsScheduledForDeletion = null;
                }
            }

            if ($this->collRems !== null) {
                foreach ($this->collRems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->remAanvraagsScheduledForDeletion !== null) {
                if (!$this->remAanvraagsScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\RemAanvraagQuery::create()
                        ->filterByPrimaryKeys($this->remAanvraagsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->remAanvraagsScheduledForDeletion = null;
                }
            }

            if ($this->collRemAanvraags !== null) {
                foreach ($this->collRemAanvraags as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->togsScheduledForDeletion !== null) {
                if (!$this->togsScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\TogQuery::create()
                        ->filterByPrimaryKeys($this->togsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->togsScheduledForDeletion = null;
                }
            }

            if ($this->collTogs !== null) {
                foreach ($this->collTogs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->wkbsScheduledForDeletion !== null) {
                if (!$this->wkbsScheduledForDeletion->isEmpty()) {
                    \Model\Custom\NovumSvb\WkbQuery::create()
                        ->filterByPrimaryKeys($this->wkbsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->wkbsScheduledForDeletion = null;
                }
            }

            if ($this->collWkbs !== null) {
                foreach ($this->collWkbs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

        $this->modifiedColumns[PersoonTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PersoonTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PersoonTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(PersoonTableMap::COL_BSN)) {
            $modifiedColumns[':p' . $index++]  = 'bsn';
        }

        $sql = sprintf(
            'INSERT INTO persoon (%s) VALUES (%s)',
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
                    case 'bsn':
                        $stmt->bindValue($identifier, $this->bsn, PDO::PARAM_STR);
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
        $pos = PersoonTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getBsn();
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

        if (isset($alreadyDumpedObjects['Persoon'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Persoon'][$this->hashCode()] = true;
        $keys = PersoonTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getBsn(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collAows) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'aows';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'aows';
                        break;
                    default:
                        $key = 'Aows';
                }

                $result[$key] = $this->collAows->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAios) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'aios';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'aios';
                        break;
                    default:
                        $key = 'Aios';
                }

                $result[$key] = $this->collAios->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAkws) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'akws';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'akws';
                        break;
                    default:
                        $key = 'Akws';
                }

                $result[$key] = $this->collAkws->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnws) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'anws';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'anws';
                        break;
                    default:
                        $key = 'Anws';
                }

                $result[$key] = $this->collAnws->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrbs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'orbs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'obrs';
                        break;
                    default:
                        $key = 'Orbs';
                }

                $result[$key] = $this->collOrbs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRbbs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'rbbs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'rbbs';
                        break;
                    default:
                        $key = 'Rbbs';
                }

                $result[$key] = $this->collRbbs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTass) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tass';
                        break;
                    default:
                        $key = 'Tass';
                }

                $result[$key] = $this->collTass->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'rems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'rems';
                        break;
                    default:
                        $key = 'Rems';
                }

                $result[$key] = $this->collRems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRemAanvraags) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'remAanvraags';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'rem_aanvraags';
                        break;
                    default:
                        $key = 'RemAanvraags';
                }

                $result[$key] = $this->collRemAanvraags->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTogs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'togs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'togs';
                        break;
                    default:
                        $key = 'Togs';
                }

                $result[$key] = $this->collTogs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collWkbs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'wkbs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'wkbs';
                        break;
                    default:
                        $key = 'Wkbs';
                }

                $result[$key] = $this->collWkbs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Model\Custom\NovumSvb\Persoon
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PersoonTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Model\Custom\NovumSvb\Persoon
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setBsn($value);
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
        $keys = PersoonTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setBsn($arr[$keys[1]]);
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
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object, for fluid interface
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
        $criteria = new Criteria(PersoonTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PersoonTableMap::COL_ID)) {
            $criteria->add(PersoonTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(PersoonTableMap::COL_BSN)) {
            $criteria->add(PersoonTableMap::COL_BSN, $this->bsn);
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
        $criteria = ChildPersoonQuery::create();
        $criteria->add(PersoonTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Model\Custom\NovumSvb\Persoon (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setBsn($this->getBsn());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getAows() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAow($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAio($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAkws() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAkw($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnws() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnw($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrbs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrb($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRbbs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRbb($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTas($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRemAanvraags() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRemAanvraag($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getWkbs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addWkb($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

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
     * @return \Model\Custom\NovumSvb\Persoon Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Aow' === $relationName) {
            $this->initAows();
            return;
        }
        if ('Aio' === $relationName) {
            $this->initAios();
            return;
        }
        if ('Akw' === $relationName) {
            $this->initAkws();
            return;
        }
        if ('Anw' === $relationName) {
            $this->initAnws();
            return;
        }
        if ('Orb' === $relationName) {
            $this->initOrbs();
            return;
        }
        if ('Rbb' === $relationName) {
            $this->initRbbs();
            return;
        }
        if ('Tas' === $relationName) {
            $this->initTass();
            return;
        }
        if ('Rem' === $relationName) {
            $this->initRems();
            return;
        }
        if ('RemAanvraag' === $relationName) {
            $this->initRemAanvraags();
            return;
        }
        if ('Tog' === $relationName) {
            $this->initTogs();
            return;
        }
        if ('Wkb' === $relationName) {
            $this->initWkbs();
            return;
        }
    }

    /**
     * Clears out the collAows collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAows()
     */
    public function clearAows()
    {
        $this->collAows = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAows collection loaded partially.
     */
    public function resetPartialAows($v = true)
    {
        $this->collAowsPartial = $v;
    }

    /**
     * Initializes the collAows collection.
     *
     * By default this just sets the collAows collection to an empty array (like clearcollAows());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAows($overrideExisting = true)
    {
        if (null !== $this->collAows && !$overrideExisting) {
            return;
        }

        $collectionClassName = AowTableMap::getTableMap()->getCollectionClassName();

        $this->collAows = new $collectionClassName;
        $this->collAows->setModel('\Model\Custom\NovumSvb\Aow');
    }

    /**
     * Gets an array of ChildAow objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAow[] List of ChildAow objects
     * @throws PropelException
     */
    public function getAows(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAowsPartial && !$this->isNew();
        if (null === $this->collAows || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collAows) {
                    $this->initAows();
                } else {
                    $collectionClassName = AowTableMap::getTableMap()->getCollectionClassName();

                    $collAows = new $collectionClassName;
                    $collAows->setModel('\Model\Custom\NovumSvb\Aow');

                    return $collAows;
                }
            } else {
                $collAows = ChildAowQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAowsPartial && count($collAows)) {
                        $this->initAows(false);

                        foreach ($collAows as $obj) {
                            if (false == $this->collAows->contains($obj)) {
                                $this->collAows->append($obj);
                            }
                        }

                        $this->collAowsPartial = true;
                    }

                    return $collAows;
                }

                if ($partial && $this->collAows) {
                    foreach ($this->collAows as $obj) {
                        if ($obj->isNew()) {
                            $collAows[] = $obj;
                        }
                    }
                }

                $this->collAows = $collAows;
                $this->collAowsPartial = false;
            }
        }

        return $this->collAows;
    }

    /**
     * Sets a collection of ChildAow objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $aows A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setAows(Collection $aows, ConnectionInterface $con = null)
    {
        /** @var ChildAow[] $aowsToDelete */
        $aowsToDelete = $this->getAows(new Criteria(), $con)->diff($aows);


        $this->aowsScheduledForDeletion = $aowsToDelete;

        foreach ($aowsToDelete as $aowRemoved) {
            $aowRemoved->setPersoon(null);
        }

        $this->collAows = null;
        foreach ($aows as $aow) {
            $this->addAow($aow);
        }

        $this->collAows = $aows;
        $this->collAowsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Aow objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Aow objects.
     * @throws PropelException
     */
    public function countAows(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAowsPartial && !$this->isNew();
        if (null === $this->collAows || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAows) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAows());
            }

            $query = ChildAowQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collAows);
    }

    /**
     * Method called to associate a ChildAow object to this object
     * through the ChildAow foreign key attribute.
     *
     * @param  ChildAow $l ChildAow
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addAow(ChildAow $l)
    {
        if ($this->collAows === null) {
            $this->initAows();
            $this->collAowsPartial = true;
        }

        if (!$this->collAows->contains($l)) {
            $this->doAddAow($l);

            if ($this->aowsScheduledForDeletion and $this->aowsScheduledForDeletion->contains($l)) {
                $this->aowsScheduledForDeletion->remove($this->aowsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAow $aow The ChildAow object to add.
     */
    protected function doAddAow(ChildAow $aow)
    {
        $this->collAows[]= $aow;
        $aow->setPersoon($this);
    }

    /**
     * @param  ChildAow $aow The ChildAow object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeAow(ChildAow $aow)
    {
        if ($this->getAows()->contains($aow)) {
            $pos = $this->collAows->search($aow);
            $this->collAows->remove($pos);
            if (null === $this->aowsScheduledForDeletion) {
                $this->aowsScheduledForDeletion = clone $this->collAows;
                $this->aowsScheduledForDeletion->clear();
            }
            $this->aowsScheduledForDeletion[]= clone $aow;
            $aow->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears out the collAios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAios()
     */
    public function clearAios()
    {
        $this->collAios = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAios collection loaded partially.
     */
    public function resetPartialAios($v = true)
    {
        $this->collAiosPartial = $v;
    }

    /**
     * Initializes the collAios collection.
     *
     * By default this just sets the collAios collection to an empty array (like clearcollAios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAios($overrideExisting = true)
    {
        if (null !== $this->collAios && !$overrideExisting) {
            return;
        }

        $collectionClassName = AioTableMap::getTableMap()->getCollectionClassName();

        $this->collAios = new $collectionClassName;
        $this->collAios->setModel('\Model\Custom\NovumSvb\Aio');
    }

    /**
     * Gets an array of ChildAio objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAio[] List of ChildAio objects
     * @throws PropelException
     */
    public function getAios(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAiosPartial && !$this->isNew();
        if (null === $this->collAios || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collAios) {
                    $this->initAios();
                } else {
                    $collectionClassName = AioTableMap::getTableMap()->getCollectionClassName();

                    $collAios = new $collectionClassName;
                    $collAios->setModel('\Model\Custom\NovumSvb\Aio');

                    return $collAios;
                }
            } else {
                $collAios = ChildAioQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAiosPartial && count($collAios)) {
                        $this->initAios(false);

                        foreach ($collAios as $obj) {
                            if (false == $this->collAios->contains($obj)) {
                                $this->collAios->append($obj);
                            }
                        }

                        $this->collAiosPartial = true;
                    }

                    return $collAios;
                }

                if ($partial && $this->collAios) {
                    foreach ($this->collAios as $obj) {
                        if ($obj->isNew()) {
                            $collAios[] = $obj;
                        }
                    }
                }

                $this->collAios = $collAios;
                $this->collAiosPartial = false;
            }
        }

        return $this->collAios;
    }

    /**
     * Sets a collection of ChildAio objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $aios A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setAios(Collection $aios, ConnectionInterface $con = null)
    {
        /** @var ChildAio[] $aiosToDelete */
        $aiosToDelete = $this->getAios(new Criteria(), $con)->diff($aios);


        $this->aiosScheduledForDeletion = $aiosToDelete;

        foreach ($aiosToDelete as $aioRemoved) {
            $aioRemoved->setPersoon(null);
        }

        $this->collAios = null;
        foreach ($aios as $aio) {
            $this->addAio($aio);
        }

        $this->collAios = $aios;
        $this->collAiosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Aio objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Aio objects.
     * @throws PropelException
     */
    public function countAios(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAiosPartial && !$this->isNew();
        if (null === $this->collAios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAios) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAios());
            }

            $query = ChildAioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collAios);
    }

    /**
     * Method called to associate a ChildAio object to this object
     * through the ChildAio foreign key attribute.
     *
     * @param  ChildAio $l ChildAio
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addAio(ChildAio $l)
    {
        if ($this->collAios === null) {
            $this->initAios();
            $this->collAiosPartial = true;
        }

        if (!$this->collAios->contains($l)) {
            $this->doAddAio($l);

            if ($this->aiosScheduledForDeletion and $this->aiosScheduledForDeletion->contains($l)) {
                $this->aiosScheduledForDeletion->remove($this->aiosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAio $aio The ChildAio object to add.
     */
    protected function doAddAio(ChildAio $aio)
    {
        $this->collAios[]= $aio;
        $aio->setPersoon($this);
    }

    /**
     * @param  ChildAio $aio The ChildAio object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeAio(ChildAio $aio)
    {
        if ($this->getAios()->contains($aio)) {
            $pos = $this->collAios->search($aio);
            $this->collAios->remove($pos);
            if (null === $this->aiosScheduledForDeletion) {
                $this->aiosScheduledForDeletion = clone $this->collAios;
                $this->aiosScheduledForDeletion->clear();
            }
            $this->aiosScheduledForDeletion[]= clone $aio;
            $aio->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears out the collAkws collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAkws()
     */
    public function clearAkws()
    {
        $this->collAkws = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAkws collection loaded partially.
     */
    public function resetPartialAkws($v = true)
    {
        $this->collAkwsPartial = $v;
    }

    /**
     * Initializes the collAkws collection.
     *
     * By default this just sets the collAkws collection to an empty array (like clearcollAkws());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAkws($overrideExisting = true)
    {
        if (null !== $this->collAkws && !$overrideExisting) {
            return;
        }

        $collectionClassName = AkwTableMap::getTableMap()->getCollectionClassName();

        $this->collAkws = new $collectionClassName;
        $this->collAkws->setModel('\Model\Custom\NovumSvb\Akw');
    }

    /**
     * Gets an array of ChildAkw objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAkw[] List of ChildAkw objects
     * @throws PropelException
     */
    public function getAkws(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAkwsPartial && !$this->isNew();
        if (null === $this->collAkws || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collAkws) {
                    $this->initAkws();
                } else {
                    $collectionClassName = AkwTableMap::getTableMap()->getCollectionClassName();

                    $collAkws = new $collectionClassName;
                    $collAkws->setModel('\Model\Custom\NovumSvb\Akw');

                    return $collAkws;
                }
            } else {
                $collAkws = ChildAkwQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAkwsPartial && count($collAkws)) {
                        $this->initAkws(false);

                        foreach ($collAkws as $obj) {
                            if (false == $this->collAkws->contains($obj)) {
                                $this->collAkws->append($obj);
                            }
                        }

                        $this->collAkwsPartial = true;
                    }

                    return $collAkws;
                }

                if ($partial && $this->collAkws) {
                    foreach ($this->collAkws as $obj) {
                        if ($obj->isNew()) {
                            $collAkws[] = $obj;
                        }
                    }
                }

                $this->collAkws = $collAkws;
                $this->collAkwsPartial = false;
            }
        }

        return $this->collAkws;
    }

    /**
     * Sets a collection of ChildAkw objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $akws A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setAkws(Collection $akws, ConnectionInterface $con = null)
    {
        /** @var ChildAkw[] $akwsToDelete */
        $akwsToDelete = $this->getAkws(new Criteria(), $con)->diff($akws);


        $this->akwsScheduledForDeletion = $akwsToDelete;

        foreach ($akwsToDelete as $akwRemoved) {
            $akwRemoved->setPersoon(null);
        }

        $this->collAkws = null;
        foreach ($akws as $akw) {
            $this->addAkw($akw);
        }

        $this->collAkws = $akws;
        $this->collAkwsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Akw objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Akw objects.
     * @throws PropelException
     */
    public function countAkws(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAkwsPartial && !$this->isNew();
        if (null === $this->collAkws || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAkws) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAkws());
            }

            $query = ChildAkwQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collAkws);
    }

    /**
     * Method called to associate a ChildAkw object to this object
     * through the ChildAkw foreign key attribute.
     *
     * @param  ChildAkw $l ChildAkw
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addAkw(ChildAkw $l)
    {
        if ($this->collAkws === null) {
            $this->initAkws();
            $this->collAkwsPartial = true;
        }

        if (!$this->collAkws->contains($l)) {
            $this->doAddAkw($l);

            if ($this->akwsScheduledForDeletion and $this->akwsScheduledForDeletion->contains($l)) {
                $this->akwsScheduledForDeletion->remove($this->akwsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAkw $akw The ChildAkw object to add.
     */
    protected function doAddAkw(ChildAkw $akw)
    {
        $this->collAkws[]= $akw;
        $akw->setPersoon($this);
    }

    /**
     * @param  ChildAkw $akw The ChildAkw object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeAkw(ChildAkw $akw)
    {
        if ($this->getAkws()->contains($akw)) {
            $pos = $this->collAkws->search($akw);
            $this->collAkws->remove($pos);
            if (null === $this->akwsScheduledForDeletion) {
                $this->akwsScheduledForDeletion = clone $this->collAkws;
                $this->akwsScheduledForDeletion->clear();
            }
            $this->akwsScheduledForDeletion[]= clone $akw;
            $akw->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears out the collAnws collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAnws()
     */
    public function clearAnws()
    {
        $this->collAnws = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAnws collection loaded partially.
     */
    public function resetPartialAnws($v = true)
    {
        $this->collAnwsPartial = $v;
    }

    /**
     * Initializes the collAnws collection.
     *
     * By default this just sets the collAnws collection to an empty array (like clearcollAnws());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnws($overrideExisting = true)
    {
        if (null !== $this->collAnws && !$overrideExisting) {
            return;
        }

        $collectionClassName = AnwTableMap::getTableMap()->getCollectionClassName();

        $this->collAnws = new $collectionClassName;
        $this->collAnws->setModel('\Model\Custom\NovumSvb\Anw');
    }

    /**
     * Gets an array of ChildAnw objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAnw[] List of ChildAnw objects
     * @throws PropelException
     */
    public function getAnws(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAnwsPartial && !$this->isNew();
        if (null === $this->collAnws || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collAnws) {
                    $this->initAnws();
                } else {
                    $collectionClassName = AnwTableMap::getTableMap()->getCollectionClassName();

                    $collAnws = new $collectionClassName;
                    $collAnws->setModel('\Model\Custom\NovumSvb\Anw');

                    return $collAnws;
                }
            } else {
                $collAnws = ChildAnwQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAnwsPartial && count($collAnws)) {
                        $this->initAnws(false);

                        foreach ($collAnws as $obj) {
                            if (false == $this->collAnws->contains($obj)) {
                                $this->collAnws->append($obj);
                            }
                        }

                        $this->collAnwsPartial = true;
                    }

                    return $collAnws;
                }

                if ($partial && $this->collAnws) {
                    foreach ($this->collAnws as $obj) {
                        if ($obj->isNew()) {
                            $collAnws[] = $obj;
                        }
                    }
                }

                $this->collAnws = $collAnws;
                $this->collAnwsPartial = false;
            }
        }

        return $this->collAnws;
    }

    /**
     * Sets a collection of ChildAnw objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $anws A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setAnws(Collection $anws, ConnectionInterface $con = null)
    {
        /** @var ChildAnw[] $anwsToDelete */
        $anwsToDelete = $this->getAnws(new Criteria(), $con)->diff($anws);


        $this->anwsScheduledForDeletion = $anwsToDelete;

        foreach ($anwsToDelete as $anwRemoved) {
            $anwRemoved->setPersoon(null);
        }

        $this->collAnws = null;
        foreach ($anws as $anw) {
            $this->addAnw($anw);
        }

        $this->collAnws = $anws;
        $this->collAnwsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Anw objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Anw objects.
     * @throws PropelException
     */
    public function countAnws(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAnwsPartial && !$this->isNew();
        if (null === $this->collAnws || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnws) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAnws());
            }

            $query = ChildAnwQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collAnws);
    }

    /**
     * Method called to associate a ChildAnw object to this object
     * through the ChildAnw foreign key attribute.
     *
     * @param  ChildAnw $l ChildAnw
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addAnw(ChildAnw $l)
    {
        if ($this->collAnws === null) {
            $this->initAnws();
            $this->collAnwsPartial = true;
        }

        if (!$this->collAnws->contains($l)) {
            $this->doAddAnw($l);

            if ($this->anwsScheduledForDeletion and $this->anwsScheduledForDeletion->contains($l)) {
                $this->anwsScheduledForDeletion->remove($this->anwsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAnw $anw The ChildAnw object to add.
     */
    protected function doAddAnw(ChildAnw $anw)
    {
        $this->collAnws[]= $anw;
        $anw->setPersoon($this);
    }

    /**
     * @param  ChildAnw $anw The ChildAnw object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeAnw(ChildAnw $anw)
    {
        if ($this->getAnws()->contains($anw)) {
            $pos = $this->collAnws->search($anw);
            $this->collAnws->remove($pos);
            if (null === $this->anwsScheduledForDeletion) {
                $this->anwsScheduledForDeletion = clone $this->collAnws;
                $this->anwsScheduledForDeletion->clear();
            }
            $this->anwsScheduledForDeletion[]= clone $anw;
            $anw->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears out the collOrbs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addOrbs()
     */
    public function clearOrbs()
    {
        $this->collOrbs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collOrbs collection loaded partially.
     */
    public function resetPartialOrbs($v = true)
    {
        $this->collOrbsPartial = $v;
    }

    /**
     * Initializes the collOrbs collection.
     *
     * By default this just sets the collOrbs collection to an empty array (like clearcollOrbs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrbs($overrideExisting = true)
    {
        if (null !== $this->collOrbs && !$overrideExisting) {
            return;
        }

        $collectionClassName = OrbTableMap::getTableMap()->getCollectionClassName();

        $this->collOrbs = new $collectionClassName;
        $this->collOrbs->setModel('\Model\Custom\NovumSvb\Orb');
    }

    /**
     * Gets an array of ChildOrb objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildOrb[] List of ChildOrb objects
     * @throws PropelException
     */
    public function getOrbs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collOrbsPartial && !$this->isNew();
        if (null === $this->collOrbs || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collOrbs) {
                    $this->initOrbs();
                } else {
                    $collectionClassName = OrbTableMap::getTableMap()->getCollectionClassName();

                    $collOrbs = new $collectionClassName;
                    $collOrbs->setModel('\Model\Custom\NovumSvb\Orb');

                    return $collOrbs;
                }
            } else {
                $collOrbs = ChildOrbQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collOrbsPartial && count($collOrbs)) {
                        $this->initOrbs(false);

                        foreach ($collOrbs as $obj) {
                            if (false == $this->collOrbs->contains($obj)) {
                                $this->collOrbs->append($obj);
                            }
                        }

                        $this->collOrbsPartial = true;
                    }

                    return $collOrbs;
                }

                if ($partial && $this->collOrbs) {
                    foreach ($this->collOrbs as $obj) {
                        if ($obj->isNew()) {
                            $collOrbs[] = $obj;
                        }
                    }
                }

                $this->collOrbs = $collOrbs;
                $this->collOrbsPartial = false;
            }
        }

        return $this->collOrbs;
    }

    /**
     * Sets a collection of ChildOrb objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $orbs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setOrbs(Collection $orbs, ConnectionInterface $con = null)
    {
        /** @var ChildOrb[] $orbsToDelete */
        $orbsToDelete = $this->getOrbs(new Criteria(), $con)->diff($orbs);


        $this->orbsScheduledForDeletion = $orbsToDelete;

        foreach ($orbsToDelete as $orbRemoved) {
            $orbRemoved->setPersoon(null);
        }

        $this->collOrbs = null;
        foreach ($orbs as $orb) {
            $this->addOrb($orb);
        }

        $this->collOrbs = $orbs;
        $this->collOrbsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Orb objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Orb objects.
     * @throws PropelException
     */
    public function countOrbs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collOrbsPartial && !$this->isNew();
        if (null === $this->collOrbs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrbs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrbs());
            }

            $query = ChildOrbQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collOrbs);
    }

    /**
     * Method called to associate a ChildOrb object to this object
     * through the ChildOrb foreign key attribute.
     *
     * @param  ChildOrb $l ChildOrb
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addOrb(ChildOrb $l)
    {
        if ($this->collOrbs === null) {
            $this->initOrbs();
            $this->collOrbsPartial = true;
        }

        if (!$this->collOrbs->contains($l)) {
            $this->doAddOrb($l);

            if ($this->orbsScheduledForDeletion and $this->orbsScheduledForDeletion->contains($l)) {
                $this->orbsScheduledForDeletion->remove($this->orbsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildOrb $orb The ChildOrb object to add.
     */
    protected function doAddOrb(ChildOrb $orb)
    {
        $this->collOrbs[]= $orb;
        $orb->setPersoon($this);
    }

    /**
     * @param  ChildOrb $orb The ChildOrb object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeOrb(ChildOrb $orb)
    {
        if ($this->getOrbs()->contains($orb)) {
            $pos = $this->collOrbs->search($orb);
            $this->collOrbs->remove($pos);
            if (null === $this->orbsScheduledForDeletion) {
                $this->orbsScheduledForDeletion = clone $this->collOrbs;
                $this->orbsScheduledForDeletion->clear();
            }
            $this->orbsScheduledForDeletion[]= clone $orb;
            $orb->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears out the collRbbs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRbbs()
     */
    public function clearRbbs()
    {
        $this->collRbbs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collRbbs collection loaded partially.
     */
    public function resetPartialRbbs($v = true)
    {
        $this->collRbbsPartial = $v;
    }

    /**
     * Initializes the collRbbs collection.
     *
     * By default this just sets the collRbbs collection to an empty array (like clearcollRbbs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRbbs($overrideExisting = true)
    {
        if (null !== $this->collRbbs && !$overrideExisting) {
            return;
        }

        $collectionClassName = RbbTableMap::getTableMap()->getCollectionClassName();

        $this->collRbbs = new $collectionClassName;
        $this->collRbbs->setModel('\Model\Custom\NovumSvb\Rbb');
    }

    /**
     * Gets an array of ChildRbb objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildRbb[] List of ChildRbb objects
     * @throws PropelException
     */
    public function getRbbs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collRbbsPartial && !$this->isNew();
        if (null === $this->collRbbs || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collRbbs) {
                    $this->initRbbs();
                } else {
                    $collectionClassName = RbbTableMap::getTableMap()->getCollectionClassName();

                    $collRbbs = new $collectionClassName;
                    $collRbbs->setModel('\Model\Custom\NovumSvb\Rbb');

                    return $collRbbs;
                }
            } else {
                $collRbbs = ChildRbbQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collRbbsPartial && count($collRbbs)) {
                        $this->initRbbs(false);

                        foreach ($collRbbs as $obj) {
                            if (false == $this->collRbbs->contains($obj)) {
                                $this->collRbbs->append($obj);
                            }
                        }

                        $this->collRbbsPartial = true;
                    }

                    return $collRbbs;
                }

                if ($partial && $this->collRbbs) {
                    foreach ($this->collRbbs as $obj) {
                        if ($obj->isNew()) {
                            $collRbbs[] = $obj;
                        }
                    }
                }

                $this->collRbbs = $collRbbs;
                $this->collRbbsPartial = false;
            }
        }

        return $this->collRbbs;
    }

    /**
     * Sets a collection of ChildRbb objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $rbbs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setRbbs(Collection $rbbs, ConnectionInterface $con = null)
    {
        /** @var ChildRbb[] $rbbsToDelete */
        $rbbsToDelete = $this->getRbbs(new Criteria(), $con)->diff($rbbs);


        $this->rbbsScheduledForDeletion = $rbbsToDelete;

        foreach ($rbbsToDelete as $rbbRemoved) {
            $rbbRemoved->setPersoon(null);
        }

        $this->collRbbs = null;
        foreach ($rbbs as $rbb) {
            $this->addRbb($rbb);
        }

        $this->collRbbs = $rbbs;
        $this->collRbbsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rbb objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Rbb objects.
     * @throws PropelException
     */
    public function countRbbs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collRbbsPartial && !$this->isNew();
        if (null === $this->collRbbs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRbbs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRbbs());
            }

            $query = ChildRbbQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collRbbs);
    }

    /**
     * Method called to associate a ChildRbb object to this object
     * through the ChildRbb foreign key attribute.
     *
     * @param  ChildRbb $l ChildRbb
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addRbb(ChildRbb $l)
    {
        if ($this->collRbbs === null) {
            $this->initRbbs();
            $this->collRbbsPartial = true;
        }

        if (!$this->collRbbs->contains($l)) {
            $this->doAddRbb($l);

            if ($this->rbbsScheduledForDeletion and $this->rbbsScheduledForDeletion->contains($l)) {
                $this->rbbsScheduledForDeletion->remove($this->rbbsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildRbb $rbb The ChildRbb object to add.
     */
    protected function doAddRbb(ChildRbb $rbb)
    {
        $this->collRbbs[]= $rbb;
        $rbb->setPersoon($this);
    }

    /**
     * @param  ChildRbb $rbb The ChildRbb object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeRbb(ChildRbb $rbb)
    {
        if ($this->getRbbs()->contains($rbb)) {
            $pos = $this->collRbbs->search($rbb);
            $this->collRbbs->remove($pos);
            if (null === $this->rbbsScheduledForDeletion) {
                $this->rbbsScheduledForDeletion = clone $this->collRbbs;
                $this->rbbsScheduledForDeletion->clear();
            }
            $this->rbbsScheduledForDeletion[]= clone $rbb;
            $rbb->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears out the collTass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTass()
     */
    public function clearTass()
    {
        $this->collTass = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTass collection loaded partially.
     */
    public function resetPartialTass($v = true)
    {
        $this->collTassPartial = $v;
    }

    /**
     * Initializes the collTass collection.
     *
     * By default this just sets the collTass collection to an empty array (like clearcollTass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTass($overrideExisting = true)
    {
        if (null !== $this->collTass && !$overrideExisting) {
            return;
        }

        $collectionClassName = TasTableMap::getTableMap()->getCollectionClassName();

        $this->collTass = new $collectionClassName;
        $this->collTass->setModel('\Model\Custom\NovumSvb\Tas');
    }

    /**
     * Gets an array of ChildTas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTas[] List of ChildTas objects
     * @throws PropelException
     */
    public function getTass(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTassPartial && !$this->isNew();
        if (null === $this->collTass || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collTass) {
                    $this->initTass();
                } else {
                    $collectionClassName = TasTableMap::getTableMap()->getCollectionClassName();

                    $collTass = new $collectionClassName;
                    $collTass->setModel('\Model\Custom\NovumSvb\Tas');

                    return $collTass;
                }
            } else {
                $collTass = ChildTasQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTassPartial && count($collTass)) {
                        $this->initTass(false);

                        foreach ($collTass as $obj) {
                            if (false == $this->collTass->contains($obj)) {
                                $this->collTass->append($obj);
                            }
                        }

                        $this->collTassPartial = true;
                    }

                    return $collTass;
                }

                if ($partial && $this->collTass) {
                    foreach ($this->collTass as $obj) {
                        if ($obj->isNew()) {
                            $collTass[] = $obj;
                        }
                    }
                }

                $this->collTass = $collTass;
                $this->collTassPartial = false;
            }
        }

        return $this->collTass;
    }

    /**
     * Sets a collection of ChildTas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tass A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setTass(Collection $tass, ConnectionInterface $con = null)
    {
        /** @var ChildTas[] $tassToDelete */
        $tassToDelete = $this->getTass(new Criteria(), $con)->diff($tass);


        $this->tassScheduledForDeletion = $tassToDelete;

        foreach ($tassToDelete as $tasRemoved) {
            $tasRemoved->setPersoon(null);
        }

        $this->collTass = null;
        foreach ($tass as $tas) {
            $this->addTas($tas);
        }

        $this->collTass = $tass;
        $this->collTassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tas objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tas objects.
     * @throws PropelException
     */
    public function countTass(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTassPartial && !$this->isNew();
        if (null === $this->collTass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTass());
            }

            $query = ChildTasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collTass);
    }

    /**
     * Method called to associate a ChildTas object to this object
     * through the ChildTas foreign key attribute.
     *
     * @param  ChildTas $l ChildTas
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addTas(ChildTas $l)
    {
        if ($this->collTass === null) {
            $this->initTass();
            $this->collTassPartial = true;
        }

        if (!$this->collTass->contains($l)) {
            $this->doAddTas($l);

            if ($this->tassScheduledForDeletion and $this->tassScheduledForDeletion->contains($l)) {
                $this->tassScheduledForDeletion->remove($this->tassScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTas $tas The ChildTas object to add.
     */
    protected function doAddTas(ChildTas $tas)
    {
        $this->collTass[]= $tas;
        $tas->setPersoon($this);
    }

    /**
     * @param  ChildTas $tas The ChildTas object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeTas(ChildTas $tas)
    {
        if ($this->getTass()->contains($tas)) {
            $pos = $this->collTass->search($tas);
            $this->collTass->remove($pos);
            if (null === $this->tassScheduledForDeletion) {
                $this->tassScheduledForDeletion = clone $this->collTass;
                $this->tassScheduledForDeletion->clear();
            }
            $this->tassScheduledForDeletion[]= clone $tas;
            $tas->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears out the collRems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRems()
     */
    public function clearRems()
    {
        $this->collRems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collRems collection loaded partially.
     */
    public function resetPartialRems($v = true)
    {
        $this->collRemsPartial = $v;
    }

    /**
     * Initializes the collRems collection.
     *
     * By default this just sets the collRems collection to an empty array (like clearcollRems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRems($overrideExisting = true)
    {
        if (null !== $this->collRems && !$overrideExisting) {
            return;
        }

        $collectionClassName = RemTableMap::getTableMap()->getCollectionClassName();

        $this->collRems = new $collectionClassName;
        $this->collRems->setModel('\Model\Custom\NovumSvb\Rem');
    }

    /**
     * Gets an array of ChildRem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildRem[] List of ChildRem objects
     * @throws PropelException
     */
    public function getRems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collRemsPartial && !$this->isNew();
        if (null === $this->collRems || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collRems) {
                    $this->initRems();
                } else {
                    $collectionClassName = RemTableMap::getTableMap()->getCollectionClassName();

                    $collRems = new $collectionClassName;
                    $collRems->setModel('\Model\Custom\NovumSvb\Rem');

                    return $collRems;
                }
            } else {
                $collRems = ChildRemQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collRemsPartial && count($collRems)) {
                        $this->initRems(false);

                        foreach ($collRems as $obj) {
                            if (false == $this->collRems->contains($obj)) {
                                $this->collRems->append($obj);
                            }
                        }

                        $this->collRemsPartial = true;
                    }

                    return $collRems;
                }

                if ($partial && $this->collRems) {
                    foreach ($this->collRems as $obj) {
                        if ($obj->isNew()) {
                            $collRems[] = $obj;
                        }
                    }
                }

                $this->collRems = $collRems;
                $this->collRemsPartial = false;
            }
        }

        return $this->collRems;
    }

    /**
     * Sets a collection of ChildRem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $rems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setRems(Collection $rems, ConnectionInterface $con = null)
    {
        /** @var ChildRem[] $remsToDelete */
        $remsToDelete = $this->getRems(new Criteria(), $con)->diff($rems);


        $this->remsScheduledForDeletion = $remsToDelete;

        foreach ($remsToDelete as $remRemoved) {
            $remRemoved->setPersoon(null);
        }

        $this->collRems = null;
        foreach ($rems as $rem) {
            $this->addRem($rem);
        }

        $this->collRems = $rems;
        $this->collRemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Rem objects.
     * @throws PropelException
     */
    public function countRems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collRemsPartial && !$this->isNew();
        if (null === $this->collRems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRems());
            }

            $query = ChildRemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collRems);
    }

    /**
     * Method called to associate a ChildRem object to this object
     * through the ChildRem foreign key attribute.
     *
     * @param  ChildRem $l ChildRem
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addRem(ChildRem $l)
    {
        if ($this->collRems === null) {
            $this->initRems();
            $this->collRemsPartial = true;
        }

        if (!$this->collRems->contains($l)) {
            $this->doAddRem($l);

            if ($this->remsScheduledForDeletion and $this->remsScheduledForDeletion->contains($l)) {
                $this->remsScheduledForDeletion->remove($this->remsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildRem $rem The ChildRem object to add.
     */
    protected function doAddRem(ChildRem $rem)
    {
        $this->collRems[]= $rem;
        $rem->setPersoon($this);
    }

    /**
     * @param  ChildRem $rem The ChildRem object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeRem(ChildRem $rem)
    {
        if ($this->getRems()->contains($rem)) {
            $pos = $this->collRems->search($rem);
            $this->collRems->remove($pos);
            if (null === $this->remsScheduledForDeletion) {
                $this->remsScheduledForDeletion = clone $this->collRems;
                $this->remsScheduledForDeletion->clear();
            }
            $this->remsScheduledForDeletion[]= clone $rem;
            $rem->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears out the collRemAanvraags collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRemAanvraags()
     */
    public function clearRemAanvraags()
    {
        $this->collRemAanvraags = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collRemAanvraags collection loaded partially.
     */
    public function resetPartialRemAanvraags($v = true)
    {
        $this->collRemAanvraagsPartial = $v;
    }

    /**
     * Initializes the collRemAanvraags collection.
     *
     * By default this just sets the collRemAanvraags collection to an empty array (like clearcollRemAanvraags());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRemAanvraags($overrideExisting = true)
    {
        if (null !== $this->collRemAanvraags && !$overrideExisting) {
            return;
        }

        $collectionClassName = RemAanvraagTableMap::getTableMap()->getCollectionClassName();

        $this->collRemAanvraags = new $collectionClassName;
        $this->collRemAanvraags->setModel('\Model\Custom\NovumSvb\RemAanvraag');
    }

    /**
     * Gets an array of ChildRemAanvraag objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildRemAanvraag[] List of ChildRemAanvraag objects
     * @throws PropelException
     */
    public function getRemAanvraags(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collRemAanvraagsPartial && !$this->isNew();
        if (null === $this->collRemAanvraags || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collRemAanvraags) {
                    $this->initRemAanvraags();
                } else {
                    $collectionClassName = RemAanvraagTableMap::getTableMap()->getCollectionClassName();

                    $collRemAanvraags = new $collectionClassName;
                    $collRemAanvraags->setModel('\Model\Custom\NovumSvb\RemAanvraag');

                    return $collRemAanvraags;
                }
            } else {
                $collRemAanvraags = ChildRemAanvraagQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collRemAanvraagsPartial && count($collRemAanvraags)) {
                        $this->initRemAanvraags(false);

                        foreach ($collRemAanvraags as $obj) {
                            if (false == $this->collRemAanvraags->contains($obj)) {
                                $this->collRemAanvraags->append($obj);
                            }
                        }

                        $this->collRemAanvraagsPartial = true;
                    }

                    return $collRemAanvraags;
                }

                if ($partial && $this->collRemAanvraags) {
                    foreach ($this->collRemAanvraags as $obj) {
                        if ($obj->isNew()) {
                            $collRemAanvraags[] = $obj;
                        }
                    }
                }

                $this->collRemAanvraags = $collRemAanvraags;
                $this->collRemAanvraagsPartial = false;
            }
        }

        return $this->collRemAanvraags;
    }

    /**
     * Sets a collection of ChildRemAanvraag objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $remAanvraags A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setRemAanvraags(Collection $remAanvraags, ConnectionInterface $con = null)
    {
        /** @var ChildRemAanvraag[] $remAanvraagsToDelete */
        $remAanvraagsToDelete = $this->getRemAanvraags(new Criteria(), $con)->diff($remAanvraags);


        $this->remAanvraagsScheduledForDeletion = $remAanvraagsToDelete;

        foreach ($remAanvraagsToDelete as $remAanvraagRemoved) {
            $remAanvraagRemoved->setPersoon(null);
        }

        $this->collRemAanvraags = null;
        foreach ($remAanvraags as $remAanvraag) {
            $this->addRemAanvraag($remAanvraag);
        }

        $this->collRemAanvraags = $remAanvraags;
        $this->collRemAanvraagsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RemAanvraag objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related RemAanvraag objects.
     * @throws PropelException
     */
    public function countRemAanvraags(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collRemAanvraagsPartial && !$this->isNew();
        if (null === $this->collRemAanvraags || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRemAanvraags) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRemAanvraags());
            }

            $query = ChildRemAanvraagQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collRemAanvraags);
    }

    /**
     * Method called to associate a ChildRemAanvraag object to this object
     * through the ChildRemAanvraag foreign key attribute.
     *
     * @param  ChildRemAanvraag $l ChildRemAanvraag
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addRemAanvraag(ChildRemAanvraag $l)
    {
        if ($this->collRemAanvraags === null) {
            $this->initRemAanvraags();
            $this->collRemAanvraagsPartial = true;
        }

        if (!$this->collRemAanvraags->contains($l)) {
            $this->doAddRemAanvraag($l);

            if ($this->remAanvraagsScheduledForDeletion and $this->remAanvraagsScheduledForDeletion->contains($l)) {
                $this->remAanvraagsScheduledForDeletion->remove($this->remAanvraagsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildRemAanvraag $remAanvraag The ChildRemAanvraag object to add.
     */
    protected function doAddRemAanvraag(ChildRemAanvraag $remAanvraag)
    {
        $this->collRemAanvraags[]= $remAanvraag;
        $remAanvraag->setPersoon($this);
    }

    /**
     * @param  ChildRemAanvraag $remAanvraag The ChildRemAanvraag object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeRemAanvraag(ChildRemAanvraag $remAanvraag)
    {
        if ($this->getRemAanvraags()->contains($remAanvraag)) {
            $pos = $this->collRemAanvraags->search($remAanvraag);
            $this->collRemAanvraags->remove($pos);
            if (null === $this->remAanvraagsScheduledForDeletion) {
                $this->remAanvraagsScheduledForDeletion = clone $this->collRemAanvraags;
                $this->remAanvraagsScheduledForDeletion->clear();
            }
            $this->remAanvraagsScheduledForDeletion[]= clone $remAanvraag;
            $remAanvraag->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears out the collTogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTogs()
     */
    public function clearTogs()
    {
        $this->collTogs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTogs collection loaded partially.
     */
    public function resetPartialTogs($v = true)
    {
        $this->collTogsPartial = $v;
    }

    /**
     * Initializes the collTogs collection.
     *
     * By default this just sets the collTogs collection to an empty array (like clearcollTogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTogs($overrideExisting = true)
    {
        if (null !== $this->collTogs && !$overrideExisting) {
            return;
        }

        $collectionClassName = TogTableMap::getTableMap()->getCollectionClassName();

        $this->collTogs = new $collectionClassName;
        $this->collTogs->setModel('\Model\Custom\NovumSvb\Tog');
    }

    /**
     * Gets an array of ChildTog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTog[] List of ChildTog objects
     * @throws PropelException
     */
    public function getTogs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTogsPartial && !$this->isNew();
        if (null === $this->collTogs || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collTogs) {
                    $this->initTogs();
                } else {
                    $collectionClassName = TogTableMap::getTableMap()->getCollectionClassName();

                    $collTogs = new $collectionClassName;
                    $collTogs->setModel('\Model\Custom\NovumSvb\Tog');

                    return $collTogs;
                }
            } else {
                $collTogs = ChildTogQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTogsPartial && count($collTogs)) {
                        $this->initTogs(false);

                        foreach ($collTogs as $obj) {
                            if (false == $this->collTogs->contains($obj)) {
                                $this->collTogs->append($obj);
                            }
                        }

                        $this->collTogsPartial = true;
                    }

                    return $collTogs;
                }

                if ($partial && $this->collTogs) {
                    foreach ($this->collTogs as $obj) {
                        if ($obj->isNew()) {
                            $collTogs[] = $obj;
                        }
                    }
                }

                $this->collTogs = $collTogs;
                $this->collTogsPartial = false;
            }
        }

        return $this->collTogs;
    }

    /**
     * Sets a collection of ChildTog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $togs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setTogs(Collection $togs, ConnectionInterface $con = null)
    {
        /** @var ChildTog[] $togsToDelete */
        $togsToDelete = $this->getTogs(new Criteria(), $con)->diff($togs);


        $this->togsScheduledForDeletion = $togsToDelete;

        foreach ($togsToDelete as $togRemoved) {
            $togRemoved->setPersoon(null);
        }

        $this->collTogs = null;
        foreach ($togs as $tog) {
            $this->addTog($tog);
        }

        $this->collTogs = $togs;
        $this->collTogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tog objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tog objects.
     * @throws PropelException
     */
    public function countTogs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTogsPartial && !$this->isNew();
        if (null === $this->collTogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTogs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTogs());
            }

            $query = ChildTogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collTogs);
    }

    /**
     * Method called to associate a ChildTog object to this object
     * through the ChildTog foreign key attribute.
     *
     * @param  ChildTog $l ChildTog
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addTog(ChildTog $l)
    {
        if ($this->collTogs === null) {
            $this->initTogs();
            $this->collTogsPartial = true;
        }

        if (!$this->collTogs->contains($l)) {
            $this->doAddTog($l);

            if ($this->togsScheduledForDeletion and $this->togsScheduledForDeletion->contains($l)) {
                $this->togsScheduledForDeletion->remove($this->togsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTog $tog The ChildTog object to add.
     */
    protected function doAddTog(ChildTog $tog)
    {
        $this->collTogs[]= $tog;
        $tog->setPersoon($this);
    }

    /**
     * @param  ChildTog $tog The ChildTog object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeTog(ChildTog $tog)
    {
        if ($this->getTogs()->contains($tog)) {
            $pos = $this->collTogs->search($tog);
            $this->collTogs->remove($pos);
            if (null === $this->togsScheduledForDeletion) {
                $this->togsScheduledForDeletion = clone $this->collTogs;
                $this->togsScheduledForDeletion->clear();
            }
            $this->togsScheduledForDeletion[]= clone $tog;
            $tog->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears out the collWkbs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addWkbs()
     */
    public function clearWkbs()
    {
        $this->collWkbs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collWkbs collection loaded partially.
     */
    public function resetPartialWkbs($v = true)
    {
        $this->collWkbsPartial = $v;
    }

    /**
     * Initializes the collWkbs collection.
     *
     * By default this just sets the collWkbs collection to an empty array (like clearcollWkbs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initWkbs($overrideExisting = true)
    {
        if (null !== $this->collWkbs && !$overrideExisting) {
            return;
        }

        $collectionClassName = WkbTableMap::getTableMap()->getCollectionClassName();

        $this->collWkbs = new $collectionClassName;
        $this->collWkbs->setModel('\Model\Custom\NovumSvb\Wkb');
    }

    /**
     * Gets an array of ChildWkb objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersoon is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildWkb[] List of ChildWkb objects
     * @throws PropelException
     */
    public function getWkbs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collWkbsPartial && !$this->isNew();
        if (null === $this->collWkbs || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collWkbs) {
                    $this->initWkbs();
                } else {
                    $collectionClassName = WkbTableMap::getTableMap()->getCollectionClassName();

                    $collWkbs = new $collectionClassName;
                    $collWkbs->setModel('\Model\Custom\NovumSvb\Wkb');

                    return $collWkbs;
                }
            } else {
                $collWkbs = ChildWkbQuery::create(null, $criteria)
                    ->filterByPersoon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collWkbsPartial && count($collWkbs)) {
                        $this->initWkbs(false);

                        foreach ($collWkbs as $obj) {
                            if (false == $this->collWkbs->contains($obj)) {
                                $this->collWkbs->append($obj);
                            }
                        }

                        $this->collWkbsPartial = true;
                    }

                    return $collWkbs;
                }

                if ($partial && $this->collWkbs) {
                    foreach ($this->collWkbs as $obj) {
                        if ($obj->isNew()) {
                            $collWkbs[] = $obj;
                        }
                    }
                }

                $this->collWkbs = $collWkbs;
                $this->collWkbsPartial = false;
            }
        }

        return $this->collWkbs;
    }

    /**
     * Sets a collection of ChildWkb objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $wkbs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function setWkbs(Collection $wkbs, ConnectionInterface $con = null)
    {
        /** @var ChildWkb[] $wkbsToDelete */
        $wkbsToDelete = $this->getWkbs(new Criteria(), $con)->diff($wkbs);


        $this->wkbsScheduledForDeletion = $wkbsToDelete;

        foreach ($wkbsToDelete as $wkbRemoved) {
            $wkbRemoved->setPersoon(null);
        }

        $this->collWkbs = null;
        foreach ($wkbs as $wkb) {
            $this->addWkb($wkb);
        }

        $this->collWkbs = $wkbs;
        $this->collWkbsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Wkb objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Wkb objects.
     * @throws PropelException
     */
    public function countWkbs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collWkbsPartial && !$this->isNew();
        if (null === $this->collWkbs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collWkbs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getWkbs());
            }

            $query = ChildWkbQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersoon($this)
                ->count($con);
        }

        return count($this->collWkbs);
    }

    /**
     * Method called to associate a ChildWkb object to this object
     * through the ChildWkb foreign key attribute.
     *
     * @param  ChildWkb $l ChildWkb
     * @return $this|\Model\Custom\NovumSvb\Persoon The current object (for fluent API support)
     */
    public function addWkb(ChildWkb $l)
    {
        if ($this->collWkbs === null) {
            $this->initWkbs();
            $this->collWkbsPartial = true;
        }

        if (!$this->collWkbs->contains($l)) {
            $this->doAddWkb($l);

            if ($this->wkbsScheduledForDeletion and $this->wkbsScheduledForDeletion->contains($l)) {
                $this->wkbsScheduledForDeletion->remove($this->wkbsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildWkb $wkb The ChildWkb object to add.
     */
    protected function doAddWkb(ChildWkb $wkb)
    {
        $this->collWkbs[]= $wkb;
        $wkb->setPersoon($this);
    }

    /**
     * @param  ChildWkb $wkb The ChildWkb object to remove.
     * @return $this|ChildPersoon The current object (for fluent API support)
     */
    public function removeWkb(ChildWkb $wkb)
    {
        if ($this->getWkbs()->contains($wkb)) {
            $pos = $this->collWkbs->search($wkb);
            $this->collWkbs->remove($pos);
            if (null === $this->wkbsScheduledForDeletion) {
                $this->wkbsScheduledForDeletion = clone $this->collWkbs;
                $this->wkbsScheduledForDeletion->clear();
            }
            $this->wkbsScheduledForDeletion[]= clone $wkb;
            $wkb->setPersoon(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->bsn = null;
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
            if ($this->collAows) {
                foreach ($this->collAows as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAios) {
                foreach ($this->collAios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAkws) {
                foreach ($this->collAkws as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnws) {
                foreach ($this->collAnws as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrbs) {
                foreach ($this->collOrbs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRbbs) {
                foreach ($this->collRbbs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTass) {
                foreach ($this->collTass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRems) {
                foreach ($this->collRems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRemAanvraags) {
                foreach ($this->collRemAanvraags as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTogs) {
                foreach ($this->collTogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collWkbs) {
                foreach ($this->collWkbs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collAows = null;
        $this->collAios = null;
        $this->collAkws = null;
        $this->collAnws = null;
        $this->collOrbs = null;
        $this->collRbbs = null;
        $this->collTass = null;
        $this->collRems = null;
        $this->collRemAanvraags = null;
        $this->collTogs = null;
        $this->collWkbs = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PersoonTableMap::DEFAULT_STRING_FORMAT);
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
