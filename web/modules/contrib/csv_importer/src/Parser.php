<?php

namespace Drupal\csv_importer;

use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Get data from CSV files.
 */
class Parser implements ParserInterface {

  /**
   * Entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs Parser object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   Entity type manager service.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function getCsvById(int $id, string $delimiter) {
    /**  @var \Drupal\file\Entity\File $entity */
    $entity = $this->getCsvEntity($id);
    $return = [];

    if (($csv = fopen($entity->uri->getString(), 'r')) !== FALSE) {
      while (($row = fgetcsv($csv, 0, $delimiter)) !== FALSE) {
        $return[] = $row;
      }

      fclose($csv);
    }

    return $return;
  }

  /**
   * {@inheritdoc}
   */
  public function getCsvFieldsById(int $id) {
    $csv = $this->getCsvById($id);

    if ($csv && is_array($csv)) {
      return $csv[0];
    }

    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getCsvEntity(int $id) {
    if ($id) {
      return $this->entityTypeManager->getStorage('file')->load($id);
    }

    return NULL;
  }

}
