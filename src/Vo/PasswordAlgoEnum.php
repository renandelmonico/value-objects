<?php

namespace RenanDelmonico\Vo;

enum PasswordAlgoEnum: string
{
    case BCRYPT = '2y'; //PASSWORD_BCRYPT
    case ARGON2I = 'argon2i'; //PASSWORD_ARGON2I
    case ARGON2ID = 'argon2id'; //PASSWORD_ARGON2ID
}
