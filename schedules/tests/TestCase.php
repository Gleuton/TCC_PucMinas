<?php

use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Symfony\Component\HttpKernel\HttpKernelInterface;

abstract class TestCase extends BaseTestCase
{
    /**
     * @return mixed|HttpKernelInterface
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }
}
