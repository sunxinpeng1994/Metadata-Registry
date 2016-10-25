<?php
// auto-generated by sfPropelAdmin
// date: 2008/04/22 10:48:14
?>
<td>
  <ul class="sf_admin_td_actions">
    <li><?php /** @var $sf_user myUser */
      /** @var $sf_request myWebRequest */
      /** @var $sf_flash sfParameterHolder */
      if ($sf_user->hasObjectCredential(
              $sf_request->getParameter( 'schema_id' ),
              'schema',
              array (
                  0 => array (
                      0 => 'administrator',
                      1 => 'schemamaintainer',
                      2 => 'schemaadmin'
                  )
              )
          )
          && ! $schema_property_element->getIsSchemaProperty()): ?>
        <?php echo link_to(
            image_tag(
                '/jpAdminPlugin/images/edit_icon.png',
                array ( 'alt' => __( 'edit' ), 'title' => __( 'edit' ) )
            ),
            'schemapropel/edit?id=' . $schema_property_element->getId()
        ) ?>
      <?php else: ?>
        &nbsp;
      <?php endif; ?></li>
    <li><?php if ( $sf_user->hasObjectCredential(
              $sf_request->getParameter( 'schema_id' ),
              'schema',
              array (
                  0 => array (
                      0 => 'administrator',
                      1 => 'schemamaintainer',
                      2 => 'schemaadmin',
                  ),
              )
          )
                   && ! in_array(
              $schema_property_element->getProfilePropertyId(),
              $sf_flash->get( 'required', array () )
          )
      ): ?>
        <?php echo link_to(
            image_tag(
                '/jpAdminPlugin/images/delete_icon.png',
                array ( 'alt' => __( 'delete' ), 'title' => __( 'delete' ) )
            ),
            'schemapropel/delete?id=' . $schema_property_element->getId(),
            array (
                'post' => true,
                'confirm' => __( 'Are you sure?' ),
            )
        ) ?>
      <?php else: ?>
        &nbsp;
      <?php endif; ?></li>
  </ul>
</td>