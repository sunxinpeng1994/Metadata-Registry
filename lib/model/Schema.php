<?php

/**
 * Subclass for representing a row from the 'reg_schema' table.
 *
 *
 *
 * @package lib.model
 */
class Schema extends BaseSchema
{
  public function __toString()
  {
    return $this->getName();
  }

  /**
   * Get the [languages] column value.
   *
   * @return     string
   */
  public function getLanguages()
  {
    //this deliberately returns the default language if languages is empty
    return ($this->languages) ? unserialize($this->languages) : [$this->language];
  }

  /**
   * @param int $userId
   *
   * @return bool|array
   */
  public function getLanguagesForUser($userId)
  {
    $schemaUser = $this->GetUserForSchema($userId);
    return $schemaUser ? $schemaUser->getLanguages() : false;
  }

  /**
   * @param $userId
   *
   * @return bool|SchemaHasUser
   */
  public function GetUserForSchema($userId)
  {
    $c = new Criteria();
    $c->add(SchemaHasUserPeer::USER_ID, $userId);

    $schemaUser = $this->getSchemaHasUsers($c);
    return isset($schemaUser[0]) ? $schemaUser[0] : false;
  }
  /**
   * Set the value of [languages] column.
   *
   * @param      string $v new value
   *
   * @return     void
   */
  public function setLanguages($v)
  {

    // Since the native PHP type for this column is string,
    // we will serialize the input to a string (if it is not).
    if ($v !== null) {
      $v = serialize($v);
    }

    parent::setLanguages($v);
  } // setLanguages()

  public function save($con = null)
  {
    $userId = sfContext::getInstance()->getUser()->getSubscriberId();
    if ($userId)
    {
      $this->setUpdatedUserId($userId);
      if ($this->isNew())
      {
        $this->setCreatedUserId($userId);
      }
    }

    $con = Propel::getConnection();
    try
    {
      $con->begin();

      $ret = parent::save($con);

      // update schema_has_user table
      $schemaId = $this->getId();
      $mode = sfContext::getInstance()->getRequest()->getParameter('action');
      if ($userId && $schemaId)
      {
        //see if there's already an entry in the table and if not, add it
        $criteria = new Criteria();
        $criteria->add(SchemaHasUserPeer::USER_ID, $userId);
        $SchemaHasUsersColl = $this->getSchemaHasUsers($criteria, $con);

        if (!count($SchemaHasUsersColl))
        {
          $schemaUser = new SchemaHasUser();
          $schemaUser->setSchemaId($schemaId);
          $schemaUser->setUserId($userId);
          $schemaUser->setIsRegistrarFor(true);
          $schemaUser->setIsAdminFor(true);
          $schemaUser->setIsMaintainerFor(true);
          $schemaUser->save($con);
        }

      }

      $con->commit();

      return $ret;

    }
    catch (Exception $e)
    {
      $con->rollback();
      throw $e;
    }
  }

  /**
  * Gets the created_by_user
  *
  * @return User
  */
  public function getCreatedUser()
  {
    $user = $this->getUserRelatedByCreatedUserId();
    if ($user)
    {
      return $user->getUser();
    }

  } // getCreatedUser

  /**
  * Gets the updated_by_user
  *
  * @return User
  */
  public function getUpdatedUser()
  {
    $user = $this->getUserRelatedByUpdatedUserId();
    if ($user)
    {
      return $user->getUser();
    }

  } // getUpdatedUser

  /**
   * get the schema fields profile
   *
   * @return array The fields
   */
  public static function getProfileArray() {
    $c = new Criteria();
    $c->add(ProfilePropertyPeer::PROFILE_ID, 1);

    return ProfilePropertyPeer::doSelect($c);
  }

  /**
   * get the schema fields array (field_id => field name)
   *
   * @return array The fields
   */
  public static function getProfileFields() {
    $properties = self::getProfileArray();
    $fieldsNew  = array();
    foreach ($properties as $property) {
      $fieldsNew[ $property->getId() ] = sfInflector::underscore($property->getName());
    }
    /**
     * @todo $fields needs to come from an application profile for schemas, or the vocabulary
     **/
    $fields = array(
      1 => 'name',
      2 => 'label',
      3 => 'definition',
      4 => 'type',
      5 => 'comment',
      6 => 'related_property',
      7 => 'note'
    );

    return $fieldsNew;
  }

  /**
  * clears the properties
  *
  */
  public function clearProperties()
  {
    $this->collSchemaPropertys = null;
  }

  /**
  * gets just the properties, ordered by name
  *
  * @return array SchemaProperty
  */
  public function getProperties()
  {
    $c = new Criteria();
    $c->add(SchemaPropertyPeer::TYPE,'property');
    $c->addOr(SchemaPropertyPeer::TYPE,'subproperty');
    $c->addJoin(SchemaPropertyI18nPeer::ID,BaseSchemaPropertyPeer::ID);
    $c->addAscendingOrderByColumn(SchemaPropertyI18nPeer::NAME);

    return $this->getSchemaPropertysJoinStatus($c);
  }

  /**
  * gets just the classes, ordered by name
  *
  * @return array SchemaProperty
  */
  public function getClasses()
  {
    $c = new Criteria();
    $c->add(SchemaPropertyPeer::TYPE,'class');
    $c->addOr(SchemaPropertyPeer::TYPE,'subclass');
    $c->addJoin(SchemaPropertyI18nPeer::ID,BaseSchemaPropertyPeer::ID);
    $c->addAscendingOrderByColumn(SchemaPropertyi18nPeer::NAME);

    return $this->getSchemaPropertysJoinStatus($c);
  }

  public function publish() {
    //open a file for write

    //init the array
    /** @var ProfileProperty[] $propArray */
    $propArray = [];

    //get the profile properties
    $c=new Criteria();
    $c->add(ProfilePropertyPeer::PROFILE_ID, 1);
    /** @var ProfileProperty[] $ProfileProps */
    $ProfileProps = ProfilePropertyPeer::doSelect($c);
    foreach ( $ProfileProps as $prop) {
      $propArray[$prop->getId()]['name'] = $prop->getName();
      $propArray[$prop->getId()]['name']['isData'] = $prop->getHasLanguage();
    }
    //todo: figure out a better way to set the rdf:type property. probably in the data
    /** This is the id of rdf:type, which isn't used directly  */
    $propArray[4] = "@type";

    //get a list of the resources
    /** @var SchemaProperty[] $properties */
    $properties = $this->getSchemaPropertys();
    //foreach resource
    foreach ($properties as $property) {
      $resourceArray = [];
      $resourceArray["@id"] = $property->getUri();
      $resourceArray["@type"] = $property->getUri();
      /** @var SchemaPropertyElement $element */
      foreach ($property->getSchemaPropertyElementsRelatedBySchemaPropertyId() as $element) {
        /** @var string $ppi */
        $ppi = $propArray[$element->getProfilePropertyId()];
        //id
        $rdfArray[$ppi] = $element->getObject();
        $foo = 'foo';
        //add it to the array
      }
    }

    //get all of the elements as an array
    //foreach property
    //if the value is an object properties
      //get the object and make an array of the returned values
    //get all of the object properties
  }
}
