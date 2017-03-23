<ul class="plain_list">
   <?php $schemas = $user->getSchemaHasUsersJoinSchema() ?>
   <?php if (count($schemas)): ?>
   <?php /** @var SchemaHasUser $schema */
       foreach ($schemas as $schema):  ?>
     <li><?php $sch = $schema->getSchema(); echo sf_link_to($sch->getName(), '@schema_show?id=' . $sch->getId()) ?></li>
   <?php endforeach ?>
   <?php else: ?>
   <li>None</li>
   <?php endif; ?>
   </ul>
