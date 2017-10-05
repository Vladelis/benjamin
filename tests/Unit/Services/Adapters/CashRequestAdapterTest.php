<?php
namespace Tests\Unit\Services\Adapters;

use Ebanx\Benjamin\Services\Adapters\CashRequestAdapter;
use Tests\Helpers\Builders\BuilderFactory;
use JsonSchema;
use Ebanx\Benjamin\Models\Configs\Config;

class CashRequestAdapterTest extends RequestAdapterTest
{
    public function testJsonSchema()
    {
        $config = new Config([
            'sandboxIntegrationKey' => 'testIntegrationKey'
        ]);
        $factory = new BuilderFactory('es_MX');
        $payment = $factory->payment()->baloto()->build();

        $adapter = new CashRequestAdapter($payment, $config);
        $result = $adapter->transform();

        $validator = new JsonSchema\Validator;
        $validator->validate($result, $this->getSchema(['requestSchema', 'cashRequestSchema']));

        $this->assertTrue($validator->isValid(), $this->getJsonMessage($validator));
    }
}
