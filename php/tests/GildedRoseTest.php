<?php

declare(strict_types=1);

namespace Tests;

use ApprovalTests\Approvals;
use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{

    public function testTestFixture()
    {
        $day0 = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 3, 6),
        ];

        $gildedRose = new GildedRose($day0);

        $result = 'OMGHAI!'.PHP_EOL;

        for ($i = 0; $i < 31; $i++) {
            $currentDay = $gildedRose->getItems();
            $result .= "-------- day $i --------".PHP_EOL;
            $result .= 'name, sellIn, quality'.PHP_EOL;
            for($j = 0; $j < count($currentDay); $j++) {
                $result .= $currentDay[$j].PHP_EOL;
            }
            $result .= PHP_EOL;
            $gildedRose->updateQuality();
        }

        Approvals::verifyString($result);
    }
}
