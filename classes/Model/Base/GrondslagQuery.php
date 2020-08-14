<?php

namespace Model\Custom\NovumSvb\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumSvb\Grondslag as ChildGrondslag;
use Model\Custom\NovumSvb\GrondslagQuery as ChildGrondslagQuery;
use Model\Custom\NovumSvb\Map\GrondslagTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'grondslag' table.
 *
 *
 *
 * @method     ChildGrondslagQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildGrondslagQuery orderByWetId($order = Criteria::ASC) Order by the wet_id column
 * @method     ChildGrondslagQuery orderByDatabronId($order = Criteria::ASC) Order by the databron_id column
 * @method     ChildGrondslagQuery orderByRemoteVeld($order = Criteria::ASC) Order by the remote_veld column
 * @method     ChildGrondslagQuery orderByCrudEditorBlockField($order = Criteria::ASC) Order by the crud_editor_block_field column
 *
 * @method     ChildGrondslagQuery groupById() Group by the id column
 * @method     ChildGrondslagQuery groupByWetId() Group by the wet_id column
 * @method     ChildGrondslagQuery groupByDatabronId() Group by the databron_id column
 * @method     ChildGrondslagQuery groupByRemoteVeld() Group by the remote_veld column
 * @method     ChildGrondslagQuery groupByCrudEditorBlockField() Group by the crud_editor_block_field column
 *
 * @method     ChildGrondslagQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGrondslagQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGrondslagQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGrondslagQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGrondslagQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGrondslagQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGrondslagQuery leftJoinGrondslagWet($relationAlias = null) Adds a LEFT JOIN clause to the query using the GrondslagWet relation
 * @method     ChildGrondslagQuery rightJoinGrondslagWet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GrondslagWet relation
 * @method     ChildGrondslagQuery innerJoinGrondslagWet($relationAlias = null) Adds a INNER JOIN clause to the query using the GrondslagWet relation
 *
 * @method     ChildGrondslagQuery joinWithGrondslagWet($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the GrondslagWet relation
 *
 * @method     ChildGrondslagQuery leftJoinWithGrondslagWet() Adds a LEFT JOIN clause and with to the query using the GrondslagWet relation
 * @method     ChildGrondslagQuery rightJoinWithGrondslagWet() Adds a RIGHT JOIN clause and with to the query using the GrondslagWet relation
 * @method     ChildGrondslagQuery innerJoinWithGrondslagWet() Adds a INNER JOIN clause and with to the query using the GrondslagWet relation
 *
 * @method     ChildGrondslagQuery leftJoinGrondslagDatabron($relationAlias = null) Adds a LEFT JOIN clause to the query using the GrondslagDatabron relation
 * @method     ChildGrondslagQuery rightJoinGrondslagDatabron($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GrondslagDatabron relation
 * @method     ChildGrondslagQuery innerJoinGrondslagDatabron($relationAlias = null) Adds a INNER JOIN clause to the query using the GrondslagDatabron relation
 *
 * @method     ChildGrondslagQuery joinWithGrondslagDatabron($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the GrondslagDatabron relation
 *
 * @method     ChildGrondslagQuery leftJoinWithGrondslagDatabron() Adds a LEFT JOIN clause and with to the query using the GrondslagDatabron relation
 * @method     ChildGrondslagQuery rightJoinWithGrondslagDatabron() Adds a RIGHT JOIN clause and with to the query using the GrondslagDatabron relation
 * @method     ChildGrondslagQuery innerJoinWithGrondslagDatabron() Adds a INNER JOIN clause and with to the query using the GrondslagDatabron relation
 *
 * @method     \Model\Custom\NovumSvb\WetQuery|\Model\Custom\NovumSvb\DatabronQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildGrondslag findOne(ConnectionInterface $con = null) Return the first ChildGrondslag matching the query
 * @method     ChildGrondslag findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGrondslag matching the query, or a new ChildGrondslag object populated from the query conditions when no match is found
 *
 * @method     ChildGrondslag findOneById(int $id) Return the first ChildGrondslag filtered by the id column
 * @method     ChildGrondslag findOneByWetId(int $wet_id) Return the first ChildGrondslag filtered by the wet_id column
 * @method     ChildGrondslag findOneByDatabronId(int $databron_id) Return the first ChildGrondslag filtered by the databron_id column
 * @method     ChildGrondslag findOneByRemoteVeld(string $remote_veld) Return the first ChildGrondslag filtered by the remote_veld column
 * @method     ChildGrondslag findOneByCrudEditorBlockField(int $crud_editor_block_field) Return the first ChildGrondslag filtered by the crud_editor_block_field column *

 * @method     ChildGrondslag requirePk($key, ConnectionInterface $con = null) Return the ChildGrondslag by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrondslag requireOne(ConnectionInterface $con = null) Return the first ChildGrondslag matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGrondslag requireOneById(int $id) Return the first ChildGrondslag filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrondslag requireOneByWetId(int $wet_id) Return the first ChildGrondslag filtered by the wet_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrondslag requireOneByDatabronId(int $databron_id) Return the first ChildGrondslag filtered by the databron_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrondslag requireOneByRemoteVeld(string $remote_veld) Return the first ChildGrondslag filtered by the remote_veld column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrondslag requireOneByCrudEditorBlockField(int $crud_editor_block_field) Return the first ChildGrondslag filtered by the crud_editor_block_field column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGrondslag[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGrondslag objects based on current ModelCriteria
 * @method     ChildGrondslag[]|ObjectCollection findById(int $id) Return ChildGrondslag objects filtered by the id column
 * @method     ChildGrondslag[]|ObjectCollection findByWetId(int $wet_id) Return ChildGrondslag objects filtered by the wet_id column
 * @method     ChildGrondslag[]|ObjectCollection findByDatabronId(int $databron_id) Return ChildGrondslag objects filtered by the databron_id column
 * @method     ChildGrondslag[]|ObjectCollection findByRemoteVeld(string $remote_veld) Return ChildGrondslag objects filtered by the remote_veld column
 * @method     ChildGrondslag[]|ObjectCollection findByCrudEditorBlockField(int $crud_editor_block_field) Return ChildGrondslag objects filtered by the crud_editor_block_field column
 * @method     ChildGrondslag[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GrondslagQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumSvb\Base\GrondslagQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumSvb\\Grondslag', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGrondslagQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGrondslagQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGrondslagQuery) {
            return $criteria;
        }
        $query = new ChildGrondslagQuery();
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
     * @return ChildGrondslag|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GrondslagTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GrondslagTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildGrondslag A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, wet_id, databron_id, remote_veld, crud_editor_block_field FROM grondslag WHERE id = :p0';
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
            /** @var ChildGrondslag $obj */
            $obj = new ChildGrondslag();
            $obj->hydrate($row);
            GrondslagTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildGrondslag|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildGrondslagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GrondslagTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGrondslagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GrondslagTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildGrondslagQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GrondslagTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GrondslagTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrondslagTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the wet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWetId(1234); // WHERE wet_id = 1234
     * $query->filterByWetId(array(12, 34)); // WHERE wet_id IN (12, 34)
     * $query->filterByWetId(array('min' => 12)); // WHERE wet_id > 12
     * </code>
     *
     * @see       filterByGrondslagWet()
     *
     * @param     mixed $wetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrondslagQuery The current query, for fluid interface
     */
    public function filterByWetId($wetId = null, $comparison = null)
    {
        if (is_array($wetId)) {
            $useMinMax = false;
            if (isset($wetId['min'])) {
                $this->addUsingAlias(GrondslagTableMap::COL_WET_ID, $wetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wetId['max'])) {
                $this->addUsingAlias(GrondslagTableMap::COL_WET_ID, $wetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrondslagTableMap::COL_WET_ID, $wetId, $comparison);
    }

    /**
     * Filter the query on the databron_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDatabronId(1234); // WHERE databron_id = 1234
     * $query->filterByDatabronId(array(12, 34)); // WHERE databron_id IN (12, 34)
     * $query->filterByDatabronId(array('min' => 12)); // WHERE databron_id > 12
     * </code>
     *
     * @see       filterByGrondslagDatabron()
     *
     * @param     mixed $databronId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrondslagQuery The current query, for fluid interface
     */
    public function filterByDatabronId($databronId = null, $comparison = null)
    {
        if (is_array($databronId)) {
            $useMinMax = false;
            if (isset($databronId['min'])) {
                $this->addUsingAlias(GrondslagTableMap::COL_DATABRON_ID, $databronId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($databronId['max'])) {
                $this->addUsingAlias(GrondslagTableMap::COL_DATABRON_ID, $databronId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrondslagTableMap::COL_DATABRON_ID, $databronId, $comparison);
    }

    /**
     * Filter the query on the remote_veld column
     *
     * Example usage:
     * <code>
     * $query->filterByRemoteVeld('fooValue');   // WHERE remote_veld = 'fooValue'
     * $query->filterByRemoteVeld('%fooValue%', Criteria::LIKE); // WHERE remote_veld LIKE '%fooValue%'
     * </code>
     *
     * @param     string $remoteVeld The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrondslagQuery The current query, for fluid interface
     */
    public function filterByRemoteVeld($remoteVeld = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remoteVeld)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrondslagTableMap::COL_REMOTE_VELD, $remoteVeld, $comparison);
    }

    /**
     * Filter the query on the crud_editor_block_field column
     *
     * Example usage:
     * <code>
     * $query->filterByCrudEditorBlockField(1234); // WHERE crud_editor_block_field = 1234
     * $query->filterByCrudEditorBlockField(array(12, 34)); // WHERE crud_editor_block_field IN (12, 34)
     * $query->filterByCrudEditorBlockField(array('min' => 12)); // WHERE crud_editor_block_field > 12
     * </code>
     *
     * @param     mixed $crudEditorBlockField The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrondslagQuery The current query, for fluid interface
     */
    public function filterByCrudEditorBlockField($crudEditorBlockField = null, $comparison = null)
    {
        if (is_array($crudEditorBlockField)) {
            $useMinMax = false;
            if (isset($crudEditorBlockField['min'])) {
                $this->addUsingAlias(GrondslagTableMap::COL_CRUD_EDITOR_BLOCK_FIELD, $crudEditorBlockField['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crudEditorBlockField['max'])) {
                $this->addUsingAlias(GrondslagTableMap::COL_CRUD_EDITOR_BLOCK_FIELD, $crudEditorBlockField['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrondslagTableMap::COL_CRUD_EDITOR_BLOCK_FIELD, $crudEditorBlockField, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Wet object
     *
     * @param \Model\Custom\NovumSvb\Wet|ObjectCollection $wet The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGrondslagQuery The current query, for fluid interface
     */
    public function filterByGrondslagWet($wet, $comparison = null)
    {
        if ($wet instanceof \Model\Custom\NovumSvb\Wet) {
            return $this
                ->addUsingAlias(GrondslagTableMap::COL_WET_ID, $wet->getId(), $comparison);
        } elseif ($wet instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GrondslagTableMap::COL_WET_ID, $wet->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByGrondslagWet() only accepts arguments of type \Model\Custom\NovumSvb\Wet or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GrondslagWet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGrondslagQuery The current query, for fluid interface
     */
    public function joinGrondslagWet($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GrondslagWet');

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
            $this->addJoinObject($join, 'GrondslagWet');
        }

        return $this;
    }

    /**
     * Use the GrondslagWet relation Wet object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\WetQuery A secondary query class using the current class as primary query
     */
    public function useGrondslagWetQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGrondslagWet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GrondslagWet', '\Model\Custom\NovumSvb\WetQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Databron object
     *
     * @param \Model\Custom\NovumSvb\Databron|ObjectCollection $databron The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGrondslagQuery The current query, for fluid interface
     */
    public function filterByGrondslagDatabron($databron, $comparison = null)
    {
        if ($databron instanceof \Model\Custom\NovumSvb\Databron) {
            return $this
                ->addUsingAlias(GrondslagTableMap::COL_DATABRON_ID, $databron->getId(), $comparison);
        } elseif ($databron instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GrondslagTableMap::COL_DATABRON_ID, $databron->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByGrondslagDatabron() only accepts arguments of type \Model\Custom\NovumSvb\Databron or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GrondslagDatabron relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGrondslagQuery The current query, for fluid interface
     */
    public function joinGrondslagDatabron($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GrondslagDatabron');

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
            $this->addJoinObject($join, 'GrondslagDatabron');
        }

        return $this;
    }

    /**
     * Use the GrondslagDatabron relation Databron object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\DatabronQuery A secondary query class using the current class as primary query
     */
    public function useGrondslagDatabronQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGrondslagDatabron($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GrondslagDatabron', '\Model\Custom\NovumSvb\DatabronQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGrondslag $grondslag Object to remove from the list of results
     *
     * @return $this|ChildGrondslagQuery The current query, for fluid interface
     */
    public function prune($grondslag = null)
    {
        if ($grondslag) {
            $this->addUsingAlias(GrondslagTableMap::COL_ID, $grondslag->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the grondslag table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GrondslagTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GrondslagTableMap::clearInstancePool();
            GrondslagTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GrondslagTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GrondslagTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GrondslagTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GrondslagTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GrondslagQuery
