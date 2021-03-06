<?php

/**
 * Subclass for performing query and update operations on the 'reg_concept_property' table.
 *
 *
 *
 * @package lib.model
 */
class ConceptPropertyPeer extends BaseConceptPropertyPeer
{
	/** the column name for the VOCABULARY_ID field */
	public const VOCABULARY_ID = 'reg_concept.VOCABULARY_ID';

	/** the column name for the VOCABULARY_NAME field */
    public const VOCABULARY_NAME = 'reg_vocabulary.NAME';

	/** the column name for the SKOS_PROPERTY_NAME field */
    public const SKOS_PROPERTY_NAME = 'reg_skos_property.NAME';

	/** the column name for the PREF_LABEL field */
    public const CONCEPT_PREF_LABEL = 'reg_concept.PREF_LABEL';

	/** the PREF_LABEL profile property id */
	public const PREF_LABEL_PROFILE_PROPERTY_ID = 45;

    /**
     * sets the criteria and returns the few columns needed for concept property search results
     *
     * @param \Criteria  $c
     * @param Connection $con
     *
     * @return array Array of selected Objects
     */
   public static function doSelectSearchResults(Criteria $c, $con = null)
	{
		$c = clone $c;
		$c->clearSelectColumns();

		$c->addSelectColumn(ConceptPropertyPeer::ID);
		$c->addSelectColumn(ConceptPropertyPeer::LANGUAGE);
		$c->addSelectColumn(ConceptPropertyPeer::OBJECT);
		$c->addSelectColumn(ConceptPropertyPeer::SKOS_PROPERTY_ID);

		$c->addSelectColumn(ConceptPeer::ID);
		$c->addSelectColumn(ConceptPeer::PREF_LABEL);

		$c->addSelectColumn(ConceptPeer::VOCABULARY_ID);
		$c->addSelectColumn(VocabularyPeer::NAME);

		$c->addSelectColumn(SkosPropertyPeer::LABEL);

		$c->addJoin(ConceptPeer::VOCABULARY_ID, VocabularyPeer::ID);
		$c->addJoin(ConceptPropertyPeer::CONCEPT_ID, ConceptPeer::ID);
		$c->addJoin(ConceptPropertyPeer::SKOS_PROPERTY_ID, SkosPropertyPeer::ID);

      //populateObjects(ResultSet $rs)
		$rs = self::doSelectRS($c);
      $results = array();

		// set the class once to avoid overhead in the loop
		$cls = self::getOMClass();
		$cls = Propel::import($cls);
		// populate the object(s)
		while($rs->next())
      {
			$startcol = 1;
			$obj = new $cls();
         try {
			   $obj->setId($rs->getInt($startcol + 0));
			   $obj->setLanguage($rs->getString($startcol + 1));
			   $obj->setObject($rs->getString($startcol + 2));
			   $obj->setSkosPropertyId($rs->getInt($startcol + 3));
			   $obj->setConceptId($rs->getInt($startcol + 4));
				$obj->setConceptPrefLabel($rs->getString($startcol + 5));
				$obj->setVocabularyId($rs->getInt($startcol + 6));
				$obj->setVocabularyName($rs->getString($startcol + 7));
				$obj->setSkosPropertyName($rs->getString($startcol + 8));
		   } catch (Exception $e) {
			   throw new PropelException("Error populating Concept Search Results", $e);
		   }
			$results[] = $obj;
		} //while($rs->next())

      return $results;
   }

	/**
	 * description
	 *
	 *
	 * @param int $conceptId
	 * @param int $skosId
	 * @param string $language
	 * @return ConceptProperty
	 */
  public static function lookupProperty($conceptId, $skosId, $language = null)
  {
    $c = new Criteria();
    $c->add(self::CONCEPT_ID, $conceptId);
    $c->add(self::SKOS_PROPERTY_ID, $skosId);

    if (isset($language))
    {
      $skosProperty = SkosPropertyPeer::retrieveByPK($skosId);
      if ('resource' != $skosProperty->getObjectType())
      {
        $c->add(self::LANGUAGE, $language);
      }
    }

    $results = self::doSelectOne($c);

    return $results;
  }


} // ConceptPropertyPeer

sfPropelBehavior::add('ConceptProperty', array('paranoid'));

