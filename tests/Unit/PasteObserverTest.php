<?php

namespace Tests\Unit;

use App\Observers\PasteObserver;
use App\Paste;
use function mt_rand;
use Tests\TestCase;
use \Vinkla\Hashids\Facades\Hashids;

class PasteObserverTest extends TestCase
{
    /** @test */
    public function it_adds_a_hash_to_the_paste_and_saves_it()
    {
        $pasteId = (string)mt_rand();
        $hash = (string)mt_rand();

        Hashids
            ::shouldReceive('encode')
            ->once()
            ->andReturn($hash);

        $paste = $this->createMock(Paste::class);
        $paste
            ->expects(self::once())
            ->method('__set')
            ->with('hash', $hash);

        $paste
            ->expects(self::exactly(2))
            ->method('__get')
            ->withConsecutive(
                ['id'],
                ['hash']
            )
            ->willReturnOnConsecutiveCalls(
                $pasteId,
                $hash
            );

        $paste
            ->expects(self::once())
            ->method('save')
            ->willReturn(true);

        $pasteObserver = new PasteObserver();
        $pasteObserver->created($paste);

        self::assertEquals($hash, $paste->hash);
    }
}
