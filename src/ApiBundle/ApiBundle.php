<?php

namespace ApiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApiBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
