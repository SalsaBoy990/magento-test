<?php
namespace Gulacsi\Commercebug\Plugin\Magento\Framework\View\Layout\Data;
use ReflectionClass;
use Gulacsi\Commercebug\Model\All;

class Structure
{
    public function beforeCreateStructuralElement($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeAddToParentGroup($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeCreateElement($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeImportElements($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeRenameElement($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeReorderChild($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeReorderChildElement($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeReorderToSibling($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeSetAsChild($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeSetAttribute($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeUnsetChild($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    public function beforeUnsetElement($subject)
    {
        $args = func_get_args();
        array_shift($args);

        \Gulacsi\Commercebug\Model\All::addTo(
            'scheduled_structure', $this->serializeCommandString(__METHOD__, $args, $subject));

        return $args;
    }

    protected function serializeCommandString($method, $args, $structure)
    {
        $method = str_replace('::before', '::', $method);
        $method = explode("::", $method);
        $method = array_pop($method);
        $method[0] = strToLower($method[0]);
        $string = $method . '(';
        foreach($args as $key=>$arg)
        {
            $argumentName = $this->getArgumentName($structure, $method, $key);
            $string .= '$' . $argumentName . '=' .
                $this->serializeVarAsString($arg) . ',';
        }
        $string = rtrim($string, ',');
        $string .= ')';
        return $string;
    }

    protected function serializeVarAsString($arg)
    {
        if(is_object($arg))
        {
            return All::getClass($arg);
        }

        if(is_null($arg))
        {
            return 'null';
        }

        if(is_bool($arg))
        {
            return $arg ? 'true' : 'false';
        }

        if(is_array($arg))
        {
            $string = '[';
            foreach($arg as $key=>$element)
            {
                $string .= $this->serializeVarAsString($key) . '=>' .
                    $this->serializeVarAsString($element) . ',';
            }
            $string = rtrim($string, ',');
            $string .= ']';
            return $string;
        }

        if(is_string($arg))
        {
            return '"' . $arg . '"';
        }


        return (string) $arg;
    }

    protected function getArgumentName($structure, $method, $index)
    {
        $r = new ReflectionClass($structure);
        $method = $r->getMethod($method);
        foreach($method->getParameters() as $key=>$param)
        {
            if($key == $index)
            {
                return $param->getName();;
            }
        }
        return 'unknown';
    }
}
