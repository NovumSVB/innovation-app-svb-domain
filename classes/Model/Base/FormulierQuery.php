<?php

namespace Model\Custom\NovumSvb\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumSvb\Formulier as ChildFormulier;
use Model\Custom\NovumSvb\FormulierQuery as ChildFormulierQuery;
use Model\Custom\NovumSvb\Map\FormulierTableMap;
use Model\Setting\CrudManager\CrudEditor;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'formulieren' table.
 *
 *
 *
 * @method     ChildFormulierQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildFormulierQuery orderByTitel($order = Criteria::ASC) Order by the titel column
 * @method     ChildFormulierQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildFormulierQuery orderByIntroText($order = Criteria::ASC) Order by the intro_text column
 * @method     ChildFormulierQuery orderByWetId($order = Criteria::ASC) Order by the wet_id column
 * @method     ChildFormulierQuery orderByCrudEditorId($order = Criteria::ASC) Order by the crud_editor_id column
 *
 * @method     ChildFormulierQuery groupById() Group by the id column
 * @method     ChildFormulierQuery groupByTitel() Group by the titel column
 * @method     ChildFormulierQuery groupByCode() Group by the code column
 * @method     ChildFormulierQuery groupByIntroText() Group by the intro_text column
 * @method     ChildFormulierQuery groupByWetId() Group by the wet_id column
 * @method     ChildFormulierQuery groupByCrudEditorId() Group by the crud_editor_id column
 *
 * @method     ChildFormulierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFormulierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFormulierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFormulierQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFormulierQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFormulierQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFormulierQuery leftJoinCrudEditorReference($relationAlias = null) Adds a LEFT JOIN clause to the query using the CrudEditorReference relation
 * @method     ChildFormulierQuery rightJoinCrudEditorReference($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CrudEditorReference relation
 * @method     ChildFormulierQuery innerJoinCrudEditorReference($relationAlias = null) Adds a INNER JOIN clause to the query using the CrudEditorReference relation
 *
 * @method     ChildFormulierQuery joinWithCrudEditorReference($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CrudEditorReference relation
 *
 * @method     ChildFormulierQuery leftJoinWithCrudEditorReference() Adds a LEFT JOIN clause and with to the query using the CrudEditorReference relation
 * @method     ChildFormulierQuery rightJoinWithCrudEditorReference() Adds a RIGHT JOIN clause and with to the query using the CrudEditorReference relation
 * @method     ChildFormulierQuery innerJoinWithCrudEditorReference() Adds a INNER JOIN clause and with to the query using the CrudEditorReference relation
 *
 * @method     ChildFormulierQuery leftJoinWet($relationAlias = null) Adds a LEFT JOIN clause to the query using the Wet relation
 * @method     ChildFormulierQuery rightJoinWet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Wet relation
 * @method     ChildFormulierQuery innerJoinWet($relationAlias = null) Adds a INNER JOIN clause to the query using the Wet relation
 *
 * @method     ChildFormulierQuery joinWithWet($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Wet relation
 *
 * @method     ChildFormulierQuery leftJoinWithWet() Adds a LEFT JOIN clause and with to the query using the Wet relation
 * @method     ChildFormulierQuery rightJoinWithWet() Adds a RIGHT JOIN clause and with to the query using the Wet relation
 * @method     ChildFormulierQuery innerJoinWithWet() Adds a INNER JOIN clause and with to the query using the Wet relation
 *
 * @method     \Model\Setting\CrudManager\CrudEditorQuery|\Model\Custom\NovumSvb\WetQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFormulier findOne(ConnectionInterface $con = null) Return the first ChildFormulier matching the query
 * @method     ChildFormulier findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFormulier matching the query, or a new ChildFormulier object populated from the query conditions when no match is found
 *
 * @method     ChildFormulier findOneById(int $id) Return the first ChildFormulier filtered by the id column
 * @method     ChildFormulier findOneByTitel(string $titel) Return the first ChildFormulier filtered by the titel column
 * @method     ChildFormulier findOneByCode(string $code) Return the first ChildFormulier filtered by the code column
 * @method     ChildFormulier findOneByIntroText(string $intro_text) Return the first ChildFormulier filtered by the intro_text column
 * @method     ChildFormulier findOneByWetId(int $wet_id) Return the first ChildFormulier filtered by the wet_id column
 * @method     ChildFormulier findOneByCrudEditorId(int $crud_editor_id) Return the first ChildFormulier filtered by the crud_editor_id column *

 * @method     ChildFormulier requirePk($key, ConnectionInterface $con = null) Return the ChildFormulier by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFormulier requireOne(ConnectionInterface $con = null) Return the first ChildFormulier matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFormulier requireOneById(int $id) Return the first ChildFormulier filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFormulier requireOneByTitel(string $titel) Return the first ChildFormulier filtered by the titel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFormulier requireOneByCode(string $code) Return the first ChildFormulier filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFormulier requireOneByIntroText(string $intro_text) Return the first ChildFormulier filtered by the intro_text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFormulier requireOneByWetId(int $wet_id) Return the first ChildFormulier filtered by the wet_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFormulier requireOneByCrudEditorId(int $crud_editor_id) Return the first ChildFormulier filtered by the crud_editor_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFormulier[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFormulier objects based on current ModelCriteria
 * @method     ChildFormulier[]|ObjectCollection findById(int $id) Return ChildFormulier objects filtered by the id column
 * @method     ChildFormulier[]|ObjectCollection findByTitel(string $titel) Return ChildFormulier objects filtered by the titel column
 * @method     ChildFormulier[]|ObjectCollection findByCode(string $code) Return ChildFormulier objects filtered by the code column
 * @method     ChildFormulier[]|ObjectCollection findByIntroText(string $intro_text) Return ChildFormulier objects filtered by the intro_text column
 * @method     ChildFormulier[]|ObjectCollection findByWetId(int $wet_id) Return ChildFormulier objects filtered by the wet_id column
 * @method     ChildFormulier[]|ObjectCollection findByCrudEditorId(int $crud_editor_id) Return ChildFormulier objects filtered by the crud_editor_id column
 * @method     ChildFormulier[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FormulierQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumSvb\Base\FormulierQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumSvb\\Formulier', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFormulierQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFormulierQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFormulierQuery) {
            return $criteria;
        }
        $query = new ChildFormulierQuery();
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
     * @return ChildFormulier|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FormulierTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FormulierTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFormulier A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, titel, code, intro_text, wet_id, crud_editor_id FROM formulieren WHERE id = :p0';
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
            /** @var ChildFormulier $obj */
            $obj = new ChildFormulier();
            $obj->hydrate($row);
            FormulierTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFormulier|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FormulierTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FormulierTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FormulierTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FormulierTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FormulierTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function filterByTitel($titel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($titel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FormulierTableMap::COL_TITEL, $titel, $comparison);
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
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FormulierTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the intro_text column
     *
     * Example usage:
     * <code>
     * $query->filterByIntroText('fooValue');   // WHERE intro_text = 'fooValue'
     * $query->filterByIntroText('%fooValue%', Criteria::LIKE); // WHERE intro_text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $introText The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function filterByIntroText($introText = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($introText)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FormulierTableMap::COL_INTRO_TEXT, $introText, $comparison);
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
     * @see       filterByWet()
     *
     * @param     mixed $wetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function filterByWetId($wetId = null, $comparison = null)
    {
        if (is_array($wetId)) {
            $useMinMax = false;
            if (isset($wetId['min'])) {
                $this->addUsingAlias(FormulierTableMap::COL_WET_ID, $wetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wetId['max'])) {
                $this->addUsingAlias(FormulierTableMap::COL_WET_ID, $wetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FormulierTableMap::COL_WET_ID, $wetId, $comparison);
    }

    /**
     * Filter the query on the crud_editor_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCrudEditorId(1234); // WHERE crud_editor_id = 1234
     * $query->filterByCrudEditorId(array(12, 34)); // WHERE crud_editor_id IN (12, 34)
     * $query->filterByCrudEditorId(array('min' => 12)); // WHERE crud_editor_id > 12
     * </code>
     *
     * @see       filterByCrudEditorReference()
     *
     * @param     mixed $crudEditorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function filterByCrudEditorId($crudEditorId = null, $comparison = null)
    {
        if (is_array($crudEditorId)) {
            $useMinMax = false;
            if (isset($crudEditorId['min'])) {
                $this->addUsingAlias(FormulierTableMap::COL_CRUD_EDITOR_ID, $crudEditorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crudEditorId['max'])) {
                $this->addUsingAlias(FormulierTableMap::COL_CRUD_EDITOR_ID, $crudEditorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FormulierTableMap::COL_CRUD_EDITOR_ID, $crudEditorId, $comparison);
    }

    /**
     * Filter the query by a related \Model\Setting\CrudManager\CrudEditor object
     *
     * @param \Model\Setting\CrudManager\CrudEditor|ObjectCollection $crudEditor The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFormulierQuery The current query, for fluid interface
     */
    public function filterByCrudEditorReference($crudEditor, $comparison = null)
    {
        if ($crudEditor instanceof \Model\Setting\CrudManager\CrudEditor) {
            return $this
                ->addUsingAlias(FormulierTableMap::COL_CRUD_EDITOR_ID, $crudEditor->getId(), $comparison);
        } elseif ($crudEditor instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FormulierTableMap::COL_CRUD_EDITOR_ID, $crudEditor->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCrudEditorReference() only accepts arguments of type \Model\Setting\CrudManager\CrudEditor or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CrudEditorReference relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function joinCrudEditorReference($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CrudEditorReference');

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
            $this->addJoinObject($join, 'CrudEditorReference');
        }

        return $this;
    }

    /**
     * Use the CrudEditorReference relation CrudEditor object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Setting\CrudManager\CrudEditorQuery A secondary query class using the current class as primary query
     */
    public function useCrudEditorReferenceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCrudEditorReference($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CrudEditorReference', '\Model\Setting\CrudManager\CrudEditorQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumSvb\Wet object
     *
     * @param \Model\Custom\NovumSvb\Wet|ObjectCollection $wet The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFormulierQuery The current query, for fluid interface
     */
    public function filterByWet($wet, $comparison = null)
    {
        if ($wet instanceof \Model\Custom\NovumSvb\Wet) {
            return $this
                ->addUsingAlias(FormulierTableMap::COL_WET_ID, $wet->getId(), $comparison);
        } elseif ($wet instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FormulierTableMap::COL_WET_ID, $wet->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByWet() only accepts arguments of type \Model\Custom\NovumSvb\Wet or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Wet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function joinWet($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Wet');

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
            $this->addJoinObject($join, 'Wet');
        }

        return $this;
    }

    /**
     * Use the Wet relation Wet object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumSvb\WetQuery A secondary query class using the current class as primary query
     */
    public function useWetQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Wet', '\Model\Custom\NovumSvb\WetQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFormulier $formulier Object to remove from the list of results
     *
     * @return $this|ChildFormulierQuery The current query, for fluid interface
     */
    public function prune($formulier = null)
    {
        if ($formulier) {
            $this->addUsingAlias(FormulierTableMap::COL_ID, $formulier->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the formulieren table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FormulierTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FormulierTableMap::clearInstancePool();
            FormulierTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FormulierTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FormulierTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FormulierTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FormulierTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FormulierQuery
