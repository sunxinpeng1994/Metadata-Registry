<?php
// auto-generated by sfPropelAdmin
// date: 2015/01/26 16:26:52
if ($sf_params->get('schema_id')) {
    $param = 'schema_id=' . $sf_params->get('schema_id');
} else {
    $param = 'vocabulary_id=' . $sf_params->get('vocabulary_id');
}
?>

<ul class="sf_admin_actions">
    <li><?php echo button_to(__s('List'),
                             'export/list?schema_id=' . $param . '',
                             [
                                 'title' => 'Show export_history list',
                                 'class' => 'sf_admin_action_list',
                             ]) ?></li>
    <li><?php echo submit_tag(__s('Export CSV'),
                              [
                                  'name'  => 'save',
                                  'title' => 'Save',
                                  'class' => 'sf_admin_action_save',
                              ]) ?></li>
    <li><?php echo button_to(__s('Cancel'),
                             'export/cancel?id=' . $export_history->getId(),
                             [
                                 'title' => 'Cancel',
                                 'class' => 'sf_admin_action_cancel',
                             ]) ?></li>
</ul>
