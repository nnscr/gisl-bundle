<?php
namespace nnscr\GISLBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MethodCompilerPass implements CompilerPassInterface {
	/**
	 * You can modify the container here before it is dumped to PHP code.
	 *
	 * @param ContainerBuilder $container
	 *
	 * @api
	 */
	public function process(ContainerBuilder $container) {
		if(!$container->hasDefinition('gisl.interpreter')) {
			return;
		}

		$interpreterDefinition = $container->getDefinition('gisl.interpreter');
		$methodServices = $container->findTaggedServiceIds('gisl.method');

		foreach($methodServices as $id => $attr) {
			$interpreterDefinition->addMethodCall('addMethod', [new Reference($id)]);
		}
	}
}
