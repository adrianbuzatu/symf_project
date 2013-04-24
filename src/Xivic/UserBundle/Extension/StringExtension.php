<?php
	namespace Xivic\UserBundle\Extension;
	use Symfony\Component\HttpKernel\KernelInterface;
	class StringExtension extends \Twig_Extension
	{
		public function getFilters()
		{
			return array(
				'ucwords' => new \Twig_Filter_Method($this, 'uppercase_first_letter'),
				'var_dump' => new \Twig_Filter_Function('var_dump')
			);
		}
	
		function uppercase_first_letter($var){
			return ucwords(strtolower($var));
		}
	
		public function getName()
		{
			return 'recensus_twig_extension';
		}
	}
