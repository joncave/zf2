<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_View
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

namespace ZendTest\View\Helper;

use Zend\View\Renderer\PhpRenderer as View;
use Zend\View\Helper\HtmlFlash;

/**
 * @category   Zend
 * @package    Zend_View
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @group      Zend_View
 * @group      Zend_View_Helper
 */
class HtmlFlashTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Zend_View_Helper_HtmlFlash
     */
    public $helper;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp()
    {
        $this->view   = new View();
        $this->helper = new HtmlFlash();
        $this->helper->setView($this->view);
    }

    public function tearDown()
    {
        unset($this->helper);
    }

    public function testMakeHtmlFlash()
    {
        $htmlFlash = $this->helper->__invoke('/path/to/flash.swf');

        $objectStartElement = '<object data="/path/to/flash.swf" type="application/x-shockwave-flash">';

        $this->assertContains($objectStartElement, $htmlFlash);
        $this->assertContains('</object>', $htmlFlash);
    }
}

