<?php

namespace Model\Custom\NovumSvb\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumSvb\Akw as ChildAkw;
use Model\Custom\NovumSvb\AkwQuery as ChildAkwQuery;
use Model\Custom\NovumSvb\Map\AkwTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'akw' table.
 *
 *
 *
 * @method     ChildAkwQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAkwQuery orderByPersoonId($order = Criteria::ASC) Order by the persoon_id column
 * @method     ChildAkwQuery orderByBedrag($order = Criteria::ASC) Order by the bedrag column
 *
 * @method     ChildAkwQuery groupById() Group by the id column
 * @method     ChildAkwQuery groupByPersoonId() Group by the persoon_id column
 * @method     ChildAkwQuery groupByBedrag() Group by the bedrag column
 *
 * @method     ChildAkwQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAkwQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAkwQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAkwQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAkwQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAkwQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAkwQuery leftJoinPersoon($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persoon relation
 * @method     ChildAkwQuery rightJoinPersoon($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persoon relation
 * @method     ChildAkwQuery innerJoinPersoon($relationAlias = null) Adds a INNER JOIN clause to the query using the Persoon relation
 *
 * @method     ChildAkwQuery joinWithPersoon($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persoon relation
 *
 * @method     ChildAkwQuery leftJoinWithPersoon() Adds a LEFT JOIN clause and with to the query using the Persoon relation
 * @method     ChildAkwQuery rightJoinWithPersoon() Adds a RIGHT JOIN clause and with to the query using the Persoon relation
 * @method     ChildAkwQuery innerJoinWithPersoon() Adds a INNER JOIN clause and with to the query using the Persoon relation
 *
 * @method     \Model\Custom\NovumSvb\PersoonQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAkw findOne(ConnectionInterface $con = null) Return the first ChildAkw matching the query
 * @method     ChildAkw findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAkw matching the query, or a new ChildAkw object populated from the query conditions when no match is found
 *
 * @method     ChildAkw findOneById(int $id) Return the first ChildAkw filtered by the id column
 * @method     ChildAkw findOneByPersoonId(int $persoon_id) Return the first ChildAkw filtered by the persoon_id column
 * @method     ChildAkw findOneByBedrag(string $bedrag) Return the first ChildAkw filtered by the bedrag column *

 * @method     ChildAkw requirePk($key, ConnectionInterface $con = null) Return the ChildAkw by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAkw requireOne(ConnectionInterface $con = null) Return the first ChildAkw matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAkw requireOneById(int $id) Return the first ChildAkw filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAkw requireOneByPersoonId(int $persoon_id) Return the first ChildAkw filtered by the persoon_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAkw requireOneByBedrag(string $bedrag) Return the first ChildAkw filtered by the bedrag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAkw[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAkw objects based on current ModelCriteria
 * @method     ChildAkw[]|ObjectCollection findById(int $id) Return ChildAkw objects filtered by the id column
 * @method     ChildAkw[]|ObjectCollection findByPersoonId(int $persoon_id) Return ChildAkw objects filtered by the persoon_id column
 * @method     ChildAkw[]|ObjectCollection findByBedrag(string $bedrag) Return ChildAkw objects filtered by the bedrag column
 * @method     ChildAkw[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AkwQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumSvb\Base\AkwQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumSvb\\Akw', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAkwQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAkwQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAkwQuery) {
            return $criteria;
        }
        $query = new ChildAkwQuery();
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
     * @return ChildAkw|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AkwTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AkwTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAkw A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, persoon_id, bedrag FROM akw WHERE id = :p0';
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
            /** @var ChildAkw $obj */
            $obj = new ChildAkw();
            $obj->hydrate($row);
            AkwTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAkw|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAkwQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AkwTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAkwQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AkwTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAkwQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AkwTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AkwTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkwTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAkwQuery The current query, for fluid interface
     */
    public function filterByPersoonId($persoonId = null, $comparison = null)
    {
        if (is_array($persoonId)) {
            $useMinMax = false;
            if (isset($persoonId['min'])) {
                $this->addUsingAlias(AkwTableMap::COL_PERSOON_ID, $persoonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persoonId['max'])) {
                $this->addUsingAlias(AkwTableMap::COL_PERSOON_ID, $persoonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkwTableMap::COL_PERSOON_ID, $persoonId, $comparison);
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
     * @return $this|ChildAkwQuery The current query, for fluid interface
     */
    public function filterByBedrag($bedrag = null, $comparison = null)
    {
        if (is_array($bedrag)) {
            $useMinMax = false;
            if (isset($bedrag['min'])) {
                $this->addUsingAlias(AkwTableMap::COL_BEDRAG, $bedrag['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bedrag['max'])) {
                $this->addUsingAlias(AkwTableMap::COL_BEDRAG, $bedrag['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkwTableMap::COL_BEDRAG, $bedrag, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Persoon object
     *
     * @param \Model\Custom\NovumSvb\Persoon|ObjectCollection $persoon The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAkwQuery The current query, for fluid interface
     */
    public function filterByPersoon($persoon, $comparison = null)
    {
        if ($persoon instanceof \Model\Custom\NovumSvb\Persoon) {
            return $this
                ->addUsingAlias(AkwTableMap::COL_PERSOON_ID, $persoon->getId(), $comparison);
        } elseif ($persoon instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AkwTableMap::COL_PERSOON_ID, $persoon->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildAkwQuery The current query, for fluid interface
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
     * @param   ChildAkw $akw Object to remove from the list of results
     *
     * @return $this|ChildAkwQuery The current query, for fluid interface
     */
    public function prune($akw = null)
    {
        if ($akw) {
            $this->addUsingAlias(AkwTableMap::COL_ID, $akw->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the akw table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AkwTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AkwTableMap::clearInstancePool();
            AkwTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AkwTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AkwTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AkwTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AkwTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AkwQuery
