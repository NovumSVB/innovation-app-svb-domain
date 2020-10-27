<?php

namespace Model\Custom\NovumSvb\Map;

use Model\Custom\NovumSvb\AowAanvraag;
use Model\Custom\NovumSvb\AowAanvraagQuery;
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
 * This class defines the structure of the 'aow_aanvraag' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AowAanvraagTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Custom.NovumSvb.Map.AowAanvraagTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'hurah';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'aow_aanvraag';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Custom\\NovumSvb\\AowAanvraag';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Custom.NovumSvb.AowAanvraag';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'aow_aanvraag.id';

    /**
     * the column name for the persoon_id field
     */
    const COL_PERSOON_ID = 'aow_aanvraag.persoon_id';

    /**
     * the column name for the geboorte_datum field
     */
    const COL_GEBOORTE_DATUM = 'aow_aanvraag.geboorte_datum';

    /**
     * the column name for the geboorte_land field
     */
    const COL_GEBOORTE_LAND = 'aow_aanvraag.geboorte_land';

    /**
     * the column name for the immigratie_datum field
     */
    const COL_IMMIGRATIE_DATUM = 'aow_aanvraag.immigratie_datum';

    /**
     * the column name for the heeft_nl_paspoort field
     */
    const COL_HEEFT_NL_PASPOORT = 'aow_aanvraag.heeft_nl_paspoort';

    /**
     * the column name for the emigratie_land field
     */
    const COL_EMIGRATIE_LAND = 'aow_aanvraag.emigratie_land';

    /**
     * the column name for the emigratie_verblijfsvergunning field
     */
    const COL_EMIGRATIE_VERBLIJFSVERGUNNING = 'aow_aanvraag.emigratie_verblijfsvergunning';

    /**
     * the column name for the partner_emigratie_verblijfsvergunning field
     */
    const COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING = 'aow_aanvraag.partner_emigratie_verblijfsvergunning';

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
        self::TYPE_PHPNAME       => array('Id', 'PersoonId', 'GeboorteDatum', 'GeboorteLand', 'ImmigratieDatum', 'HeeftNlPaspoort', 'EmigratieLand', 'EmigratieVerblijfsvergunning', 'PartnerEmigratieVerblijfsvergunning', ),
        self::TYPE_CAMELNAME     => array('id', 'persoonId', 'geboorteDatum', 'geboorteLand', 'immigratieDatum', 'heeftNlPaspoort', 'emigratieLand', 'emigratieVerblijfsvergunning', 'partnerEmigratieVerblijfsvergunning', ),
        self::TYPE_COLNAME       => array(AowAanvraagTableMap::COL_ID, AowAanvraagTableMap::COL_PERSOON_ID, AowAanvraagTableMap::COL_GEBOORTE_DATUM, AowAanvraagTableMap::COL_GEBOORTE_LAND, AowAanvraagTableMap::COL_IMMIGRATIE_DATUM, AowAanvraagTableMap::COL_HEEFT_NL_PASPOORT, AowAanvraagTableMap::COL_EMIGRATIE_LAND, AowAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING, AowAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING, ),
        self::TYPE_FIELDNAME     => array('id', 'persoon_id', 'geboorte_datum', 'geboorte_land', 'immigratie_datum', 'heeft_nl_paspoort', 'emigratie_land', 'emigratie_verblijfsvergunning', 'partner_emigratie_verblijfsvergunning', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'PersoonId' => 1, 'GeboorteDatum' => 2, 'GeboorteLand' => 3, 'ImmigratieDatum' => 4, 'HeeftNlPaspoort' => 5, 'EmigratieLand' => 6, 'EmigratieVerblijfsvergunning' => 7, 'PartnerEmigratieVerblijfsvergunning' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'persoonId' => 1, 'geboorteDatum' => 2, 'geboorteLand' => 3, 'immigratieDatum' => 4, 'heeftNlPaspoort' => 5, 'emigratieLand' => 6, 'emigratieVerblijfsvergunning' => 7, 'partnerEmigratieVerblijfsvergunning' => 8, ),
        self::TYPE_COLNAME       => array(AowAanvraagTableMap::COL_ID => 0, AowAanvraagTableMap::COL_PERSOON_ID => 1, AowAanvraagTableMap::COL_GEBOORTE_DATUM => 2, AowAanvraagTableMap::COL_GEBOORTE_LAND => 3, AowAanvraagTableMap::COL_IMMIGRATIE_DATUM => 4, AowAanvraagTableMap::COL_HEEFT_NL_PASPOORT => 5, AowAanvraagTableMap::COL_EMIGRATIE_LAND => 6, AowAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING => 7, AowAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'persoon_id' => 1, 'geboorte_datum' => 2, 'geboorte_land' => 3, 'immigratie_datum' => 4, 'heeft_nl_paspoort' => 5, 'emigratie_land' => 6, 'emigratie_verblijfsvergunning' => 7, 'partner_emigratie_verblijfsvergunning' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('aow_aanvraag');
        $this->setPhpName('AowAanvraag');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Custom\\NovumSvb\\AowAanvraag');
        $this->setPackage('Model.Custom.NovumSvb');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('persoon_id', 'PersoonId', 'INTEGER', true, null, null);
        $this->addColumn('geboorte_datum', 'GeboorteDatum', 'DATE', false, null, null);
        $this->addColumn('geboorte_land', 'GeboorteLand', 'VARCHAR', false, 255, null);
        $this->addColumn('immigratie_datum', 'ImmigratieDatum', 'DATE', false, null, null);
        $this->addColumn('heeft_nl_paspoort', 'HeeftNlPaspoort', 'BOOLEAN', false, 1, null);
        $this->addColumn('emigratie_land', 'EmigratieLand', 'VARCHAR', false, 255, null);
        $this->addColumn('emigratie_verblijfsvergunning', 'EmigratieVerblijfsvergunning', 'BOOLEAN', false, 1, null);
        $this->addColumn('partner_emigratie_verblijfsvergunning', 'PartnerEmigratieVerblijfsvergunning', 'BOOLEAN', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        return $withPrefix ? AowAanvraagTableMap::CLASS_DEFAULT : AowAanvraagTableMap::OM_CLASS;
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
     * @return array           (AowAanvraag object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AowAanvraagTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AowAanvraagTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AowAanvraagTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AowAanvraagTableMap::OM_CLASS;
            /** @var AowAanvraag $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AowAanvraagTableMap::addInstanceToPool($obj, $key);
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
            $key = AowAanvraagTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AowAanvraagTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AowAanvraag $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AowAanvraagTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AowAanvraagTableMap::COL_ID);
            $criteria->addSelectColumn(AowAanvraagTableMap::COL_PERSOON_ID);
            $criteria->addSelectColumn(AowAanvraagTableMap::COL_GEBOORTE_DATUM);
            $criteria->addSelectColumn(AowAanvraagTableMap::COL_GEBOORTE_LAND);
            $criteria->addSelectColumn(AowAanvraagTableMap::COL_IMMIGRATIE_DATUM);
            $criteria->addSelectColumn(AowAanvraagTableMap::COL_HEEFT_NL_PASPOORT);
            $criteria->addSelectColumn(AowAanvraagTableMap::COL_EMIGRATIE_LAND);
            $criteria->addSelectColumn(AowAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING);
            $criteria->addSelectColumn(AowAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING);
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
        return Propel::getServiceContainer()->getDatabaseMap(AowAanvraagTableMap::DATABASE_NAME)->getTable(AowAanvraagTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AowAanvraagTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AowAanvraagTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AowAanvraagTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AowAanvraag or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AowAanvraag object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AowAanvraagTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Custom\NovumSvb\AowAanvraag) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AowAanvraagTableMap::DATABASE_NAME);
            $criteria->add(AowAanvraagTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AowAanvraagQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AowAanvraagTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AowAanvraagTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the aow_aanvraag table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AowAanvraagQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AowAanvraag or Criteria object.
     *
     * @param mixed               $criteria Criteria or AowAanvraag object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AowAanvraagTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AowAanvraag object
        }

        if ($criteria->containsKey(AowAanvraagTableMap::COL_ID) && $criteria->keyContainsValue(AowAanvraagTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AowAanvraagTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AowAanvraagQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AowAanvraagTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AowAanvraagTableMap::buildTableMap();
