<?php
/**
* @todo topnav really should be generated by admin-genrator and configured by generator.yml
**/

  $sf_context->getResponse()->addStylesheet('ui');

//this section defines the tabs
  $topnav = array();
  //users
  $topnav['user']      ['Detail']      ['link'] = 'user/show?id=';
  $topnav['user']      ['Owners']      ['link'] = '/agentuser/list?user_id=';
  $topnav['user']      ['Vocabularies']['link'] = '/vocabuser/list?user_id=';
  $topnav['user']      ['Element Sets']['link'] = '/schemauser/list?user_id=';
  //owners
  $topnav['agent']      ['Detail']     ['link'] = 'agent/show?id=';
  $topnav['agent']      ['Members']    ['link'] = '/agentuser/list?agent_id=';
  //vocabularies
  $topnav['vocabulary'] ['Detail']     ['link'] = '/vocabulary/show?id=';
  $topnav['vocabulary'] ['Concepts']   ['link'] = '/concept/list?vocabulary_id=';
  $topnav['vocabulary'] ['History']    ['link'] = '/history/list?vocabulary_id=';
  $topnav['vocabulary'] ['Versions']   ['link'] = '/version/list?vocabulary_id=';
  $topnav['vocabulary'] ['Maintainers']['link'] = '/vocabuser/list?vocabulary_id=';
  //$topnav['vocabulary'] ['Discuss']    ['link'] = '/discuss/list?vocabulary_id=';
  //concepts
  $topnav['concept']    ['Detail']     ['link'] = '/concept/show?id=';
  $topnav['concept']    ['Properties'] ['link'] = '/conceptprop/list?concept_id=';
  $topnav['concept']    ['History']    ['link'] = '/history/list?concept_id=';
  //$topnav['concept']    ['Discuss']    ['link'] = '/discuss/list?concept_id=';
  //properties
  $topnav['conceptprop']['Detail']     ['link'] = '/conceptprop/show?id=';
  $topnav['conceptprop']['History']    ['link'] = '/history/list?property_id=';
  //$topnav['conceptprop']['Discuss']    ['link'] = '/discuss/list?property_id=';
  //schemas
  $topnav['schema']     ['Detail']     ['link'] = '/schema/show?id=';
  $topnav['schema']     ['Elements']   ['link'] = '/schemaprop/list?schema_id=';
//  $topnav['schema']     ['Namespaces'] ['link'] = '/namespace/list?schema_id=';
  $topnav['schema']     ['History']    ['link'] = '/schemahistory/list?schema_id=';
//  $topnav['schema']     ['Versions']   ['link'] = '/schemaversion/list?schema_id=';
  $topnav['schema']     ['Maintainers']['link'] = '/schemauser/list?schema_id=';
  //$topnav['schema']     ['Discuss']    ['link'] = '/discuss/list?schema_id=';
  //schema properties
  $topnav['schemaprop'] ['Detail']     ['link'] = '/schemaprop/show?id=';
  $topnav['schemaprop'] ['Statements']   ['link'] = '/schemapropel/list?schema_property_id=';
  $topnav['schemaprop'] ['History']    ['link'] = '/schemahistory/list?schema_property_id=';
  //$topnav['schemaprop'] ['Discuss']    ['link'] = '/discuss/list?schema_property_id=';
  //properties
  $topnav['schemapropel']['Detail']    ['link'] = '/schemapropel/show?id=';
  $topnav['schemapropel']['History']   ['link'] = '/schemahistory/list?schema_property_element_id=';
  //$topnav['schemapropel']['Discuss']   ['link'] = '/discuss/list?schema_property_element_id=';

//this section determines what tab will be shown (or not) by each module/action combination

  //refine which tab is shown based on the id presented with the action
  //this could probably be improved by adding another node to the tabmap array
  $filter = '';
  foreach (array('agent','vocabulary','concept','property','user','schema_property_element','schema_property','schema') as $value)
  {
    $paramId = $sf_params->get($value . "_id");
    if ($paramId)
    {
      $filter = $value;
      break;
    }
  }
  //little hack for property
  $filter = ('property' == $filter) ? 'conceptprop' : $filter;

  /*
  * map looks like this:
  * $tabmap[action][module][which tab to display][which action to place in the page meta title]
  * This will also provide some control of the breadcrumbs -- some pages have BCs but no tab
  * These no-tab 'tabs' will have a non-tab '[which tab to display]' node
  *
  */
  $tabMap = array();

  $tabMap['discuss']      ['show'] = array('tab' => 'discussdetail',  'title' => 'Show Discussion Detail');

  $tabMap['history']      ['show'] = array('tab' => 'historydetail',  'title' => 'Show History Detail');
  $tabMap['schemahistory']['show'] = array('tab' => 'schemahistorydetail', 'title' => 'Show History Detail');

  $tabMap['user']         ['list'] = array('tab' => 'userlist',       'title' => 'List Members');
  $tabMap['user']         ['show'] = array('tab' => 'user',           'title' => 'Show Detail');
  if ('user' == $filter)
  {
    $tabMap['agentuser']  ['list'] = array('tab' => 'user',           'title' => 'List Owners');
    $tabMap['vocabuser']  ['list'] = array('tab' => 'user',           'title' => 'List Vocabularies');
    $tabMap['schemauser'] ['list'] = array('tab' => 'user',           'title' => 'List Element Sets');
  }

  $tabMap['agent']        ['list'] = array('tab' => 'agentlist',      'title' => 'List Owners');
  $tabMap['agent']        ['show'] = array('tab' => 'agent',          'title' => 'Show Detail');
  if ('agent' == $filter)
  {
    $tabMap['agentuser']  ['list'] = array('tab' => 'agent',          'title' => 'List Members');
  }

  $tabMap['vocabulary']   ['list'] = array('tab' => 'vocabularylist', 'title' => 'List');
  $tabMap['concept']      ['list'] = array('tab' => 'vocabulary',     'title' => 'List Concepts');

  $tabMap['vocabulary']   ['show'] = array('tab' => 'vocabulary',     'title' => 'Show Detail');
  if ('vocabulary' == $filter)
  {
    $tabMap['discuss']    ['list'] = array('tab' => 'vocabulary',     'title' => 'Discussion');
    $tabMap['history']    ['list'] = array('tab' => 'vocabulary',     'title' => 'History of Changes');
    $tabMap['version']    ['list'] = array('tab' => 'vocabulary',     'title' => 'List Versions');
    $tabMap['vocabuser']  ['list'] = array('tab' => 'vocabulary',     'title' => 'List Maintainers');
  }

  $tabMap['concept']      ['show'] = array('tab' => 'concept',        'title' => 'Show Detail');
  if ('concept' == $filter)
  {
    $tabMap['conceptprop']['list'] = array('tab' => 'concept',        'title' => 'List Properties');
    $tabMap['history']    ['list'] = array('tab' => 'concept',        'title' => 'History of Changes');
    $tabMap['version']    ['list'] = array('tab' => 'concept',        'title' => 'List Versions');
    $tabMap['discuss']    ['list'] = array('tab' => 'concept',        'title' => 'Discussion');
  }

  $tabMap['conceptprop']['show'] = array('tab' => 'conceptprop',      'title' => 'Show Detail');
  if ('conceptprop' == $filter)
  {
    $tabMap['discuss']    ['list'] = array('tab' => 'conceptprop',    'title' => 'Discussion');
    $tabMap['history']    ['list'] = array('tab' => 'conceptprop',    'title' => 'History of Changes');
    $tabMap['version']    ['list'] = array('tab' => 'conceptprop',    'title' => 'List Versions');
  }

  $tabMap['schema']       ['list'] = array('tab' => 'schemalist',     'title' => 'List');
  $tabMap['schema']       ['show'] = array('tab' => 'schema',         'title' => 'Show Detail');
  $tabMap['schema']       ['publish'] = array('tab' => 'schema',         'title' => 'Publish');
  if ('schema' == $filter)
  {
    $tabMap['discuss']       ['list'] = array('tab' => 'schema',      'title' => 'Discussion');
    $tabMap['schemahistory'] ['list'] = array('tab' => 'schema',      'title' => 'History of Changes');
    $tabMap['schemaversion'] ['list'] = array('tab' => 'schema',      'title' => 'List Versions');
    $tabMap['schemauser']    ['list'] = array('tab' => 'schema',      'title' => 'List Maintainers');
  }

  $tabMap['schemaprop']      ['list'] = array('tab' => 'schema',      'title' => 'List Elements');
  $tabMap['schemaprop']      ['show'] = array('tab' => 'schemaprop',  'title' => 'Show Detail');
  if ('schema_property' == $filter)
  {
    $tabMap['schemapropel']      ['list'] = array('tab' => 'schemaprop', 'title' => 'List Elements');
    $tabMap['schemahistory']     ['list'] = array('tab' => 'schemaprop', 'title' => 'History of Changes');
    $tabMap['schemaversion']     ['list'] = array('tab' => 'schemaprop', 'title' => 'List Versions');
    $tabMap['discuss']           ['list'] = array('tab' => 'schemaprop', 'title' => 'Discussion');
  }

  $tabMap['schemapropel']['show'] = array('tab' => 'schemapropel',      'title' => 'Show Detail');
  if ('schema_property_element' == $filter)
  {
    $tabMap['schemahistory']    ['list'] = array('tab' => 'schemapropel',    'title' => 'History of Changes');
    $tabMap['schemaversion']    ['list'] = array('tab' => 'schemapropel',    'title' => 'List Versions');
    $tabMap['discuss']          ['list'] = array('tab' => 'schemapropel',    'title' => 'Discussion');
  }

  $tabMap['agentuser']  ['show'] = array('tab' => 'agentuser',        'title' => 'Show Detail');
  $tabMap['vocabuser']  ['show'] = array('tab' => 'vocabuser',        'title' => 'Show Detail');
  $tabMap['version']    ['show'] = array('tab' => 'version',          'title' => 'Show Detail');
  $tabMap['schemauser'] ['show'] = array('tab' => 'schemauser',       'title' => 'Show Detail');

  //get the current module/action
  $module = $sf_params->get('module');
  $action = $sf_params->get('action');

  //add the truncate helper if it's a list
  if ('list' == $action)
  {
    use_helper('TruncateUri');
  }

  //retrieve the map
  $tab = $tabMap[$module][$action]['tab'];
  $buildBc = $tab;
  $metaAction = ' :: ' . __($tabMap[$module][$action]['title']);

  //set the filter
  myActionTools::updateAdminFilters($sf_user->getAttributeHolder(), $value, $paramId, $module);

  //setup the variables determining which breadcrumb to display
  $showVocabularyBc = false;
  $showVocabUserBc = false;
  $showSchemaBc = false;
  $showSchemaUserBc = false;
  $showSchemaPropBc = false;
  $showSchemaPropelBc = false;
  $showSchemaHistoryBc = false;
  $showConceptBc = false;
  $showconceptpropBc = false;
  $showAgentBc = false;
  $showAgentUserBc = false;
  $showUserBc = false;
  $showHistoryBc = false;
  $showDiscussBc = false;
  $showVersionBc = false;
  $showBc = false;
  $tabTitle = false;

/**
* @todo this section was commented out, but could be used to set the 'history' link in the
* history breadcrumb to the correct level.
*
* and below: parsing the referer is inherently fragile. refering page needs to be set in a global filter
**/

/*
//history detail can be called from anywhere, so we need to figure out from where
  if ('historydetail' == $buildBc)
  {
    $referer = $sf_request->getReferer();
    //strip the host
    $host = $sf_request->getPathInfoParam('HTTP_HOST');
    //strip the script name
    $script = $sf_request->getPathInfoParam('SCRIPT_NAME');
    //get the module/action
    $strip = "http://$host$script/";
    $strip = str_replace(".","\.",$strip);
    //this also gets the refering module ($regs[1]) and action ($regs[2]) but not used here
    if (preg_match("%^$strip(.+?)/(.+?)/(.+?)_id/(.+?)[./]%im", $referer, $regs))
    {
      //we reset the breadcrumb selector
      $buildBc = $regs[3];
      //we set the paramId to the referer id
      $paramId = $regs[4];
      //make sure the breadcrumbs know this isn't a standard action
      $historydetail = true;
      //and turn of the tabs
      $tab = false;
      //and set the title that will be displayed instead of the tab
      //$tabTitle = __('History Detail');
      //turn on the history breadcrumb
      $showHistoryBc = true;

    }
  }
*/

//this section determines which breadcrumbs to show with which tab
  //it also retrieves the necessary objects for each breadcrumb
  //it also sets the object id to use in each tab link when displaying the tabs
  switch ($buildBc)
  {
    case 'agent':
      $showBc = true;
      $showAgentBc = true;
      if (!isset($agent))
      {
        $id = ('show' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $agent = AgentPeer::retrieveByPK($id);
        }
      }
      $objectId = ($agent) ? $agent->getID() : "";
      break;
    case 'agentuser':
      $showBc = true;
      $showAgentBc = true;
      $showAgentUserBc = true;
      if (!isset($agent_has_user))
      {
        $id = ('show' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $agent_has_user = AgentHasUserPeer::retrieveByPK($id);
        }
      }
      $objectId = $agent_has_user->getID();
      if (!isset($agent))
      {
        $agent = $agent_has_user->getAgent();
      }
      $tab = false;
      break;
    case 'vocabulary':
      $showBc = true;
      $showVocabularyBc = true;
      if (!isset($vocabulary))
      {
        $id = ('show' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $vocabulary = VocabularyPeer::retrieveByPK($id);
        }
      }
      $objectId = $vocabulary->getID();
      break;
    case 'schema':
      $showBc = true;
      $showSchemaBc = true;
      if (!isset($schema))
      {
        $id = ('show' == $action || 'publish' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $schema = SchemaPeer::retrieveByPK($id);
        }
      }
      $objectId = $schema->getID();
      break;
    case 'schemaprop':
      $showBc = true;
      $showSchemaBc = true;
      $showSchemaPropBc = true;
      if (!isset($schema_property))
      {
        $id = ('show' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $schema_property = SchemaPropertyPeer::retrieveByPK($id);
        }
      }
      if (!isset($schema))
      {
        if ($schema_property)
        {
          $objectId = $schema_property->getId();
          $schema = $schema_property->getSchema();
        }
      }
      break;
    case 'schemapropel':
      $showBc = true;
      $showSchemaBc = true;
      $showSchemaPropBc = true;
      $showSchemaPropelBc = true;
      if (!isset($schema_property_element))
      {
        $id = ('show' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $schema_property_element = SchemaPropertyElementPeer::retrieveByPK($id);
        }
      }
      if (!isset($schema_property))
      {
        if ($schema_property_element)
        {
          $schema_property = $schema_property_element->getSchemaPropertyRelatedBySchemaPropertyId();
        }
      }
      if (!isset($schema))
      {
        if ($schema_property)
        {
          $schema = $schema_property->getSchema();
        }
      }
      if ($schema_property_element)
      {
        $objectId = $schema_property_element->getId();
      }
      break;

    case 'schemahistorydetail':
      $showBc = true;
      $showSchemaBc = true;
      $showSchemaPropBc = true;
      $showSchemaPropelBc = true;
      $showSchemaHistoryBc = true;
      if (!isset($history))
      {
        $id = $sf_params->get('id');
        if ($id)
        {
          $history = SchemaPropertyElementHistoryPeer::retrieveByPK($id);
        }
      }
      if (!isset($schema_property_element))
      {
        if ($history)
        {
          sfPropelParanoidBehavior::disable();
          $schema_property_element = $history->getSchemaPropertyElement();
        }
      }
      if (!isset($schema_property))
      {
        if ($schema_property_element)
        {
          sfPropelParanoidBehavior::disable();
          $schema_property = $schema_property_element->getSchemaPropertyRelatedBySchemaPropertyId();
        }
      }
      if (!isset($schema))
      {
        if ($schema_property)
        {
          sfPropelParanoidBehavior::disable();
          $schema = $schema_property->getSchema();
        }
      }
      $tab = false;
      break;
    case 'schemauser':
      $showBc = true;
      $showSchemaBc = true;
      $showSchemaUserBc = true;
      if (!isset($schema_has_user))
      {
        $id = ('show' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $schema_has_user = SchemaHasUserPeer::retrieveByPK($id);
        }
      }
      $objectId = $schema_has_user->getID();
      if (!isset($schema))
      {
        $schema = $schema_has_user->getSchema();
      }
      $tab = false;
      break;
    case 'vocabuser':
      $showBc = true;
      $showVocabularyBc = true;
      $showVocabUserBc = true;
      if (!isset($vocabulary_has_user))
      {
        $id = ('show' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $vocabulary_has_user = VocabularyHasUserPeer::retrieveByPK($id);
        }
      }
      $objectId = $vocabulary_has_user->getID();
      if (!isset($vocabulary))
      {
        $vocabulary = $vocabulary_has_user->getVocabulary();
      }
      $tab = false;
      break;
    case 'concept':
      $showBc = true;
      $showVocabularyBc = true;
      $showConceptBc = true;
      if (!isset($concept))
      {
        $id = ('show' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $concept = ConceptPeer::retrieveByPK($id);
        }
      }
      if (!isset($vocabulary))
      {
        if ($concept)
        {
          $vocabulary = $concept->getVocabulary();
        }
      }
      $objectId = $concept->getID();
      break;
    case 'conceptprop':
      $showBc = true;
      $showVocabularyBc = true;
      $showConceptBc = true;
      $showconceptpropBc = true;
      if (!isset($concept_property))
      {
        $id = ('show' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $concept_property = ConceptPropertyPeer::retrieveByPK($id);
        }
      }
      if (!isset($concept))
      {
        if ($concept_property)
        {
          $concept = $concept_property->getConceptRelatedByConceptId();
        }
      }
      if (!isset($vocabulary))
      {
        if ($concept)
        {
          $vocabulary = $concept->getVocabulary();
        }
      }
      $objectId = $concept_property->getId();
      break;
    case 'historydetail':
      $showBc = true;
      $showVocabularyBc = true;
      $showConceptBc = true;
      $showconceptpropBc = true;
      $showHistoryBc = true;
      if (!isset($history))
      {
        $id = $sf_params->get('id');
        if ($id)
        {
          $history = ConceptPropertyHistoryPeer::retrieveByPK($id);
        }
      }
      if (!isset($concept_property))
      {
        if ($history)
        {
          sfPropelParanoidBehavior::disable();
          $concept_property = $history->getConceptProperty();
        }
      }
      if (!isset($concept))
      {
        if ($concept_property)
        {
          sfPropelParanoidBehavior::disable();
          $concept = $concept_property->getConceptRelatedByConceptId();
        }
      }
      if (!isset($vocabulary))
      {
        if ($concept)
        {
          $vocabulary = $concept->getVocabulary();
        }
      }
      $tab = false;
      break;
    case 'user':
      $showBc = true;
      $showUserBc = true;
      if (!isset($user))
      {
        $id = ('show' == $action && !$historydetail) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $user = UserPeer::retrieveByPK($id);
        }
      }
      $objectId = $user->getID();
      break;

    case 'version':
      $showBc = true;
      $showVocabularyBc = true;
      $showVersionBc = true;
      if (!isset($vocabulary_has_version))
      {
        $id = ('show' == $action) ? $sf_params->get('id') : $paramId;
        if ($id)
        {
          $vocabulary_has_version = VocabularyHasVersionPeer::retrieveByPK($id);
        }
      }
      $objectId = $vocabulary_has_version->getID();
      if (!isset($vocabulary))
      {
        $vocabulary = $vocabulary_has_version->getVocabulary();
      }
      $tab = false;
      break;

    //these top-level 'list tabs' don't show any breadcrumb or tab
    //setting $tab to false at this point turns off tab display
    case 'vocabularylist':
      $title = __('Vocabularies');
      $tab = false;
      break;
    case 'schemalist':
      $title = __('Element Sets');
      $tab = false;
      break;
    case 'agentlist':
      $title = __('Owners');
      $tab = false;
      break;
    case 'userlist':
      $title = __('Users');
      $tab = false;
      break;
  }

//show the breadcrumbs
  echo '<h1>';
  //is a breadcrumb set
  if ($showBc)
  {
    $spaceCount = 0;

    if ($showVocabularyBc)
    {
      $spaceCount++;
      echo link_to('Vocabulary:', 'vocabulary/list') . '&nbsp;';

      if ($vocabulary)
      {
        if ($showConceptBc || $showHistoryBc || $showVocabUserBc || $showVersionBc)
        {
          if ($vocabulary->getDeletedAt())
          {
            echo $vocabulary->getName() . '&nbsp;(deleted)';
          }
          else
          {
            echo link_to($vocabulary->getName(), 'vocabulary/show?id=' . $vocabulary->getId());
          }
        }
        else
        {
          echo __('Show detail for ') . $vocabulary->getName();
        }

        $title = __('%%vocabulary%%', array('%%vocabulary%%' => $vocabulary->getName()));
      }
    }

    if ($showConceptBc)
    {
      $spaceCount++;
      if ($concept)
      {
        if ($vocabulary->getDeletedAt())
        {
          echo "<br />&nbsp;&nbsp;Concepts&nbsp;(deleted):&nbsp;";
        }
        else
        {
          echo '<br />&nbsp;&nbsp;' . link_to('Concepts:', '/concept/list?vocabulary_id=' . $concept->getVocabularyId()) . '&nbsp;&nbsp;';
        }
        if ($showconceptpropBc || $showHistoryBc)
        {
          if ($concept->getDeletedAt())
          {
            echo $concept->getPrefLabel() . '&nbsp;(deleted)';
          }
          else
          {
            echo link_to($concept->getPrefLabel(), '/concept/show?id=' . $concept->getID());
          }
        }
        else
        {
          echo $concept->getPrefLabel();
        }

        $title .= ' :: ' . __('%%concept%%', array('%%concept%%' => $concept));
      }
    }

    if ($showconceptpropBc)
    {
      $spaceCount++;
      if (isset($concept_property))
      {
        if ($concept->getDeletedAt())
        {
          echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;Properties&nbsp;(deleted):&nbsp;";
        }
        else
        {
          echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;" . link_to('Properties:', '/conceptprop/list?concept_id=' . $concept->getID()) . '&nbsp;';
        }
        if ($showHistoryBc)
        {
          if ($concept_property->getDeletedAt())
          {
            echo $concept_property->getSkosPropertyName() . '&nbsp;(deleted)';
          }
          else
          {
            echo link_to($concept_property->getSkosPropertyName(), '/conceptprop/show?id=' . $concept_property->getID());
          }
        }
        else
        {
           echo $concept_property->getSkosPropertyName();
        }

        $title .= ' :: ' . __('%%property%%',array('%%property%%' => $concept_property->getSkosPropertyName()));
      }
    }

    if ($showSchemaBc)
    {
      $spaceCount++;
      echo link_to('Element Sets:', 'schema/list') . '&nbsp;';

      if ($schema)
      {
        if ($showSchemaPropBc || $showSchemaHistoryBc || $showVocabUserBc || $showVersionBc)
        {
          if ($schema->getDeletedAt())
          {
            echo $schema->getName() . '&nbsp;(deleted)';
          }
          else
          {
            echo link_to($schema->getName(), 'schema/show?id=' . $schema->getId());
          }
        }
        else
        {
          echo __('Show detail for ') . $schema->getName();
        }

        $title = __('%%schema%%', array('%%schema%%' => $schema->getName()));
      }
    }

    if ($showSchemaPropBc)
    {
      $spaceCount++;
      if ($schema_property)
      {
        if ($schema->getDeletedAt())
        {
          echo "<br />&nbsp;&nbsp;Elements&nbsp;(deleted):&nbsp;";
        }
        else
        {
          echo '<br />&nbsp;&nbsp;' . link_to('Elements:', '/schemaprop/list?schema_id=' . $schema_property->getSchemaId()) . '&nbsp;&nbsp;';
        }
        if ($showSchemaPropelBc || $showSchemaHistoryBc)
        {
          if ($schema_property->getDeletedAt())
          {
            echo $schema_property . '&nbsp;(deleted)';
          }
          else
          {
            echo link_to($schema_property, '/schemaprop/show?id=' . $schema_property->getId());
          }
        }
        else
        {
          echo $schema_property;
        }

        $title .= ' :: ' . __('%%schemaprop%%', array('%%schemaprop%%' => $schema_property));
      }
    }

    if ($showSchemaPropelBc)
    {
      $spaceCount++;
      if (isset($schema_property_element))
      {
        if ($schema_property->getDeletedAt())
        {
          echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;Statements&nbsp;(deleted):&nbsp;";
        }
        else
        {
          echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;" . link_to('Statements:', '/schemapropel/list?schema_property_id=' . $schema_property->getId()) . '&nbsp;';
        }
        if ($showSchemaHistoryBc)
        {
          if ($schema_property_element->getDeletedAt())
          {
            echo $schema_property_element . '&nbsp;(deleted)';
          }
          else
          {
            echo link_to($schema_property_element, '/schemapropel/show?id=' . $schema_property_element->getId());
          }
        }
        else
        {
           echo $schema_property_element;
        }

        $title .= ' :: ' . __('%%schemapropel%%',array('%%schemapropel%%' => $schema_property_element));
      }
    }

    if ($showSchemaHistoryBc)
    {
      $spaces = '';
      for($i=1; $i<=$spaceCount; $i++)
      {
        $spaces .= "&nbsp;&nbsp;";
      }
      //cascade the selection of the id
      if ($showSchemaBc && $schema)
      {
        $id = 'schema_id=' . $schema->getId();
      }
      if ($showSchemaPropBc && $schema_property)
      {
        $id = 'schema_property_id=' . $schema_property->getId();
      }

      if ($showSchemaPropelBc && $schema_property_element)
      {
        $id = 'schema_property_element_id=' . $schema_property_element->getId();
      }
     echo "<br />$spaces" . link_to('History:', '/schemahistory/list?' . $id) . '&nbsp;';
     echo 'History detail';
    }

    if ($showAgentBc)
    {
      if (isset($agent))
      {
        echo link_to('Owners:', '/agent/list') . '&nbsp;';
        if ($showAgentUserBc)
        {
          echo link_to($agent->getOrgName(), 'agent/show?id=' . $agent->getId());
        }
        else
        {
          echo __('Show detail for ') . $agent->getOrgName();
        }

        $title = ' :: ' . __('%%owner%%', array('%%owner%%' => $agent->getOrgName()));
      }
    }

    if ($showUserBc)
    {
      if (isset($user))
      {
        $nickname = getUserName($user);
        echo link_to('Users:', '/user/list') . '&nbsp;';
        echo $nickname;

        $title = ' :: ' . __('%%user%%', array('%%user%%' => $nickname));
      }
    }

    if ($showHistoryBc)
    {
      $spaces = '';
      for($i=1; $i<=$spaceCount; $i++)
      {
        $spaces .= "&nbsp;&nbsp;";
      }
      if ($vocabulary)
      {
        $id = $vocabulary->getId();
      }
     echo "<br />$spaces" . link_to('History:', '/history/list?vocabulary_id=' . $id) . '&nbsp;';
     echo 'History detail';
    }

    if ($showAgentUserBc)
    {
      $spaceCount++;
      echo '<br />&nbsp;&nbsp;' . link_to('Members:', '/agentuser/list?agent_id=' . $agent->getId()) . '&nbsp;&nbsp;';
      if ($agent_has_user)
      {
        $user = $agent_has_user->getUser();
        $nickname = $user->getNickname();
        echo link_to($nickname, 'user/show?id='.$user->getId());
        $title .= ' :: ' . __('%%name%%', array('%%name%%' => $nickname));
      }
    }

    if ($showVocabUserBc)
    {
      $spaceCount++;
      echo '<br />&nbsp;&nbsp;' . link_to('Maintainers:', '/vocabuser/list?vocabulary_id=' . $vocabulary->getId()) . '&nbsp;&nbsp;';
      if ($vocabulary_has_user)
      {
        $user = $vocabulary_has_user->getUser();
        $nickname = getUserName($user);
        echo link_to($nickname, 'user/show?id='.$user->getId());
        $title .= ' :: ' . __('%%name%%', array('%%name%%' => $nickname));
      }
    }

    if ($showSchemaUserBc)
    {
      $spaceCount++;
      echo '<br />&nbsp;&nbsp;' . link_to('Maintainers:', '/schemauser/list?schema_id=' . $schema->getId()) . '&nbsp;&nbsp;';
      if ($schema_has_user)
      {
        $user = $schema_has_user->getUser();
        $nickname = getUserName($user);
        echo link_to($nickname, 'user/show?id='.$user->getId());
        $title .= ' :: ' . __('%%name%%', array('%%name%%' => $nickname));
      }
    }

    if ($showVersionBc)
    {
      $spaceCount++;
      if ($vocabulary_has_version)
      {
        echo '<br />&nbsp;&nbsp;' . link_to('Versions:', '/version/list?vocabulary_id=' . $vocabulary_has_version->getVocabularyId()) . '&nbsp;&nbsp;';
        $version = $vocabulary_has_version->getName();
        echo $version;
        $title .= ' :: ' . __('%%name%%', array('%%name%%' => $version));
      }
    }
  }
  else //there's no breadcrumb so we show the title
  {
    echo $title;
  }

  echo '</h1>' ;

  if ($tab):
  ?>
<div id="tab_container">
<ul class="ui-tabs-nav" >
<?php

//Show the tabs
  $i = 0;

  foreach ($topnav[$tab] as $key => $value):
    $here = false;
    $options = array();
    $options['id'] = 'a' . $i;
    $i++;

    if (false !== strpos($value['link'], $module . '/' . $action))
    {
      echo '<li class = "ui-tabs-selected">' . link_to('<span>' . __($key) . '</span>', $value['link'] . $objectId, $options) . '</li>';
    }
    else
    {
      echo '<li>' . link_to('<span>' . __($key) . '</span>', $value['link'] . $objectId, $options) . '</li>';
    }
  endforeach;
?>
</ul>
</div>
<?php endif;

//set the meta title
  $title = ($title) ? ltrim($title,': ') : "";
  $metaAction = rtrim ($metaAction);
  $sf_context->getResponse()->setTitle(sfConfig::get('app_title_prefix') . $title . $metaAction);

  function getUserName($user)
  {
    $nickname = $user->getNickname();
    $username = strval($user);
    if ($username != $nickname)
    {
      return $user . " (" . $nickname . ")";
    }
    else
    {
      return $username;
    }
  }

 ?>
