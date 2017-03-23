<?php $idType = null;
foreach ([ 'vocabulary_id', 'concept_id', 'concept_property_id' ] as $type) {
  /** @var sfParameterHolder $sf_params */
  if ($sf_params->has($type)) {
    $idType = $type;
  }
}
if(! $sf_params->has('import_id')):
slot('feeds');
$rss['link']   = "@concept_history_feed_rss?IdType="  . $idType . "&id=" . $sf_params->get($idType);
$rdf['link']   = "@concept_history_feed_rdf?IdType="  . $idType . "&id=" . $sf_params->get($idType);
$atom['link']  = "@concept_history_feed_atom?IdType="  . $idType . "&id=" . $sf_params->get($idType);
$rss['title']  = "RSS 2.01 History Feed";
$rdf['title']  = "RSS 1.0 (RDF) History Feed";
$atom['title'] = "Atom 1.0 History Feed";
  ?>
<?php echo auto_discovery_link_tag('rss', $rss['link'], $rss) ?>
<?php echo auto_discovery_link_tag('rdf', $rdf['link'], $rdf) ?>
<?php echo auto_discovery_link_tag('rss', $atom['link'], $atom) ?>
<?php end_slot() ?>
<?php
// auto-generated by sfPropelAdmin
// date: 2009/06/26 23:03:12
?>
<ul class="sf_admin_actions">
  <li>
    <?php echo sf_link_to('rss2', $rss['link'], array(
      "rel"   => "alternate",
      "type"  => "application/rss+xml",
      "class" => "sf_admin_action_feed",
      "title" => $rss['title']));
    ?>
  </li>
  <li>
    <?php echo sf_link_to('rss1', $rdf['link'], array(
      "rel"   => "alternate",
      "type"  => "application/rdf+xml",
      "class" => "sf_admin_action_feed",
      "title" => $rdf['title']));
    ?>
  </li>
  <li>
    <?php echo sf_link_to('atom', $atom['link'], array(
      "rel"   => "alternate",
      "type"  => "application/atom+xml",
      "class" => "sf_admin_action_feed",
      "title" => $atom['title']));
    ?>
  </li>
</ul>
<?php endif; ?>
