<?php

namespace Drupal\migrate_hsl_archives_people\Plugin\migrate\process;

use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Perform custom value transformations.
 *
 * @MigrateProcessPlugin(
 *   id = "generate_fullname"
 * )
 *
 * To do custom value transformations use the following:
 *
 * @code
 * field_text:
 *   plugin: generate_fullname
 *   source: text
 * @endcode
 *
 */
class GenerateFullname extends ProcessPluginBase {
  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    if (!is_array($value)) {
      throw new MigrateException(sprintf('Merge process failed for destination property (%s): input is not an array.', $destination_property));
    }

    $new_value = '';
    foreach ($value as $i => $item) {
      $new_value = trim($new_value.' '.$item);
    }
    return $new_value;
  }
}
