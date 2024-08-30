<?php

/**
 * @file
 * API hooks for csv_importer.
 */

/**
 * Update import data before it's saved.
 *
 * @param array $data
 *   The import data.
 *
 * @see \Drupal\csv_importer\Plugin\ImporterBase
 */
function hook_csv_importer_pre_save(array &$data) {
  $data['title'] = ltrim($data['title'], '/');
}
