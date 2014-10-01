<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dto\Mapping;

use Dto\AbstractDto;

/**
 * @author Hudson Dunice <dunice@gmail.com>
 */
class Base extends AbstractDto
{
    /**
     * Constructor
     * @param mixed array || object $params
     */
    public function __construct($params)
    {
        if(
            !(is_array($params))
            && !(is_object($params))
        ) {
            throw new \InvalidArgumentException('The argument must be an array or an object');
        }

        if(is_object($params)) {
            $params = new \ArrayObject($params);
        }

        $this->params = $params;
    }
}
