# URL Parameters
Add url parameters in your FormRequest to be validated.

## How to use
Use the `App\Traits\UrlParameters` trait on the FormRequest:
```php
namespace App\Http\Requests\Users;

use App\Traits\UrlParameters;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    use UrlParameters;
    //...
}
```

In this case, the URI is `[PUT/PATCH] /users/{user}`. Using `UrlParameters`, you can validate `{user}`, example:
```php
// ...
public function rules()
{
    return [
        'user' => ['required', 'exists:users,id', new AuthIdRule],
    ];
}
// ...
```

`AuthIdRule` checks if the assigned value is equivalent to the User's `id` in the session.

## Files
```bash
.
└── app
    └── Traits
        └── UrlParameters.php
```
