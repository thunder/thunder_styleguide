<?php

namespace Drupal\thunder_styleguide\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilderInterface;

/**
 * Class DefaultController.
 *
 * @package Drupal\thunder_styleguide\Controller
 */
class PageController extends ControllerBase {

  /**
   * The form builder.
   *
   * @var \Drupal\Core\Form\FormBuilderInterface
   */
  protected $formBuilder;

  /**
   * {@inheritdoc}
   */
  public function __construct(FormBuilderInterface $form_builder) {
    $this->formBuilder = $form_builder;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('form_builder')
    );
  }

  /**
   * Render a style guide page.
   *
   * @return array
   *   Returns render array.
   */
  public function page() {
    $form = $this->formBuilder->getForm('Drupal\thunder_styleguide\Form\FormExamples');

    return [
      '#theme' => 'thunder_styleguide',
      '#form' => $form,
    ];

  }

}
