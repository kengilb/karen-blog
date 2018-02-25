<?php
namespace Drupal\kblog_home\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\Core\Render\Markup;

/**
 * Provides route responses for the Example module.
 */
class KblogHomeController extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function home() {
    // Build the book CTA.
    $cta_options = array(
      'attributes' => array(
        'target' => '_blank',
        'class' => array(
          'home-book-cta',
        ),
      ),
      'html' => TRUE,
    );
    $cta = Url::fromUri('http://a.co/5WHORBe', $cta_options);

    $element = array(
      'headline' => array(
        '#markup' => '<div class="home-headline">' . $this->t('Welcome!') . '</div>',
      ),
      'background_image' => array(
        '#theme' => 'image',
        '#uri' => drupal_get_path('module', 'kblog_home') . '/images/homepage.jpg',
        '#attributes' => array(
          'class' => array('home-banner-img'),
        ),
      ),
      'book_cta' => array(
        '#type' => 'link',
        '#title' => Markup::create('<span class="home-book-cta-text">' . $this->t('Purchase') . '</span>'),
        '#url' => $cta,
        '#html' => TRUE,
      ),
      '#attached' => array(
        'library' => array(
          'kblog_home/kblog_home',
        ),
      ),
    );
    return $element;
  }

}
