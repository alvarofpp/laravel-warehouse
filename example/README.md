# Title code
Description and details of the general purpose of your contribution.

## How to use
Use the `App\Traits\CowTrait` trait on the model:
```php
namespace App;

use App\Traits\CowTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, CowTrait;
// ...
}
```

In `other_file.php`, you use the `speakLikeACow` method:
```php
// ...
$person = User::findOrFail(1);
echo $person->speakLikeACow();
// "moo"
```

## Files
```bash
.
└── app
    └── Traits
        └── CowTrait.php
```
