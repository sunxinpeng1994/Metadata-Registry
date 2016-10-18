<?php

/**
 * Subclass for performing query and update operations on the 'reg_agent' table.
 *
 *
 *
 * @package lib.model
 */
class AgentPeer extends BaseAgentPeer
{
  /**
  * gets an array of Agent objects related to a user
  *
  * @return Agent
  */
  public static function getAgentsForCurrentUser()
  {
    $isAdmin = sfContext::getInstance()->getUser()->hasCredential(array (0 => 'administrator' ));
    $c = new Criteria();
    if (!$isAdmin)
    {
      $userId = sfContext::getInstance()->getUser()->getSubscriberId();
      $c->addJoin(AgentHasUserPeer::AGENT_ID, AgentPeer::ID);
      $c->add(AgentHasUserPeer::USER_ID,$userId);
    }
    $c->addAscendingOrderByColumn(AgentPeer::ORG_NAME);
    $result = AgentPeer::doSelect($c);
    return $result;
  }


  /**
   * @param Criteria $criteria
   * @param Connection|null|null $con
   *
   * @return ResultSet
   */
  public static function doSelectRS(Criteria $criteria, $con = null)
  {
    //we always inject a check for private projects (agents) into the criteria
    return parent::doSelectRS($criteria, $con); // TODO: Change the autogenerated stub
  }
} // AgentPeer
