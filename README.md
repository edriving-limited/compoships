# Compoships

**This is a fork of the Compoships package, updated to allow case-insenstitive eager loading of models**

Please refer to that [package](https://github.com/topclaudy/compoships) for documentation.

## Installation

First, add the below to the root object in your `composer.json` file...

```json
"repositories": [
  {
    "name": "edriving-limited/compoships",
    "url": "https://github.com/edriving-limited/compoships.git",
    "type": "git"
  }
],
```

Then you should be able to require the package `composer require edriving-limited/compoships`.

## Usage
You should create a `BaseModel` class which uses the below traits, and then all your models should extend this class.

```php
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;
use TishoTM\Eloquent\Concerns\HasCiRelationships;

class BaseModel extends Model
{
    use HasCiRelationships, Compoships {
        Compoships::hasOne insteadof HasCiRelationships;
        Compoships::newHasOne insteadof HasCiRelationships;
        Compoships::hasMany insteadof HasCiRelationships;
        Compoships::newHasMany insteadof HasCiRelationships;
        Compoships::belongsTo insteadof HasCiRelationships;
        Compoships::newBelongsTo insteadof HasCiRelationships;
    }
}
```

That should be it, if you use return types on your relationship methods, then ensure these return the `Awobaz` version of these relationship classes, e.g...

* `Awobaz\Compoships\Database\Eloquent\Relations\BelongsTo`
* `Awobaz\Compoships\Database\Eloquent\Relations\HasOne`
* `Awobaz\Compoships\Database\Eloquent\Relations\HasMany`
