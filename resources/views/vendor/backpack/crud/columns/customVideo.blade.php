<?php $object = (object) json_decode($entry['video'], true); ?>
<?php 
  if(isset($object->url)):
?>
<a href="<?php echo $object->url ?>" target="_blank"><?php echo $object->url ?></a>
<?php endif ?>
