<?php
// auto-generated by sfPropelAdmin
// date: 2015/09/29 17:01:08
?>
<ul class="sf_admin_actions">
    <li><?php if ($file_import_history->getSchemaId()) {
            $param = 'schema_id=' . $file_import_history->getSchemaId();
        } else {
            $param = 'vocabulary_id=' . $file_import_history->getVocabularyId();
        }
        echo button_to(__('List'), 'import/list?' . $param . '', array(
            'title' => 'Show file_import_history list',
            'class' => 'sf_admin_action_list',
        )) ?></li>
</ul>
