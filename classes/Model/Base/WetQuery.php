<?php

namespace Model\Custom\NovumSvb\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumSvb\Wet as ChildWet;
use Model\Custom\NovumSvb\WetQuery as ChildWetQuery;
use Model\Custom\NovumSvb\Map\WetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'wet' table.
 *
 *
 *
 * @method     ChildWetQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildWetQuery orderByTitel($order = Criteria::ASC) Order by the titel column
 * @method     ChildWetQuery orderByCode($order = Criteria::ASC) Order by the code column
 *
 * @method     ChildWetQuery groupById() Group by the id column
 * @method     ChildWetQuery groupByTitel() Group by the titel column
 * @method     ChildWetQuery groupByCode() Group by the code column
 *
 * @method     ChildWetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWetQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWetQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWetQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWetQuery leftJoinFormulier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Formulier relation
 * @method     ChildWetQuery rightJoinFormulier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Formulier relation
 * @method     ChildWetQuery innerJoinFormulier($relationAlias = null) Adds a INNER JOIN clause to the query using the Formulier relation
 *
 * @method     ChildWetQuery joinWithFormulier($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Formulier relation
 *
 * @method     ChildWetQuery leftJoinWithFormulier() Adds a LEFT JOIN clause and with to the query using the Formulier relation
 * @method     ChildWetQuery rightJoinWithFormulier() Adds a RIGHT JOIN clause and with to the query using the Formulier relation
 * @method     ChildWetQuery innerJoinWithFormulier() Adds a INNER JOIN clause and with to the query using the Formulier relation
 *
 * @method     \Model\Custom\NovumSvb\FormulierQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildWet findOne(ConnectionInterface $con = null) Return the first ChildWet matching the query
 * @method     ChildWet findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWet matching the query, or a new ChildWet object populated from the query conditions when no match is found
 *
 * @method     ChildWet findOneById(int $id) Return the first ChildWet filtered by the id column
 * @method     ChildWet findOneByTitel(string $titel) Return the first ChildWet filtered by the titel column
 * @method     ChildWet findOneByCode(string $code) Return the first ChildWet filtered by the code column *

 * @method     ChildWet requirePk($key, ConnectionInterface $con = null) Return the ChildWet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWet requireOne(ConnectionInterface $con = null) Return the first ChildWet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWet requireOneById(int $id) Return the first ChildWet filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWet requireOneByTitel(string $titel) Return the first ChildWet filtered by the titel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWet requireOneByCode(string $code) Return the first ChildWet filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWet[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWet objects based on current ModelCriteria
 * @method     ChildWet[]|ObjectCollection findById(int $id) Return ChildWet objects filtered by the id column
 * @method     ChildWet[]|ObjectCollection findByTitel(string $titel) Return ChildWet objects filtered by the titel column
 * @method     ChildWet[]|ObjectCollection findByCode(string $code) Return ChildWet objects filtered by the code column
 * @method     ChildWet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class WetQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumSvb\Base\WetQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumSvb\\Wet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWetQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildWetQuery) {
            return $criteria;
        }
        $query = new ChildWetQuery();
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
     * @return ChildWet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WetTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WetTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildWet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, titel, code FROM wet WHERE id = :p0';
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
            /** @var ChildWet $obj */
            $obj = new ChildWet();
            $obj->hydrate($row);
            WetTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildWet|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildWetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WetTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildWetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WetTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildWetQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(WetTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(WetTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WetTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the titel column
     *
     * Example usage:
     * <code>
     * $query->filterByTitel('fooValue');   // WHERE titel = 'fooValue'
     * $query->filterByTitel('%fooValue%', Criteria::LIKE); // WHERE titel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $titel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWetQuery The current query, for fluid interface
     */
    public function filterByTitel($titel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($titel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WetTableMap::COL_TITEL, $titel, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWetQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WetTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Formulier object
     *
     * @param \Model\Custom\NovumSvb\Formulier|ObjectCollection $formulier the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWetQuery The current query, for fluid interface
     */
    public function filterByFormulier($formulier, $comparison = null)
    {
        if ($formulier instanceof \Model\Custom\NovumSvb\Formulier) {
            return $this
                ->addUsingAlias(WetTableMap::COL_ID, $formulier->getWetId(), $comparison);
        } elseif ($formulier instanceof ObjectCollection) {
            return $this
                ->useFormulierQuery()
                ->filterByPrimaryKeys($formulier->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFormulier() only accepts arguments of type \Model\Custom\NovumSvb\Formulier or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Formulier relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildWetQuery The current query, for fluid interface
     */
    public function joinFormulier($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Formulier');

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
            $this->addJoinObject($join, 'Formulier');
        }

        return $this;
    }

    /**
     * Use the Formulier relation Formulier object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\FormulierQuery A secondary query class using the current class as primary query
     */
    public function useFormulierQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFormulier($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Formulier', '\Model\Custom\NovumSvb\FormulierQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildWet $wet Object to remove from the list of results
     *
     * @return $this|ChildWetQuery The current query, for fluid interface
     */
    public function prune($wet = null)
    {
        if ($wet) {
            $this->addUsingAlias(WetTableMap::COL_ID, $wet->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the wet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WetTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WetTableMap::clearInstancePool();
            WetTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WetTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WetTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WetTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WetTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // WetQuery
