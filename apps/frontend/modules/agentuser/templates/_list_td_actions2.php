<?php
// auto-generated by sfPropelAdmin
// date: 2008/03/07 18:39:17
?>
<td>
    <ul class="sf_admin_td_actions">
        <li><?php echo sf_link_to(image_tag('/jpAdminPlugin/images/show_icon.png',
                                         [ 'alt' => __s('show'), 'title' => __s('show') ]),
                               'agentuser/show?id=' . $agent_has_user->getId()) ?></li>
        <li><?php if ($sf_user->hasObjectCredential($agent_has_user->getAgentId(),
                                                    'agent',
                                                    [
                                                        0 => [
                                                            0 => 'administrator',
                                                            1 => 'agentadmin',
                                                        ],
                                                    ]) && $agent_has_user->getUserId() != $sf_user->getAttribute('subscriber_id',
                                                                                                                 '',
                                                                                                                 'subscriber')
            ): ?><?php echo sf_link_to(image_tag('/jpAdminPlugin/images/edit_icon.png',
                                              [ 'alt' => __s('edit'), 'title' => __s('edit') ]),
                                    'agentuser/edit?id=' . $agent_has_user->getId()) ?><?php else: ?>
                &nbsp;
            <?php endif; ?></li>
        <li><?php if ($sf_user->hasObjectCredential($agent_has_user->getAgentId(),
                                                    'agent',
                                                    [
                                                        0 => [
                                                            0 => 'administrator',
                                                            1 => 'agentadmin',
                                                        ],
                                                    ]) && $agent_has_user->getUserId() != $sf_user->getAttribute('subscriber_id',
                                                                                                                 '',
                                                                                                                 'subscriber')
            ): ?><?php echo sf_link_to(image_tag('/jpAdminPlugin/images/delete_icon.png',
                                              [ 'alt' => __s('delete'), 'title' => __s('delete') ]),
                                    'agentuser/delete?id=' . $agent_has_user->getId(),
                                    [
                                        'post' => true,
                                        'confirm' => __s('Are you sure?'),
                                    ]) ?><?php else: ?>
                &nbsp;
            <?php endif; ?></li>
    </ul>
</td>
