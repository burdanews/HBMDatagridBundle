<?php

namespace HBM\DatagridBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class HBMDatagridExtension extends Extension {

  /**
   * {@inheritdoc}
   */
  public function load(array $configs, ContainerBuilder $container): void {
    $configuration = new Configuration();
    $config = $this->processConfiguration($configuration, $configs);

    $container->setParameter('hbm.datagrid', $config);
    $container->setParameter('hbm.datagrid.query_encode_mode', $config['query']['encode']);

    $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config'));
    $loader->load('services.yaml');
  }
}
