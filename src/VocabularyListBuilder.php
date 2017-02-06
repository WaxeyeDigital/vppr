<?php

namespace Drupal\vppr;

use Drupal\taxonomy\VocabularyListBuilder as VocabularyListBuilderBase;

class VocabularyListBuilder extends VocabularyListBuilderBase {

  /**
   * Override Drupal\Core\Config\Entity\ConfigEntityListBuilder::load().
   */
  public function load() {
    $entities = parent::load();

    // Remove vocabularies the current user doesn't have any access for.
    foreach ($entities as $id => $entity) {
      if (!vppr_access('list terms', $id)) {
        // dpm("unset");
        unset($entities[$id]);
      }
    }

    return $entities;
  }
}
