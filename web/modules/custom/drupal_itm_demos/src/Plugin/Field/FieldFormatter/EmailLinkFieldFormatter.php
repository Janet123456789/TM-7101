<?php

//aqui le decimos a drupal en donde se encuentra este modulo
namespace Drupal\drupal_itm_demos\Plugin\Field\FieldFormatter;

//cada clase q vamos a usar se le tiene q declarar su "use" si yo no declaron el use, drupl va a buscar una clase al nivel en que estoy y no la va a encontrar y genera un error
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;


//con solo ese semejante comentario, se sabe que hay un field formatter
/**
 * Plugin implementation of the 'email_link_field_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "email_link_field_formatter",
 *   label = @Translation("Email link field formatter"),
 *   field_types = {
 *     "email"
 *   }
 * )
 */

//ese extends tiene q declararse el "use" de esa clase, osea, ariiba donde estan los uses
class EmailLinkFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */

  //Todos los posibles metodos que utilicemos, a lo mejor no se utilicen todos

  //el metodo q vamos a borrar es el de abajo porque no vamos a usar, porque no vamos a usar settings

  // public static function defaultSettings() {
  //   return [
  //     // Implement default settings.
  //   ] + parent::defaultSettings();
  // }

  /**
   * {@inheritdoc}
   */

  //se borra el de abajo porque no vamos a usar settings
  // public function settingsForm(array $form, FormStateInterface $form_state) {
  //   return [
  //     // Implement settings form.
  //   ] + parent::settingsForm($form, $form_state);
  // }

  /**
   * {@inheritdoc}
   */
  //Se borra porque no vamos a usar settingss
  // public function settingsSummary() {
  //   $summary = [];
  //   // Implement settings summary.

  //   return $summary;
  // }

  /**
   * {@inheritdoc}
   */



  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = []; //declara array elements

    foreach ($items as $delta => $item) {
      $elements[$delta] = ['#markup' => $this->viewValue($item)]; //se llena ese array
    }

    return $elements; // y retorna
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */

  //esta funcion es "protected" es decir solo se puede acceder desde la misma clase y clases hijas

  //si quiero saberla funcion voy a la documentacion copiando "FieldItemInterface" en google y doy click en la ultima version y ahi viene toda la documentacion
  protected function viewValue(FieldItemInterface $item) {

    //las dos lineas de abajo de borren despues de provarlo (cuando se provo el contenido), era par ver q hace
    // ksm($item->getValue(),'GV');
    // ksm($item->value, 'VAL'); //para tener una idea de que q hay ahi
    $url = Url::fromUri('mailto:' . $item->value);
    $link = Link::fromTextAndUrl($this->t('Send Email'), $url);
    return $link->toString(); //no devuelve un String 

  }

}
