<?php
// auto-generated by sfPropelAdmin
// date: 2016/03/11 21:12:40
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
    <?php echo form_tag('vocabulary/list', [ 'method' => 'get' ]) ?>

    <fieldset>
        <h2><?php echo __('Filters') ?></h2>
        <div class="form-row">
            <label for="filters_agent_id"><?php echo __('Agent:') ?></label>
            <div class="content">
                <?php echo object_select_tag(isset( $filters['agent_id'] ) ? $filters['agent_id'] : null,
                                             null,
                                             [
                                                 'include_blank' => true,
                                                 'related_class' => 'Vocabulary',
                                                 'peer_method'   => 'getVocabularyAgents',
                                                 'text_method'   => '__toString',
                                                 'control_name'  => 'filters[agent_id]',
                                             ]) ?>
            </div>
        </div>

        <div class="form-row">
            <label for="filters_status_id"><?php echo __('Status:') ?></label>
            <div class="content">
                <?php echo object_select_tag(isset( $filters['status_id'] ) ? $filters['status_id'] : null,
                                             null,
                                             [
                                                 'include_blank' => true,
                                                 'related_class' => 'Status',
                                                 'text_method'   => '__toString',
                                                 'control_name'  => 'filters[status_id]',
                                             ]) ?>
            </div>
        </div>

    </fieldset>

    <ul class="sf_admin_actions">
        <li><?php echo button_to(__('reset'), 'vocabulary/list', 'class=sf_admin_action_reset_filter') ?></li>
        <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
    </ul>

    </form>
</div>
