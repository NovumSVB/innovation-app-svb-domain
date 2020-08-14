<?php

namespace Model\Custom\NovumSvb\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumSvb\AowAanvraag as ChildAowAanvraag;
use Model\Custom\NovumSvb\AowAanvraagQuery as ChildAowAanvraagQuery;
use Model\Custom\NovumSvb\Map\AowAanvraagTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'aow_aanvraag' table.
 *
 *
 *
 * @method     ChildAowAanvraagQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAowAanvraagQuery orderByPersoonId($order = Criteria::ASC) Order by the persoon_id column
 * @method     ChildAowAanvraagQuery orderByGeboorteDatum($order = Criteria::ASC) Order by the geboorte_datum column
 * @method     ChildAowAanvraagQuery orderByGeboorteLand($order = Criteria::ASC) Order by the geboorte_land column
 * @method     ChildAowAanvraagQuery orderByImmigratieDatum($order = Criteria::ASC) Order by the immigratie_datum column
 * @method     ChildAowAanvraagQuery orderByHeeftNlPaspoort($order = Criteria::ASC) Order by the heeft_nl_paspoort column
 * @method     ChildAowAanvraagQuery orderByEmigratieLand($order = Criteria::ASC) Order by the emigratie_land column
 * @method     ChildAowAanvraagQuery orderByEmigratieVerblijfsvergunning($order = Criteria::ASC) Order by the emigratie_verblijfsvergunning column
 * @method     ChildAowAanvraagQuery orderByPartnerEmigratieVerblijfsvergunning($order = Criteria::ASC) Order by the partner_emigratie_verblijfsvergunning column
 *
 * @method     ChildAowAanvraagQuery groupById() Group by the id column
 * @method     ChildAowAanvraagQuery groupByPersoonId() Group by the persoon_id column
 * @method     ChildAowAanvraagQuery groupByGeboorteDatum() Group by the geboorte_datum column
 * @method     ChildAowAanvraagQuery groupByGeboorteLand() Group by the geboorte_land column
 * @method     ChildAowAanvraagQuery groupByImmigratieDatum() Group by the immigratie_datum column
 * @method     ChildAowAanvraagQuery groupByHeeftNlPaspoort() Group by the heeft_nl_paspoort column
 * @method     ChildAowAanvraagQuery groupByEmigratieLand() Group by the emigratie_land column
 * @method     ChildAowAanvraagQuery groupByEmigratieVerblijfsvergunning() Group by the emigratie_verblijfsvergunning column
 * @method     ChildAowAanvraagQuery groupByPartnerEmigratieVerblijfsvergunning() Group by the partner_emigratie_verblijfsvergunning column
 *
 * @method     ChildAowAanvraagQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAowAanvraagQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAowAanvraagQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAowAanvraagQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAowAanvraagQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAowAanvraagQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAowAanvraag findOne(ConnectionInterface $con = null) Return the first ChildAowAanvraag matching the query
 * @method     ChildAowAanvraag findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAowAanvraag matching the query, or a new ChildAowAanvraag object populated from the query conditions when no match is found
 *
 * @method     ChildAowAanvraag findOneById(int $id) Return the first ChildAowAanvraag filtered by the id column
 * @method     ChildAowAanvraag findOneByPersoonId(int $persoon_id) Return the first ChildAowAanvraag filtered by the persoon_id column
 * @method     ChildAowAanvraag findOneByGeboorteDatum(string $geboorte_datum) Return the first ChildAowAanvraag filtered by the geboorte_datum column
 * @method     ChildAowAanvraag findOneByGeboorteLand(string $geboorte_land) Return the first ChildAowAanvraag filtered by the geboorte_land column
 * @method     ChildAowAanvraag findOneByImmigratieDatum(string $immigratie_datum) Return the first ChildAowAanvraag filtered by the immigratie_datum column
 * @method     ChildAowAanvraag findOneByHeeftNlPaspoort(boolean $heeft_nl_paspoort) Return the first ChildAowAanvraag filtered by the heeft_nl_paspoort column
 * @method     ChildAowAanvraag findOneByEmigratieLand(string $emigratie_land) Return the first ChildAowAanvraag filtered by the emigratie_land column
 * @method     ChildAowAanvraag findOneByEmigratieVerblijfsvergunning(boolean $emigratie_verblijfsvergunning) Return the first ChildAowAanvraag filtered by the emigratie_verblijfsvergunning column
 * @method     ChildAowAanvraag findOneByPartnerEmigratieVerblijfsvergunning(boolean $partner_emigratie_verblijfsvergunning) Return the first ChildAowAanvraag filtered by the partner_emigratie_verblijfsvergunning column *

 * @method     ChildAowAanvraag requirePk($key, ConnectionInterface $con = null) Return the ChildAowAanvraag by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAowAanvraag requireOne(ConnectionInterface $con = null) Return the first ChildAowAanvraag matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAowAanvraag requireOneById(int $id) Return the first ChildAowAanvraag filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAowAanvraag requireOneByPersoonId(int $persoon_id) Return the first ChildAowAanvraag filtered by the persoon_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAowAanvraag requireOneByGeboorteDatum(string $geboorte_datum) Return the first ChildAowAanvraag filtered by the geboorte_datum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAowAanvraag requireOneByGeboorteLand(string $geboorte_land) Return the first ChildAowAanvraag filtered by the geboorte_land column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAowAanvraag requireOneByImmigratieDatum(string $immigratie_datum) Return the first ChildAowAanvraag filtered by the immigratie_datum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAowAanvraag requireOneByHeeftNlPaspoort(boolean $heeft_nl_paspoort) Return the first ChildAowAanvraag filtered by the heeft_nl_paspoort column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAowAanvraag requireOneByEmigratieLand(string $emigratie_land) Return the first ChildAowAanvraag filtered by the emigratie_land column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAowAanvraag requireOneByEmigratieVerblijfsvergunning(boolean $emigratie_verblijfsvergunning) Return the first ChildAowAanvraag filtered by the emigratie_verblijfsvergunning column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAowAanvraag requireOneByPartnerEmigratieVerblijfsvergunning(boolean $partner_emigratie_verblijfsvergunning) Return the first ChildAowAanvraag filtered by the partner_emigratie_verblijfsvergunning column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAowAanvraag[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAowAanvraag objects based on current ModelCriteria
 * @method     ChildAowAanvraag[]|ObjectCollection findById(int $id) Return ChildAowAanvraag objects filtered by the id column
 * @method     ChildAowAanvraag[]|ObjectCollection findByPersoonId(int $persoon_id) Return ChildAowAanvraag objects filtered by the persoon_id column
 * @method     ChildAowAanvraag[]|ObjectCollection findByGeboorteDatum(string $geboorte_datum) Return ChildAowAanvraag objects filtered by the geboorte_datum column
 * @method     ChildAowAanvraag[]|ObjectCollection findByGeboorteLand(string $geboorte_land) Return ChildAowAanvraag objects filtered by the geboorte_land column
 * @method     ChildAowAanvraag[]|ObjectCollection findByImmigratieDatum(string $immigratie_datum) Return ChildAowAanvraag objects filtered by the immigratie_datum column
 * @method     ChildAowAanvraag[]|ObjectCollection findByHeeftNlPaspoort(boolean $heeft_nl_paspoort) Return ChildAowAanvraag objects filtered by the heeft_nl_paspoort column
 * @method     ChildAowAanvraag[]|ObjectCollection findByEmigratieLand(string $emigratie_land) Return ChildAowAanvraag objects filtered by the emigratie_land column
 * @method     ChildAowAanvraag[]|ObjectCollection findByEmigratieVerblijfsvergunning(boolean $emigratie_verblijfsvergunning) Return ChildAowAanvraag objects filtered by the emigratie_verblijfsvergunning column
 * @method     ChildAowAanvraag[]|ObjectCollection findByPartnerEmigratieVerblijfsvergunning(boolean $partner_emigratie_verblijfsvergunning) Return ChildAowAanvraag objects filtered by the partner_emigratie_verblijfsvergunning column
 * @method     ChildAowAanvraag[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AowAanvraagQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumSvb\Base\AowAanvraagQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumSvb\\AowAanvraag', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAowAanvraagQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAowAanvraagQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAowAanvraagQuery) {
            return $criteria;
        }
        $query = new ChildAowAanvraagQuery();
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
     * @return ChildAowAanvraag|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AowAanvraagTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AowAanvraagTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAowAanvraag A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, persoon_id, geboorte_datum, geboorte_land, immigratie_datum, heeft_nl_paspoort, emigratie_land, emigratie_verblijfsvergunning, partner_emigratie_verblijfsvergunning FROM aow_aanvraag WHERE id = :p0';
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
            /** @var ChildAowAanvraag $obj */
            $obj = new ChildAowAanvraag();
            $obj->hydrate($row);
            AowAanvraagTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAowAanvraag|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AowAanvraagTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AowAanvraagTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AowAanvraagTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AowAanvraagTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AowAanvraagTableMap::COL_ID, $id, $comparison);
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
     * @param     mixed $persoonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterByPersoonId($persoonId = null, $comparison = null)
    {
        if (is_array($persoonId)) {
            $useMinMax = false;
            if (isset($persoonId['min'])) {
                $this->addUsingAlias(AowAanvraagTableMap::COL_PERSOON_ID, $persoonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persoonId['max'])) {
                $this->addUsingAlias(AowAanvraagTableMap::COL_PERSOON_ID, $persoonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AowAanvraagTableMap::COL_PERSOON_ID, $persoonId, $comparison);
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
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterByGeboorteDatum($geboorteDatum = null, $comparison = null)
    {
        if (is_array($geboorteDatum)) {
            $useMinMax = false;
            if (isset($geboorteDatum['min'])) {
                $this->addUsingAlias(AowAanvraagTableMap::COL_GEBOORTE_DATUM, $geboorteDatum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geboorteDatum['max'])) {
                $this->addUsingAlias(AowAanvraagTableMap::COL_GEBOORTE_DATUM, $geboorteDatum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AowAanvraagTableMap::COL_GEBOORTE_DATUM, $geboorteDatum, $comparison);
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
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterByGeboorteLand($geboorteLand = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($geboorteLand)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AowAanvraagTableMap::COL_GEBOORTE_LAND, $geboorteLand, $comparison);
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
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterByImmigratieDatum($immigratieDatum = null, $comparison = null)
    {
        if (is_array($immigratieDatum)) {
            $useMinMax = false;
            if (isset($immigratieDatum['min'])) {
                $this->addUsingAlias(AowAanvraagTableMap::COL_IMMIGRATIE_DATUM, $immigratieDatum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($immigratieDatum['max'])) {
                $this->addUsingAlias(AowAanvraagTableMap::COL_IMMIGRATIE_DATUM, $immigratieDatum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AowAanvraagTableMap::COL_IMMIGRATIE_DATUM, $immigratieDatum, $comparison);
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
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterByHeeftNlPaspoort($heeftNlPaspoort = null, $comparison = null)
    {
        if (is_string($heeftNlPaspoort)) {
            $heeftNlPaspoort = in_array(strtolower($heeftNlPaspoort), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AowAanvraagTableMap::COL_HEEFT_NL_PASPOORT, $heeftNlPaspoort, $comparison);
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
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterByEmigratieLand($emigratieLand = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emigratieLand)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AowAanvraagTableMap::COL_EMIGRATIE_LAND, $emigratieLand, $comparison);
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
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterByEmigratieVerblijfsvergunning($emigratieVerblijfsvergunning = null, $comparison = null)
    {
        if (is_string($emigratieVerblijfsvergunning)) {
            $emigratieVerblijfsvergunning = in_array(strtolower($emigratieVerblijfsvergunning), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AowAanvraagTableMap::COL_EMIGRATIE_VERBLIJFSVERGUNNING, $emigratieVerblijfsvergunning, $comparison);
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
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function filterByPartnerEmigratieVerblijfsvergunning($partnerEmigratieVerblijfsvergunning = null, $comparison = null)
    {
        if (is_string($partnerEmigratieVerblijfsvergunning)) {
            $partnerEmigratieVerblijfsvergunning = in_array(strtolower($partnerEmigratieVerblijfsvergunning), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AowAanvraagTableMap::COL_PARTNER_EMIGRATIE_VERBLIJFSVERGUNNING, $partnerEmigratieVerblijfsvergunning, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAowAanvraag $aowAanvraag Object to remove from the list of results
     *
     * @return $this|ChildAowAanvraagQuery The current query, for fluid interface
     */
    public function prune($aowAanvraag = null)
    {
        if ($aowAanvraag) {
            $this->addUsingAlias(AowAanvraagTableMap::COL_ID, $aowAanvraag->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the aow_aanvraag table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AowAanvraagTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AowAanvraagTableMap::clearInstancePool();
            AowAanvraagTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AowAanvraagTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AowAanvraagTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AowAanvraagTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AowAanvraagTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AowAanvraagQuery
