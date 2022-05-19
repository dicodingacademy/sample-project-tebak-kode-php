<?php

namespace App\Gateway;

use Illuminate\Database\ConnectionInterface;

class EventLogGateway
{
    /**
     * @var ConnectionInterface
     */
    private $db;

    public function __construct()
    {
        $this->db = app('db');
    }

    public function saveLog(string $signature, string $body)
    {
        $this->db->table('eventlog')
            ->insert([
                'signature' => $signature,
                'events' => $body
            ]);
    }
}
