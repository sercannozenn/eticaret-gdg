<?php

namespace App\Enums;

enum Gender: int
{
    case Unisex = 0;
    case Male = 1;
    case Female = 2;
    case ChildBoy = 3;
    case ChildGirl = 4;
}
