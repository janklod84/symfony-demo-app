<?php

declare(strict_types=1);

namespace App\Api\Endpoint;

use App\Api\Projection\UserProjection;
use MsgPhp\User\Command\DeleteUserCommand;
use MsgPhp\User\Infra\Uuid\UserId;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;

final class DeleteUserEndpoint
{
    public function __invoke(Request $request, UserProjection $data, MessageBusInterface $bus)
    {
        $bus->dispatch(new DeleteUserCommand(UserId::fromValue($data->userId)));

        return null;
    }
}
