<?php
  $sf_context->getResponse()->addStylesheet('ui');
  $topnav = array();
  $topnav['Detail']['link']  = '/vocabulary/show?id=';
  $topnav['Concepts']['link'] = '/concept/list?vocabulary_id=';
  $topnav['History']['link'] = '/history/list?vocabulary_id=';
  $topnav['Versions']['link'] = '/version/list?vocabulary_id=';
  $topnav['Members']['link'] = 'vocabuser/list?vocabulary_id=';
?>
<div id="tab_container">
<ul class="ui-tabs-nav" >
<?php

  $i = 0;
  $module = $sf_params->get('module');
  $action = $sf_params->get('action');

  if($vocabulary)
  {
    $vocabulary_id = $vocabulary->getID();
  }

  foreach ($topnav as $key => $value):
    $here = false;
    $options = array();
    $options['id'] = 'a' . $i;
    $i++;

    if (false !== strpos($value['link'], $module . '/' . $action))
    {
      echo '<li class = "ui-tabs-selected">' . sf_link_to('<span>' . __s($key) . '</span>', $value['link'] . $vocabulary_id, $options) . '</li>';
    }
    else
    {
      echo '<li>' . sf_link_to('<span>' . __s($key) . '</span>', $value['link'] . $vocabulary_id, $options) . '</li>';
    }
  endforeach;
?>
</ul>
</div>
