<?php

namespace Model\Custom\NovumSvb\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumSvb\Persoon as ChildPersoon;
use Model\Custom\NovumSvb\PersoonQuery as ChildPersoonQuery;
use Model\Custom\NovumSvb\Map\PersoonTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'persoon' table.
 *
 *
 *
 * @method     ChildPersoonQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPersoonQuery orderByBsn($order = Criteria::ASC) Order by the bsn column
 *
 * @method     ChildPersoonQuery groupById() Group by the id column
 * @method     ChildPersoonQuery groupByBsn() Group by the bsn column
 *
 * @method     ChildPersoonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPersoonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPersoonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPersoonQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPersoonQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPersoonQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPersoonQuery leftJoinAow($relationAlias = null) Adds a LEFT JOIN clause to the query using the Aow relation
 * @method     ChildPersoonQuery rightJoinAow($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Aow relation
 * @method     ChildPersoonQuery innerJoinAow($relationAlias = null) Adds a INNER JOIN clause to the query using the Aow relation
 *
 * @method     ChildPersoonQuery joinWithAow($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Aow relation
 *
 * @method     ChildPersoonQuery leftJoinWithAow() Adds a LEFT JOIN clause and with to the query using the Aow relation
 * @method     ChildPersoonQuery rightJoinWithAow() Adds a RIGHT JOIN clause and with to the query using the Aow relation
 * @method     ChildPersoonQuery innerJoinWithAow() Adds a INNER JOIN clause and with to the query using the Aow relation
 *
 * @method     ChildPersoonQuery leftJoinAio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Aio relation
 * @method     ChildPersoonQuery rightJoinAio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Aio relation
 * @method     ChildPersoonQuery innerJoinAio($relationAlias = null) Adds a INNER JOIN clause to the query using the Aio relation
 *
 * @method     ChildPersoonQuery joinWithAio($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Aio relation
 *
 * @method     ChildPersoonQuery leftJoinWithAio() Adds a LEFT JOIN clause and with to the query using the Aio relation
 * @method     ChildPersoonQuery rightJoinWithAio() Adds a RIGHT JOIN clause and with to the query using the Aio relation
 * @method     ChildPersoonQuery innerJoinWithAio() Adds a INNER JOIN clause and with to the query using the Aio relation
 *
 * @method     ChildPersoonQuery leftJoinAkw($relationAlias = null) Adds a LEFT JOIN clause to the query using the Akw relation
 * @method     ChildPersoonQuery rightJoinAkw($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Akw relation
 * @method     ChildPersoonQuery innerJoinAkw($relationAlias = null) Adds a INNER JOIN clause to the query using the Akw relation
 *
 * @method     ChildPersoonQuery joinWithAkw($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Akw relation
 *
 * @method     ChildPersoonQuery leftJoinWithAkw() Adds a LEFT JOIN clause and with to the query using the Akw relation
 * @method     ChildPersoonQuery rightJoinWithAkw() Adds a RIGHT JOIN clause and with to the query using the Akw relation
 * @method     ChildPersoonQuery innerJoinWithAkw() Adds a INNER JOIN clause and with to the query using the Akw relation
 *
 * @method     ChildPersoonQuery leftJoinAnw($relationAlias = null) Adds a LEFT JOIN clause to the query using the Anw relation
 * @method     ChildPersoonQuery rightJoinAnw($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Anw relation
 * @method     ChildPersoonQuery innerJoinAnw($relationAlias = null) Adds a INNER JOIN clause to the query using the Anw relation
 *
 * @method     ChildPersoonQuery joinWithAnw($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Anw relation
 *
 * @method     ChildPersoonQuery leftJoinWithAnw() Adds a LEFT JOIN clause and with to the query using the Anw relation
 * @method     ChildPersoonQuery rightJoinWithAnw() Adds a RIGHT JOIN clause and with to the query using the Anw relation
 * @method     ChildPersoonQuery innerJoinWithAnw() Adds a INNER JOIN clause and with to the query using the Anw relation
 *
 * @method     ChildPersoonQuery leftJoinOrb($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orb relation
 * @method     ChildPersoonQuery rightJoinOrb($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orb relation
 * @method     ChildPersoonQuery innerJoinOrb($relationAlias = null) Adds a INNER JOIN clause to the query using the Orb relation
 *
 * @method     ChildPersoonQuery joinWithOrb($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Orb relation
 *
 * @method     ChildPersoonQuery leftJoinWithOrb() Adds a LEFT JOIN clause and with to the query using the Orb relation
 * @method     ChildPersoonQuery rightJoinWithOrb() Adds a RIGHT JOIN clause and with to the query using the Orb relation
 * @method     ChildPersoonQuery innerJoinWithOrb() Adds a INNER JOIN clause and with to the query using the Orb relation
 *
 * @method     ChildPersoonQuery leftJoinRbb($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbb relation
 * @method     ChildPersoonQuery rightJoinRbb($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbb relation
 * @method     ChildPersoonQuery innerJoinRbb($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbb relation
 *
 * @method     ChildPersoonQuery joinWithRbb($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Rbb relation
 *
 * @method     ChildPersoonQuery leftJoinWithRbb() Adds a LEFT JOIN clause and with to the query using the Rbb relation
 * @method     ChildPersoonQuery rightJoinWithRbb() Adds a RIGHT JOIN clause and with to the query using the Rbb relation
 * @method     ChildPersoonQuery innerJoinWithRbb() Adds a INNER JOIN clause and with to the query using the Rbb relation
 *
 * @method     ChildPersoonQuery leftJoinTas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tas relation
 * @method     ChildPersoonQuery rightJoinTas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tas relation
 * @method     ChildPersoonQuery innerJoinTas($relationAlias = null) Adds a INNER JOIN clause to the query using the Tas relation
 *
 * @method     ChildPersoonQuery joinWithTas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tas relation
 *
 * @method     ChildPersoonQuery leftJoinWithTas() Adds a LEFT JOIN clause and with to the query using the Tas relation
 * @method     ChildPersoonQuery rightJoinWithTas() Adds a RIGHT JOIN clause and with to the query using the Tas relation
 * @method     ChildPersoonQuery innerJoinWithTas() Adds a INNER JOIN clause and with to the query using the Tas relation
 *
 * @method     ChildPersoonQuery leftJoinRem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rem relation
 * @method     ChildPersoonQuery rightJoinRem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rem relation
 * @method     ChildPersoonQuery innerJoinRem($relationAlias = null) Adds a INNER JOIN clause to the query using the Rem relation
 *
 * @method     ChildPersoonQuery joinWithRem($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Rem relation
 *
 * @method     ChildPersoonQuery leftJoinWithRem() Adds a LEFT JOIN clause and with to the query using the Rem relation
 * @method     ChildPersoonQuery rightJoinWithRem() Adds a RIGHT JOIN clause and with to the query using the Rem relation
 * @method     ChildPersoonQuery innerJoinWithRem() Adds a INNER JOIN clause and with to the query using the Rem relation
 *
 * @method     ChildPersoonQuery leftJoinRemAanvraag($relationAlias = null) Adds a LEFT JOIN clause to the query using the RemAanvraag relation
 * @method     ChildPersoonQuery rightJoinRemAanvraag($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RemAanvraag relation
 * @method     ChildPersoonQuery innerJoinRemAanvraag($relationAlias = null) Adds a INNER JOIN clause to the query using the RemAanvraag relation
 *
 * @method     ChildPersoonQuery joinWithRemAanvraag($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the RemAanvraag relation
 *
 * @method     ChildPersoonQuery leftJoinWithRemAanvraag() Adds a LEFT JOIN clause and with to the query using the RemAanvraag relation
 * @method     ChildPersoonQuery rightJoinWithRemAanvraag() Adds a RIGHT JOIN clause and with to the query using the RemAanvraag relation
 * @method     ChildPersoonQuery innerJoinWithRemAanvraag() Adds a INNER JOIN clause and with to the query using the RemAanvraag relation
 *
 * @method     ChildPersoonQuery leftJoinTog($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tog relation
 * @method     ChildPersoonQuery rightJoinTog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tog relation
 * @method     ChildPersoonQuery innerJoinTog($relationAlias = null) Adds a INNER JOIN clause to the query using the Tog relation
 *
 * @method     ChildPersoonQuery joinWithTog($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tog relation
 *
 * @method     ChildPersoonQuery leftJoinWithTog() Adds a LEFT JOIN clause and with to the query using the Tog relation
 * @method     ChildPersoonQuery rightJoinWithTog() Adds a RIGHT JOIN clause and with to the query using the Tog relation
 * @method     ChildPersoonQuery innerJoinWithTog() Adds a INNER JOIN clause and with to the query using the Tog relation
 *
 * @method     ChildPersoonQuery leftJoinWkb($relationAlias = null) Adds a LEFT JOIN clause to the query using the Wkb relation
 * @method     ChildPersoonQuery rightJoinWkb($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Wkb relation
 * @method     ChildPersoonQuery innerJoinWkb($relationAlias = null) Adds a INNER JOIN clause to the query using the Wkb relation
 *
 * @method     ChildPersoonQuery joinWithWkb($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Wkb relation
 *
 * @method     ChildPersoonQuery leftJoinWithWkb() Adds a LEFT JOIN clause and with to the query using the Wkb relation
 * @method     ChildPersoonQuery rightJoinWithWkb() Adds a RIGHT JOIN clause and with to the query using the Wkb relation
 * @method     ChildPersoonQuery innerJoinWithWkb() Adds a INNER JOIN clause and with to the query using the Wkb relation
 *
 * @method     \Model\Custom\NovumSvb\AowQuery|\Model\Custom\NovumSvb\AioQuery|\Model\Custom\NovumSvb\AkwQuery|\Model\Custom\NovumSvb\AnwQuery|\Model\Custom\NovumSvb\OrbQuery|\Model\Custom\NovumSvb\RbbQuery|\Model\Custom\NovumSvb\TasQuery|\Model\Custom\NovumSvb\RemQuery|\Model\Custom\NovumSvb\RemAanvraagQuery|\Model\Custom\NovumSvb\TogQuery|\Model\Custom\NovumSvb\WkbQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPersoon findOne(ConnectionInterface $con = null) Return the first ChildPersoon matching the query
 * @method     ChildPersoon findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPersoon matching the query, or a new ChildPersoon object populated from the query conditions when no match is found
 *
 * @method     ChildPersoon findOneById(int $id) Return the first ChildPersoon filtered by the id column
 * @method     ChildPersoon findOneByBsn(string $bsn) Return the first ChildPersoon filtered by the bsn column *

 * @method     ChildPersoon requirePk($key, ConnectionInterface $con = null) Return the ChildPersoon by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersoon requireOne(ConnectionInterface $con = null) Return the first ChildPersoon matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersoon requireOneById(int $id) Return the first ChildPersoon filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersoon requireOneByBsn(string $bsn) Return the first ChildPersoon filtered by the bsn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersoon[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPersoon objects based on current ModelCriteria
 * @method     ChildPersoon[]|ObjectCollection findById(int $id) Return ChildPersoon objects filtered by the id column
 * @method     ChildPersoon[]|ObjectCollection findByBsn(string $bsn) Return ChildPersoon objects filtered by the bsn column
 * @method     ChildPersoon[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PersoonQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumSvb\Base\PersoonQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumSvb\\Persoon', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPersoonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPersoonQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPersoonQuery) {
            return $criteria;
        }
        $query = new ChildPersoonQuery();
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
     * @return ChildPersoon|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PersoonTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PersoonTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPersoon A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, bsn FROM persoon WHERE id = :p0';
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
            /** @var ChildPersoon $obj */
            $obj = new ChildPersoon();
            $obj->hydrate($row);
            PersoonTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPersoon|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersoonTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersoonTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersoonTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersoonTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersoonTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByBsn($bsn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bsn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersoonTableMap::COL_BSN, $bsn, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Aow object
     *
     * @param \Model\Custom\NovumSvb\Aow|ObjectCollection $aow the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByAow($aow, $comparison = null)
    {
        if ($aow instanceof \Model\Custom\NovumSvb\Aow) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $aow->getPersoonId(), $comparison);
        } elseif ($aow instanceof ObjectCollection) {
            return $this
                ->useAowQuery()
                ->filterByPrimaryKeys($aow->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAow() only accepts arguments of type \Model\Custom\NovumSvb\Aow or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Aow relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinAow($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Aow');

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
            $this->addJoinObject($join, 'Aow');
        }

        return $this;
    }

    /**
     * Use the Aow relation Aow object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\AowQuery A secondary query class using the current class as primary query
     */
    public function useAowQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAow($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Aow', '\Model\Custom\NovumSvb\AowQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Aio object
     *
     * @param \Model\Custom\NovumSvb\Aio|ObjectCollection $aio the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByAio($aio, $comparison = null)
    {
        if ($aio instanceof \Model\Custom\NovumSvb\Aio) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $aio->getPersoonId(), $comparison);
        } elseif ($aio instanceof ObjectCollection) {
            return $this
                ->useAioQuery()
                ->filterByPrimaryKeys($aio->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAio() only accepts arguments of type \Model\Custom\NovumSvb\Aio or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Aio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinAio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Aio');

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
            $this->addJoinObject($join, 'Aio');
        }

        return $this;
    }

    /**
     * Use the Aio relation Aio object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\AioQuery A secondary query class using the current class as primary query
     */
    public function useAioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Aio', '\Model\Custom\NovumSvb\AioQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Akw object
     *
     * @param \Model\Custom\NovumSvb\Akw|ObjectCollection $akw the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByAkw($akw, $comparison = null)
    {
        if ($akw instanceof \Model\Custom\NovumSvb\Akw) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $akw->getPersoonId(), $comparison);
        } elseif ($akw instanceof ObjectCollection) {
            return $this
                ->useAkwQuery()
                ->filterByPrimaryKeys($akw->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAkw() only accepts arguments of type \Model\Custom\NovumSvb\Akw or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Akw relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinAkw($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Akw');

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
            $this->addJoinObject($join, 'Akw');
        }

        return $this;
    }

    /**
     * Use the Akw relation Akw object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\AkwQuery A secondary query class using the current class as primary query
     */
    public function useAkwQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAkw($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Akw', '\Model\Custom\NovumSvb\AkwQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Anw object
     *
     * @param \Model\Custom\NovumSvb\Anw|ObjectCollection $anw the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByAnw($anw, $comparison = null)
    {
        if ($anw instanceof \Model\Custom\NovumSvb\Anw) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $anw->getPersoonId(), $comparison);
        } elseif ($anw instanceof ObjectCollection) {
            return $this
                ->useAnwQuery()
                ->filterByPrimaryKeys($anw->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnw() only accepts arguments of type \Model\Custom\NovumSvb\Anw or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Anw relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinAnw($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Anw');

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
            $this->addJoinObject($join, 'Anw');
        }

        return $this;
    }

    /**
     * Use the Anw relation Anw object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\AnwQuery A secondary query class using the current class as primary query
     */
    public function useAnwQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnw($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Anw', '\Model\Custom\NovumSvb\AnwQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Orb object
     *
     * @param \Model\Custom\NovumSvb\Orb|ObjectCollection $orb the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByOrb($orb, $comparison = null)
    {
        if ($orb instanceof \Model\Custom\NovumSvb\Orb) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $orb->getPersoonId(), $comparison);
        } elseif ($orb instanceof ObjectCollection) {
            return $this
                ->useOrbQuery()
                ->filterByPrimaryKeys($orb->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrb() only accepts arguments of type \Model\Custom\NovumSvb\Orb or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orb relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinOrb($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orb');

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
            $this->addJoinObject($join, 'Orb');
        }

        return $this;
    }

    /**
     * Use the Orb relation Orb object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\OrbQuery A secondary query class using the current class as primary query
     */
    public function useOrbQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrb($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orb', '\Model\Custom\NovumSvb\OrbQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Rbb object
     *
     * @param \Model\Custom\NovumSvb\Rbb|ObjectCollection $rbb the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByRbb($rbb, $comparison = null)
    {
        if ($rbb instanceof \Model\Custom\NovumSvb\Rbb) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $rbb->getPersoonId(), $comparison);
        } elseif ($rbb instanceof ObjectCollection) {
            return $this
                ->useRbbQuery()
                ->filterByPrimaryKeys($rbb->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbb() only accepts arguments of type \Model\Custom\NovumSvb\Rbb or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbb relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinRbb($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbb');

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
            $this->addJoinObject($join, 'Rbb');
        }

        return $this;
    }

    /**
     * Use the Rbb relation Rbb object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\RbbQuery A secondary query class using the current class as primary query
     */
    public function useRbbQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbb($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbb', '\Model\Custom\NovumSvb\RbbQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Tas object
     *
     * @param \Model\Custom\NovumSvb\Tas|ObjectCollection $tas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByTas($tas, $comparison = null)
    {
        if ($tas instanceof \Model\Custom\NovumSvb\Tas) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $tas->getPersoonId(), $comparison);
        } elseif ($tas instanceof ObjectCollection) {
            return $this
                ->useTasQuery()
                ->filterByPrimaryKeys($tas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTas() only accepts arguments of type \Model\Custom\NovumSvb\Tas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinTas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tas');

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
            $this->addJoinObject($join, 'Tas');
        }

        return $this;
    }

    /**
     * Use the Tas relation Tas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\TasQuery A secondary query class using the current class as primary query
     */
    public function useTasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tas', '\Model\Custom\NovumSvb\TasQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Rem object
     *
     * @param \Model\Custom\NovumSvb\Rem|ObjectCollection $rem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByRem($rem, $comparison = null)
    {
        if ($rem instanceof \Model\Custom\NovumSvb\Rem) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $rem->getPersoonId(), $comparison);
        } elseif ($rem instanceof ObjectCollection) {
            return $this
                ->useRemQuery()
                ->filterByPrimaryKeys($rem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRem() only accepts arguments of type \Model\Custom\NovumSvb\Rem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinRem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rem');

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
            $this->addJoinObject($join, 'Rem');
        }

        return $this;
    }

    /**
     * Use the Rem relation Rem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\RemQuery A secondary query class using the current class as primary query
     */
    public function useRemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rem', '\Model\Custom\NovumSvb\RemQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\RemAanvraag object
     *
     * @param \Model\Custom\NovumSvb\RemAanvraag|ObjectCollection $remAanvraag the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByRemAanvraag($remAanvraag, $comparison = null)
    {
        if ($remAanvraag instanceof \Model\Custom\NovumSvb\RemAanvraag) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $remAanvraag->getPersoonId(), $comparison);
        } elseif ($remAanvraag instanceof ObjectCollection) {
            return $this
                ->useRemAanvraagQuery()
                ->filterByPrimaryKeys($remAanvraag->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRemAanvraag() only accepts arguments of type \Model\Custom\NovumSvb\RemAanvraag or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RemAanvraag relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinRemAanvraag($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RemAanvraag');

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
            $this->addJoinObject($join, 'RemAanvraag');
        }

        return $this;
    }

    /**
     * Use the RemAanvraag relation RemAanvraag object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\RemAanvraagQuery A secondary query class using the current class as primary query
     */
    public function useRemAanvraagQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRemAanvraag($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RemAanvraag', '\Model\Custom\NovumSvb\RemAanvraagQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Tog object
     *
     * @param \Model\Custom\NovumSvb\Tog|ObjectCollection $tog the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByTog($tog, $comparison = null)
    {
        if ($tog instanceof \Model\Custom\NovumSvb\Tog) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $tog->getPersoonId(), $comparison);
        } elseif ($tog instanceof ObjectCollection) {
            return $this
                ->useTogQuery()
                ->filterByPrimaryKeys($tog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTog() only accepts arguments of type \Model\Custom\NovumSvb\Tog or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinTog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tog');

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
            $this->addJoinObject($join, 'Tog');
        }

        return $this;
    }

    /**
     * Use the Tog relation Tog object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\TogQuery A secondary query class using the current class as primary query
     */
    public function useTogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tog', '\Model\Custom\NovumSvb\TogQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Wkb object
     *
     * @param \Model\Custom\NovumSvb\Wkb|ObjectCollection $wkb the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByWkb($wkb, $comparison = null)
    {
        if ($wkb instanceof \Model\Custom\NovumSvb\Wkb) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $wkb->getPersoonId(), $comparison);
        } elseif ($wkb instanceof ObjectCollection) {
            return $this
                ->useWkbQuery()
                ->filterByPrimaryKeys($wkb->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByWkb() only accepts arguments of type \Model\Custom\NovumSvb\Wkb or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Wkb relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinWkb($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Wkb');

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
            $this->addJoinObject($join, 'Wkb');
        }

        return $this;
    }

    /**
     * Use the Wkb relation Wkb object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\WkbQuery A secondary query class using the current class as primary query
     */
    public function useWkbQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWkb($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Wkb', '\Model\Custom\NovumSvb\WkbQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPersoon $persoon Object to remove from the list of results
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function prune($persoon = null)
    {
        if ($persoon) {
            $this->addUsingAlias(PersoonTableMap::COL_ID, $persoon->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the persoon table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersoonTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PersoonTableMap::clearInstancePool();
            PersoonTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PersoonTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PersoonTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PersoonTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PersoonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PersoonQuery
