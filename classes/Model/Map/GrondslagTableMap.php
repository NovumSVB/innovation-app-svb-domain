<?php

namespace Model\Custom\NovumSvb\Map;

use Model\Custom\NovumSvb\Grondslag;
use Model\Custom\NovumSvb\GrondslagQuery;
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
 * This class defines the structure of the 'grondslag' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class GrondslagTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Custom.NovumSvb.Map.GrondslagTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'hurah';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'grondslag';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Custom\\NovumSvb\\Grondslag';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Custom.NovumSvb.Grondslag';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the id field
     */
    const COL_ID = 'grondslag.id';

    /**
     * the column name for the wet_id field
     */
    const COL_WET_ID = 'grondslag.wet_id';

    /**
     * the column name for the databron_id field
     */
    const COL_DATABRON_ID = 'grondslag.databron_id';

    /**
     * the column name for the remote_veld field
     */
    const COL_REMOTE_VELD = 'grondslag.remote_veld';

    /**
     * the column name for the crud_editor_block_field field
     */
    const COL_CRUD_EDITOR_BLOCK_FIELD = 'grondslag.crud_editor_block_field';

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
        self::TYPE_PHPNAME       => array('Id', 'WetId', 'DatabronId', 'RemoteVeld', 'CrudEditorBlockField', ),
        self::TYPE_CAMELNAME     => array('id', 'wetId', 'databronId', 'remoteVeld', 'crudEditorBlockField', ),
        self::TYPE_COLNAME       => array(GrondslagTableMap::COL_ID, GrondslagTableMap::COL_WET_ID, GrondslagTableMap::COL_DATABRON_ID, GrondslagTableMap::COL_REMOTE_VELD, GrondslagTableMap::COL_CRUD_EDITOR_BLOCK_FIELD, ),
        self::TYPE_FIELDNAME     => array('id', 'wet_id', 'databron_id', 'remote_veld', 'crud_editor_block_field', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'WetId' => 1, 'DatabronId' => 2, 'RemoteVeld' => 3, 'CrudEditorBlockField' => 4, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'wetId' => 1, 'databronId' => 2, 'remoteVeld' => 3, 'crudEditorBlockField' => 4, ),
        self::TYPE_COLNAME       => array(GrondslagTableMap::COL_ID => 0, GrondslagTableMap::COL_WET_ID => 1, GrondslagTableMap::COL_DATABRON_ID => 2, GrondslagTableMap::COL_REMOTE_VELD => 3, GrondslagTableMap::COL_CRUD_EDITOR_BLOCK_FIELD => 4, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'wet_id' => 1, 'databron_id' => 2, 'remote_veld' => 3, 'crud_editor_block_field' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('grondslag');
        $this->setPhpName('Grondslag');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Custom\\NovumSvb\\Grondslag');
        $this->setPackage('Model.Custom.NovumSvb');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('wet_id', 'WetId', 'INTEGER', 'wet', 'id', true, null, null);
        $this->addForeignKey('databron_id', 'DatabronId', 'INTEGER', 'databron', 'id', true, null, null);
        $this->addColumn('remote_veld', 'RemoteVeld', 'VARCHAR', true, 255, null);
        $this->addColumn('crud_editor_block_field', 'CrudEditorBlockField', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('GrondslagWet', '\\Model\\Custom\\NovumSvb\\Wet', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':wet_id',
    1 => ':id',
  ),
), 'RESTRICT', null, null, false);
        $this->addRelation('GrondslagDatabron', '\\Model\\Custom\\NovumSvb\\Databron', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':databron_id',
    1 => ':id',
  ),
), 'RESTRICT', null, null, false);
    } // buildRelations()

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
        return $withPrefix ? GrondslagTableMap::CLASS_DEFAULT : GrondslagTableMap::OM_CLASS;
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
     * @return array           (Grondslag object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = GrondslagTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = GrondslagTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + GrondslagTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = GrondslagTableMap::OM_CLASS;
            /** @var Grondslag $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            GrondslagTableMap::addInstanceToPool($obj, $key);
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
            $key = GrondslagTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = GrondslagTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Grondslag $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                GrondslagTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(GrondslagTableMap::COL_ID);
            $criteria->addSelectColumn(GrondslagTableMap::COL_WET_ID);
            $criteria->addSelectColumn(GrondslagTableMap::COL_DATABRON_ID);
            $criteria->addSelectColumn(GrondslagTableMap::COL_REMOTE_VELD);
            $criteria->addSelectColumn(GrondslagTableMap::COL_CRUD_EDITOR_BLOCK_FIELD);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.wet_id');
            $criteria->addSelectColumn($alias . '.databron_id');
            $criteria->addSelectColumn($alias . '.remote_veld');
            $criteria->addSelectColumn($alias . '.crud_editor_block_field');
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
        return Propel::getServiceContainer()->getDatabaseMap(GrondslagTableMap::DATABASE_NAME)->getTable(GrondslagTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(GrondslagTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(GrondslagTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new GrondslagTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Grondslag or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Grondslag object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(GrondslagTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Custom\NovumSvb\Grondslag) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(GrondslagTableMap::DATABASE_NAME);
            $criteria->add(GrondslagTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = GrondslagQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            GrondslagTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                GrondslagTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the grondslag table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return GrondslagQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Grondslag or Criteria object.
     *
     * @param mixed               $criteria Criteria or Grondslag object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GrondslagTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Grondslag object
        }

        if ($criteria->containsKey(GrondslagTableMap::COL_ID) && $criteria->keyContainsValue(GrondslagTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.GrondslagTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = GrondslagQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // GrondslagTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
GrondslagTableMap::buildTableMap();
