<?php

namespace Drupal\elite_dump\Plugin\Devel\Dumper;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\devel\DevelDumperBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\AbstractDumper;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class Symfony
 * @package Drupal\elite_dump\Plugin\Devel\Dumper
 *
 * @DevelDumper(
 *   id = "symfony",
 *   label = @Translation("Symfony"),
 *   description = @Translation("Wrapper for <a href='http://symfony.com/doc/current/components/var_dumper/index.html'>Symfony VarDumper</a> debugging tool.")
 * )
 */
class Symfony extends DevelDumperBase implements ContainerFactoryPluginInterface {

  /**
   * @var \Symfony\Component\VarDumper\Cloner\VarCloner
   */
  private $cloner;

  /**
   * @var \Symfony\Component\VarDumper\Dumper\AbstractDumper
   */
  private $dumper;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, VarCloner $cloner, AbstractDumper $dumper) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->cloner = $cloner;
    $this->dumper = $dumper;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static($configuration, $plugin_id, $plugin_definition, $container->get('elite_dump.var_dumper.cloner'), $container->get('elite_dump.var_dumper.html_dumper'));
  }

  public function dump($input, $name = NULL) {
    $this->dumper->dump($this->cloner->cloneVar($input));
  }

  public function export($input, $name = NULL) {
    $output = 'php://temp';
    $handle = fopen($output, 'w+b');
    $this->dumper->dump($this->cloner->cloneVar($input), $handle);
    rewind($handle);
    $content = stream_get_contents($handle);
    fclose($handle);
    return $this->setSafeMarkup($content);
  }

  public static function checkRequirements() {
    return class_exists(VarDumper::class);
  }
}