<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dto\Tests\Mapping;

use Dto\Mapping\Base;

/**
 * @author Hudson Dunice <dunice@gmail.com>
 */
class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testBaseDto()
    {
        $params = array(
            'sqPessoa' => 1
        );
        $dto = new Base($params);

        $this->assertNotEmpty($dto);
        $this->assertInstanceOf('\Dto\AbstractDto', $dto);

        $params = (object) array(
            'sqPessoa' => 1
        );
        $dto = new Base($params);
        $this->assertEquals(1, $dto->getSqPessoa());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBaseDtoInvalidArgument()
    {
        $params = 'Hudson';
        $dto    = new Base($params);
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testBaseDtoBadMethodCall()
    {
        $params = array();
        $dto    = new Base($params);

        $dto->sqPessoa();
    }

    public function testDtoRecursivly()
    {
        $params = array(
            'sqPessoa' => (object) array(
                'sqPessoa' => 1
            )
        );
        $dto        = new Base($params);
        $sqEndereco = $dto->getSqPessoa()->setSqEndereco(1);

        $this->assertNotEmpty($dto->getSqPessoa()->getSqPessoa());
        $this->assertEquals(1, $dto->getSqPessoa()->getSqPessoa());
        $this->assertEquals(1, $dto->getSqPessoa()->getSqEndereco());
    }
}
