<?php

namespace Drupal\csv_importer\Plugin\Importer;

use Drupal\csv_importer\Plugin\ImporterBase;

/**
 * Class to import menu links.
 *
 * @Importer(
 *   id = "menu_link_content_importer",
 *   entity_type = "menu_link_content",
 *   label = @Translation("Menu link importer")
 * )
 */
class MenuLinkImporter extends ImporterBase {}
