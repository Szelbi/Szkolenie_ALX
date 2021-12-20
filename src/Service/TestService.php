<?php
declare(strict_types=1);

namespace App\Service;

final class TestService
{
    public function __construct()
    {
        dd('test');
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}