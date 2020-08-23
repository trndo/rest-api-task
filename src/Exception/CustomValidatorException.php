<?php


namespace App\Exception;


use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Throwable;

class CustomValidatorException extends \Exception
{
    /**
     * @var array
     */
    private $messages = [];

    public function __construct(
        ConstraintViolationListInterface $constraintViolationList,
        $message = "",
        $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        /** @var ConstraintViolation $item **/
        foreach ($constraintViolationList as $item) {
            $this->messages[] = $item->getMessage();
        }
    }

    public function getValidatiorMessages(): array
    {
        return $this->messages;
    }

}