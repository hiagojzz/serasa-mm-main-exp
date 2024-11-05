<?php

namespace SerasaExperian\Tests;

use PHPUnit\Framework\TestCase;
use SerasaExperian\WsseAuthHeader;

final class WsseAuthHeaderTest extends TestCase {

    public function testConstructor() {
        $this->assertInstanceOf('SoapHeader', new WsseAuthHeader);
    }

}