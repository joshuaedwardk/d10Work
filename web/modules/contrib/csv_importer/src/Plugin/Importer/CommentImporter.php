<?php

namespace Drupal\csv_importer\Plugin\Importer;

use Drupal\csv_importer\Plugin\ImporterBase;

/**
 * Class to import comments.
 *
 * @Importer(
 *   id = "comment_importer",
 *   entity_type = "comment",
 *   label = @Translation("Comment importer")
 * )
 */
class CommentImporter extends ImporterBase {}
