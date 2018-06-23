# Hearthstone Deckcodes

This library converts Hearthstone deck codes to - and from - very simple classes. The integers are DBFIDs that can be mapped to data from [hearthstonejson.com](https://hearthstonejson.com/) or some other source.

## Installation

```bash
composer require mlntn/hearthstone-deckcodes
```

## Get a deck from a code

```php
use Mlntn\Hearthstone\Deckcode;

$dc = new Deckcode;

$deck = $dc->getDeckFromCode('AAEBAaoIBPIFsQiUvQLN9AIN0wHZB/AH1g+QELIU96oC+6oCoLYCh7wC0bwC9r0ClO8CAA==');
```

#### Result
```
class Mlntn\Hearthstone\Deck#5 (3) {
  public $format =>
  int(1)
  public $heroes =>
  array(1) {
    [0] =>
    class Mlntn\Hearthstone\Hero#6 (1) {
      public $id =>
      int(1066)
    }
  }
  public $cards =>
  array(17) {
    [0] =>
    class Mlntn\Hearthstone\Card#7 (2) {
      public $id =>
      int(754)
      public $count =>
      int(1)
    }
    [1] =>
    class Mlntn\Hearthstone\Card#8 (2) {
      public $id =>
      int(1073)
      public $count =>
      int(1)
    }
    [2] =>
    class Mlntn\Hearthstone\Card#9 (2) {
      public $id =>
      int(40596)
      public $count =>
      int(1)
    }
    [3] =>
    class Mlntn\Hearthstone\Card#10 (2) {
      public $id =>
      int(47693)
      public $count =>
      int(1)
    }
    [4] =>
    class Mlntn\Hearthstone\Card#11 (2) {
      public $id =>
      int(211)
      public $count =>
      int(2)
    }
    [5] =>
    class Mlntn\Hearthstone\Card#12 (2) {
      public $id =>
      int(985)
      public $count =>
      int(2)
    }
    [6] =>
    class Mlntn\Hearthstone\Card#13 (2) {
      public $id =>
      int(1008)
      public $count =>
      int(2)
    }
    [7] =>
    class Mlntn\Hearthstone\Card#14 (2) {
      public $id =>
      int(2006)
      public $count =>
      int(2)
    }
    [8] =>
    class Mlntn\Hearthstone\Card#15 (2) {
      public $id =>
      int(2064)
      public $count =>
      int(2)
    }
    [9] =>
    class Mlntn\Hearthstone\Card#16 (2) {
      public $id =>
      int(2610)
      public $count =>
      int(2)
    }
    [10] =>
    class Mlntn\Hearthstone\Card#17 (2) {
      public $id =>
      int(38263)
      public $count =>
      int(2)
    }
    [11] =>
    class Mlntn\Hearthstone\Card#18 (2) {
      public $id =>
      int(38267)
      public $count =>
      int(2)
    }
    [12] =>
    class Mlntn\Hearthstone\Card#19 (2) {
      public $id =>
      int(39712)
      public $count =>
      int(2)
    }
    [13] =>
    class Mlntn\Hearthstone\Card#20 (2) {
      public $id =>
      int(40455)
      public $count =>
      int(2)
    }
    [14] =>
    class Mlntn\Hearthstone\Card#21 (2) {
      public $id =>
      int(40529)
      public $count =>
      int(2)
    }
    [15] =>
    class Mlntn\Hearthstone\Card#22 (2) {
      public $id =>
      int(40694)
      public $count =>
      int(2)
    }
    [16] =>
    class Mlntn\Hearthstone\Card#23 (2) {
      public $id =>
      int(46996)
      public $count =>
      int(2)
    }
  }
}
```

## Get a code from a deck

```php
use Mlntn\Hearthstone\Card;
use Mlntn\Hearthstone\Deck;
use Mlntn\Hearthstone\Deckcode;
use Mlntn\Hearthstone\Hero;

$deck = new Deck(Deck::FORMAT_WILD);
$deck->addHero(new Hero(1066));
$deck->addCard(new Card(754, 1));
$deck->addCard(new Card(1073, 1));
$deck->addCard(new Card(40596, 1));
$deck->addCard(new Card(47693, 1));
$deck->addCard(new Card(211, 2));
$deck->addCard(new Card(985, 2));
$deck->addCard(new Card(1008, 2));
$deck->addCard(new Card(2006, 2));
$deck->addCard(new Card(2064, 2));
$deck->addCard(new Card(2610, 2));
$deck->addCard(new Card(38263, 2));
$deck->addCard(new Card(38267, 2));
$deck->addCard(new Card(39712, 2));
$deck->addCard(new Card(40455, 2));
$deck->addCard(new Card(40529, 2));
$deck->addCard(new Card(40694, 2));
$deck->addCard(new Card(46996, 2));

$dc = new Deckcode;
$code = $dc->getCodeFromDeck($deck);
```

#### Result
```
AAEBAaoIBPIFsQiUvQLN9AIN0wHZB/AH1g+QELIU96oC+6oCoLYCh7wC0bwC9r0ClO8CAA==
```


## Thanks

Thanks to all the folks that figured out the format and shared code online. I looked at a lot of different code to get this to a working state.