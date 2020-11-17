<?php

namespace App\Gateway;

use Illuminate\Database\ConnectionInterface;

class QuestionGateway
{
    /**
     * @var ConnectionInterface
     */
    private $db;

    public function __construct()
    {
        $this->db = app('db');
    }

    // Question
    function getQuestion(int $questionNum)
    {
        $question = $this->db->table('questions')
            ->where('number', $questionNum)
            ->first();

        if ($question) {
            return (array) $question;
        }

        return null;
    }

    function isAnswerEqual(int $number, string $answer)
    {
        return $this->db->table('questions')
            ->where('number', $number)
            ->where('answer', $answer)
            ->exists();
    }
}
