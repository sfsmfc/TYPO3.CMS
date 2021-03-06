<?php
declare(strict_types = 1);
namespace TYPO3\CMS\Core\Tests\Unit\Context;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Context\Exception\AspectPropertyNotFoundException;
use TYPO3\CMS\Core\Context\VisibilityAspect;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class VisibilityAspectTest extends UnitTestCase
{
    /**
     * @test
     */
    public function getterReturnsProperDefaultValues()
    {
        $subject = new VisibilityAspect();
        $this->assertFalse($subject->includeHiddenPages());
        $this->assertFalse($subject->includeHiddenContent());
        $this->assertFalse($subject->includeDeletedRecords());
    }

    /**
     * @test
     */
    public function getterReturnsProperValues()
    {
        $subject = new VisibilityAspect(true, true, true);
        $this->assertTrue($subject->includeHiddenPages());
        $this->assertTrue($subject->includeHiddenContent());
        $this->assertTrue($subject->includeDeletedRecords());
    }

    /**
     * @test
     */
    public function getReturnsProperValues()
    {
        $subject = new VisibilityAspect(true, true, true);
        $this->assertTrue($subject->get('includeHiddenPages'));
        $this->assertTrue($subject->get('includeHiddenContent'));
        $this->assertTrue($subject->get('includeDeletedRecords'));
    }

    /**
     * @test
     */
    public function getThrowsExceptionOnInvalidArgument()
    {
        $this->expectException(AspectPropertyNotFoundException::class);
        $this->expectExceptionCode(1527780439);
        $subject = new VisibilityAspect();
        $subject->get('football');
    }
}
