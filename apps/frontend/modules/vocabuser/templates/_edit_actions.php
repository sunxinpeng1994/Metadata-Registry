<?php
// auto-generated by sfPropelAdmin
// date: 2008/03/14 08:20:23
?>
<ul class="sf_admin_actions">
  <?php /** @var $sf_user MyUser */
    if ($sf_user->hasCredential(
      array (
          0 => array (
              0 => 'administrator',
              1 => 'vocabularyadmin',
              2 => 'agentadmin',
        3 => 'vocabularymaintainer',
          ),
      )
  )
  ): ?>
    <li><?php echo submit_tag(
          __s( 'Save' ),
          array (
              'name' => 'save',
              'title' => 'Save',
              'class' => 'sf_admin_action_save',
          )
      ) ?></li>
  <?php endif; ?>
  <?php if ( $sf_user->hasCredential(
          array (
              0 => array (
                  0 => 'administrator',
                  1 => 'vocabularyadmin',
                  2 => 'agentadmin',
              ),
          )
      )
             && count( $sf_flash->get( 'newUsers', array () ) )
  ): ?>
    <li><?php if ( $vocabulary_has_user->getId() ): ?>
        <?php echo button_to(
            __s( 'Add Maintainer' ),
            'vocabuser/create',
            array (
                'title' => 'Create',
                'class' => 'sf_admin_action_create',
            )
        ) ?><?php endif; ?>
    </li>
  <?php endif; ?>
  <?php if ( $sf_user->hasCredential(
          array (
              0 => array (
                  0 => 'administrator',
                  1 => 'vocabularyadmin',
                  2 => 'agentadmin',
              ),
          )
      )
             && 1 < count( $sf_flash->get( 'newUsers', array () ) )
  ): ?>
    <li><?php echo submit_tag(
          __s( 'Save and add' ),
          array (
              'name' => 'save_and_add',
              'title' => 'Save and add',
              'class' => 'sf_admin_action_save_and_add',
          )
      ) ?></li>
  <?php endif; ?>
  <?php if ( $sf_user->hasCredential(
      array (
          0 => array (
              0 => 'administrator',
              1 => 'vocabularyadmin',
              2 => 'agentadmin',
        3 => 'vocabularymaintainer',
          ),
      )
  )
  ): ?>
    <li><?php echo button_to(
          __s( 'Cancel' ),
          'vocabuser/cancel?id=' . $vocabulary_has_user->getId(),
          array (
              'title' => 'Cancel',
              'class' => 'sf_admin_action_cancel',
          )
      ) ?></li>
  <?php endif; ?>
</ul>
