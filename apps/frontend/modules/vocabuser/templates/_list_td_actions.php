<?php
  // auto-generated by sfPropelAdmin
  // date: 2008/03/07 18:39:17
?>
<td>
  <ul class="sf_admin_td_actions">
    <li><?php echo link_to(
          image_tag(
              '/jpAdminPlugin/images/show_icon.png',
              array(
                  'alt'   => __('show'),
                  'title' => __('show')
              )
          ),
          'vocabuser/show?id=' . $vocabulary_has_user->getId()
      ) ?></li>
    <li><?php /** @var $sf_user MyUser */
        if ($sf_user->hasObjectCredential(
                $vocabulary_has_user->getVocabularyId(),
                'vocabulary',
                array(
                    0 => array(
                        0 => 'administrator',
                        1 => 'vocabularyadmin',
                        2 => 'agentadmin',
                    ),
                )
            )
            && $vocabulary_has_user->getUserId() != $sf_user->getAttribute('subscriber_id', '', 'subscriber')
        ): ?>
          <?php echo link_to(
              image_tag(
                  '/jpAdminPlugin/images/edit_icon.png',
                  array(
                      'alt'   => __('edit'),
                      'title' => __('edit')
                  )
              ),
              'vocabuser/edit?id=' . $vocabulary_has_user->getId()
          ) ?>
        <?php else: ?>
          &nbsp;
        <?php endif; ?></li>
    <li><?php if ($sf_user->hasObjectCredential(
              $vocabulary_has_user->getVocabularyId(),
              'vocabulary',
              array(
                  0 => array(
                      0 => 'administrator',
                      1 => 'vocabularyadmin',
                      2 => 'agentadmin',
                  ),
              )
          )
                  && $vocabulary_has_user->getUserId() != $sf_user->getAttribute('subscriber_id', '', 'subscriber')
      ): ?>
        <?php echo link_to(
            image_tag(
                '/jpAdminPlugin/images/delete_icon.png',
                array(
                    'alt'   => __('delete'),
                    'title' => __('delete')
                )
            ),
            'vocabuser/delete?id=' . $vocabulary_has_user->getId(),
            array(
                'post'    => true,
                'confirm' => __('Are you sure?'),
            )
        ) ?>
      <?php else: ?>
        &nbsp;
      <?php endif; ?></li>
  </ul>
</td>
