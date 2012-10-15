<?php

/**
 * PluginmdMediaIssuuVideo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginmdMediaIssuuVideo extends BasemdMediaIssuuVideo implements mdMediaContentInterface
{
  public $priority = -1;
  
  public $mdUserIdTmp = 0;
  
  const DOMAIN_ISSUU_IMAGE = 'http://image.issuu.com/';
  
  public function getObjectClass()
  {
    return get_class($this);
  }
  
  public function preSave($event) 
  {
    parent::preSave($event);
    if($this->isNew())
    {
      $this->setDocumentId($this->parseDocumentId()); 
    }
  }
  
  private function parseDocumentId()
  {
    $coincidencias = array();
    
    $pat ='/(.+)documentId=([^&]*)&(.+)/';

    if(preg_match($pat, $this->getEmbedCode(), $coincidencias))
    {
      return $coincidencias[2];
    }
    else
    {
      throw new Exception('invalid embebed code', 100);
    }
  }

  /**
   *
   * @param $options['small'] | $options['medium'] $size
   * @return string
   */
  public function getObjectUrl($options = array())
  {
    if(!isset($options['size']))
    {
      $size = 'small';
    }
    else
    {
      $size = $options['size'];
    }
    $avatar_url = mdMediaIssuuVideo::DOMAIN_ISSUU_IMAGE . $this->getDocumentId() . '/jpg/page_1_thumb_' . $size . '.jpg';
    $image_size = @getimagesize($avatar_url);
    if(!is_array($image_size))
    {
      return "/../mdMediaDoctrinePlugin/images/issuu.com-logo.jpg";
    }
    else
    {
      return $avatar_url;
    }
  
    var_dump($avatar_url);
    die;
    
    
  }
  
  


  
  public function retrieveEmbeddedCode($options = array())
  {
    $width = 480;
    $height = 390;
    if(isset($options['width'])) $width = $options['width'];
    if(isset($options['height'])) $height = $options['height'];
    return $this->getEmbedCode();
  }

  public function getObjectSource()
  {
    return "";
  }
    
  public function isVideo()
  {
    return true;
  }
}
