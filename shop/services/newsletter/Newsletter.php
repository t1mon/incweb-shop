<?php

namespace shop\services\newsletter;

interface Newsletter
{
    public function subscribe($email, $name, $surname): void;
    public function unsubscribe($email): void;
}