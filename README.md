# State
### Abstraction for the state of system processes
#### Usage

```php
use Takeoto\State\State;
use Takeoto\Message\NoticeMessage;
use Takeoto\Message\ErrorMessage;
use Takeoto\Message\WarningMessage;

$state = new State([
    new NoticeMessage('☀️The notice message.'),
    new WarningMessage('⚠️The warning message!'),
    new ErrorMessage(500, 'The error message ‼️'),
]);

$state->isOk(); # false

# ---

$state = new State([
    new NoticeMessage('☀️The notice message.'),
    new WarningMessage('⚠️The warning message!'),
]);
$state->isOk(); # true

# ---

$state = new State([], true);
$state->isOk(); # true

# ---

# $service = new SomeService();
# $state = $service->doSomeWork(...$args);
# 
# if (!$state->isOk()) {
#   throw new \RuntimeException($state->getMessages()->getErrors()->first());
# }
```
