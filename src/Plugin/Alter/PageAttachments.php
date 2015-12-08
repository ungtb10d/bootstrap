<?php
/**
 * @file
 * Contains \Drupal\bootstrap\Plugin\Alter\PageAttachments.
 */

namespace Drupal\bootstrap\Plugin\Alter;

use Drupal\bootstrap\Annotation\BootstrapAlter;
use Drupal\bootstrap\Plugin\PluginBase;

/**
 * Implements hook_page_attachments_alter().
 *
 * @BootstrapAlter(
 *   id = "page_attachments"
 * )
 */
class PageAttachments extends PluginBase implements AlterInterface {

  /**
   * {@inheritdoc}
   */
  public function alter(&$attachments, &$context1 = NULL, &$context2 = NULL) {
    if ($this->theme->getSetting('popover_enabled')) {
      $attachments['#attached']['library'][] = 'bootstrap/popovers';
    }
    if ($this->theme->getSetting('tooltip_enabled')) {
      $attachments['#attached']['library'][] = 'bootstrap/tooltips';
    }
    $attachments['#attached']['drupalSettings']['bootstrap'] = $this->theme->settings()->getDrupalSettings();
  }

}
