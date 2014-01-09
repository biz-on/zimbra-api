<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Soap\Struct;

use Zimbra\Utils\SimpleXML;

/**
 * MailCustomMetadata class
 * @package   Zimbra
 * @category  Soap
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class MailCustomMetadata extends MailKeyValuePairs
{
    /**
     * Section
     * Normally present. If absent this indicates that CustomMetadata info is present but there are no sections to report on.
     * @var string
     */
    private $_section;

    /**
     * Constructor method for MailKeyValuePairs
     * @param string $section
     * @param array $a
     * @return self
     */
    public function __construct($section = null, array $a = array())
    {
        parent::__construct($a);
        $this->_section = trim($section);
    }

    /**
     * Gets or sets section
     *
     * @param  string $section
     * @return string|self
     */
    public function section($section = null)
    {
        if(null === $section)
        {
            return $this->_section;
        }
        $this->_section = trim($section);
        return $this;
    }

    /**
     * Returns the array representation of this class 
     *
     * @param  string $name
     * @return array
     */
    public function toArray($name = 'meta')
    {
        $name = !empty($name) ? $name : 'meta';
        $arr = parent::toArray($name);
        if(!empty($this->_section))
        {
            $arr[$name]['section'] = $this->_section;
        }
        return $arr;
    }

    /**
     * Method returning the xml representative this class
     *
     * @param  string $name
     * @return SimpleXML
     */
    public function toXml($name = 'meta')
    {
        $name = !empty($name) ? $name : 'meta';
        $xml = parent::toXml($name);
        if(!empty($this->_section))
        {
            $xml->addAttribute('section', $this->_section);
        }
        return $xml;
    }
}