# VarDumper panel for Yii2-debug

This extensions adds a panel which show var dumps using custom VarDumper::dump($var) function.

### Installation

Install extention via composer command:
```sh
composer require widewhale/yii2-debug-vardumper
```

Then add panel to your debug config:
```php
'modules'=>[
    ...
    'debug'=>[
        ...
        'panels'=>[
            ...
            'vardumper'=>[
                'class'=>'\widewhale\debug\vardumper\panels\VarDumperPanel'
            ]
        ]
    ]
    ...
]
```

### Usage

```php
...

use widewhale\debug\vardumper\components\VarDumper;

...

VarDumper::dump($var);
```
Since class name same as **yii\helpers\VarDumper** you basicly can just replace **yii\helpers\VarDumper** with **widewhale\debug\vardumper\components\VarDumper** if you're used default VarDumper helper previously.

**IMPORTANT**
If you want to use **yii\helpers\VarDumper** and **widewhale\debug\vardumper\components\VarDumper** simultaneously you should use aliases (or fully qualified namespace names)
```php
use widewhale\debug\vardumper\components\VarDumper;
use yii\helpers\VarDumper as YiiVarDumper;

...

VarDumper::dump($var);
YiiVarDumper::dump($var);

OR

\widewhale\debug\vardumper\components\VarDumper::dump($var);

```
 
