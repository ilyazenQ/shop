<?php

namespace App\Core\Abstraction\DTO;

abstract class DTO
{
    private ArgumentMetadata $argument;

    private readonly Request $request;

    public function __construct(
       private readonly AbstractValidator $validator
    )
    {

    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
    }

    protected function validate(array $fields, ?AbstractValidator $validator = null): void
    {
    }

    protected function throwValidationError(array $errors, ApiErrorCode $apiErrorCode = null): void
    {
    }

    public function resolve(Request $request, ArgumentMetadata $argument): Generator
    {
    }

    public function getRequest()
    {
    }

    public function getArgument()
    {
    }

    public function getJson(): array
    {
    }

    protected function get(
        string $key,
        mixed $default = null,
    ): mixed {
    }

    abstract public function handle(): Generator;

    abstract public function getSupportsClass(): string;
}