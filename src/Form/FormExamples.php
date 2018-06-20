<?php

namespace Drupal\thunder_styleguide\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\PathElement;
use Drupal\Core\Url;
use Drupal\language\Entity\ContentLanguageSettings;
use Drupal\Core\language\LanguageInterface;

/**
 * Class Form Examples.
 *
 * @package Drupal\thunder_styleguide\Form
 */
class FormExamples extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'form_examples';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['description'] = [
      '#type' => 'item',
      '#markup' => $this->t('Form elements as found on the <a href=":url">API documentation</a>.',
        [':url' => 'https://api.drupal.org/api/drupal/elements']
      ),
    ];

    /* actions, see bottom */
    /* ajax */

    // Button.
    $form['button'] = [
      '#type' => 'button',
      '#value' => 'Button',
      '#description' => $this->t('Button, #type = button'),
    ];

    // Image Buttons.
    $form['image_button'] = [
      '#type' => 'image_button',
      '#value' => 'Image button',
      '#src' => drupal_get_path('module', 'thunder_styleguide') . '/images/100x30.svg',
      '#description' => $this->t('image file, #type = image_button'),
    ];

    // Simple checkbox for ajax orders.
    $form['change'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Change Me'),
    ];

    // CheckBoxes.
    $form['tests_taken'] = [
      '#type' => 'checkboxes',
      '#options' => ['SAT' => t('SAT'), 'ACT' => t('ACT')],
      '#title' => $this->t('What standardized tests did you take?'),
      '#description' => 'Checkboxes, #type = checkboxes',
    ];

    // Color.
    $form['color'] = [
      '#type' => 'color',
      '#title' => $this->t('Color'),
      '#default_value' => '#ffffff',
      '#description' => 'Color, #type = color',
    ];

    /* START Containers */
    // Details containers replace D7's collapsible field sets.
    $form['details'] = [
      '#type' => 'details',
      '#title' => 'Author Info (#type = details)',
    ];

    $form['details']['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
    ];

    $form['details']['pen_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Pen Name'),
    ];

    // Details containers replace D7's collapsible field sets.
    $form['details_open'] = [
      '#type' => 'details',
      '#title' => 'Author Info (#type = details, #open = true)',
      '#open' => TRUE,
    ];

    $form['details_open']['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
    ];

    $form['details_open']['pen_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Pen Name'),
    ];

    // Conventional field set.
    $form['book'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Book Info (type = fieldset)'),
    ];

    $form['book']['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
    ];

    $form['book']['publisher'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Publisher'),
    ];

    // Containers have no visual display but wrap any contained elements in a
    // div tag.
    $form['accommodation'] = [
      '#type' => 'container',
    ];

    $form['accommodation']['title'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $this->t('Special Accommodations (#type = container)'),
    ];

    $form['accommodation']['diet'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Dietary Restrictions'),
    ];
    /* END Containers */

    /* contextual_links */
    /* contextual_links_placeholder */

    // Date.
    $form['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Date'),
      '#default_value' => ['year' => 2020, 'month' => 2, 'day' => 15],
      '#description' => 'Date, #type = date',
    ];

    // Datelist.
    $form['datelist'] = [
      '#title' => 'Datelist, #type = datelist',

      '#type' => 'container',
    ];

    $form['datelist']['value'] = [
      '#title' => $this->t('Datelist, (#type = datelist)'),
      '#type' => 'datelist',
      '#date_increment' => '15',
      '#date_part_order' => ['day', 'month', 'year', 'hour', 'minute'],
    ];

    $form['datelist']['end_value'] = [
      '#type' => 'datelist',
      '#date_increment' => '15',
      '#date_part_order' => ['day', 'month', 'year', 'hour', 'minute'],
    ];

    // Date-time.
    $form['datetime'] = [
      '#type' => 'datetime',
      '#title' => 'Date Time',
      '#date_increment' => 1,
      '#date_timezone' => drupal_get_user_timezone(),
      '#default_value' => drupal_get_user_timezone(),
      '#description' => $this->t('Date time, #type = datetime'),
    ];

    /* details, see container, */
    /* dropbutton, see actions. */

    // Email.
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#description' => $this->t('Email, #type = email'),
    ];

    /* entity_autocomplete */
    /* field_ui_table */

    // Fieldgroup.
    $form['site_information'] = [
      '#type' => 'fieldgroup',
      '#title' => $this->t('Site information'),
    ];
    $form['site_information']['site_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Site name'),
      '#required' => TRUE,
      '#weight' => -20,
    ];
    $form['site_information']['site_mail'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Site slogan'),
      '#required' => TRUE,
      '#weight' => -15,
    ];

    /* fieldset, see containers. */

    // File.
    $form['file'] = [
      '#type' => 'file',
      '#title' => 'File',
      '#description' => $this->t('File, #type = file'),
    ];

    // Manage file.
    $form['managed_file'] = [
      '#type' => 'managed_file',
      '#title' => 'Managed file',
      '#description' => $this->t('Manage file, #type = managed_file'),
    ];

    /* form */
    /* hidden */
    /* html */

    // html_tag.
    $form['html_tag'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $this->t('HTML Tag (#type = html_tag)'),
    ];

    /* Image_button, see button */
    /* inline_template */

    // Item.
    $form['description'] = [
      '#type' => 'item',
      '#markup' => $this->t('Form elements as found on the <a href=":url">API documentation</a>.',
        [':url' => 'https://api.drupal.org/api/drupal/elements']
      ),
    ];

    // Label.
    $form['label'] = [
      '#type' => 'label',
      '#title' => 'Label (#type = label)',
      '#title_display' => 'above',
    ];

    // language_configuration.
    if (\Drupal::moduleHandler()->moduleExists('language')) {
      $form['language'] = [
        '#type' => 'details',
        '#title' => t('Language settings'),
        '#group' => 'additional_settings',
        '#open' => TRUE,
      ];

      $language_configuration = ContentLanguageSettings::loadByEntityTypeBundle('node', 'article');
      $form['language']['language_configuration'] = [
        '#type' => 'language_configuration',
        '#entity_information' => [
          'entity_type' => 'node',
          'bundle' => 'article',
        ],
        '#default_value' => $language_configuration,
      ];
    }

    // language_select.
    $form['languages_all'] = [
      '#title' => t('Languages: All'),
      '#type' => 'language_select',
      '#languages' => LanguageInterface::STATE_ALL,
      '#default_value' => 'xx',
    ];
    $form['languages_configurable'] = [
      '#title' => t('Languages: Configurable'),
      '#type' => 'language_select',
      '#languages' => LanguageInterface::STATE_CONFIGURABLE,
      '#default_value' => 'en',
    ];

    /* link */
    /* machine_name */
    /* managed_file, see files */

    // more_link.
    $form['more'] = [
      '#type' => 'more_link',
      '#url' => Url::fromUserInput('/'),
      '#attributes' => ['title' => $this->t('Read more.')],
    ];

    // Number.
    $form['quantity'] = [
      '#type' => 'number',
      '#title' => t('Quantity'),
      '#description' => $this->t('Number, #type = number'),
      '#default_value' => 30,
      '#required' => TRUE,
      '#min' => 10,
      '#max' => 1000,
      '#step' => 10,
    ];

    /* operations */
    /* page */
    /* page_title */
    /* pager */

    // Password.
    $form['password'] = [
      '#type' => 'password',
      '#title' => $this->t('Password'),
      '#description' => 'Password, #type = password',
    ];

    // Password Confirm.
    $form['password_confirm'] = [
      '#type' => 'password_confirm',
      '#title' => $this->t('New Password'),
      '#description' => $this->t('PasswordConfirm, #type = password_confirm'),
    ];
    // Path.
    $form['redirect'] = [
      '#type' => 'path',
      '#title' => $this->t('Redirect path'),
      '#convert_path' => PathElement::CONVERT_NONE,
      '#default_value' => 'node/1',
      '#description' => $this->t('Path (#type = path)'),
    ];

    // processed_text.
    $form['proc_text'] = [
      '#type' => 'processed_text',
      '#text' => 'Lorem ipsum dolor sit amet.',
      '#format' => filter_default_format(),
    ];

    // radio.
    $form['single_radio'] = [
      '#type' => 'radio',
      '#title' => 'Single radio',
      '#name' => 'ABC',
      '#return_value' => 'ABC',
      '#default_value' => 'ACB',
    ];

    // Radios.
    $form['settings']['active'] = [
      '#type' => 'radios',
      '#title' => t('Poll status'),
      '#options' => [0 => $this->t('Closed'), 1 => $this->t('Active')],
      '#description' => $this->t('Radios, #type = radios'),
    ];

    // Range.
    $form['size'] = [
      '#type' => 'range',
      '#title' => t('Size'),
      '#min' => 10,
      '#max' => 100,
      '#description' => $this->t('Range, #type = range'),
    ];

    /* responsive_image */

    // Search.
    $form['search'] = [
      '#type' => 'search',
      '#title' => $this->t('Search'),
      '#description' => $this->t('Search, #type = search'),
    ];

    // Select.
    $form['favorite'] = [
      '#type' => 'select',
      '#title' => $this->t('Favorite color'),
      '#options' => [
        'red' => $this->t('Red'),
        'blue' => $this->t('Blue'),
        'green' => $this->t('Green'),
      ],
      '#empty_option' => $this->t('-select-'),
      '#description' => $this->t('Select, #type = select'),
    ];

    // Multiple values option elements.
    $form['select_multiple'] = [
      '#type' => 'select',
      '#title' => 'Select (multiple)',
      '#multiple' => TRUE,
      '#options' => [
        'sat' => 'SAT',
        'act' => 'ACT',
        'none' => 'N/A',
      ],
      '#default_value' => ['sat'],
      '#description' => 'Select Multiple',
    ];

    // Status_messages.
    $messages = ['status', 'warning', 'error'];
    foreach ($messages as $message) {
      // Set a new message with a link.
      drupal_set_message('Lorem ipsum dolor sit amet.', $message);
      $form[$message . '-message'] = [
        'title' => ucwords($message) . ' message',
        'content' => [
          '#theme' => 'status_messages',
          '#message_list' => drupal_get_messages($message),
        ],
      ];
    }
    // Clear messages.
    drupal_get_messages();

    /* status_report */
    /* status_report_page */
    /* submit, see actions. */
    /* system_compact_link */

    // Table.
    $options = [
      1 => ['first_name' => 'Indy', 'last_name' => 'Jones'],
      2 => ['first_name' => 'Darth', 'last_name' => 'Vader'],
      3 => ['first_name' => 'Super', 'last_name' => 'Man'],
    ];

    $header = [
      'first_name' => t('First Name'),
      'last_name' => t('Last Name'),
    ];
    // Table
    // TableSelect.
    $form['table'] = [
      '#type' => 'table',
      '#title' => $this->t('Table (#type = table)'),
      '#header' => $header,
      '#rows' => $options,
    ];

    // TableSelect.
    $form['table_select'] = [
      '#type' => 'tableselect',
      '#title' => $this->t('Users'),
      '#header' => $header,
      '#options' => $options,
      '#empty' => t('No users found'),
    ];

    // Tel.
    $form['phone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone'),
      '#default_value' => $this->t('0123456789'),
      '#description' => $this->t('Tel, #type = tel'),
    ];

    // Text format.
    $form['text_format'] = [
      '#type' => 'text_format',
      '#title' => 'Text format',
      '#format' => 'plain_text',
      '#expected_value' => [
        'value' => 'Text value',
        'format' => 'plain_text',
      ],
      '#textformat_value' => [
        'value' => 'Testvalue',
        'format' => 'filtered_html',
      ],
      '#description' => $this->t('Text format, #type = text_format'),
    ];

    // Textarea.
    $form['text'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Text'),
      '#description' => $this->t('Textarea, #type = textarea'),
    ];

    // Textfield.
    $form['subject'] = [
      '#type' => 'textfield',
      '#title' => t('Subject'),
      '#size' => 60,
      '#maxlength' => 128,
      '#description' => $this->t('Textfield, #type = textfield'),
    ];

    /* token */
    /* toolbar */
    /* toolbar_item */

    // URL.
    $form['url'] = [
      '#type' => 'url',
      '#title' => $this->t('URL'),
      '#default_value' => 'http://example.com',
      '#maxlength' => 255,
      '#size' => 30,
      '#description' => $this->t('URL, #type = url'),
    ];

    /* value */

    // Vertical_tabs.
    $elements = ['text', 'subject', 'url'];
    $form['vertical_tabs']['elements'] = [
      '#type' => 'vertical_tabs',
      '#default_tab' => 'fieldset',
    ];
    foreach ($elements as $element) {
      $form['vertical_tabs'][$element] = $form[$element];
      $form['vertical_tabs'][$element]['#type'] = 'details';
      $form['vertical_tabs'][$element]['#group'] = 'elements';
    }

    /* view */

    // Weight.
    $form['weight'] = [
      '#type' => 'weight',
      '#title' => t('Weight'),
      '#delta' => 10,
      '#description' => $this->t('Weight, #type = weight'),
    ];

    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form.
    $form['actions'] = [
      '#type' => 'actions',
    ];

    // Extra actions for the display.
    $form['actions']['extra_actions'] = [
      '#type' => 'dropbutton',
      '#links' => [
        'simple_form' => [
          'title' => $this->t('Simple Form'),
          'url' => Url::fromRoute('form_api_example.simple_form'),
        ],
        'demo' => [
          'title' => $this->t('Build Demo'),
          'url' => Url::fromRoute('form_api_example.build_demo'),
        ],
      ],
    ];

    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = [
      '#type' => 'actions',
    ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    $form['actions']['preview'] = [
      '#type' => 'button',
      '#value' => $this->t('Preview'),
    ];

    // dropbutton.
    $form['actions']['extra_actions'] = [
      '#type' => 'dropbutton',
      '#links' => [
        'simple_form' => [
          'title' => $this->t('Simple Form'),
          'url' => Url::fromUserInput('#'),
        ],
        'demo' => [
          'title' => $this->t('Build Demo'),
          'url' => Url::fromUserInput('#'),
        ],
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }

  }

}
