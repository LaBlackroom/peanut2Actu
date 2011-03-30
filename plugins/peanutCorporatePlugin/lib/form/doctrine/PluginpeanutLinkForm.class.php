<?php

/**
 * peanutLink form.
 *
 * @package    blackroom
 * @subpackage form
 * @author     Alexandre pocky Balmes
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginpeanutLinkForm extends BasepeanutLinkForm
{
  public function setup()
  {
    parent::setup();
    
    $user = self::getValidUser();
    
    $this->useFields(array(
     'title',
     'slug',
     'url',
     'rel',
     'author',
     'created_at',
     'peanutMenuId'
    ));
    
    $this->widgetSchema['url'] = new sfWidgetFormHtml5InputUrl($options = array(), $attributes = array(
        'required'    => true,
        'placeholder' => 'http://www.mywebsite.com',
        'pattern'     => 'https?://.+'
    ));
    
    if(!$this->isNew()) {
      $this->widgetSchema['created_at'] = new sfWidgetFormI18nDate(array(
        'culture' => $user->getCulture(),
      ));
    }
    else
    {
      unset($this['created_at']);
    }
    
    $this->validatorSchema['url'] = new sfValidatorUrl($options = array(
      'required'  => true
    ),$messages = array(
      'required'  => 'Fill this please'
    ));
  }
}