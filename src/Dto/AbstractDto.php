<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dto;

/**
 * @author Hudson Dunice <dunice@gmail.com>
 */
abstract class AbstractDto
{
    /**
     * @param mixed $params
     */
    protected $params;

    /**
     * Magic method __call
     * Verifies that param is scalar and convert to DTO recursivly. Instead return param value.
     *
     * @param  string $method
     * @param  array  $args
     * @return mixed  \Dto\AbstractDto || scalar
     */
    public function __call($method, $args = null)
    {
        $command = mb_strtolower(substr($method, 0, 3));
        $method  = lcfirst(substr($method, 3));

        if($command === 'set') {
            $this->params[$method] = $args[0];

            return $this;
        }

        if($command !== 'get') {
            throw new \BadMethodCallException('Invalid method call.');
        }

        if(isset($this->params[$method])) {
            if(!is_scalar($this->params[$method])) {
                $class = get_called_class();

                if(
                    is_object($this->params[$method])
                    && preg_match("/entity/", strtolower(get_class($this->params[$method])))
                ) {
                    return $this->params[$method];
                }

                return new $class($this->params[$method]);
            }

            return $this->params[$method];
        }
    }

    public function toArray()
    {
        if (is_array($this->params)) {
            return $this->params;
        }
    }
}
