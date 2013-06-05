<?php
namespace nnscr\GISLBundle;

use nnscr\GISLBundle\DependencyInjection\MethodCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class nnscrGISLBundle extends Bundle {
	public function build(ContainerBuilder $container) {
		$container->addCompilerPass(new MethodCompilerPass());
	}
}
